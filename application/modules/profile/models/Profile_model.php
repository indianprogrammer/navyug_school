  <?php


  class Profile_model extends MY_Model
  {


    function get_user_info($username,$authenticationId)
    {
     $this->db->select('*');
     $this->db->from('authentication');
     $this->db->where('username',$username);
     $this->db->where('autorization_id',$authenticationId);
     switch($authenticationId)
     {
//     case 1:
// $this->db->join('employees','employees.id=authentication.user_id');
// break;
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
 function check_password($pass)
 {
   $this->db->select('password,clear_text');
   $this->db->from('authentication');
   $this->db->where('clear_text',$pass);
   return $this->db->get()->result_array();
 }
 function update_profile($params,$user_id,$authorization_id)
 {
   $this->db->where('id',$user_id);
   switch($authorization_id)
   {
    case 1: 
    // return $this->db->update('employees',$params);
    // break;
    case 2:	
    return $this->db->update('employees',$params);
    break;
    case 3:	
    return $this->db->update('parents',$params);
    break;
    case 4:	
    return $this->db->update('student',$params);
    break;
  }

}
function get_admin_info($auth_id,$authenticationId)
{
  $this->db->select('*');
  $this->db->from('authentication');
  $this->db->where('auth_id',$auth_id);
  $this->db->where('autorization_id',$authenticationId);
  $this->db->join('employees','employees.id=authentication.user_id');
  return $this->db->get()->row();
}


















}
?>