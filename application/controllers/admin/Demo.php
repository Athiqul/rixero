<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller 
{
	function __construct()
	{
		parent:: __construct();
		// if($this->session->userdata('isLoggedIn')==FALSE)
		// {
		// 	$this->session->set_flashdata('failed','Your session has expired.Please Login.');
		// 	redirect(site_url('admin/login'));
		// }
	}


	public function mail_test()
	{

		$email="manoj880545@gmail.com";
		$subject="test";
		$body="hello";
		$this->load->library('PHPMailer');
                        
                        $mail = new PHPMailer;
                        $mail->isSMTP();
                         $mail->SMTPKeepAlive = true;   
                         $mail->Mailer = 'smtp';
                        //$mail->SMTPDebug = 2;
                        $mail->Host = 'mail.easeonepay.in';
                        $mail->Port = 467;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'testing@easeonepay.in';
                        $mail->Password = 'Th4%164zx';
                        // $mail->Username = 'support@absolutesoftsystem.in';
                        // $mail->Password = 'Support@Absolute';
                        $mail->IsHTML();
                        $mail->wordwrap = true;
                        
                        $mail->setFrom('testing@easeonepay.in', 'Rixero');
                        $mail->addReplyTo('testing@easeonepay.in', 'Rixero');
                        // $mail->addReplyTo('support@absolutesoftsystem.in',$mail->Username);
                        $mail->addAddress($email, '');
                        $mail->Subject = $subject;
                        
                        $mail->Body    = $body;
                        $mail->AltBody = ' ';
                          if (!$mail->send()) 
                        {
                          echo "failed";
                        }
                        else
                        {
                          echo "send";
                        }
	}

	public function List()
	{		
		$data = array();
		$data['page_title'] = 'List';
		$this->load->view('admin/demo/List',$data);
	}

	public function jqgrid_list()
	{		
		$data = array();
		$data['page_title'] = 'table JqGrid List';
		$this->load->view('admin/demo/jqgrid_list',$data);
	}

	public function data_edit_table_list()
	{		
		$data = array();
		$data['page_title'] = 'Data Table List';
		$this->load->view('admin/demo/data_edit_table_list',$data);
	}

	public function details()
	{		
		$data = array();
		$data['page_title'] = 'Details';
		$this->load->view('admin/demo/details',$data);
	}

}#EOF
