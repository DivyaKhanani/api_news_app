<?php

class HomeController extends AppController
{
	 var $helpers = array('Html', 'Js');
	 var $uses = array('Home','User');
	
	public function beforeFilter()
    {
        AppController::beforeFilter();

        // Basic setup
        $this->Auth->authenticate = array('Form');
		
        // Pass settings in
        $this->Auth->authenticate = array(
            'Form' => array('userModel' => 'User')
        );
        $this->Auth->allow('login');
    }

	public function send_push_notification() {

        // $date= date_format(date_create($date),"D M d Y H:i:s");
        // $date= $date." GMT+530 (IST)";

        $data = $this->request->params;
        
        $player_ids = ['697f91e4-44d3-4891-bc02-db7ed0a7769d', 'b1765634-59cb-11e5-b35e-d3d940e46278'];
        $title = $data['title'];
        $msg = $data['msg'];
        // $date = $data['date'];
        // $big_picture_url = $data['big_picture_url'];
        $additional_data = $data['additional_data'];

        //title
        $headings = array(
          "en" => $title
          );

        // description
        $content = array(
          "en" => $msg
          );

        $fields = array(
         'app_id' => "b319c19a-5522-11e5-b496-2f7e8dbd6bda",
         'included_segments' => array('All'),
         //'include_player_ids' => $player_ids, // array
         'isAndroid' => true,
         'isIos' => true,
         'content_available' => true,
         'headings' => $headings,
         'contents' => $content,
         // 'android_sound' => 'fxchng_notification',
         // 'ios_sound' => 'fxchng_notification',
         'data' => $additional_data,
         // 'big_picture' => $big_picture_url,
         // 'small_icon'=> 'ic_stat_fxchng_app_icon_p_bw',
         'large_icon'=> 'icon',         
         // 'send_after'=> $date         
       );
        
        $fields = json_encode($fields);     
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                               'Authorization: Basic YjMxOWMyMzAtNTUyMi0xMWU1LWI0OTctMzNkZTgzOGRlNzQz'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

	public function index()
	{		
		$this->layout = 'base_layout';
	}	

}
?>