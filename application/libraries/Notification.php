<?php
/**
*	Common_script.php 
*	Version 1.0
*	Last updated on: 2018-02-04
*	Author:	Atul Yadav
*	Email: webdev.atul007@gmail.com	
*	@copyright : Atul Yadav	
*/
class Notification {
	private $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();

	}


	/*
	*Function: CreateSendMail
	*/
	public function sendMail($toMail='',$mailBody='',$mailTitle='')
    { 
            
            /*
               $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'tls://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => DEFAULT_SMTP_USER_EMAIL_ID, // change it to yours
            'smtp_pass' => DEFAULT_SMTP_USER_PASSWORD, // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );
            */
       
            $toMail = (isset($toMail))?$toMail:'';
            $mailBody = (isset($mailBody))?$mailBody:'';
            $mailTitle = (isset($mailTitle))?$mailTitle:'';
            // SMTP MAIL CONFIGURATOIN
     
      
             $config = Array(
            'protocol' => 'ssmtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => DEFAULT_SMTP_USER_EMAIL_ID, // change it to yours
            'smtp_pass' => DEFAULT_SMTP_USER_PASSWORD, // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );
            
            $this->CI->load->library('email', $config);
            $this->CI->email->set_newline("\r\n");
            $this->CI->email->from(DEFAULT_SMTP_USER_EMAIL_ID);
            $this->CI->email->to($toMail);
            $this->CI->email->subject($mailTitle);
            $this->CI->email->message($mailBody);
            // $this->CI->email->send(); //trigger mail to send
            if ($this->CI->email->send()) 
            {
                //echo 'Your email has been sent!';
            }
            else 
            {
                show_error($this->CI->email->print_debugger()); 
                
            }
            // echo $this->email->print_debugger();exit;
            return $config;

       
        
    }

    public function sendSms($phone,$rand)
    {
         $rand = rand(1111,9999);
                        
      $username = "support@plinkcare.in"; // your login username
          $hash = "167fecf67d3268379fc823968dc4f61823b193f963279f7159e135f5616a2823";  // your hash code in your text local account.

          $test = "0";
         
      $message = rawurlencode("Welcome to plinkcare.in;%nYour OTP (one time password) is ".$rand);
      
      // this msg will be approve first from text local account.
      
    //  Welcome to plinkcare.in;%nYour OTP (one time password) is X

          $sender =  urlencode("PLINKC"); // This is who the message appears to be from.
          $numbers = $phone; // A single number or a comma-seperated list of numbers
       
          $message = urlencode($message);
          $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
          $ch = curl_init('http://api.textlocal.in/send/?');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($ch); // This is the result from the API
          curl_close($ch);
          echo $last_id;  

    }
        
   

} ##EOF
?>