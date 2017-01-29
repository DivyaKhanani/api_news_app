<?php
class Advertisment extends AppModel
{
   // public $name = 'Article';
   // var $useTable = 'Article';
	public $actsAs = array(
        'Upload.Upload' => array(

            // Field in the table which will store the path of the image
            'image' => array(

                // Allowed mime types
                'mimetypes'=> array('image/jpg','image/jpeg', 'image/png'),

                // Use php for localhost or where imagick is not installed
                'thumbnailMethod'=>"php",

                // Allowed set of extensions
                'extensions'=> array('jpg','png','JPG','PNG','jpeg','JPEG'),

                // Map the directory path to specified field in the table
                'fields' => array(
                    'dir' => 'id'
                )
            )
        )
    );
}
?>