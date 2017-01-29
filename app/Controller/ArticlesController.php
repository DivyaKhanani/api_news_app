<?php

class ArticlesController extends AppController
{
	var $helpers = array('Html', 'Js');
	var $uses = array('CrmAdminUser','Article','Device','SubCategory','ArticleCategory');

	public function beforeFilter()
    {
        AppController::beforeFilter();

        // Basic setup
        $this->Auth->authenticate = array('Form');

        // Pass settings in
        $this->Auth->authenticate = array('Form' => array('userModel' => 'User'));
        $this->Auth->allow('login');
    }


    /*
    // Objective : This function lists all Article
    // Author : Ishan Sheth
    // Last Edit : 29/6/2014
    */	
	public function index($table=null,$page=null)
	{
        // Get all Nesw
        if($table!=null && $page!=null){
            $article = $this->Article->query('select * from '.$table.' limit '.(10*($page-1)).' , 10 ');
        
        $tmp=array();
        foreach ($article as $key=>$value2) {
            foreach ($value2 as $key1 => $value) {
                array_push($tmp, $value);
            }
        }
         $this -> set('article', $tmp);
         $this -> set('table', $table);
        }
         //pr($tmp);die();
        $cat_list=$this->SubCategory->find("list",array('fields'=>array('app_table_name')));
          $this->set('cat_list',$cat_list); 
        // Set the view variables to controller variable values and layout for the view		
		$this->layout = 'base_layout';
	}

