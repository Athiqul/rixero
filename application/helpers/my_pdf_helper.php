<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('create_pdf')) {

    function create_pdf($html_data, $file_name = "") {
        if ($file_name == "") {
            $file_name = 'report' . date('dMY');
        }
        require 'mpdf/mpdf.php';
        $mypdf = new mPDF('utf-8','A4',0,'ctimes');
        $mypdf->WriteHTML($html_data);
        $mypdf->Output("$file_name.pdf", 'D');
    }

    function create_mail_pdf($html_data, $file_name = "") {
        if ($file_name == "") {
            $file_name = 'report' . date('dMY');
        }		

        require_once('mpdf/mpdf.php');
        $mypdf = new mPDF('utf-8','A4',0,'ctimes');
        $mypdf->WriteHTML($html_data);
        $mypdf->Output("uploads/pdf/$file_name.pdf", 'F');
    }

}