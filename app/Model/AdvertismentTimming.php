<?php
class AdvertismentTimming extends AppModel
{
   // public $name = 'Article';
   // var $useTable = 'Article';
	var $belongsTo =  array(
        'AdvertismentType','Advertisment'
        );
    
}
?>