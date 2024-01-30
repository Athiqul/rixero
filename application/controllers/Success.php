<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Success extends CI_Controller{
     public function index()
     {
        //print_r($_POST);
        return redirect('/');
     }
}
?>