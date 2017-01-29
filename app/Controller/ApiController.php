<?php 
class ApiController extends AppController
{
	public $uses = array('Article','Device','Event','Coupon','Photo','CouponPhoto','ContactType','Contact','Article','Category','SubCategory','Advertisment','AdvertismentType','AdvertismentTimming');
	var $helpers = array('Html','Js');
	
	public function beforeFilter()
	{
		AppController::beforeFilter();

		// basic setup
		$this->Auth->authenticate = array('Form');

		// pass settings in
		$this->Auth->authenticate = array(
			'Form' => array('userModel' => 'User')
			);

		// allow actions
		$this->Auth->allow();

		//Access Control (Cross Origin Requests)
		$this->response->header('Access-Control-Allow-Origin','*');
		$this->response->header('Access-Control-Allow-Methods','PUT, GET, POST, DELETE, OPTIONS');
		$this->response->header('Access-Control-Allow-Headers','X-Requested-With');
		$this->response->header('Access-Control-Allow-Headers','Content-Type, x-xsrf-token');        
		$this->response->header('Access-Control-Max-Age','172800');
		$this->response->header('Content-Type','application/json');
	}

	public function getAllNews($page=null){

		//Object of responseobject class
		$responseData = new ResponseObject();
		
		
			//$news_list = $this->Article->find('all');
			$news_list = $this->Article->find('all', array('conditions' => array('Article.active' => 1,'Article.schedule_time <='=>date('Y-m-d')),
			'order'=>array('Article.schedule_time DESC'),'limit' => 7, 'page' => $page));
			//pr($news_list);die();
			$newsList = array();
			foreach ($news_list as $news) {
				$news_name['id']=$news['Article']['id'];
				$news_name['news_title']=$news['Article']['title'];
				$news_name['short_desc']=$news['Article']['short_desc'];
				$news_name['published_date']=$news['Article']['schedule_time'];
				$news_name['image']='/files/article/image/'.$news['Article']['id'].'/small_'.$news['Article']['image'];

				array_push($newsList, $news_name);
			}
			
			$responseData = $newsList;
			//pr($responseData);die();
			$this->response->body(json_encode(json_encode($responseData)));
			return $this->response;

	}

	public function getNews($page=null){
		//Object of responseobject class
		$responseData = new ResponseObject();
		$news_list = $this->Article->find('all', array('conditions' => array('Article.active' => 1,'Article.schedule_time <='=>date('Y-m-d')),
			'order'=>array('Article.schedule_time DESC'),'limit' => 4, 'page' => $page));
		//pr($news_list);die();

		    if(sizeof($news_list) <= 0)
			{
				$responseData = new ErrorResponseObject();
			}
			else{

				$newsList = array();
			foreach ($news_list as $news) {
			$news_list1['id']=$news['Article']['id'];
			$news_list1['title']=$news['Article']['title'];
			$news_list1['short_desc']=$news['Article']['short_desc'];
			$news_list1['show_on_top']=$news['Article']['app_show_on_top'];
			$news_list1['is_featured']=$news['Article']['app_is_featured'];
			$news_list1['is_cat_featured']=$news['Article']['app_is_cat_featured'];
			$news_list1['published_date'] = $news['Article']['schedule_time'];
			$news_list1['image']='/files/article/image/'.$news['Article']['id'].'/small_'.$news['Article']['image'];

			array_push($newsList, $news_list1);
			}
		$responseData = $newsList;
		}
		
		
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		return $this->response;
		
	} //getNews


    public function getLatest(){
	    //Object of responseobject class
	    $responseData = new ResponseObject(); 
    	if($this->request->is('post')){

	        //decode the input
		    $post_data = $this->request->input('json_decode',true);
		    // pr($cityid);die();
		    $pub_date = $post_data['schedule_time'];

		    $news_list = $this->Article->find('all', array('conditions' => array('Article.active' => 1, 'Article.schedule_time >' => $pub_date),
			    'order'=>array('Article.schedule_time ASC')));
		    
	        if(sizeof($news_list) <= 0)
		    {
			    $responseData = new ErrorResponseObject();
		    }
		    else{

			    $newsList = array();
			    foreach ($news_list as $news) {
			        $news_list1['id']=$news['Article']['id'];
			        $news_list1['title']=$news['Article']['title'];
			        $news_list1['short_desc']=$news['Article']['short_desc'];
			        $news_list1['published_date'] = $news['Article']['schedule_time'];
			       $news_list1['image']='/files/article/image/'.$news['Article']['id'].'/small_'.$news['Article']['image'];

			        array_push($newsList, $news_list1);
			    }
        		$responseData = $newsList;
		    }
			
		}else{
			$responseData = new ErrorResponseObject();
		}
		
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		return $this->response;
		
	} //getNews

