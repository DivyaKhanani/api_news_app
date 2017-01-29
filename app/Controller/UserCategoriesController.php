<?php

class UserCategoriesController extends AppController
{
	var $helpers = array('Html', 'Js');
	var $uses = array('User','UserCategory');
	
	public function beforeFilter()
    {
        AppController::beforeFilter();

       // $this->layout = 'frontend_main';

        // Basic setup
        $this->Auth->authenticate = array('Form');

        // Pass settings in
        $this->Auth->authenticate = array(
            'Form' => array('userModel' => 'User')
        );
        $this->Auth->allow('login');
		$this->Auth->authorize = 'Controller';
    }
	
	public function isAuthorized($user) 
	{
		
	    // The owner of a post can edit and delete it
	    if (in_array($this->action, array('index','addUserCategory','editUserCategories','deleteUserCategories'))) 
	    {
	    	if($user['UserCategory']['name'] == "Partner")
			{
				return true;
			}
			else 
			{
				return false;
			}
       }
		else if (in_array($this->action, array('logout'))) 
		{
            return true;
        }
		
    	return parent::isAuthorized($user);
    	
     }
	
	public function index()
	{
		$all_user_categories = $this->UserCategory->find('all');
		$this->set('all_user_categories',$all_user_categories);
		$this->layout = 'vedant_common';
	}
	public function addUserCategory($id=null)
	{
		//$id = null;
		if($id == null)
		{
			$user_category_name = null;
			$this->set('user_category_name_edit',$user_category_name);
			if($this->request->is('post'))
			{	
				$user_category_name = $this->request->data;
				if($this->UserCategory->save($user_category_name))
				{
					$this->Session->setFlash('successfully', 'default', array(), 'add_user_category');
					$this->redirect(array('controller'=>'UserCategories','action'=>'addUserCategory'));
				}
				else 
				{
					$this->Session->setFlash('failed', 'default', array(), 'add_user_category');
					$this->redirect(array('controller'=>'UserCategories','action'=>'addUserCategory'));
				}
			}
		}
		else 
		{
			$user_category_name = $this->UserCategory->findById($id);
			$this->set('user_category_name_edit',$user_category_name);
			//$this->Session->setFlash('successfully', 'default', array(), 'delete_user_category');
			//$this->redirect(array('controller'=>'usercategories','action'=>'index'));
		 }

		$this->layout = 'vedant_common';
	}

	public function deleteUserCategories($id=null)
	{
		if($id == null)
		{
			$this->Session->setFlash('failed', 'default', array(), 'delete_user_category');
			$this->redirect(array('controller'=>'userCategories','action'=>'index'));
		}
		else 
		{
			$this->UserCategory->delete($id);
			$this->Session->setFlash('successfully', 'default', array(), 'delete_user_category');
			$this->redirect(array('controller'=>'userCategories','action'=>'index'));
		}
	}
	public function editUserCategories()
	{
		if($this->request->is('post'))
		{	
			$user_category_name = $this->request->data;
			if($this->UserCategory->save($user_category_name))
			{
				$this->Session->setFlash('successfully', 'default', array(), 'edit_user_category');
				$this->redirect(array('controller'=>'UserCategories','action'=>'index'));
			}
			else 
			{
				$this->Session->setFlash('failed', 'default', array(), 'edit_user_category');
				$this->redirect(array('controller'=>'UserCategories','action'=>'index'));
			}
		}
	}
}


?>