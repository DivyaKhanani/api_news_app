<?php

class CategoriesController extends AppController
{
	var $helpers = array('Html', 'Js');
	var $uses = array('CrmAdminUser','Category','Device');

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
        $category = $this->Category->find('all');
        $this -> set('category', $category);
       
        // Set the view variables to controller variable values and layout for the view		
		$this->layout = 'base_layout';
	}

	public function add()
	{
        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request

            $category = $this->data;
           

            // Add Category
            if ($this->Category->save($category)) {		
			
                // Display success message and redirect
                $this->Session->setFlash('New Category added.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'categories', 'action' => 'index'));

            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
            }

        } else {
		
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
	}





    /*
    // Objective : This function saves the edited Category
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */
    public function edit($id=null) {

        // Check whether it is a post request or not
        if ($this -> request -> is('post')) {

            // Get the data from post request
            $category = $this->data;
            
            if ($this->Category->save($category)) {	
				
                // Display success message and redirect
                $this->Session->setFlash('Selected category edited.', 'default', array('class' => 'alert alert-success') , 'success');
                $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
            } else {

                // Display failure message and redirect
                $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
            }

        } else {

            // Check whether ID is null, if yes - redirect to index
            if($id == null){
                $this->Session->setFlash('Please choose a Category.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
            }

            // Fetch the Category by id
            $selectedNews = $this->Category->findById($id);
            

            //pr($selectedNews);die();

            // Check whether resultset is null, if yes - redirect to index
            if($selectedNews == null){
                $this->Session->setFlash('Please choose a Category.', 'default', array('class' => 'alert alert-danger') , 'error');
                $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
            }					
			
            // Set the view variables to controller variable values and layout for the view
            $this->set('category',$selectedNews);
            $this -> layout = 'base_layout';

        }
    }





    /*
    // Objective : This function deletes the selected Category
    // Author : Ishan Sheth
    // Last Edit : 30/6/2014
    */ 
    public function delete($id=null) {

        // Check whether ID is null, if yes - set error message and redirect
        if($id == null){
            $this->Session->setFlash('Please choose a category.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
        }

        // Find the selected Category
        $selectedNews = $this->Category->findById($id);

        // Check whether resultset is null, if yes - set error message and redirect
        if($selectedNews == null){
            $this->Session->setFlash('Please choose a category.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
        }

        // Delete Category
        if($this->Category->delete($selectedNews['Category']['id'])){

            // Display success message and redirect
            $this->Session->setFlash('Category deleted.', 'default', array('class' => 'alert alert-success') , 'success');
            $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
        
        } else {

            // Display failure message and redirect
            $this->Session->setFlash('Sorry, an error occurred.', 'default', array('class' => 'alert alert-danger') , 'error');
            $this -> redirect(array('controller' => 'categories', 'action' => 'index'));
        }

        // Set the view variables to controller variable values and layout for the view
        $this -> layout = 'base_layout';
    }

    
     

    


}


?>