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
         $this->db->select('employees.name,employees.email,employees.mobile,employees.permanent_address,employees.temporary_address,employees.profile_image,employees.id,employees.qualification,employees.created_at');
        $this->db->from('employees');
        $this->db->where('id',$id);
        return $this->db->get()->row_array();
    }
    
    
    /*
     * Get all employees
     */
    function get_all_employees($schoolId)
    {
        $this->db->select('employees.name,employees.email,employees.mobile,employees.permanent_address,employees.temporary_address,employees.profile_image,employees.id,employees.qualification,employees.created_at');
        $this->db->order_by('id', 'desc');
       
        $this->db->from('map_school_employee');
         $this->db->where('school_id',$schoolId);
        $this->db->join('school', 'map_school_employee.school_id=school.id', 'Left');
        $this->db->join('employees', 'map_school_employee.employee_id=employees.id', 'Left');
        return $this->db->get()->result_array();
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

      function get_map_employee()
    
    {
      $this->db->from('employee_type');
        return $this->db->get()->result();
    }
     function add_user($authentication)
     {
         $this->db->insert('authentication',$authentication);
        return $this->db->insert_id();
     }
     function delete_EmployeeSchoolMap($id,$school_id)
     {

        $this->db->delete('map_school_employee',array('employee_id'=>$id,'school_id'=>$school_id));
    }
    ##calling by admin module show in dashboard
     function get_all_employees_count($school_id)
    {
      $this->db->where('school_id',$school_id);
      $query=$this->db->get('map_school_employee')->num_rows();
      return $query;
    }   

}
?>