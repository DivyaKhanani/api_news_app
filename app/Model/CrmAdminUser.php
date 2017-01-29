<?php
App::uses('AuthComponent', 'Controller/Component/Auth');
class CrmAdminUser extends AppModel
{
	var $belongsTo =  array(
        'CrmAdminType' => array(
            'className' => 'CrmAdminType',
            'foreignKey' => 'fkTypeId'
        )
    );
    public $virtualFields = array(
    'password' => 'Password',
    'first_name'=>'FirstName',
    'id'=>'pkUserId'
);
	 var $primaryKey = 'pkUserId';
	public function beforeSave($options = array()) {
		
		// hash our password
		if (isset($this->data[$this->alias]['Password'])) {
		$this->data[$this->alias]['Password'] = AuthComponent::password($this->data[$this->alias]['Password']);
		}

		// fallback to our parent
		return parent::beforeSave($options);
	}

}

?>