<?php
class AdvertismentType extends AppModel
{
   // public $name = 'Article';
   // var $useTable = 'Article';
	var $hasMany =  array(
        'AdvertismentTimming'
        );
}
?>