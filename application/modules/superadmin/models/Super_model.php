<?php


class Super_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

    function getResult($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', ($password));
        $query = $this->db->get('super_admin_login');
        return $query->row_array();
    }	
    function get_school($id)
    {   
     $this->db->select('master_country.country_name,school.id as school_id, master_state.state_name,organization_name,master_cities.city_name,address,latlong,contact_pri,contact_sec,email,logo,banner,master_country.id,master_cities.id,master_state.id,school.country_id,master_state.id as state_id,school.city_id');
     $this->db->join('master_country', 'master_country.id = school.country_id');
     $this->db->join('master_state', 'master_state.id = school.state_id');
     $this->db->join('master_cities', 'master_cities.id = school.city_id');
          // $this->db->from('school');
     return $this->db->get_where('school',array('school.id'=>$id))->row_array();
   }

    /*
     * Get all school
     */
    function get_all_school()
    {
         // $this->db->order_by('id', 'desc');

     $this->db->select('master_country.country_name,school.id, master_state.state_name,school.organization_name,master_cities.city_name,address,latlong,contact_pri,contact_sec,email,logo,banner');
     $this->db->join('master_country', 'master_country.id = school.country_id');
     $this->db->join('master_state', 'master_state.id = school.state_id');
     $this->db->join('master_cities', 'master_cities.id = school.city_id');
     $this->db->from('school');
     return $this->db->get()->result_array();

        // return $this->db->get('school')->result_array();
   }

    /*
     * function to add new school
     */
    function add_school($params)
    {
      $this->db->insert('school',$params);
      return $this->db->insert_id();
    }
    
    /*
     * function to update school
     */
    function update_school($id,$params)
    {
      $this->db->where('id',$id);
      return $this->db->update('school',$params);
    }
    
    /*
     * function to delete school
     */
    function delete_school($id)
    {
      return $this->db->delete('school',array('id'=>$id));
    }

    function fetch_country()
    {

      $query = $this->db->get("master_country");
      return $query->result_array();
    }

    function fetch_state($country_id)
    {
      $this->db->where('country_id', $country_id);
      // $this->db->order_by('name', 'ASC');
      $query = $this->db->get('master_state');  
       return $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

       // return $query->result_array();

    }

    function fetch_city($state_id)
    {
      $this->db->where('state_id', $state_id);
      // $this->db->order_by('state_name', 'ASC');
      $query = $this->db->get('master_cities');
      return $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
       // return $query->result_array();
    }
    function fetchState($countryId)
    { 
      $this->db->select('master_state.*');
      $this->db->join('master_country', 'master_country.id = master_state.country_id');
      $this->db->where('country_id',$countryId);
      //$this->db->from('school');
      $query=$this->db->get('master_state');
      return $query->result_array();


    }

    function fetchCity($stateId)
    {
    // {   $this->db->select('*');
    //    $this->db->join('master_country', 'master_country.id = school.country_id');
    //  $this->db->join('master_state', 'master_state.id = school.state_id');
      $this->db->where('state_id',$stateId);
          //$this->db->from('school');
      $query=$this->db->get('master_cities');
      return $query->result_array();


    }

   
     function mapSubjects($school_id)
    {
        $this->db->select('school.*,map_school_subject.subject_id,subjects.name');
        $this->db->from('map_school_subject');
        $this->db->join('school', 'map_school_subject.school_id=school.id', 'Left');
        $this->db->join('subjects', 'map_school_subject.subject_id=subjects.id', 'Left');
         $this->db->where('school_id',$school_id);
        return $query = $this->db->get()->result();
    }
   function mapClasses($school_id)
    {
        $this->db->select('school.*,classes.name,classes.description');
        $this->db->from('map_school_class');
        $this->db->join('school', 'map_school_class.school_id=school.id','Left');
        $this->db->join('classes', 'map_school_class.class_id=classes.id', 'Left');
         $this->db->where('school_id',$school_id);
        return $query = $this->db->get()->result();
    }
    function mapStudents($school_id)
    {
        $this->db->select('school.*,student.*');
        $this->db->from('map_school_student');
        $this->db->join('school', 'map_school_student.school_id=school.id','Left');
        $this->db->join('student', 'map_school_student.student_id=student.id', 'Left');
         $this->db->where('school_id',$school_id);
        return $query = $this->db->get()->result();
    }
    function mapEmployees($school_id)
    {
        $this->db->select('school.*,employees.*');
        $this->db->from('map_school_employee');
        $this->db->join('school', 'map_school_employee.school_id=school.id','Left');
        $this->db->join('employees', 'map_school_employee.employee_id=employees.id', 'Left');
        $this->db->where('school_id',$school_id);
        return $query = $this->db->get()->result();
    }
    
  
      function get_all_school_name()
    {
         // $this->db->order_by('id', 'desc');

     $this->db->select('school.id, ,school.organization_name');
    
     $this->db->from('school');
     return $this->db->get()->result_array();

        // return $this->db->get('school')->result_array();
   }
