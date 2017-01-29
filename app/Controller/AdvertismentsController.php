<?php

class AdvertismentsController extends AppController
{
	var $helpers = array('Html', 'Js');
	var $uses = array('CrmAdminUser','Advertisment','Device');

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
        $advertisment = $this->Advertisment->find('all');
        $this -> set('advertisment', $advertisment);
       
        // Set the view variables to controller variable values and layout for the view		
		$this->layout = 'base_layout';
	}

	public function add()
	{
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request

            $advertisment = $this->data;
           

            // Add Advertisment
            if ($this->Advertisment->save($advertisment)) {		
			
                // Display success message and redirect
                $this->Session->setFlash('New Advertisment added.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));

            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
            }

        } else {
		
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
	}





    /*
    // Objective : This function saves the edited Advertisment
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    public function edit($id=null) {

        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $advertisment = $this->data;
            
            if ($this->Advertisment->save($advertisment)) {	
				
                // Display success message and redirect
                $this->Session->setFlash('Selected advertisment edited.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
            }

        } else {

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                $this->Session->setFlash('Please choose a Advertisment.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
            }

            // Fetch the Advertisment by id
            $selectedNews = $this->Advertisment->findById($id);
            

            //pr($selectedNews);die();

            // Check whether resultset is null, if yes - redirect to index
            if($selectedNews == null){
                $this->Session->setFlash('Please choose a Advertisment.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
            }					
			
            // Set the view variables to controller variable values and layout for the view
            $this->set('advertisment',$selectedNews);
            $this -> layout = 'base_layout';

        }
    }





    /*
    // Objective : This function deletes the selected Advertisment
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */ 
    public function delete($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a advertisment.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
        }

        // Find the selected Advertisment
        $selectedNews = $this->Advertisment->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a advertisment.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
        }

        // Delete Advertisment
        if($this->Advertisment->delete($selectedNews['Advertisment']['id'])){

            // Display success message and redirect
            $this->Session->setFlash('Advertisment deleted.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertisments', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    
     

    


}


?>