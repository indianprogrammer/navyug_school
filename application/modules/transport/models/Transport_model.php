<?php


class Transport_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }






function select_driver($table_name,$condition,$content_display)

{
 $this->db->select($content_display);
    $this->db->from($this->$table_name);  
    $this->db->where($condition);
    $this->db->join('vehicle', 'vehicle.id='.$this->$table_name.'.vehicle_no');
   
    
    $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
    return $data;

}


















}
?>