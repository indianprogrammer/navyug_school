<?php

 
class Employee_model extends MY_Model
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
         $this->db->delete('employees',array('id'=>$id));
         $this->db->where(array('user_id'=>$id,'autorization_id'=>2));
         return $this->db->delete('authentication');
    }
     function add_mapping($ids)
    {
        $this->db->insert('map_school_employee',$ids);
        return $this->db->insert_id();
    }

      function get_map_employee()
    
    {
      $this->db->from('employee_type');
        return $this->db->get()->result_array();
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
    function employeeSearch($table_name,$condition=null,$content_display,$search)
        {
          $this->db->select($content_display);



          $this->db->from($this->$table_name);  

          $this->db->where($condition);
          $this->db->join('employees','employees.id=map_school_employee.employee_id','left');
          $this->db->group_start();
          $this->db->where("name like '%$search%' ");
          $this->db->or_where("mobile like '$search%' ");
                   

          $this->db->group_end();

          $data=$this->db->get()->result_array();
           // $sql = $this->db->last_query();
          return $data;

        }
        function employee_subject_allocation($table_name,$condition=null,$content_display)
        {

             $this->db->select($content_display);
             $this->db->from($this->$table_name);  
             $this->db->where($condition);
          $this->db->join('course',''.$this->$table_name.'.course_id=course.id');
          $this->db->join('batch',''.$this->$table_name.'.batch_id=batch.id');
          $this->db->join('subjects',''.$this->$table_name.'.subject_id=subjects.id');
         

          $data=$this->db->get()->result_array();
           // $sql = $this->db->last_query();
          return $data;

        }
         function get_full_employee_details($table_name,$condition=null,$content_display)
        {

             $this->db->select($content_display);
             $this->db->from($this->$table_name);  

          $this->db->where($condition);
          $this->db->join('employees',''.$this->$table_name.'.employee_id=employees.id');
          $this->db->join('authentication',''.$this->$table_name.'.employee_id=authentication.user_id or autorization_id=2');
          // $this->db->join('batch',''.$this->$table_name.'.batch_id=batch.id');
          // $this->db->join('subjects',''.$this->$table_name.'.subject_id=subjects.id');
         

          $data=$this->db->get()->row_array();
           // $sql = $this->db->last_query();
          return $data;

        }

}
?>