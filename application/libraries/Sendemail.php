<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sendemail {
	function __construct()
	{
		// Call the Model constructor
		$this->Object = &get_instance();
		
	}


	public function sendEmail($emailArray)
	{
// 		print_r($emailArray);
// 		die;
         $CI =& get_instance();        
        //  $config = Array(
        //         //'protocol' => 'ssl',
        //         'smtp_host' => SMTP_EMAIL_HOST,
        //         'smtp_port' => SMTP_EMAIL_PORT,
        //         'smtp_user' => SMTP_EMAIL,
        //         'smtp_pass' => SMTP_EMAIL_PASSWORD,
        //         'mailtype' => 'html',
        //         'charset' => 'iso-8859-1',
        //      );
        
 $config = Array(
             //   'protocol' => 'ssl',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 25,
                'smtp_user' => 'it.absolutesoftsystem@gmail.com',
                'smtp_pass' => 'AsoftSystem@1234',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',                
             );
		

        $CI->load->library('email');
        $CI->email->initialize($config);
        $CI->email->set_newline("\r\n");

// 		$fromemail = CONTACT_EMAIL;
		$fromemail = "it.absolutesoftsystem@gmail.com";
		$address = isset($emailArray["To"]) ? $emailArray["To"] : FROM_EMAIL;
		$subject = isset($emailArray["Subject"]) ? $emailArray["Subject"] : '';
		$body = isset($emailArray["Body"]) ? $emailArray["Body"] : '';
		// echo $body;die;
        
        $CI->email->from($fromemail,SITE_NAME);
        $CI->email->to($address);

		$CI->email->subject($subject);
		$CI->email->message($body);

        if(isset($emailArray["cc"]))
           {
            $CI->email->cc($emailArray["cc"]);
           }

		   if(isset($emailArray["bcc"]))
           {
            $CI->email->bcc($emailArray["bcc"]);
           }

		
			 
		
        	//      $CI->email->message($emailArray["Body"]);

        	if (isset($emailArray["attachments"])) {

			if(is_array($emailArray["attachments"]))
			{
				foreach($emailArray["attachments"] as $filePath)
				{
                                  if(file_exists($filePath))
                                  {
                                     $CI->email->attach($filePath);
                                  }
				}
			}
        }
	
        // $mailstatus = 1;

      if ($CI->email->send()) 
     	  {
           	$CI->email->clear(TRUE);
            $mailstatus = 1;
        }
        else
        {
        	$mailstatus = '0';
        }

       
        return $mailstatus;                
    }


	public function getEmailTemplates($type)
	{	
		// $sql 		= "SELECT * FROM  email_templates WHERE template_name='".$type."'";
		$sql 		= "SELECT * FROM `sitemails` WHERE template = '$type'" ;
		$query 		= $this->Object->db->query($sql);
		$result   	= $query->result_array();
		return $result;
		// $this->db->select('*');
		// $this->db->from('sitemails');
		// $this->db->where('key',$type);
		// $query = $this->db->get();
		// return $result = $query->result();		
	}
	
	/* Registration Email */
	public function registerEmail($emailArray)
	{
		// print_r($emailArray);die;	

		$mailArray	= array();
		
		$data = $this->getEmailTemplates("WELCOME_MAIL");
		
		$mailArray["From"]		= REGISTER_FROM_EMAIL;
        $mailArray["To"]		= $emailArray["email"];
        $mailArray["Subject"]	= $data[0]->template_subject;
        $mailArray["Body"]		= $data[0]->template_content;
		
		$mailArray["Subject"]   = str_replace("##sitename##",SITE_NAME,$mailArray["Subject"]);
		
		$mailArray["Body"]      = str_replace("{sitename}",SITE_NAME,$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{Username}",ucfirst($emailArray["name"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{sitelink}",SITE_URL,$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{email}",$emailArray["email"],$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{password}",$emailArray["password"],$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{leftimage}",base_url().'assets/images/logo.png',$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{rightimage}",base_url().'assets/images/right.png',$mailArray["Body"]);				
		
		$this->sendEmail($mailArray);				
	}
	/* Registration Email Over */
 
	/* Thank you mail */
	
	public function thanksEmail($emailArray){
		
		$mailArray	= array();
		
		$data = $this->getEmailTemplates("THANKING_MAIL");
		
		$mailArray["From"]		= REGISTER_FROM_EMAIL;
                $mailArray["To"]		= $emailArray["email"];
                $mailArray["Subject"]	= $data[0]->template_subject;
                $mailArray["Body"]		= $data[0]->template_content;
		
		$mailArray["Subject"]   = str_replace("##sitename##",SITE_NAME,$mailArray["Subject"]);
		
		$mailArray["Body"]      = str_replace("{sitename}",SITE_NAME,$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{Username}",$emailArray["fullname"],$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{sitelink}",SITE_URL,$mailArray["Body"]);			
		$mailArray["Body"]      = str_replace("{leftimage}",base_url().'assets/images/logo.png',$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{rightimage}",base_url().'assets/images/right.png',$mailArray["Body"]);				
		
		$this->sendEmail($mailArray);				
	}
	
	/* Thank you mail over */
	
	/* Profile change Email */
	public function profileChangeEmail($emailArray){
		$mailArray	= array();
		
		$data = $this->getEmailTemplates("CHANGE_PROFILE");
		
		$mailArray["From"]		= REGISTER_FROM_EMAIL;
                $mailArray["To"]		= $emailArray["email"];
                $mailArray["Subject"]	= $data[0]->template_subject;
                $mailArray["Body"]		= $data[0]->template_content;
		
		$mailArray["Subject"]   = str_replace("##sitename##",SITE_NAME,$mailArray["Subject"]);
		
		$mailArray["Body"]      = str_replace("{sitename}",SITE_NAME,$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{Username}",$emailArray["fullname"],$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{sitelink}",SITE_URL,$mailArray["Body"]);			
		$mailArray["Body"]      = str_replace("{leftimage}",base_url().'assets/images/logo.png',$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{rightimage}",base_url().'assets/images/right.png',$mailArray["Body"]);				
		
		$this->sendEmail($mailArray);				
	}
	
	/* Profile change Email Over */
	
	/* Password Changed Email */
	public function passwordChangeEmail($emailArray){
		
		$mailArray	= array();
		
		$data = $this->getEmailTemplates("CHANGE_PASSWORD");
		
		$mailArray["From"]		= REGISTER_FROM_EMAIL;
                $mailArray["To"]		= $emailArray["email"];
                $mailArray["Subject"]	= $data[0]->template_subject;
                $mailArray["Body"]		= $data[0]->template_content;
		
		$mailArray["Subject"]   = str_replace("##sitename##",SITE_NAME,$mailArray["Subject"]);
		
		$mailArray["Body"]      = str_replace("{sitename}",SITE_NAME,$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{Username}",$emailArray["fullname"],$mailArray["Body"]);
		//$mailArray["Body"]      = str_replace("{password}",$emailArray["password"],$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("{sitelink}",SITE_URL,$mailArray["Body"]);			
		$mailArray["Body"]      = str_replace("{leftimage}",base_url().'assets/images/logo.png',$mailArray["Body"]);		
		$mailArray["Body"]      = str_replace("{rightimage}",base_url().'assets/images/right.png',$mailArray["Body"]);				
		
		$this->sendEmail($mailArray);				
	}	
	/* Password Changed Email Over */


    public function testemail(){

		$mailArray	= array();

			//	$mailArray["From"]		= REGISTER_FROM_EMAIL;
                $mailArray["To"]		= 'admin@ashlingteam.com';
                $mailArray["cc"]		= 'subedar.yadav@geniesoftsystem.com';
                $mailArray["Subject"]   = 'email from ashling for user';
                $mailArray["Body"]		= 'Hello <br>Welcome to shlingteam site nnnnnnnnnnn  bbbbbbb ';
		
		$this->sendEmail($mailArray);
	}


	public function sendJobFeedbackEmail($emailArray)
	{

		// print_r($emailArray);
		$mailArray = array();	
		$data = $this->getEmailTemplates("FEEDBACK_JOB_MAIL");	
		// print_r($emailArray['contact_person'])	;die;

		$mailArray["From"]		= REGISTER_FROM_EMAIL;
        $mailArray["To"]		= $emailArray["contact_email"];
        $mailArray["Subject"]	= $data[0]['subject'];
        $mailArray["Body"]		= $data[0]['body'];
		
		$mailArray["Subject"]   = str_replace("##sitename##",SITE_NAME,$mailArray["Subject"]);
		
		$mailArray["Body"]      = str_replace("##sitename##",SITE_NAME,$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##USER##",ucfirst($emailArray["contact_person"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##POSITION##",ucfirst($emailArray["position"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##COMPANY_NAME##",ucfirst($emailArray["company_name"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##CAND_NAME##",ucfirst($emailArray["candidate_name"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##CAND_EMAIL##",ucfirst($emailArray["candidate_email"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##CAND_MESSAGE##",ucfirst($emailArray["candidate_msg"]),$mailArray["Body"]);
		// print_r($mailArray['Body']);
		// die;
		

		return $res = $this->sendEmail($mailArray);				
		// print_r($data);
	}

	public function sendApplyJob($emailArray)
	{
		$mailArray = array();
		$data = $this->getEmailTemplates("APPLY_JOB");	


        $mailArray["To"]		= $emailArray["contact_email"];
        $mailArray["Subject"]	= $data[0]['subject'];
        $mailArray["Subject"]   = str_replace("##POSITION##",$emailArray['position'],$mailArray["Subject"]);
        $mailArray["Body"]		= $data[0]['body'];
        $mailArray["attachment"]= $emailArray['attachment'];

        $mailArray["Body"]      = str_replace("##USER##",ucfirst($emailArray["contact_person"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##POSITION##",ucfirst($emailArray["position"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##EMAIL_CONTENT##",ucfirst($emailArray["maintemplate"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##COVER_LETTER##",ucfirst($emailArray["cover_letter"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##sitename##",SITE_NAME,$mailArray["Body"]);

		// print_r($mailArray);
		// die;

		return $res = $this->sendEmail($mailArray);				

		// $this->body = str_replace('##ADMIN_EMAIL##', $this->fromEmail, $this->body);	
		
	}

	public function sendForgetPasswordEmail($emailArray)
	{
		$mailArray = array();
		$data = $this->getEmailTemplates("FORGOT_PASSWORD");	

		$mailArray["To"]		= $emailArray["email"];
        $mailArray["Subject"]	= $data[0]['subject'];
        $mailArray["Body"]		= $data[0]['body'];
        
		$mailArray["Body"]      = str_replace("##USER##",ucfirst($emailArray["username"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##LOGIN_ID##",ucfirst($emailArray["username"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##PASSWORD##",ucfirst($emailArray["password"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##sitename##",SITE_NAME,$mailArray["Body"]);

		// $this->body = str_replace('##ADMIN_EMAIL##', $this->fromEmail, $this->body);
		// $this->body	= nl2br($this->body);
		return $res = $this->sendEmail($mailArray);				
	}


	public function registerEmail1($emailArray)
	{
		$mailArray = array();
		$data = $this->getEmailTemplates("REGISTER_MAIL");	

		$mailArray["From"]		= REGISTER_FROM_EMAIL;
		$mailArray["To"]		= $emailArray["email"];
        $mailArray["Subject"]	= $data[0]['subject'];
        $mailArray["Body"]		= $data[0]['body'];
        
		$mailArray["Body"]      = str_replace("##Name##",ucfirst($emailArray["username"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##UserName##",ucfirst($emailArray["username"]),$mailArray["Body"]);
		// $mailArray["Body"]      = str_replace("##Password##",ucfirst($emailArray["password"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##Link##",ucfirst($emailArray["link"]),$mailArray["Body"]);
		$mailArray["Body"]      = str_replace("##sitename##",SITE_NAME,$mailArray["Body"]);

		// print_r($mailArray['Body']);die;	

		// $this->body = str_replace('##ADMIN_EMAIL##', $this->fromEmail, $this->body);
		// $this->body	= nl2br($this->body);
		return $res = $this->sendEmail($mailArray);				
	}


	public function sendBuildResumeMail($emaildata)
	{
		$mailArray = array();
		$data = $this->getEmailTemplates("BUILDRESUME_MAIL");			

        $mailArray["Subject"]	= $data[0]['subject'];
        $mailArray["Body"]		= $data[0]['body'];
        $mailArray["attachment"]= $emailArray["attachment"];

		$mailArray["Body"]      = str_replace("##CAND_NAME##",ucfirst($emailArray["candidate_name"]),$mailArray["Body"]);	
		$mailArray["Body"]      = str_replace("##MOBILE_NO##",ucfirst($emailArray["mobile_no"]),$mailArray["Body"]);	
		$mailArray["Body"]      = str_replace("##ADDRESS##",ucfirst($emailArray["address"]),$mailArray["Body"]);	
		$mailArray["Body"]      = str_replace("##PROFILE_TITLE##",ucfirst($emailArray["profile_title"]),$mailArray["Body"]);	
		$mailArray["Body"]      = str_replace("##sitename##",SITE_NAME,$mailArray["Body"]);
		
		// $this->body = str_replace('##ADMIN_EMAIL##', $this->fromEmail, $this->body);
		

		return $res = $this->sendEmail($mailArray);				

	}

}