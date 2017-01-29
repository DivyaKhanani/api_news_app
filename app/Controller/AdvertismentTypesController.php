<?php

class AdvertismentTypesController extends AppController
{
    var $helpers = array('Html', 'Js');
    var $uses = array('CrmAdminUser','AdvertismentType','Device');

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
        $advertismentType = $this->AdvertismentType->find('all');
        $this -> set('advertismentType', $advertismentType);
       
        // Set the view variables to controller variable values and layout for the view     
        $this->layout = 'base_layout';
    }

    public function add()
    {
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request

            $advertismentType = $this->data;
           

            // Add AdvertismentType
            if ($this->AdvertismentType->save($advertismentType)) {     
            
                // Display success message and redirect
                $this->Session->setFlash('New AdvertismentType added.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));

            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
            }

        } else {
        
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }





    /*
    // Objective : This function saves the edited AdvertismentType
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    public function edit($id=null) {

        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $advertismentType = $this->data;
            
            if ($this->AdvertismentType->save($advertismentType)) { 
                
                // Display success message and redirect
                $this->Session->setFlash('Selected advertismentType edited.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
            }

        } else {

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                $this->Session->setFlash('Please choose a AdvertismentType.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
            }

            // Fetch the AdvertismentType by id
            $selectedNews = $this->AdvertismentType->findById($id);
            

            //pr($selectedNews);die();

            // Check whether resultset is null, if yes - redirect to index
            if($selectedNews == null){
                $this->Session->setFlash('Please choose a AdvertismentType.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
            }                   
            
            // Set the view variables to controller variable values and layout for the view
            $this->set('advertismentType',$selectedNews);
            $this -> layout = 'base_layout';

        }
    }





    /*
    // Objective : This function deletes the selected AdvertismentType
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */ 
    public function delete($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a advertismentType.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
        }

        // Find the selected AdvertismentType
        $selectedNews = $this->AdvertismentType->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a advertismentType.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
        }

        // Delete AdvertismentType
        if($this->AdvertismentType->delete($selectedNews['AdvertismentType']['id'])){

            // Display success message and redirect
            $this->Session->setFlash('AdvertismentType deleted.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertismentTypes', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    
     

    


}


?>