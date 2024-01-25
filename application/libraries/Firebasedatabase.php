<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


require __DIR__.'/include/vendor/autoload.php';
 use Kreait\Firebase\Factory;
   use Kreait\Firebase\ServiceAccount;
   
     class Firebasedatabase
    {
	    	function __construct()
		{
			//$this->CI =& get_instance();

		}

		public function saveData($data='',$dbname='')
		{
			 $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/include/fir-chat-9ec49-firebase-adminsdk-a67n3-2bee8833f9.json');
		   $firebase = (new Factory)
		      ->withServiceAccount($serviceAccount)
		      ->withDatabaseUri('https://fir-chat-9ec49.firebaseio.com/')
		      ->create();
		      
		   $database = $firebase->getDatabase();




			   //$ref = "registration/".$data['user_id'].'/'.$data['multicast_id'];
			   $postdata = $database->getReference($dbname)->set($data);

			   return $postdata;

			}

			public function userlist()
			{
				$serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/include/fir-chat-9ec49-firebase-adminsdk-a67n3-2bee8833f9.json');
		   $firebase = (new Factory)
		      ->withServiceAccount($serviceAccount)
		      ->withDatabaseUri('https://fir-chat-9ec49.firebaseio.com/')
		      ->create();
		      
		   $database = $firebase->getDatabase();




			   $ref = "users/";
			   $postdata = $database->getReference($ref)->getvalue();

			   return $postdata;

			}

			public function userlistByFilter($user_id=0,$dabasename=0)
			{
				$serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/include/fir-chat-9ec49-firebase-adminsdk-a67n3-2bee8833f9.json');
		   $firebase = (new Factory)
		      ->withServiceAccount($serviceAccount)
		      ->withDatabaseUri('https://fir-chat-9ec49.firebaseio.com/')
		      ->create();
		      
		   $database = $firebase->getDatabase();




			   
			   $postdata = $database->getReference($dabasename)->getchild($user_id)->getvalue();

			   return $postdata;

			}
}
    
    ?>