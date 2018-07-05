<?php

 
class School_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get school by id
     */
    function get_school($id)
    {
        return $this->db->get_where('school',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all school
     */
    function get_all_school()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('school')->result_array();
    }
        
    /*
     * function to add new school
     */
    function add_school($params)
    {
        $this->db->insert('school',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update school
     */
    function update_school($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('school',$params);
    }
    
    /*
     * function to delete school
     */
    function delete_school($id)
    {
        return $this->db->delete('school',array('id'=>$id));
    }

    function fetch_country()
       {
        
        $query = $this->db->get("master_country");
        return $query->result();
       }

   function fetch_state($country_id)
     {
      $this->db->where('country_id', $country_id);
      // $this->db->order_by('name', 'ASC');
      $query = $this->db->get('master_state');
      // return $query->result();
      $output = '<option value="">Select State</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
      }
      return $output;
     }

     function fetch_city($state_id)
     {
      $this->db->where('state_id', $state_id);
      $this->db->order_by('name', 'ASC');
      $query = $this->db->get('master_cities');
      $output = '<option value="">Select City</option>';
      foreach($query->result() as $row)
      {
       $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
      }
      return $output;
     }









}
?>