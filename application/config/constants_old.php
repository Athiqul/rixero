<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/**--------------CUSTOM CONSTANTS STARTS---------------**/
$root  = "https://".$_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('BASEURL',$root);
define('ASSETSPATH',BASEURL."assets/");
define('UPLOADPATH',BASEURL."uploads/");
define('UPLOADPATH_ADMIN',BASEURL."uploads/admin/");
define('FRONTEND_UPLOAD',BASEURL."uploads/epaper/");
define('FRONTEND_UPLOADPATH',BASEURL."uploads/frontend/");
define('ADMIN_ASSETS',ASSETSPATH."admin/");
define('ADMIN_LOGIN_ASSETS',ASSETSPATH."login/");
define('FRONTEND_ASSETS',ASSETSPATH."frontend/");

define('DEFAULT_CONTROLLER',"admin/login"); //home page
//DATE TIME
date_default_timezone_set('Asia/Kolkata'); //SET TIMEZONE
$date_time_ymd = date('Y-m-d H:i:s'); 
$date_ymd = date('Y-m-d');
define('CURRENT_DATE_TIME_YMD',$date_time_ymd); 
define('CURRENT_DATE_YMD',$date_ymd); 


define('SITENAME',"");
define('SITE_FULL_NAME',"Admin Panel");


// AUTHOUR
define('SITE_AUTHOR',"Absolute SoftSystem Pvt. Ltd."); 
//EMAIL RELATED
 define('DEFAULT_SMTP_USER_EMAIL_ID',"zquickit@gmail.com"); 
 define('DEFAULT_SMTP_USER_PASSWORD',"ZquickIt@123"); 
// define('DEFAULT_INQUIRY_MAIL',"Info@mrdigimax.com"); //to

define('DEFAULT_INQUIRY_MAIL',"sraju6148@gmail.com"); //to

// define('SITEURL',BASEURL."index.php/");
define('SITEURL',BASEURL);



// MANAGE IMAGE PATH
define('PROFILE_UPLOAD_PATH_NAME',FCPATH."uploads/admin/profile/"); //upload path
define('PROFILE_DISPLAY_PATH_NAME',BASEURL."uploads/admin/profile/");


// MANAGE banner PATH
define('ADMIN_BANNER_UPLOAD_PATH_NAME',FCPATH."uploads/admin/banner"); //upload path
define('ADMIN_BANNER_DISPLAY_PATH_NAME',BASEURL."uploads/admin/banner");




// MANAGE policy PATH
define('ADMIN_TASK_DOCUMENT_UPLOAD_PATH_NAME',FCPATH."uploads/admin/task"); //upload path
define('ADMIN_TASK_DOCUMENT_DISPLAY_PATH_NAME',BASEURL."uploads/admin/task");

define('BLANK_IMAGE',BASEURL."assets/admin/assets/images/blank_user.png");

/******FRONTEND START*******/

define('FRONT_HOME_URL',SITEURL."home"); //admin home page



/******FRONTEND END*******/


/******ADMIN START*******/

define('LOGIN_URL',SITEURL."admin/login/checkuserlogin"); 
//define('LOGOUT_URL',SITEURL."admin/login/logout"); 


define('ADMIN_DASHBOARD_URL',SITEURL."admin/dashboard"); 
define('LOGOUT_URL',SITEURL."admin/login/logout");
define('ADMIN_PROFILE_DETAILS_URL',SITEURL."admin/user/profile_details");
define('ADMIN_PROFILE_DETAILS_SUBMIT_URL',SITEURL."admin/user/save_profile_details");
define('ADMIN_CONTACT_INQUIRY_LIST',SITEURL."admin/inquiry/contact_inquiry");



define('ADMIN_CHANGE_PASSWORD_DETAILS_URL',SITEURL."admin/user/change_password");
define('ADMIN_CHANGE_PASSWORD_DETAILS_SUBMIT_URL',SITEURL."admin/user/saveProfileCngPassword");
define('ADMIN_LOGIN_URL',SITEURL."admin/login");
define('ADMIN_FORGET_PASSWORD_DETAILS_URL',SITEURL."admin/login/forgot_password");
define('ADMIN_FORGET_PASSWORD_DETAILS_SUBMIT_URL',SITEURL."admin/login/saveForgotPassword");
define('ADMIN_OTP_VERIFICATION_DETAILS_URL',SITEURL."admin/login/otp_verification");
define('ADMIN_OTP_VERIFICATION_DETAILS_SUBMIT_URL',SITEURL."admin/login/saveOtpVerification");
define('ADMIN_OTP_CONFIRM_PASSWORD_DETAILS_URL',SITEURL."admin/login/confirm_password");
define('ADMIN_CONFIRM_PASSWORD_DETAILS_SUBMIT_URL',SITEURL."admin/login/saveConfirmPassword");
// define('ADMIN_INQUIRY_LIST',SITEURL."admin/inquiry/inquiry_list");\

