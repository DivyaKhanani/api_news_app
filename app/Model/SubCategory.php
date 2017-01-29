<?php
class SubCategory extends AppModel
{
   // public $name = 'Article';
   // var $useTable = 'Article';
    var $belongsTo =  array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category'
        )
    );
}
?>