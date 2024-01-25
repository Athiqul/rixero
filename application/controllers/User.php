<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  
class User extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->library('Encryptdecrypt');
	 $this->db2 = $this->load->database('abs', TRUE);
	

		 
   
	}
	public function index()
	{
		$Encryptdecrypt = new Encryptdecrypt();

		$this->db2->select();
		$this->db2->where('user_type','superadmin');
		$absAr=$this->db2->get('users')->row_array();

		// $this->db3->select();
		// $this->db3->where('user_type','superadmin');
		// $mcopsAr=$this->db3->get('users')->row_array();

		

		$data = array();
		$data['absusername']=isset($absAr['username'])?$absAr['username']:'';
		$dbPassord =isset($absAr['password'])?$absAr['password']:'';
         $data['absPassword']=  $Encryptdecrypt->decrypt($dbPassord);

  //        $data['mcopsusername']=isset($mcopsAr['username'])?$mcopsAr['username']:'';
		// $mcopsdbPassord =isset($mcopsAr['password'])?$mcopsAr['password']:'';
  //        $data['mcopsPassword']=  $Encryptdecrypt->decrypt($mcopsdbPassord);


         $data['gzusername']=isset($gzAr['username'])?$gzAr['username']:'';
		$mcopsdbPassord =isset($gzAr['password'])?$gzAr['password']:'';
         $data['gzPassword']=  $Encryptdecrypt->decrypt($mcopsdbPassord);

		$data['page_title'] = 'Contact';		
		$this->load->view('userTable',$data);
	}



	public function data()
	{
			$Encryptdecrypt = new Encryptdecrypt();
				$this->db2->select();
		$this->db2->where('user_type','superadmin');
		$absAr=$this->db2->get('users')->row_array();

			$getdata['absusername']=isset($absAr['username'])?$absAr['username']:'';
		$dbPassord =isset($absAr['password'])?$absAr['password']:'';
         $getdata['absPassword']=  $Encryptdecrypt->decrypt($dbPassord);


		$userdata=array();
		$data[0]= "https://finance.mcops.in/index.php/api/getuser/superadmin";
		$data[1]="https://yogicsoftware.com/index.php/api_old/getuser/superadmin";
		$data[2]="https://futuretechsoftsystem.com/index.php/api_old/getuser/superadmin";
		$data[3]="http://fl.groupzonsoftware.com/index.php/api/getuser/superadmin";
		$dataName[0]='Mcops';
		$dataName[1]='Yogic Software';
		$dataName[2]='Future Tech Software';
		$dataName[3]='GroupZone Software';
		for ($i=0; $i <sizeof($data) ; $i++) { 

			$url_name=$data[$i];
			 $ch_session = curl_init();

			curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);

			  curl_setopt($ch_session, CURLOPT_URL, $url_name);

			  $result_url = curl_exec($ch_session);
			  $result=json_decode($result_url);
			  // echo $result->username;
			  // print_r($result); die();

			  $userdata[$i]['name']=$dataName[$i];
			  $userdata[$i]['username']=$result->username;
			  $userdata[$i]['password']=$Encryptdecrypt->decrypt($result->password);


			
		}
		$getdata['userdata']=$userdata;


		$this->load->view('userTable',$getdata);

		

  
	}
}