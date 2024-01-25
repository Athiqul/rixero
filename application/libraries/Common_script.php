<?php
/**
*	Common_script.php 
*	Version 1.0
*	Last updated on: 2018-02-04
*	Author:	Atul Yadav
*	Email: webdev.atul007@gmail.com	
*	@copyright : Atul Yadav	
*/
class Common_script {
	private $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();

	}


	/*
	*Function: CreateDropDownNumbers
	*Create Drop Down Options For Numbers
	*/
	function CreateDropDownNumbers($displayLabel='',$selectedValue='',$startFrom='1',$maxLimit='10'){
		$selectedValue = ((isset($selectedValue)))?intval($selectedValue):'';
		$startFrom = ((isset($startFrom)))?intval($startFrom):0;
		$maxLimit = ((isset($maxLimit)))?intval($maxLimit):0;
		$options = "<option value=''>".$displayLabel."</option>";
		if($startFrom>0 && $maxLimit>0){
			for($i=$startFrom;$i<=$maxLimit;$i++){	
				$append = '';
				if($i==$selectedValue){
					$append = 'selected="selected"';
				}
				$options .= "<option value='".$i."' ".$append.">".$i."</option>";
			}
		}
		return $options;
	}

    /*
    *Function: createDropDown
    *Create Drop Down From SQL Query
    */
    public function createDropDown($displayLabel='',$sqlQuery='',$displayDescrColumn='',$displayValueCoulmn='',$selectedValue='')
    {
        $selectedValue = ((isset($selectedValue)))?intval($selectedValue):'';
        $options = "<option value=''>".$displayLabel."</option>";
        if($sqlQuery!='')
        {           
            $result = $this->CI->db->query($sqlQuery)->result_array();          
            if(isset($result) && !empty($result))
            {
                foreach ($result as $key => $value) 
                {
                    $append='';
                    if($value[$displayValueCoulmn]==$selectedValue)
                    {
                        $append = 'selected="selected"';
                    }
                    $options .= "<option value='".$value[$displayValueCoulmn]."' ".$append.">".$value[$displayDescrColumn]."</option>";
                }
            }
        }           
        return $options;
    }

    public function save()
    {
        echo "hii";
    }

	/*
	*Function :  doFileUpload
	*Its a common function for uploading files
	*params : $uploadPath
	*@return type: array
	*/
	public function doFileUpload($uploadPath = 'assets/images')
    {
    	$responseArr = array('fileName'=>'','error'=>''); //This array will be return as response
		$config['upload_path']          = $uploadPath;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
       	/*
       	$config['max_size']             = 100;
        $config['max_width']            = 1400;
        $config['max_height']           = 730;
        */           
        $this->CI->load->library('upload', $config);
        if(!$this->CI->upload->do_upload('profile_img'))
        {
                $error = $this->CI->upload->display_errors();
               	$responseArr['error']  = $error;
        }
        else
        {
                $upload_data = $this->CI->upload->data();
                $responseArr['fileName'] = $upload_data['file_name'];
        }
        return $responseArr;           
    }

    /*
    *Function :  doMultipleFileUpload
    *Its a common function for muliple uploading files
    *params : $uploadPath
    *@return type: array
    */
    public function doMultipleFileUpload($uploadPath = 'assets/images')
    {
        $TEMP_FILES = (isset($_FILES))?$_FILES:array(); //Temporaory saved data to new array 
        $responseArr = array('fileName'=>'','error'=>''); //This array will be return as response
        $fileNamesArr = array();
        $errorArr = array();
        $count = count($_FILES['image']['size']);
        if($count>0)
        {
            for($i=0; $i<$count; $i++)
            {

                $originalFileName =$TEMP_FILES['image']['name'][$i];
                $_FILES['image']['name']= $TEMP_FILES['image']['name'][$i];
                $_FILES['image']['type']    =$TEMP_FILES['image']['type'][$i];
                $_FILES['image']['tmp_name'] =$TEMP_FILES['image']['tmp_name'][$i];
                $_FILES['image']['error']       =$TEMP_FILES['image']['error'][$i];
                $_FILES['image']['size']    =$TEMP_FILES['image']['size'][$i];   
                $config['upload_path']          = $uploadPath;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = TRUE;
                
                //$config['max_size']             = 100;
                //$config['max_width']            = 1400;
                //$config['max_height']           = 730;
                         
                $this->CI->load->library('upload', $config);
                if(!$this->CI->upload->do_upload('image'))
                {
                        $error = $this->CI->upload->display_errors();
                        $errorText = $originalFileName. ' error : '.$error;                     
                        $errorArr[]  = $errorText;
                }
                else
                {
                        $upload_data = $this->CI->upload->data();
                        $fileNamesArr[] = $upload_data['file_name'];
                }
                
            }
            $responseArr = array('fileName'=>$fileNamesArr,'error'=>$errorArr);
        }
        else
        {
            $responseArr = array('fileName'=>'','error'=>'Empty files request');
        }

        
        return $responseArr;           
    }

    /*
    *Function :  doPdfFileUpload
    *Its a common function for uploading pdf files
    *params : $uploadPath
    *@return type: array
    */
    public function doPdfFileUpload($uploadPath = '')
    {
        $responseArr = array('fileName'=>'','error'=>''); //This array will be return as response
        $config['upload_path']          = $uploadPath;
        $config['allowed_types']        = 'pdf';
        $config['encrypt_name'] = TRUE;
        /*
        $config['max_size']             = 100;
        $config['max_width']            = 1400;
        $config['max_height']           = 730;
        */           
        $this->CI->load->library('upload', $config);
        if(!$this->CI->upload->do_upload('image'))
        {
                $error = $this->CI->upload->display_errors();
                $responseArr['error']  = $error;
        }
        else
        {
                $upload_data = $this->CI->upload->data();
                $responseArr['fileName'] = $upload_data['file_name'];
        }
        return $responseArr;           
    }

	/*
	*Function :  insertRecord
	*Its a common function for insertRecord
	*params : $tableName,$data=array()
	*@return type: 0 || >0
	*/
    public function insertRecord($tableName='',$data=array())
    {
    	$insertedId = 0;
    	if($tableName!='' && !empty($data))
    	{
    		$data['created_by'] = $user_id = $this->CI->session->userdata('user_id');   		
    		$data['created_on'] = CURRENT_DATE_TIME_YMD;
    		$insertAction = $this->CI->db->insert($tableName,$data);
    		$insertedId = $this->CI->db->insert_id();
    	}
    	return $insertedId;
    }
    /*
	*Function :  updateRecord
	*Its a common function for updateRecord
	*params : $tableName,$data=array(),updateIdValue,updateIdColumn
	*@return type: >0
	*/
    public function updateRecord($tableName='',$data=array(),$updateIdValue=0,$updateIdColumn='')
    {    	
    	if($tableName!='' && !empty($data) && intval($updateIdValue)>0 && $updateIdColumn!='')
    	{
    		$where = array($updateIdColumn=>$updateIdValue);
    		$data['modified_by'] =$user_id = $this->CI->session->userdata('user_id');    		
    		$data['modified_on'] = CURRENT_DATE_TIME_YMD;
    		$updateAction = $this->CI->db->where($where)->update($tableName,$data);
    	}
    	return $updateIdValue;
    }
    /*
    *##Warning!!--It will delete permanently records.Records can not be restored--!!##
	*Function :  deleteRecord
	*Its a common function for deleteRecord
	*params : $tableName,deleteIdValue,deleteIdColumn
	*@return type: >0
	*/
    public function deleteRecord($tableName='',$deleteIdValue=0,$deleteIdColumn='')
    {    	
    	if($tableName!='' && intval($deleteIdValue)>0 && $deleteIdColumn!='')
    	{
    		$where = array($deleteIdColumn=>$deleteIdValue);    		
    		$deleteAction = $this->CI->db->where($where)->delete($tableName);
    	}
    	return $deleteIdValue;
    }

   /**
    *DELETE FILE 
    */

    public function deleteFile($filePath='')
    {
        if($filePath!='')
        {
            unlink($filePath);
        }
    }
    
    //REPLACE WHITEPACES AND TABS WITH HIPHEN (-)
    public function encodeUrl($str)
    {
        $newStr = (trim($str)!='')?preg_replace('/\s+/', '-', $str):'';
        return strtolower($newStr);
    }

    //REPLACE HIPHEN WITH SPACES
    public function decodeUrl($str)
    {
        $newStr = (trim($str)!='')?str_replace('-', ' ', trim($str)):'';
        return $newStr;
    }


} ##EOF
?>