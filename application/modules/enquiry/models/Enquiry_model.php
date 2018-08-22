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

        $this->db->select('*');
        $this->db->from('enquiry');
        $this->db->order_by('id','desc');
      $this->db->where('school_id',$id);
        return $this->db->get()->result_array();
        
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

    function add_enquiry_order()
    {
        $this->db->insert('super_admin_order',$params);
        return $this->db->insert_id();
    }
    function enquiry_type()
    {
        $this->db->select('*');
        $this->db->from('master_enquiry');
        return $this->db->get()->result();

    }
   function assign_type()
   {
    $this->db->select('*');
        $this->db->from('assign');
        return $this->db->get()->result();
   }
   function add_ticket($params)
   {
     $this->db->insert('ticket_generate',$params);
        return $this->db->insert_id();
   }
   function update_status($id)
   {
     $this->db->where('ticket_id',$id);
        return $this->db->update('ticket_generate',array('status'=>0));
   }
   function check_user_avilability($username)
   {
     $this->db->select('username,id');
        $this->db->from('enquiry');
        ##may be douthful for future perpose
        $this->db->where('username',$username);
        return $this->db->get()->row();

   }
}
?>