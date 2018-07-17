<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* Author: Jorge Torres
 * Description: Login model class
 */

class Login_model extends CI_Model{
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
        $this->db->where('authentication_id', $authenticationId);
        $this->db->from('trainers');
        $this->db->join('map_school_trainer', 'map_school_trainer.trainer_id=trainers.id', 'Left');
        return $this->db->get()->row_array();
    }

    function getSchoolId()
    {
        $this->db->select('school.id');
        $this->db->from('school');
        $this->db->join('map_school_admin', 'school.id=map_school_admin.schoolid', 'Left');
        $query = $this->db->get();
    }
}

?>