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
     
      $this->db->select('enquiry.name,enquiry.username,enquiry.email,enquiry.mobile,enquiry.address,enquiry.comments,enquiry.location,enquiry.type,enquiry.school_id,enquiry.assign_to,enquiry.status,enquiry.created_at');
        $this->db->from('enquiry');
        $this->db->where('id',$id);
        return $this->db->get()->row_array();
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

      $this->db->select('enquiry.name,enquiry.username,enquiry.email,enquiry.mobile,enquiry.address,enquiry.comments,enquiry.location,enquiry.type,enquiry.school_id,enquiry.assign_to,enquiry.status,enquiry.created_at');
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
      $this->db->select('id,name');
      $this->db->from('master_enquiry');
      return $this->db->get()->result();

    }
    function assign_type()
    {
      $this->db->select('id,type');
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
     $this->db->where('id',$id);
     return $this->db->update('ticket_generate',array('status'=>'disable'));
   }
   function check_user_avilability($username)
   {
     $this->db->select('username,id');
     $this->db->from('enquiry');
        ##may be douthful for future perpose
     $this->db->where('username',$username);
     return $this->db->get()->row();

   }
   function assign_indivisual($params)
   {
    $this->db->insert('ticket_generate',$params);
    return $this->db->insert_id();
  }

  function GetRow($query,$school_id=null)
   {        
        // $this->db->order_by('id', 'DESC');

   $this->db->select('enquiry.name as customer_name,enquiry.id as enquiry_id,enquiry.mobile,enquiry.username,enquiry.comments');



   $this->db->from('enquiry');
     // $this->db->join('authentication','student.id=authentication.user_id');
   if(!is_null($school_id))

    $this->db->where("school_id",$school_id);
    
    $this->db->where("name like '%$query%'");
      // $this->db->where("student_name like '%$query%'");
    $this->db->or_where("mobile like '%$query%'");
    $this->db->or_where("username like '%$query%'");
    // $query=$this->db->query("select * from student where email like '%$keyword'");
    return $this->db->get()->result_array();

    
  }
  function get_autofill_value($id)
  {

    $this->db->select('enquiry.name as customer_name,enquiry.mobile,enquiry.username');
    $this->db->from('enquiry');
     // $this->db->join('authentication','student.id=authentication.user_id');
    $this->db->where("id",$id);

    // $query=$this->db->query("select * from student where email like '%$keyword'");
    return $this->db->get()->row();

  }
}
?>