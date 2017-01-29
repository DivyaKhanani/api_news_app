<?php
class Category extends AppModel
{
   // public $name = 'Article';
   // var $useTable = 'Article';
    public $hasMany = array(
        'SubCategory' => array(
            'className' => 'SubCategory',
            'foreignKey' => 'category'
            

        )
    );
}
?>