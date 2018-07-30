<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Parents_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
   
    function get_parent($id)
    {
        return $this->db->get_where('parents',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all parents count
     */
    function get_all_parents_count()
    {
        $this->db->from('parents');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all parents
     */
    function get_all_parents($schoolId)
    {
         $this->db->select('parents.*');
        $this->db->order_by('id', 'desc');
       
        $this->db->from('map_school_parent');
         $this->db->where('school_id',$schoolId);
        $this->db->join('school', 'map_school_parent.school_id=school.id', 'Left');
        $this->db->join('parents', 'map_school_parent.parent_id=parents.id', 'Left');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new parent
     */
    function add_parent($params)
    {
        $this->db->insert('parents',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update parent
     */
    function update_parent($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('parents',$params);
    }
    
    /*
     * function to delete parent
     */
    function delete_parent($id)
    {
        return $this->db->delete('parents',array('id'=>$id));
    }
    function fetch_type()
    {
         $query = $this->db->get("parent_type");
      return $query->result();
    }
    function add_mapping($ids)
    {
        $this->db->insert('map_school_parent',$ids);
        return $this->db->insert_id();
    }
    function add_user($authentication)
     {
         $this->db->insert('authentication',$authentication);
        return $this->db->insert_id();
     }
}
