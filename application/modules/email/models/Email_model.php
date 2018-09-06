<?php


class Email_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }


  function insertEmailLog($data)

  {
    $this->db->insert('log_outgoing_email',$data);
    return $this->db->insert_id();
  }
  function get_info_email($schoolId)
  {
   $this->db->select('*');
   $this->db->from('configuration_email');
   $this->db->where('school_id',$schoolId);

   return $this->db->get()->row_array();
 }
 function fetch_template_data($school_id,$module)
 {

  $this->db->select('context');
  $this->db->from('template_email');
  $this->db->where(array('school_id'=>$school_id,'module'=>$module));

  return $this->db->get()->row_array();


}












} 
?>