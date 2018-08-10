<?php

 
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
function insertLogInfo($data)
{
 $this->db->insert('log_outgoing_sms',$data);
        return $this->db->insert_id();
  }
function get_info_sms($school_id)
{
	$this->db->select('*');
	$this->db->from('configuration_sms');
	$this->db->where('school_id',$school_id);

	return $this->db->get()->row();
}
function fetch_template_data($school_id,$module)
{

$this->db->select('context');
    $this->db->from('template_sms');
    $this->db->where(array('school_id'=>$school_id,'module'=>$module));

    return $this->db->get()->row();


}










 }
 ?>