<?php

class AdvertismentTimmingsController extends AppController
{
    var $helpers = array('Html', 'Js');
    var $uses = array('CrmAdminUser','AdvertismentTimming','Advertisment','AdvertismentType','Device');

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
        $advertismentTimming = $this->AdvertismentTimming->find('all');
        $this -> set('advertismentTimming', $advertismentTimming);
       $adv_type=$this->AdvertismentType->find('list');
        $this->set('adv_type',$adv_type);
        $adv=$this->Advertisment->find('list');
        $this->set('adv',$adv);

        // Set the view variables to controller variable values and layout for the view     
        $this->layout = 'base_layout';
    }

    public function add()
    {
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request

            $advertismentTimming = $this->data;
           

            // Add AdvertismentTimming
            if ($this->AdvertismentTimming->save($advertismentTimming)) {     
            
                // Display success message and redirect
                $this->Session->setFlash('New AdvertismentTimming added.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));

            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
            }

        } else {
            $adv_type=$this->AdvertismentType->find('list');
            $this->set('adv_type',$adv_type);
            $adv=$this->Advertisment->find('list');
            $this->set('adv',$adv);



        
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }





    /*
    // Objective : This function saves the edited AdvertismentTimming
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    public function edit($id=null) {

        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $advertismentTimming = $this->data;
            
            if ($this->AdvertismentTimming->save($advertismentTimming)) { 
                
                // Display success message and redirect
                $this->Session->setFlash('Selected advertismentTimming edited.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
            }

        } else {

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                $this->Session->setFlash('Please choose a AdvertismentTimming.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
            }

            // Fetch the AdvertismentTimming by id
            $selectedNews = $this->AdvertismentTimming->findById($id);
            

            //pr($selectedNews);die();

            // Check whether resultset is null, if yes - redirect to index
            if($selectedNews == null){
                $this->Session->setFlash('Please choose a AdvertismentTimming.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
            }                   
            
            // Set the view variables to controller variable values and layout for the view
            $this->set('advertismentTimming',$selectedNews);
            $this -> layout = 'base_layout';

        }
    }





    /*
    // Objective : This function deletes the selected AdvertismentTimming
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */ 
    public function delete($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a advertismentTimming.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
        }

        // Find the selected AdvertismentTimming
        $selectedNews = $this->AdvertismentTimming->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a advertismentTimming.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
        }

        // Delete AdvertismentTimming
        if($this->AdvertismentTimming->delete($selectedNews['AdvertismentTimming']['id'])){

            // Display success message and redirect
            $this->Session->setFlash('AdvertismentTimming deleted.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'advertismentTimmings', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    
     

    


}


?>