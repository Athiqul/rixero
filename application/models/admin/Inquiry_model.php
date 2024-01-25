<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inquiry_model extends CI_Model 
{

    function __construct() {
        // Call the Model constructor
        parent::__construct(); 
    }


      public function get_inquiry_list()
      {
          $result = array();
          $sql ="SELECT * FROM tbl_front_contact_inquiry  ORDER BY inquiry_id DESC";
          $result = $this->db->query($sql)->result_array();
          return $result;
      }

}