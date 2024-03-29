<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
function get_user_details($id)
{
	$data = array();
	$obj = & get_instance();
	$obj->db->select('*');
	$obj->db->where('staffid',$id);
	$obj->db->from('staff');
	$query = $obj->db->get();
	$row = $query->num_rows();
	if ($row > 0) {
	  $data = $query->row();	
	}
	return $data;
 
}

	function get_user_list_by_role()
	{
		$data = array();
		$obj = & get_instance();
		$obj->db->select('*');
		$obj->db->where('role','Manager');
		$obj->db->from('staff');
		$query = $obj->db->get();
		$row = $query->num_rows();
		if ($row > 0) {
		  $data = $query->result();	
		}
		return $data;
	 
	}



function get_investment_detailById($id)
{
	$data = array();
	$obj = & get_instance();
	$obj->db->select('*');
	$obj->db->where('id',$id);
	$obj->db->from('tbl_investment');
	$query = $obj->db->get();
	$row = $query->num_rows();
	if ($row > 0) {
	  $data = $query->row();	
	}
	return $data;
  
}


function check_user_already_request($pro_id,$user_id)
{
	$data = array();
	$obj = & get_instance();
	$obj->db->select('*');
	$obj->db->where('user_id',$user_id);
	$obj->db->where('inv_id',$pro_id);
	$obj->db->from('tbl_master_investment');
	$query = $obj->db->get();
	$row = $query->num_rows();
	if($row > 0) {
	  $data = $query->row();	
	}
	return $data;
	
   
}



 function get_images_typeID($id,$type)
 {
	$data = array();
	$obj = & get_instance();
	$obj->db->select('*');
	$obj->db->where('type_id',$id);
	$obj->db->where('type',$type);
	$obj->db->from('tbl_images');
	$query = $obj->db->get();
	$row = $query->num_rows();
	if ($row > 0) {
	  $data = $query->result();	
	}
	return $data;
	
   
 }
 
 
	
	function currency_format($amount){
	if($amount!=""){
		if($amount>0)
			return "£".number_format($amount);
		else
			return "-£".number_format(abs($amount));
	}
	else
		return "";
}

   function sanitize_documentname($filename){
		return str_replace(array('"', "'", "&", "/", "\\", "?", "#", "%", ")", "(", "$", "*", "=", "+" ,"{", "}", "[", "]", "|", ";", ":", ",", "`", "~", "@", "<", ">"), "_", $filename);
	}
	
  function generateSeoURL($string, $wordLimit = 0){
    $separator = '-';
    
    if($wordLimit != 0){
        $wordArr = explode(' ', $string);
        $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
    }

    $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;'                    => '',
        '[^\w\d _-]'            => '',
        '\s+'                    => $separator,
        '('.$quoteSeparator.')+'=> $separator
    );

    $string = strip_tags($string);
    foreach ($trans as $key => $val){
        $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
    }

    $string = strtolower($string);

    return trim(trim($string, $separator));
}	
	