function map_school_admin($params)
{
	 $this->db->insert('map_school_admin',$params);
      return $this->db->insert_id();
}
   
   function get_all_schools_count()
    {
       
    $query =$this->db->get('school')->num_rows();
      return $query;
    }
function getAdminId($school_id)
{
$this->db->select('employee_id');
$this->db->from('map_school_admin');
$this->db->where('school_id',$school_id);

// $this->db->join('authentication','authentication.user_id=map_school_admin');
 return $this->db->get()->row();
}
function getCredential($user_id)
{
  $this->db->select('authentication.username,authentication.clear_text,authentication.password');
$this->db->from('authentication');
$this->db->where(array('user_id'=>$user_id,'autorization_id'=>1));
 return $this->db->get()->result_array();
}
function map_school_employee($params)
{
  $this->db->insert('map_school_employee',$params);
      return $this->db->insert_id();
}
function fetch_institute_by_date()

{
$query =$this->db->select("date(created_at) as date,organization_name ");
$query =$this->db->from("school");
   return $query->get()->result_array();

}
function fetch_institute_by_month()

{
$query = $this->db->query("select MONTHNAME(created_at) as month,count(id) as count from school  group by MONTH(created_at),MONTHNAME(created_at) order by MONTH(created_at) asc");
   return $query->result_array();


}
function get_invoice_id()
{
  $this->db->select_max('invoice_id');
  $this->db->from('super_admin_invoice');
  $id=$this->db->get()->row();
  if($id->invoice_id=="")
  {
    $id=1;
  }
  else
  {
    $id=$id->invoice_id+1;
  }
  return $id;
}

function insert_invoice_info($params)
{
  $this->db->insert('super_admin_invoice',$params);
      return $this->db->insert_id();
}

function insert_account_info($params)
{
   $this->db->insert('super_admin_account_transaction',$params);
    return $this->db->insert_id();
}
function get_reciept_id()
{
  $this->db->select_max('reciept_id');
  $this->db->from('super_admin_reciept');
  $id=$this->db->get()->row();
  if($id->reciept_id=="")
  {
    $id='9yug'.'1';
  }
  else
  {
  $id= ++$id->reciept_id;
  }
  return $id;
}
function insert_reciept_info($params)
{
  $this->db->insert('super_admin_reciept',$params);
      return $this->db->insert_id();
}
function get_sales_details_date()
{
$query = $this->db->query("select MONTHNAME(date) as month,sum(debit) as debit,sum(credit) as credit,count(id) as count from super_admin_account_transaction  group by MONTH(date),MONTHNAME(date) order by MONTH(date) asc ");
   return $query->result_array();

}
function searchBalInformatiion($school_id)
{
     $this->db->select_sum('debit');
   $this->db->from('super_admin_account_transaction');
  
   $this->db->where('school_id',$school_id);  
   
   
       
   return  $query = $this->db->get()->row();
   }

function gettingTransactionInfo($school_id)
{

     $this->db->select_sum('credit');
     $this->db->from('super_admin_account_transaction');
   // $parameter="student_id=$studentId and school_id=1";
   $this->db->where('school_id',$school_id);  
   
    return  $query = $this->db->get()->row();


}
function getEmployDetails($authenticationId){
        $this->db->select('*');
        $this->db->where('id', $authenticationId);
        $this->db->from('employees');
        $this->db->join('map_school_employee', 'map_school_employee.employee_id=employees.id', 'Left');
        return $this->db->get()->row_array();
    }

function get_school_name($school_id)
{
  $this->db->select('organization_name');
  $this->db->from('school');
  $this->db->where('id',$school_id);
  return $this->db->get()->row();
}

function select_uname_password($id)
{
  $this->db->select('username,clear_text,email');
  $this->db->from('authentication');
  $this->db->where('id',$id);
  return $this->db->get()->row();

}
function get_ledger_details($school_id)
{
 $this->db->select('debit,credit,date');

  $this->db->from('super_admin_account_transaction');
  $this->db->where('school_id',1);
  return $this->db->get()->result_array();
}

function get_sales()
{

$this->db->select_sum('credit');

  $this->db->from('super_admin_account_transaction');
  
  return $this->db->get()->row();


}











  }

  ?>