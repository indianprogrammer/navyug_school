<?php


class Profile_model extends CI_Model
{
 

function get_user_info($username,$authenticationId)
{
	$this->db->select('*');
	$this->db->from('authentication');
	$this->db->where('username',$username);
	$this->db->where('autorization_id',$authenticationId);
	switch($authenticationId)
	{
	case 2:	
	$this->db->join('employees','employees.id=authentication.user_id');
	break;
	case 3:	
	$this->db->join('parents','parents.id=authentication.user_id');
	break;
	case 4:	
	$this->db->join('student','student.id=authentication.user_id');
	break;
	}
	return $this->db->get()->row();


}

  function change_password($changepw,$id)
    {
      $this->db->where('auth_id',$id);
      return $this->db->update('authentication',$changepw);
    }
    function check_user_name($username)
    {
    	$this->db->select('auth_id,username');
    	$this->db->from('authentication');
    	$this->db->where('username',$username);
    	return $this->db->get()->row();

    }
    function change_user_name($data,$id)
    {
    	$this->db->where('auth_id',$id);
      return $this->db->update('authentication',$data);
    }


















}
?>