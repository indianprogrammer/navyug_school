<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Classes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get class by id
     */
    function get_class($id)
    {
        return $this->db->get_where('class',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all class
     */
    function get_all_class()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('classes')->result_array();
    }
        
    /*
     * function to add new class
     */
    function add_class($params)
    {
        $this->db->insert('classes',$params);
        return $this->db->insert_id();
    }
     
    function add_mapping($ids)
    {
        $this->db->insert('map_school_class',$ids);
        return $this->db->insert_id();
    }
    /*
     * function to update class
     */
    function update_class($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('classes',$params);
    }
    
    /*
     * function to delete class
     */
    function delete_class($id)
    {
        return $this->db->delete('classes',array('id'=>$id));
    }
    function fetch_subject()
    {
         $this->db->order_by('id', 'desc');
        return $this->db->get('subjects')->result_array();
    }
}
