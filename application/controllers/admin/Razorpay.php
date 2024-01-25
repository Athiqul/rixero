<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Razorpay extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();   
        //$this->load->model('Site', 'site');    
        $this->load->model('admin/User_model','user_model');
     
    }
    // index page
    public function index() {
        $data['title'] = 'Razorpay ';  
        $data['productInfo'] =$productInfo= $this->site();  
       //echo "<pre>"; print_r($productInfo); die();         
        $this->load->view('razorpay/index', $data);
    }
    
    // checkout page
    public function checkout($amount1=0) {
            $user_id=$this->session->userdata('user_id'); 
            if($amount1>0)
            {
                $amount=$amount1;
            }else
            {
                 $amount=isset($_POST['amount'])?$_POST['amount']:0;
            }
        $data['title'] = 'Checkout payment ';  
        $data['amount']=(int)$amount;
       
        $data['itemInfo'] =$itemInfo= $this->site(); 
        $data['user_details'] = $user_details = $this->user_model->getUserDetails($user_id);
      // echo "<pre>";print_r($user_details); die();
        $data['return_url'] = site_url().'admin/razorpay/callback';
        $data['surl'] = site_url().'admin/razorpay/success';;
        $data['furl'] = site_url().'admin/razorpay/failed';;
        $data['currency_code'] = 'INR';
        $this->load->view('razorpay/checkout', $data);
    }

    public function site()
    {
        $arr=array();
        $arr[0]['name']='name';
        $arr[0]['inv_first_name']='name';
        $arr[0]['ship_last_name']='name';
        $arr[0]['description']='description';
        $arr[0]['price']='200';
        $arr[0]['product_id']='2';
        $arr[0]['inv_phone']='8796587458';
        $arr[0]['order_no']='HGFTJUH87965';
        $arr[0]['image']='8796587458';
        $arr[0]['inv_email']='inv_email@gmail.com';
        return $arr;
    }

    // initialized cURL Request
    private function get_curl_handle($payment_id, $amount)  {
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id = RAZOR_KEY_ID;
        $key_secret = RAZOR_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        //curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__).'/ca-bundle.crt');
        return $ch;
    }   
        
    // callback method
    public function callback() {     
    $data=array();   
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $user_id=$this->session->userdata('user_id');
            if($user_id>0)
            {
                $data['txt_customer_id']=$user_id;
            }else
            {
                $data['txt_customer_id']=$this->input->post('customer_id');
            }
            $data['payment_id']=$razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $data['txt_order_no']=$merchant_order_id = $this->input->post('merchant_order_id');
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $data['txt_amount']=($amount/100);
             //$this->db->insert('transaction_tbl',$data); 
           // print_r($data); die(); 
            $success = false;
            $error = '';
            try {                
                $ch = $this->get_curl_handle($razorpay_payment_id, $amount);
              //  echo $ch; 
                //execute post
                $result = curl_exec($ch);
               // echo $result; die();
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                   // echo $error; die();
                } else {
                    $response_array = json_decode($result, true);
                  // echo "<pre>";print_r($response_array);exit;
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'OPENCART_ERROR:Request to Razorpay Failed';
            }
           // echo 'result'.$result; 
           // echo '<br>http'.$http_status; 
           // echo '<br>error'.$error; die();
  //echo "<pre>";print_r($response_array);exit;
            //echo $success;
            $resAr=$this->getSettingDetails();
             $perrupessCoin=$resAr['coin_value'];

                $totalAmount=$perrupessCoin*$data['txt_amount'];
                $data['coins']=$totalAmount;

            if($success == false) 
            {
                $data['txt_status']='failed';
            }
            if($success == true) 
            {
                $data['txt_status']='success';
                
                $remainingCoin=$this->getRemainingAmount();
               

                $dataAr=array();
                $dataAr['amount']=($remainingCoin+$totalAmount);
                $this->db->where('user_id',$user_id)->update('tbl_wallet',$dataAr);


            }
             
            $this->db->insert('tbl_transaction',$data);
            // print_r($data); 
            // echo $success; die;

            if ($success === true) {

                //$data['status']=$success;
                //$this->db->insert('transaction_tbl',$data);
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                 }
                 redirect(ADMIN_TRANSACTION_HISTORY_URL.'/'.$merchant_order_id);
                // if (!$order_info['order_status_id']) {
                //     //redirect($this->input->post('merchant_surl_id').'/'.$razorpay_payment_id);
                //     redirect(FRONT_CUSTOMER_ORDER_SUCCESS_URL.'/'.$merchant_order_id);
                // } else {
                //     //redirect($this->input->post('merchant_surl_id').'/'.$razorpay_payment_id);
                //     redirect(FRONT_CUSTOMER_ORDER_SUCCESS_URL.'/'.$merchant_order_id);
                // }

            } else if($success==false) {
               // $data['status']=$success;
               // $this->db->insert('transaction_tbl',$data);
                //redirect($this->input->post('merchant_furl_id').'/'.$razorpay_payment_id);
                redirect(FRONT_FAILED_TRANSACTION_URL.'/'.$merchant_order_id);
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
    public function success() {
        redirect(site_url('admin/Transaction/history'));
    }  
    public function failed() {
        redirect(site_url('admin/Transaction/history'));

    } 
    public function getSettingDetails()
    {
        $this->db->select();
        return $this->db->get('tbl_setting')->row_array();
    }
    public function getRemainingAmount()
    {
            $user_id=$this->session->userdata('user_id');

        $this->db->select('amount');
        $this->db->where('user_id',$user_id);
        $resAr= $this->db->get('tbl_wallet')->row_array();
        if($resAr!='' && !empty($resAr))
        {
            $amount=isset($resAr['amount'])?$resAr['amount']:0;
        }else
        {
            $data['user_id']=$user_id;
            $data['amount']=$amount=0;
            $this->db->insert('tbl_wallet',$data);

        }
        return $amount;
    }
}
?>