	public function getNewsByCat($cat_id,$page=null){
	    //Object of responseobject class
		$responseData = new ResponseObject();

		
		/*$news_list = $this->Article->find('all', array('conditions' => array('Article.active' => 1,'Article.sub_catid'=>$cat_id,'Article.schedule_time <='=>date('Y-m-d')),
			'order'=>array('Article.schedule_time DESC'),'limit' => 7, 'page' => $page));*/
		$subcat=$this->SubCategory->findById($cat_id);
		//pr($subcat);
		$news_list =$this->Article->query('SELECT id,title,app_show_on_top,app_is_featured,app_is_cat_featured,schedule_time,short_desc,image,sub_catid FROM '.$subcat['SubCategory']['app_table_name'].' WHERE `active`=1 and  `schedule_time` <= "'.date('Y-m-d').'" order by `priority` desc limit 7 offset '.$page);
		//pr($news_list);die();
			if(sizeof($news_list) <= 0)
			{
				$responseData = new ErrorResponseObject();
			}
			else{

				$newsList = array();
			foreach ($news_list as $news) {
			$news_list1=$news[$subcat['SubCategory']['app_table_name']];
			$news_list1['app_table_name']=$subcat['SubCategory']['app_table_name'];
			
			$news_list1['published_date'] = $news_list1['schedule_time'];
			$news_list1['image']='/files/'.$news_list1['app_table_name'].'/'.$news_list1['image'];
			$news_list1['image']='/files/'.$news_list1['app_table_name'].'/'.$news_list1['id'].'/'.$news_list1['image'];

			array_push($newsList, $news_list1);
			}
		$responseData = $newsList;
		}
		
		
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		return $this->response;
		
	} //getNews
	public function getNewsDetails($news_table_name,$news_id)
	{
		//object of ResponseObject Class
		$responseData = new ResponseObject();
		$news = $this->Article->query('SELECT id,title,app_show_on_top,app_is_featured,app_is_cat_featured,schedule_time,short_desc,image,sub_catid,content,url FROM '.$news_table_name.' WHERE `id`='.$news_id);
		//pr($news);die();
		$news_detail = array();
		if(sizeof($news) <= 0)
		{
			$responseData = new ErrorResponseObject();
		}
		else{

			$news_detail=$news[0][$news_table_name];
			//$news_detail['tags']=$news['Article']['tags'];
			$news_detail['published_date'] = $news_detail['schedule_time'];

			
			$news_detail['image']='/files/'.$news_table_name.'/'.$news_detail['id'].'/'.$news_detail['image'];
			$responseData = $news_detail;
		}
		//	pr($responseData);
		// encode data body to json and return output
		$tmp=json_encode($responseData);
		$this->response->body(json_decode(json_encode($tmp)));
		//pr($this->response);die();
		return $this->response;
	}

