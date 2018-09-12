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

   return $this->db->get()->row_array();
 }
 function fetch_template_data($school_id,$module)
 {

  $this->db->select('context');
  $this->db->from('template_sms');
  $this->db->where(array('school_id'=>$school_id,'module'=>$module));

  return $this->db->get()->row_array();


}
function fetch_template_sms($school_id,$module)
    {
       $this->db->select('template_sms.context,template_sms.module,template_sms.id,map_school_sms_template.school_id');

    

     $this->db->from('map_school_sms_template');
      $this->db->where('map_school_sms_template.school_id',$school_id);
     $this->db->join('template_sms','template_sms.id=map_school_sms_template.template_id');
       $this->db->where('template_sms.module',$module);
     return $query= $this->db->get()->row_array();
    
    }














}
?>