// MANAGE CUSTOMER
define('ADMIN_CUSTOMER_LIST_URL',SITEURL."admin/customer/"); 
define('ADMIN_CUSTOMER_SUBMIT_URL',SITEURL."admin/customer/submitcustomer"); 
define('ADMIN_CUSTOMER_UPDATE_STATUS_URL',SITEURL."admin/customer/updateStatus"); 
define('ADMIN_CUSTOMER_DELETE_URL',SITEURL."admin/customer/deleteUser"); 
define('ADMIN_CUSTOMER_ADD_URL',SITEURL."admin/customer/add_customer"); 
define('ADMIN_CITY_DDL_URL',SITEURL."admin/customer/createCitynameDDL"); 

//MANAGE DESIGNER
define('ADMIN_DESIGNER_LIST_URL',SITEURL."admin/Designer/"); 
define('ADMIN_DESIGNER_ADD_URL',SITEURL."admin/Designer/designerAdd"); 

define('ADMIN_DESIGNER_SUBMIT_URL',SITEURL."admin/Designer/submitcustomer"); 
define('ADMIN_DESIGNER_UPDATE_STATUS_URL',SITEURL."admin/Designer/updateStatus"); 
define('ADMIN_DESIGNER_DELETE_URL',SITEURL."admin/Designer/deleteUser"); 



define('ADMIN_TASK_LIST_URL',SITEURL."admin/Task/"); 
define('ADMIN_TASK_UPDATE_STATUS_URL',SITEURL."admin/Task/updateStatus"); 
define('ADMIN_TASK_ACCEPTED_LIST_URL',SITEURL."admin/Task/accepted_list"); 
define('ADMIN_TASK_ADD_URL',SITEURL."admin/Task/addTask"); 
define('ADMIN_TASK_SAVEDATA_URL',SITEURL."admin/Task/saveTaskdata"); 
define('ADMIN_TASK_ACCEPT_PENDING_URL',SITEURL."admin/Task/acceptTaskBYDesigner"); 
define('ADMIN_TASK_UPDATE_WORK_URL',SITEURL."admin/Task/updatework"); 
define('ADMIN_TASK_UPDATE_WORK_SUBMIT_URL',SITEURL."admin/Task/updateworkprogress"); 
define('ADMIN_TASK_ACTIVITY_URL',SITEURL."admin/Task/viewActivity"); 
define('ADMIN_TASK_REASSIGN_URL',SITEURL."admin/Task/reassignTask"); 
define('ADMIN_TASK_REASSIGN_SUBMIT_URL',SITEURL."admin/Task/saveReassign"); 
define('ADMIN_TASK_DETAILS_URL',SITEURL."admin/Task/details"); 



define('ADMIN_BANNER_LIST_URL',SITEURL."admin/Banner/"); 
define('ADMIN_BANNER_SAVEDATA_URL',SITEURL."admin/Banner/savebanner"); 
define('ADMIN_BANNER_UPDATE_STATUS_URL',SITEURL."admin/Banner/updateStatus"); 
define('ADMIN_BANNER_DELETE_URL',SITEURL."admin/Banner/deleteBanner"); 

define('ADMIN_BANNER_ADD_URL',SITEURL."admin/Banner/add_banner"); 





//INquiry List
define('ADMIN_INQUIRY_LIST_URL',SITEURL."admin/inquiry/get_inquiry_list");
define('ADMIN_SETTING_URL',SITEURL."admin/Setting/profile_details");
define('ADMIN_SETTING_SAVE_URL',SITEURL."admin/Setting/save_setting_details");


define('ADMIN_TRANSACTION_HISTORY_URL',SITEURL."admin/Transaction/history");
/**--------------CUSTOM CONSTANTS END---------------**/