	public function insert_deviceid()
	{
		$return_data = new ResponseObject();
		if($this->request->is('post'))
		{
			// decode post data in php array
			$device_detail = $this->request->input('json_decode',true);
			
			//pr($device_detail);die();
			$device_id = $device_detail['device_id'];
			$device = $device_detail['device'];

			$existing = $this->Device->findByDeviceId($device_id);
			//pr($existing);die();
			
			if(sizeof($existing) <= 0)
			{
				$devices['Device']['device_id'] = $device_id;
				$devices['Device']['device'] = $device;

				if($this->Device->save($devices))
				{
					$return_data = "success ! Your device has been registered.";
					$return_data->status ="success";
				    
				}else
				{
					// error registering
					$return_data = new ErrorSessionFailed();
				}
			}
			else
			{
				$return_data->message = "success ! Your device has alredy been registered.";
				$return_data->status ="success";
			}
         	}
            else{
    			
            }
 
    	// encode data body to json and return result
		$this->response->body(json_encode($return_data));
		return $this->response;
     }
     
     
     // Added by divya khanani 



   
	public function getCategories(){
	    //Object of responseobject class
		$responseData = new ResponseObject();
		$this->Category->Behaviors->load('Containable');
		$list = $this->Category->find('all', array('conditions'=>array('Category.active'=>1),
			'order'=>'Category.order',
			'fields'=>array('Category.id','Category.name'),
			'contain'=>array('SubCategory'=>array(
					'fields'=>array('SubCategory.id','SubCategory.name','SubCategory.app_table_name'),
		            'conditions' => array('SubCategory.app_active' => '1'),
		            'order' => 'SubCategory.order'
				))));
		
		if(sizeof($list) <= 0)
		{
			$responseData = new ErrorResponseObject();
		}
		else{
		//$responseData = $newsList;
		$responseData = $list;
		}
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		return $this->response;
	} //
	public function getSubCategories($cat_id){
	    //Object of responseobject class
		$responseData = new ResponseObject();
		$this->Category->Behaviors->load('Containable');
		$list = $this->Category->find('all', array('conditions'=>array('Category.active'=>1,'Category.id'=>$cat_id),
			'fields'=>array('Category.id','Category.name'),
			'contain'=>array('SubCategory'=>array(
					'fields'=>array('SubCategory.id','SubCategory.name','SubCategory.app_table_name'),
		            'conditions' => array('SubCategory.app_active' => '1'),
		            'order' => 'SubCategory.order'
				))));
		
		if(sizeof($list) <= 0)
		{
			$responseData = new ErrorResponseObject();
		}
		else{
		//$responseData = $newsList;
		$responseData = $list;
		}
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		return $this->response;
	}
	 //getAllEvents
	public function getNewsFeaturedList(){
		//Object of responseobject class
		$responseData = new ResponseObject();
		
		//pr($news_list);die();
		$this->Category->Behaviors->load('Containable');
		$list = $this->Category->find('all', array('order'=>array('Category.order DESC','Category.active'=>1),
			'order'=>'order',
			'fields'=>array('Category.id','Category.name'),
			'contain'=>array('SubCategory'=>array(
					'fields'=>array('SubCategory.id','SubCategory.name','SubCategory.app_table_name'),
		            'conditions' => array('SubCategory.app_active' => '1'),
		            'order' => 'SubCategory.order'
				))));
		$temp_new_list=array();
		foreach ($list as $cat) {
			
			foreach ($cat['SubCategory'] as $subcat) {
				$news_list = $this->Article->query('SELECT id,title,app_show_on_top,app_is_featured,app_is_cat_featured,schedule_time,short_desc,image,sub_catid FROM '.$subcat['app_table_name'].' WHERE `active`=1 and  `schedule_time` <= "'.date('Y-m-d').'"  and (`app_is_featured`=1 or `app_show_on_top`=1) order by `priority` desc ');
				
				if($news_list!=null){
					foreach ($news_list as $key) {
						$key[$subcat['app_table_name']]['app_table_name']=$subcat['app_table_name'];
						$key[$subcat['app_table_name']]['app_table_name']=$subcat['app_table_name'];
						array_push($temp_new_list, $key[$subcat['app_table_name']]);
					}
					
				}
			}
			

		}
		//pr($temp_new_list);die();
	    if(sizeof($temp_new_list) <= 0){
			$responseData = new ErrorResponseObject();
		}
		else{
				$newsList = array();
				foreach ($temp_new_list as $news) {
				
				$news['published_date'] = $news['schedule_time'];
				
				$news['image']='/files/'.$news['app_table_name'].'/'.$news['id'].'/'.$news['image'];

				array_push($newsList, $news);
				}
				$responseData = $newsList;
		}
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		return $this->response;
	} //getNews
	public function getNewsListByCat($cat_id){
		//Object of responseobject class
		$responseData = new ResponseObject();
		if($cat_id==null){
			$this->response->body(json_encode(new ErrorResponseObject()));
			//$this->response->body($responseData);
			return $this->response;
		}
		//pr($news_list);die();
		$this->Category->Behaviors->load('Containable');
		$list = $this->Category->find('all', array(
			'conditions'=>array('Category.active'=>1,'Category.id'=>$cat_id),
			'order'=>'Category.order DESC',
			'fields'=>array('Category.id','Category.name'),
			'contain'=>array('SubCategory'=>array(
					'fields'=>array('SubCategory.id','SubCategory.name','SubCategory.app_table_name'),
		            'conditions' => array('SubCategory.app_active' => '1'),
		            'order' => 'SubCategory.order'
				))));
		$temp_new_list=array();
		foreach ($list as $cat) {			
			foreach ($cat['SubCategory'] as $subcat) {
				$news_list = $this->Article->query('SELECT id,title,app_show_on_top,app_is_featured,app_is_cat_featured,schedule_time,short_desc,image,sub_catid FROM '.$subcat['app_table_name'].' WHERE `active`=1 and  `schedule_time` <= "'.date('Y-m-d').'"  and (`app_is_cat_featured`=1) order by `priority` desc limit 4');
				//pr($news_list);
				if($news_list!=null){
					foreach ($news_list as $key) {
						$key[$subcat['app_table_name']]['app_table_name']=$subcat['app_table_name'];
						array_push($temp_new_list, $key[$subcat['app_table_name']]);
					}
					
				}
			}
			

		}
		
	    if(sizeof($temp_new_list) <= 0){
			$this->response->body(json_encode(new ErrorResponseObject()));
			//$this->response->body($responseData);
			return $this->response;
		}
		else{
				$newsList = array();
				foreach ($temp_new_list as $news) {
				
				$news['published_date'] = $news['schedule_time'];
				$news['image']='/files/'.$news['app_table_name'].'/'.$news['id'].'/'.$news['image'];

				array_push($newsList, $news);
				}
				$responseData = $newsList;
		}
		//pr($responseData);die();
		$tmp=json_encode($responseData);
		$this->response->body(json_decode(json_encode($tmp)));
		//$this->response->body($responseData);
		return $this->response;
	} //getNews
	public function getNewsListBySubCat($sub_table,$cat_id,$page=0){
		//Object of responseobject class
		$responseData = new ResponseObject();
		if($cat_id==null){
			$this->response->body(json_encode(new ErrorResponseObject()));
			//$this->response->body($responseData);
			return $this->response;
		}
		//pr($news_list);die();
		$db = $this->Article->getDataSource();
		$news_list1=$db->fetchAll(
		    'SELECT article_id,sub_category_id,table_name from article_categories where sub_category_id = ? order by table_name limit '.($page*4).' , 4',
		    array($cat_id)
		);
		//pr($news_list1);
		$news_list=array();
		foreach ($news_list1 as $key) {
			
			$news_list_t = $this->Article->query('SELECT id,title,app_show_on_top,app_is_featured,app_is_cat_featured,schedule_time,short_desc,image,sub_catid FROM '.$key['article_categories']['table_name'].' WHERE `active`=1 and  `schedule_time` <= "'.date('Y-m-d').'"  and (`app_active`=1) and id='.$key['article_categories']['article_id']);
			$news_list_t[0][$key['article_categories']['table_name']]['app_table_name']=$key['article_categories']['table_name'];
			array_push($news_list, $news_list_t[0][$key['article_categories']['table_name']]);
			
		}
		/*pr($news_list);die();
		$news_list = $this->Article->query('SELECT id,title,app_show_on_top,app_is_featured,app_is_cat_featured,schedule_time,short_desc,image,sub_catid FROM '.$sub_table.' WHERE `active`=1 and  `schedule_time` <= "'.date('Y-m-d').'"  and (`app_is_cat_featured`=1) order by `priority` desc limit 4');*/
		/*
		array_multisort($news_list1[0], SORT_ASC, SORT_STRING,
                $news_list1[1], SORT_NUMERIC, SORT_DESC);*/
			
                //pr($news_list);die();
		
	    if(sizeof($news_list) <= 0){
			$responseData="";
		}
		else{
				$newsList = array();
				foreach ($news_list as $news) {
				//$news=$news[$sub_table];
				//$news['app_table_name']=$sub_table;
				$news['published_date'] = $news['schedule_time'];
				$news['image']='/files/'.$news['app_table_name'].'/'.$news['id'].'/'.$news['image'];
				$news['unique']=$news['id'].$news['app_table_name'];

				array_push($newsList, $news);
				}
				$responseData = $newsList;
		}
		//pr($responseData);die();
		 $this->response->body(json_encode($responseData));
		//$this->response->body($responseData);
		 
		return $this->response;
	}
	public function getAdvertisment($cat_id){
		//Object of responseobject class
		$responseData = new ResponseObject();
		if($cat_id==null){
			$this->response->body(json_encode(new ErrorResponseObject()));
			//$this->response->body($responseData);
			return $this->response;
		}
		//pr($news_list);die();
		$this->AdvertismentType->Behaviors->load('Containable');
		$list = $this->AdvertismentType->find('all', array(
			'conditions'=>array('AdvertismentType.page'=>$cat_id),
			'fields'=>array('AdvertismentType.id','AdvertismentType.name'),
			'contain'=>array('AdvertismentTimming'=>array('conditions'=>array(
				'AdvertismentTimming.start_time <'=>date('Y-m-d H:i:s'),'AdvertismentTimming.end_time >'=>date('Y-m-d H:i:s')
				)),'AdvertismentTimming.Advertisment')));
		//pr($list);die();
		
		
	    if(sizeof($list[0]['AdvertismentTimming']) <= 0){
			$this->response->body(json_encode(new ErrorResponseObject()));
			//$this->response->body($responseData);
			return $this->response;
		}
		else{
				$responseData = $list[0]['AdvertismentTimming'];
				//pr($responseData);die();
				foreach ($responseData as $key=>$value) {
					$responseData[$key]['Advertisment']['image']='/files/advertisment'.'/image/'.$responseData[$key]['Advertisment']['id'].'/'.$responseData[$key]['Advertisment']['image'];
				}
				
		}
		//pr($responseData);die();
		$tmp=json_encode($responseData);
		$this->response->body(json_decode(json_encode($tmp)));
		//$this->response->body($responseData);
		return $this->response;
	} //getNews
	
} //apiController

class ResponseObject{
	var $data = array();
	var $status = "";
	} //ResponseObject

class ErrorResponseObject{
	var $data = 0;
	var $status = "Error";
	var $message = "API Error";
}
?>