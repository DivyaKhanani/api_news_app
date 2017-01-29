<?php

class SubCategoriesController extends AppController
{
	var $helpers = array('Html', 'Js');
	var $uses = array('CrmAdminUser','SubCategory','Category');

	public function beforeFilter()
    {
        AppController::beforeFilter();

        // Basic setup
        $this->Auth->authenticate = array('Form');

        // Pass settings in
        $this->Auth->authenticate = array('Form' => array('userModel' => 'User'));
        $this->Auth->allow('login');
    }

	public function index()
	{
        // Get all Nesw
        $sub_category = $this->SubCategory->find('all');
        $this -> set('sub_category', $sub_category);
       $cat_list=$this->Category->find("list",array("conditions"=>array("active"=>1)));
          $this->set('cat_list',$cat_list);
        // Set the view variables to controller variable values and layout for the view		
		$this->layout = 'base_layout';
	}

	public function add()
	{
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $sub_category = $this->data;
           

            // Add SubCategory
            if ($this->SubCategory->save($sub_category)) {	
                // Display success message and redirect

            App::import('Model', 'ConnectionManager');
            $con = new ConnectionManager;
            $cn = $con->getDataSource('default');
      /* User table schema */
            $sql = "CREATE TABLE IF NOT EXISTS ".$sub_category['SubCategory']['app_table_name']."(
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_520_ci NOT NULL,
  `title2` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title3` varchar(100) CHARACTER SET utf8 NOT NULL,
  `catid` int(250) NOT NULL,
  `sub_catid` int(250) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8_unicode_ci,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-Inactive, 1-Active',
  `app_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-Inactive, 1-Active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(250) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` int(250) NOT NULL,
  `rating` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `readcount` mediumint(10) NOT NULL DEFAULT '0',
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `reporter_id` int(10) DEFAULT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` bigint(50) NOT NULL DEFAULT '0',
  `top_story` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gs_top_story` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `news_prio` bigint(50) NOT NULL,
  `magegin_news_prio` bigint(50) NOT NULL,
  `schedule_time` datetime NOT NULL,
  `fb_flag` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0= Not Posted, 1 = Posted',
  `sp_pg_flag` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0= Not Added, 1 = Added',
  `app_show_on_top` tinyint(1) NOT NULL DEFAULT '0',
  `app_is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `app_is_cat_featured` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`,`catid`,`sub_catid`),
  KEY `active` (`active`,`created_date`,`created_by`,`modified_date`,`modified_by`),
  KEY `title` (`title`,`title2`,`title3`),
  KEY `priority` (`priority`,`top_story`,`news_prio`,`schedule_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='SubCategory ".$sub_category['SubCategory']['app_table_name']." Articles Managment Table' AUTO_INCREMENT=10 ;";
            if($cn->query($sql))
            {
        
                
                 $this->Session->setFlash(__('User Table Created Successfully in Database'),'default',array('class'=>''));

                }




                //$this->Session->setFlash('New SubCategory added.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));

            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
            }

        } else {
		  $cat_list=$this->Category->find("list",array("conditions"=>array("active"=>1)));
          $this->set('cat_list',$cat_list);
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
	}





    /*
    // Objective : This function saves the edited SubCategory
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    public function edit($id=null) {

        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $sub_category = $this->data;
            
            if ($this->SubCategory->save($sub_category)) {	
				
                // Display success message and redirect
                $this->Session->setFlash('Selected sub_category edited.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
            }

        } else {

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                $this->Session->setFlash('Please choose a SubCategory.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
            }

            // Fetch the SubCategory by id
            $selectedNews = $this->SubCategory->findById($id);
            

            //pr($selectedNews);die();

            // Check whether resultset is null, if yes - redirect to index
            if($selectedNews == null){
                $this->Session->setFlash('Please choose a SubCategory.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
            }					
			
            // Set the view variables to controller variable values and layout for the view
            $cat_list=$this->Category->find("list",array("conditions"=>array("active"=>1)));
          $this->set('cat_list',$cat_list);
            $this->set('sub_category',$selectedNews);
            $this -> layout = 'base_layout';

        }
    }





    /*
    // Objective : This function deletes the selected SubCategory
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */ 
    public function delete($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a sub_category.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
        }

        // Find the selected SubCategory
        $selectedNews = $this->SubCategory->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a sub_category.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
        }

        // Delete SubCategory
        if($this->SubCategory->delete($selectedNews['SubCategory']['id'])){

            // Display success message and redirect
            $this->Session->setFlash('SubCategory deleted.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'sub_categories', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    
     

    


}


?>