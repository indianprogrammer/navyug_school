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
    function get_all_parents($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('parents')->result_array();
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
      return $query->result_array();
    }
}
