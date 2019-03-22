<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Setting_model extends MY_Model{
    function __construct(){
        parent::__construct();
    }

    function getResult($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('authentication');
        return $query->row_array();
    }

    function getAutorization($autorizationId){
        $this->db->where('id', $autorizationId);
        $query = $this->db->get('master_authorization');
        return $query->row_array();
    }

    function getEmployDetails($authenticationId){
        $this->db->select('*');
        $this->db->where('id', $authenticationId);
        $this->db->from('employees');
        $this->db->join('map_school_employee', 'map_school_employee.employee_id=employees.id', 'Left');
        return $this->db->get()->row_array();
    }

    function getSchoolId()
    {
        $this->db->select('school.id,school.organization_name'); 
        $this->db->from('school');
        $this->db->join('map_school_admin', 'school.id=map_school_admin.schoolid', 'Left');
        // $query = $this->db->get();
        return $this->db->get()->row_array();
    }
    function insertLogs($data)
    {
        $this->db->insert('log_login',$data);
        return $this->db->insert_id();
    }
    function set_logout_time($log_id,$logout_time)
    {
        $this->db->where('id',$log_id);
        
        $this->db->set('logout_time',$logout_time);
        return $this->db->update('log_login');
    }
}

?>