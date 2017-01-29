<?php
class Article extends AppModel
{
    public $name = 'Article';
    var $useTable = 'Article';
    var $belongsTo =  array(
        'SubCategory' => array(
            'className' => 'SubCategory',
            'foreignKey' => 'sub_catid'
        )
    );
    //Inflector::rules('plural', array('irregular' => array('Article' => 'Article')));
   /**public $actsAs = array(
        'Upload.Upload' => array(

            // Field in the table which will store the path of the image
            'image_name' => array(

                // Allowed mime types
                'mimetypes'=> array('image/jpg','image/jpeg', 'image/png'),

                // Use php for localhost or where imagick is not installed
                'thumbnailMethod'=>"php",

                // Allowed set of extensions
                'extensions'=> array('jpg','png','JPG','PNG','jpeg','JPEG'),

                // Specify the thumbnail sizes
                'thumbnailSizes' => array(
                    'large' => '1024x768',
                    'medium' => '640x480',
                    'small' => '120x90'
                ),

                // Map the directory path to specified field in the table
                'fields' => array(
                    'dir' => 'image_dir'
                )
            )
        )
    );*/

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

                // Specify the thumbnail sizes
                'thumbnailSizes' => array(
                    'small' => '120x120'
                ),

                // Map the directory path to specified field in the table
                'fields' => array(
                    'dir' => 'id'
                )
            )
        )
    );
}
?>