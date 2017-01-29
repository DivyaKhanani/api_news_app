<?php

class CrmAdminUsersController extends AppController
{
	 var $helpers = array('Html', 'Js');
	 var $uses = array('CrmAdminUser','UserCategory');
	
	public function beforeFilter()
    {
        AppController::beforeFilter();

        // Basic setup
        $this->Auth->authenticate = array('Form');
		
        // Pass settings in
        $this->Auth->authenticate = array(
            'Form' => array('userModel' => 'CrmAdminUser')
        );
        $this->Auth->allow('login');
    }

    public function logout(){
        if($this->Auth->logout()) {
            $this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
        } else {
            $this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
        }
    }

    public function login(){
       $this->layout = "login_layout";

        if($this->request->is('post')){
            if($this->Auth->login()){
               $user_access_detail = $this->Session->read('Auth');
               //pr($user_access_detail);die();
				$user_access = $user_access_detail['User']['Allowed'];
				if($user_access == 0 || $user_access == "0")
				{
					$this->redirect(array('controller'=>'home','action'=>'index'));
				}
				else 
				{
					$this->Session->setFlash('Sorry! Your Access Denied','default',array('class' =>'alert alert-danger'),'bad');
					$this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
				} 
            }
            else{
            	
				$this->Session->setFlash('Invalid Username or Password','default',array('class' =>'alert alert-danger'),'bad');
				$this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
            }
        }
    }

    /*
    // Objective : This function changes the logged-in user's password
    // Author : Ishan Sheth
    // Last Edit : 26/6/2014
    */      
	function change_password() {
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $user = $this -> request -> data;

            // Get current user's ID
            $id = $this->activeUser['User']['id'];               

            // Fetch the item category by id
            $selectedUser = $this->CrmAdminUser->find('first',array('conditions'=>array('pkUserId'=>$id)));
            //pr($selectedUser);die();
            $selectedUser['CrmAdminUser']['Password'] = $user['CrmAdminUser']['new_password'];

            // Save user
            if ($this -> CrmAdminUser -> save($selectedUser)) {	
				
                // Display success message and redirect
                $this->Session->setFlash('Password changed !', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'home', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'home', 'action' => 'index'));
            }

        } else {
            //pr($this->activeUser['CrmAdminUser']['id']);die();
        	// Get current user's ID
        	$id = $this->activeUser['User']['id'];        	

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                
                // Display error message and redirect
                $this->Session->setFlash('Authentication Failure !', 'default', array('class' => 'alert alert-danger') , 'error');

		        if($this->Auth->logout()) {
		            $this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
		        } else {
		            $this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
		        }
            }

            // Fetch the user by id
            $selectedUser = $this->CrmAdminUser->find('first',array('conditions'=>array('pkUserId'=>$id)));

            // Check whether resultset is null, if yes - redirect to index
            if($selectedUser == null){
                // Display error message and redirect
                $this->Session->setFlash('Authentication Failure !', 'default', array('class' => 'alert alert-danger') , 'error');

		        if($this->Auth->logout()) {
		            $this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
		        } else {
		            $this->redirect(array('controller'=>'crm_admin_users','action'=>'login'));
		        }
            }					
			
            // Set the view variables to controller variable values and layout for the view
            $this -> layout = 'base_layout';

        }
	}

}


?>