<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Custom{


    public function __contruct($params =array())
    {
      
        $this->CI->config->item('base_url');
        $this->CI->load->helper('url');
        $this->CI->load->database();
        $this->CI->library('session');
        $this->CI->library('email');
        $this->CI =& get_instance();
        $this->CI =& get_instance();
       // $this->CI->load->database();
    } 


    function sendEmailSmtp($subject,$body,$email)
    {
        $CI =& get_instance();
        $from = "support@lensebazaar.com";
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $from;
        $config['smtp_pass']    = 'myStackQu#5';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not     
        $CI->email->initialize($config);
        $CI->email->from($from,'Ujwal Associates');
        $CI->email->to($from);
        $CI->email->subject($subject);
        $CI->email->message($body);
        
        $CI->email->send();
    //    echo $CI->email->print_debugger();
   }
}
?>