	public function add()
	{
       
       
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request

            $article = $this->data;
            
            //$article['Article']['active'] = 1;
            // $article['Article']['published_date'] = null; 
            // if($article['Article']['published'] == 1)
            // {
            //     $article['Article']['published_date'] = date('Y-m-d G:i:s');
            // }

            
            //$dynamicModel = Inflector::camelize($article['Article']['sub_catname']);
            $t=$article['Article'];
            $image_=1;
            
            // Add Article
             $str="INSERT INTO ".$t['sub_catname']." (`title`, `title2`, `sub_catid`, `content`, `short_desc`, `image`, `created_date`, `created_by`, `modified_date`, `modified_by`,`url`, `priority`, `app_show_on_top`, `app_is_featured`, `app_is_cat_featured`,`app_active`,`schedule_time`) VALUES (";
             $str.="'".$t['title']."',";
             $str.="'".$t['title2']."',";
             $str.="'".$t['sub_catid']."',";
             $str.="'".$t['content']."',";
             $str.="'".$t['short_desc']."',";
             if($t['image']['name']!=null)
             $str.="'".$t['image']['name']."',";

             $str.="'".date('Y-m-d H:i:s')."',";
             $str.=$this->activeUser['User']['pkUserId'].",";
             $str.="'".date('Y-m-d H:i:s')."',";
             $str.=$this->activeUser['User']['pkUserId'].",";
             $str.="'".$t['url']."',";
             $str.="".$t['priority'].",";
             $str.="".$t['app_show_on_top'].",";
             $str.="".$t['app_is_featured'].",";
             $str.="".$t['app_is_cat_featured'].",";
             $str.="".$t['app_active'].",";
             $str.="'".$t['schedule_time']."' )";
             $this->Article->query($str);
             $result = $this->Article->query("SELECT LAST_INSERT_ID() as id");
             
            $last_id = $result[0][0]['id'];
             $this->addArticleCategory($t['multi_sub_cat'],$last_id,$t['sub_catname']);
             if($t['image']['name']!=null)
            $image_=$this->imageUpload($_FILES,$t['sub_catname'],$last_id);

            if($image_==0){
            // Display success message and redirect
            $this->Session->setFlash('Image not uploaded , New Article added.', 'default', array('class' => 'alert alert-success') , 'success');
            }
                // Display success message and redirect
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index',$t['sub_catname'],1));

            
        } else {
		$cat_list=$this->SubCategory->find("list",array('fields'=>array('app_table_name')));
          $this->set('cat_list',$cat_list);
          $cat_list_title=$this->SubCategory->find("list",array('fields'=>array('name')));
          $this->set('cat_list_title',$cat_list_title);
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
	}
    public function addArticleCategory($multi_cat,$id,$table){
        $i=0;
        foreach ($multi_cat as $key => $value) {
            $article_cat[$i]['ArticleCategory']['article_id']=$id;
            $article_cat[$i]['ArticleCategory']['sub_category_id']=$value;
            $article_cat[$i]['ArticleCategory']['table_name']=$table;
        $i++;
        }
        $this->ArticleCategory->saveMany($article_cat);

    }
    public function imageUpload($file,$table,$id)
    {
        $target_dir = "files/".$table."/".$id."/";
        $target_file = $target_dir . basename($file["data"]["name"]["Article"]["image"]);

        if( is_dir("files/".$table) === false ){
                mkdir("files/".$table);
        }
        if( is_dir("files/".$table."/".$id) === false ){
                mkdir("files/".$table."/".$id);
        }

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        
        /*$check = getimagesize($file["data"]["tmp_name"]["Article"]["image"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
           // $uploadOk = 1;
        } else {
            echo "File is not an image.";
            //$uploadOk = 0;
        }*/
        
        list($width, $height, $type, $attr) = getimagesize( $file["data"]["tmp_name"]["Article"]["image"] );
            pr($width."-". $height);

        if ( $width != 580 || $height != 450 ) {
            $target_filename = $file["data"]["tmp_name"]["Article"]["image"];
            $fn = $file["data"]["tmp_name"]["Article"]["image"];
            $size = getimagesize( $fn );
            //$ratio = $size[0]/$size[1]; // width/height
            $ratio = 580/450;
            if( $ratio > 1) {
                $width = 580;
                $height = 450/$ratio;
            } else {
                $width = 450*$ratio;
                $height = 580;
            }
            $src = imagecreatefromstring( file_get_contents( $fn ) );
            $dst = imagecreatetruecolor( 580, 450 );
            
            imagecopyresampled( $dst, $src, 0, 0, 0, 0, 580, 450, $size[0], $size[1] );
            imagedestroy( $src );
            imagejpeg( $dst, $target_filename ); // adjust format as needed
            imagedestroy( $dst );
            list($width1, $height1, $type1, $attr1) = getimagesize( $target_filename );
            move_uploaded_file($target_filename, $target_file);
           // pr($width1."-". $height1);die();
        }
        // Check file size
        
        // Allow certain file formats
        /*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
           // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }*/
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            
            /*if (move_uploaded_file($target_filename, $target_file)) {
               // echo "The file ". basename( $file["data"]["name"]["Article"]["image"]). " has been uploaded.";
            } else {
                $uploadOk = 0;
               // echo "Sorry, there was an error uploading your file.";
            }*/
        }
        return $uploadOk;
    }



    /*
    // Objective : This function saves the edited Article
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    public function edit($table,$id=null) {
        $cat_list_selected=$this->ArticleCategory->find("list",array('conditions'=>array('article_id'=>$id,'table_name'=>$table),
            'fields'=>'sub_category_id')); 
        //pr($cat_list_selected);die();
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $t = $this->data['Article'];
            //pr($_FILES);die();
            // $article['Article']['published'] = 0;

            // if($article['Article']['published'] == 1)
            // {
            //     $article['Article']['published_date'] = date('Y-m-d G:i:s');
            // }

            $image_=1;
            if($t['image']['name']!=null)
            $image_=$this->imageUpload($_FILES,$table,$t['id']);
            
            $temp_array_delete=array_diff($cat_list_selected, $t['multi_sub_cat']);
            foreach ($temp_array_delete as $key => $value) {
                $this->ArticleCategory->deleteAll(array('article_id' => $t['id'],'table_name'=>$table,'sub_category_id'=>$value),false);
            }
            $temp_array_insert=array_diff( $t['multi_sub_cat'],$cat_list_selected);
            if($temp_array_insert != null){
                $this->addArticleCategory($temp_array_insert,$t['id'],$table);
            }
            $q="UPDATE ".$table." SET  `title` = '".$t['title']."',";
            $q.=" `title2` = '".$t['title2']."',";
            $q.=" `content` = '".$t['content']."' ,";
            $q.=" `short_desc`  = '".$t['short_desc']."' ,";
            if($t['image']['name']!=null)
            $q.=" `image` = '".$t['image']['name']."' , ";
            
            $q.=" `schedule_time` = '".$t['schedule_time']."' , ";

            $q.=" `modified_date` = '".date('Y-m-d H:i:s')."' ,";
            $q.=" `modified_by` = '".$this->activeUser['User']['pkUserId']."' ,";
            $q.=" `url` = '".$t['url']."' , ";
            $q.="`priority` = ".$t['priority']." , ";
            $q.="`app_show_on_top` = ".$t['app_show_on_top']." , ";
            $q.="`app_is_featured` = ".$t['app_is_featured']." , ";
            $q.="`app_is_cat_featured` = ".$t['app_is_cat_featured']." ";
            $q.=" WHERE `id` =".$t['id']."";
            $r=$this->Article->query($q);
            // Save Article
            
			$this->Session->setFlash('Selected article edited.', 'default', array('class' => 'alert alert-success') , 'success');
            if($image_==0){
            // Display success message and redirect
            $this->Session->setFlash('Image not uploaded , Selected article edited.', 'default', array('class' => 'alert alert-success') , 'success');
            }
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index',$table,1));
           

        } else {

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                $this->Session->setFlash('Please choose a Article.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
            }

            // Fetch the Article by id
            $selectedNews = $this->Article->query('select * from '.$table.' where id= '.$id.'');
            $selectedNews_['Article']=$selectedNews[0][$table];

          //  pr($selectedNews_);die();

            // Check whether resultset is null, if yes - redirect to index
            if($selectedNews == null){
                $this->Session->setFlash('Please choose a Article.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
            }					
			
            // Set the view variables to controller variable values and layout for the view
            $cat_list=$this->SubCategory->find("list",array());
          $this->set('cat_list',$cat_list);

               
            $this->set('cat_list_selected',$cat_list_selected);

            $this->set('table',$table);

            $this->set('article',$selectedNews_);
            $this -> layout = 'base_layout';

        }
    }





    /*
    // Objective : This function deletes the selected Article
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */ 
    public function delete($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Find the selected Article
        $selectedNews = $this->Article->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Delete Article
        if($this->Article->delete($selectedNews['Article']['id'])){

            // Display success message and redirect
            $this->Session->setFlash('Article deleted.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    public function publish($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Find the selected Article
        $selectedNews = $this->Article->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Update Article
        
        $selectedNews['Article']['published']=1;
        $selectedNews['Article']['published_date']= date('Y-m-d G:i:s');
        //pr($selectedNews);die();
        if($this->Article->save($selectedNews)){

            // Display success message and redirect
            $this->Session->setFlash('Article Published.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    public function send_onesignal($id = null) {

        if ($id == null) {

            $this->Session->setFlash('Please choose a article article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Find the selected Article
        $selectedNews = $this->Article->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if ($selectedNews == null) {

            $this->Session->setFlash('Please choose a article article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }


        $additional_data['type'] = 1;        
        $additional_data['final_id'] = $selectedNews['Article']['id'];

        $msg = $selectedNews['Article']['short_desc'];
        $title = $selectedNews['Article']['news_title'];

        $onesignal_response = json_decode($this->requestAction('/home/send_push_notification' , array('additional_data' => $additional_data, 'msg' => $msg, 'title' => $title)) , true);

        if (isset($onesignal_response['id']) && $onesignal_response != null) {

            $selectedNews['Article']['notification'] = 1;

            if ($this->Article->save($selectedNews)) {

                $this->Session->setFlash('Notification Send.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
            }
        }else {
          
          $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
          $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }
    }   

    public function send_notification($table,$id) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a article article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Find the selected Article
        $selectedNews_ = $this->Article->query('select * from '.$table.' where id= '.$id.'');
        $selectedNews['Article']=$selectedNews_[0][$table];
        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a article article.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        //GCM!
        $devices_count = $this->Device->find('count', array('conditions'=>array('Device.device'=>'android')));
        $devices = array();    
        $return_data = false;    
        if($devices_count <= 1000){
            $all_deviceId = $this->Device->find('all',array('fields' => 'Device.device_id','conditions'=>array('Device.device'=>'android')));
            //print_r($all_deviceId);die();

            $deviceid_list = array();
            foreach ($all_deviceId as $deviceid) {
                $device = $deviceid['Device']['device_id'];
                array_push($deviceid_list , $device);
            }
       
            $return_data = $this->_sendGoogleCloudMessage(array('id'=> $selectedNews['Article']['id'],'message'=> $selectedNews['Article']['short_desc'],'title'=> $selectedNews['Article']['title'],'table'=> $table, 'msgcnt'=>1), $deviceid_list);
        }
        else{
            $pages = ceil(($devices_count/1000));
            for($i=0; $i<$pages; $i++){
                $all_deviceId = $this->Device->find('all',array('fields' => 'Device.device_id', 'conditions'=>array('Device.device'=>'android'), 'page' => $i+1, 'limit'=>1000));
                //print_r($all_deviceId);die();

                $deviceid_list = array();
                foreach ($all_deviceId as $deviceid) {
                    $device = $deviceid['Device']['device_id'];
                    array_push($deviceid_list , $device);
                }
               $return_data = $this->_sendGoogleCloudMessage(array('id'=> $selectedNews['Article']['id'],'message'=> $selectedNews['Article']['short_desc'],'title'=> $selectedNews['Article']['title'],'table'=> $table, 'msgcnt'=>1), $deviceid_list);        
            }
        }

        //APN!
       
        

        if($return_data == true && $return_data_apn == "success"){

           // $selectedNews['Article']['notification'] = 1;

            //if($this->Article->save($selectedNews)){
            if(true){

                $this->Session->setFlash('Notification Send.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
            }else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }
            // // Display success message and redirect
            // $this->Session->setFlash('Notification Send.', 'default', array('class' => 'alert alert-success') , 'success');
            // $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'Articles', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    function _sendGoogleCloudMessage( $data, $ids )
    {
        //------------------------------
        // Replace with real GCM API 
        // key from Google APIs Console
        // 
        // https://code.google.com/apis/console/
        //------------------------------

        $apiKey = 'AIzaSyBrf_CSGdzI707AXlHEt_HV9cgfAdrEYq8';

        $url = 'https://android.googleapis.com/gcm/send';

        $post = array(
                'registration_ids'  => $ids,
                'data'              => $data,
                );

        //------------------------------
        // Set CURL request headers
        // (Authentication and type)
        //------------------------------

        $headers = array( 
                    'Authorization: key=' . $apiKey,
                    'Content-Type: application/json'
                    );

        //------------------------------
        // Initialize curl handle
        //------------------------------

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_URL, $url );

        curl_setopt( $ch, CURLOPT_POST, true );

        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );

        $result = curl_exec( $ch );

        if ( curl_errno( $ch ) )
        {
            return false;
        }

        curl_close( $ch );
        
        return true;
    }
    /*
    // Objective : This function saves the edited Article
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    // public function manage_photos($id=null) {

    //     // Check whether it is a post request or not
    //     if ($this -> request -> is('post')) {

    //         // Get the data from post request
    //         $photos = $this -> request -> data;

    //         //pr($photos);die();      

    //         // Save Article
    //         if ($this -> Gallery -> save($gallery)) {   
                
    //             // Display success message and redirect
    //             $this->Session->setFlash('Selected gallery edited.', 'default', array('class' => 'alert alert-success') , 'success');
    //             $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));
    //         } else {

    //             // Display failure message and redirect
    //             $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
    //             $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));
    //         }

    //     } else {

    //         // Check whether ID is null, if yes - redirect to index
    //         if($id == null){
    //             $this->Session->setFlash('Please choose a gallery.', 'default', array('class' => 'alert alert-danger') , 'error');
    //             $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));
    //         }

    //         // Fetch the Gallery by id
    //         $selectedGallery = $this->Gallery->findById($id);

    //         // Check whether resultset is null, if yes - redirect to index
    //         if($selectedGallery == null){
    //             $this->Session->setFlash('Please choose a gallery.', 'default', array('class' => 'alert alert-danger') , 'error');
    //             $this -> redirect(array('controller' => 'Galleries', 'action' => 'index'));
    //         }                   
            
    //         // Set the view variables to controller variable values and layout for the view
    //         $this->set('gallery',$selectedGallery);
    //         $this -> layout = 'base_layout';

    //     }
    // }        		

}


?>