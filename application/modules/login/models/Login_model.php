<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    

    public function getResult($username,$password){
            // $query = $this->db->get_where('authentication', array('username'=>$username, 'password'=>$password));
          $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('authentication');
        // var_dump($query->row());
            return $query->row();
        }
function getSchoolId()
{
  $this->db->select('school.id');
$this->db->from('school');
$this->db->join('map_school_admin','school.id=map_school_admin.schoolid','Left');
// $this->db->join('','subjects.id=map_school_subject.subjectid','Left');
$query=$this->db->get();
}
}
?>