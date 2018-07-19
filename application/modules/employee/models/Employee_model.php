<?php

 
class Employee_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get employee by id
     */
    function get_employee($id)
    {
        return $this->db->get_where('employees',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all employees count
     */
    function get_all_employees_count()
    {
        $this->db->from('employees');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all employees
     */
    function get_all_employees($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('employees')->result_array();
    }

        
    /*
     * function to add new employee
     */
    function add_employee($params)
    {
        $this->db->insert('employees',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update employee
     */
    function update_employee($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('employees',$params);
    }
    
    /*
     * function to delete employee
     */
    function delete_employee($id)
    {
        return $this->db->delete('employees',array('id'=>$id));
    }
     function add_mapping($ids)
    {
        $this->db->insert('map_school_employee',$ids);
        return $this->db->insert_id();
    }
}
