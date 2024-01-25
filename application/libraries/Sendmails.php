<?php



/**

 * Site Mails.

 *

 * @package

 * @subpackage lib

 * @author     

 * @version    SVN: $Id: siteMails.class.php $

 */

class sendmails {



    protected $smtphost;

    protected $smtpport;

    protected $smtpuser;

    protected $smtppassword;

    protected $contentType;

    protected $charSet;

    protected $senderEmail;

    protected $senderLabel;

    protected $supportMail;

    protected $fromLabel;

    protected $replyTo;

    protected $address;

    protected $subject;

    protected $body;

    protected $siteName;

    

    protected $siteUrl;

    protected $attachments;



    public function __construct() {



        $this->smtphost = 'ssl://smtp.gmail.com';

        $this->smtpuser = 'it.absolutesoftsystem@gmail.com';

        $this->smtppassword = 'AsoftSystem@1234';



        $this->mailer = 'sendmail';

        $this->charSet = 'iso-8859-1';

        $this->contentType = 'html';

        $this->senderEmail = '';

        $this->senderLabel = '';

        $this->fromLabel = '';

        $this->replyTo = config_item('site_mail_reply');

        $this->replyToName = '';

        $this->address = '';

        $this->profile_image = '';

        $this->subject = '';

        $this->body = '';

        $this->bcc = '';

        $this->attachments = '';



        $this->senderLabel  = config_item('mail_from_name');

        $this->senderEmail  = config_item('site_mail_from');

        $this->siteName     = config_item('site_name');

        $this->siteUrl      = config_item('base_url');





        $this->supportMail = config_item('site_mail_support');





        //$templatePath = config_item('site_url') . 'application/libraries/maillayout.html';

        $this->body = '';//$file = file_get_contents($templatePath);

        //echo $this->body;

    }



     static public function getSiteEmails($emailKey) {

        $arrEmailDetail =array();



           $sql = "SELECT * from sitemails where emailkey='".$emailKey."' ";

            $CI =& get_instance();

            $query  = $CI->db->query($sql);

	     $arrResult =  $query->result_array();

            if($arrResult)

            {

                $arrEmailDetail = $arrResult[0];

            }



            //echo "<pre>"; print_r($arrEmailDetail); exit;



            return $arrEmailDetail;

    }





   public function sendSfMail() {



         $CI =& get_instance();



         /*$config = Array(

            'protocol' => 'smtp',

            'smtp_host' => $this->smtphost,

            'smtp_port' => 465, //25

            'smtp_user' => $this->smtpuser,

            'smtp_pass' => $this->smtppassword,

            'mailtype' => $this->contentType,

            'charset' => $this->charSet

        );*/



        $config = Array(

                'protocol' => 'smtp',

                'smtp_host' => 'ssl://smtp.gmail.com',

                'smtp_port' => 465,

                'smtp_user' => 'it.absolutesoftsystem@gmail.com',

                'smtp_pass' => 'AsoftSystem@1234',

                'mailtype' => 'html',

                'charset' => 'iso-8859-1'

             );





        $CI->load->library('email', $config);

        $CI->email->set_newline("\r\n");

        //$CI->email->from($this->senderEmail,$this->senderLabel);

        $CI->email->from($this->senderEmail);

        $CI->email->to($this->address);



        // REPLACE VARIABLES

        $this->body = str_replace('##SITE_NAME##', $this->siteName, $this->body);

        $this->body = str_replace('##SITE_URL##', $this->siteUrl, $this->body);

       

        $this->body = str_replace('##PROFILE_IMAGE##', $this->profile_image, $this->body);

        $this->body = str_replace('##EMAIL##', $this->address, $this->body);



       $this->body = str_replace('##SUPPORT_EMAIL##', $this->supportMail, $this->body);



echo $this->body;die;





        $CI->email->subject($this->subject);

        $CI->email->message($this->body);



        if ($this->attachments) {



			if(is_array($this->attachments))

			{

				foreach($this->attachments as $filePath)

				{

                                  if(file_exists($filePath))

                                  {

                                     $CI->email->attach($filePath);

                                  }

				}

			}

        }





        $mailstatus = 2;



        if ($CI->email->send()) {

           $CI->email->clear(TRUE);

            $mailstatus = 1;

        }



        /*echo "<pre>"; print_r($this->body);

        echo "-EXIT- Sendmails.php/ Line 157"; exit;*/



        return $mailstatus;

       

    }



    public function sendRegistrationEmail($arrParams = array()) {

        

        //print_r($arrParams);

        //print_r($arrParams);die;

        $objSiteEmails = self::getSiteEmails("REGISTRATION_MAIL");



        $this->address  = $arrParams["email"];

        $this->subject  = $objSiteEmails['subject'];

        $mailcontent    = $objSiteEmails['body'];



        $this->subject = str_replace('##SITE_NAME##', $this->siteName, $this->subject);



        $mailcontent = str_replace('##EMAIL##', $arrParams["email"], $mailcontent);

        $mailcontent = str_replace('##FIRST_NAME##', $arrParams["fname"].' '.$arrParams["lname"], $mailcontent);

        $mailcontent = str_replace('##SITE_NAME##', $this->siteName, $mailcontent);



        $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);





       return $this->sendSfMail();

    }





    public function sendForgotPassword($arrParams = array()) {

        

        $objSiteEmails = self::getSiteEmails("FORGOT_PASSWORD");



        $this->address = $arrParams["email"];

        $this->subject  = $objSiteEmails['subject'];

        $mailcontent    = $objSiteEmails['body'];



        $mailcontent = str_replace('##FIRST_NAME##', $arrParams["fname"].' '.$arrParams["lname"], $mailcontent);

        $mailcontent = str_replace('##LOGIN_ID##', $arrParams["email"], $mailcontent);

        $mailcontent = str_replace('##CHANGE_PASSWORD_URL##', '', $mailcontent);



        $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);



        $this->sendSfMail();

    }





    public function sendOrderemail($arrParams = array()) {



        /*echo "<pre>";

        print_r($arrParams); exit;*/



        $objSiteEmails = self::getSiteEmails("USER_ORDER_EMAIL");



        $this->address = $arrParams["email"];

        $this->subject  = $objSiteEmails['subject'];

      //  $mailcontent    = $objSiteEmails['body'];

        $mailcontent = $arrParams["mailcontent"];





    //    $this->subject = str_replace('##SITE_NAME##', $this->siteName, $this->subject);



    //    $mailcontent = str_replace('##FIRST_NAME##', $arrParams["first_name"], $mailcontent);

    //    $mailcontent = str_replace('##NEW_PASSWORD##', $arrParams["newPassword"], $mailcontent);

    //    $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);



        $this->sendSfMail();

    }





    public function sendAdminemail($arrParams = array()) {



        $objSiteEmails = self::getSiteEmails("ADMIN_EMAIL_FOR_REQUEST");



        $this->address = $arrParams["email"];

        $this->subject  = $objSiteEmails['subject'];

        $mailcontent    = $objSiteEmails['body'];

        





        $this->subject = str_replace('##SITE_NAME##', $this->siteName, $this->subject);



        $mailcontent = str_replace('##FIRST_NAME##', $arrParams["first_name"], $mailcontent);

        $mailcontent = str_replace('##NEW_PASSWORD##', $arrParams["newPassword"], $mailcontent);

        $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);



        $this->sendSfMail();

    }





}

