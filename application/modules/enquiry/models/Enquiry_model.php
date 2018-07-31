<?php

 
class Enquiry_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get enquiry by id
     */
    function get_enquiry($id)
    {
        return $this->db->get_where('enquiry',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all enquirys count
     */
    function get_all_enquirys_count()
    {
        $this->db->from('enquiry');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all enquirys
     */
    function get_all_enquirys($id)
    {
        $this->db->order_by('id', 'desc');
      $this->db->where('school_id',$id);
        return $this->db->get('enquiry')->result_array();
        
    }
        
    /*
     * function to add new enquiry
     */
    function add_enquiry($params)
    {
        $this->db->insert('enquiry',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update enquiry
     */
    function update_enquiry($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('enquiry',$params);
    }
    
    /*
     * function to delete enquiry
     */
    function delete_enquiry($id)
    {
        return $this->db->delete('enquiry',array('id'=>$id));
    }
}
