<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        // var_dump($username,$password);die;
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('authentication');
        // var_dump($query);
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
           $authentication_id= $row->autorization_id;
           // echo $authentication_id;
            // var_dump($row);die;
            $data = array(
                    'userid' => $row->id,
                    // 'fname' => $row->fname,
                    'authentication_id' => $row->autorization_id,
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            // var_dump($data);die;
            return $data;
            // return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
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
}
?>