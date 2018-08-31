<?php


class Account_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    function fetch_classes($school_id)
    {

        $this->db->select('classes.name,classes.id');
        $this->db->from('map_school_class');
        $this->db->join('school', 'map_school_class.school_id=school.id', 'Left');
        $this->db->join('classes', 'map_school_class.class_id=classes.id', 'Left');
        $this->db->where('school_id',$school_id);
        return $query = $this->db->get()->result();
    } 
   
    function fetch_students($classes_id)
    {

        $this->db->select('student.name,student.id as student_id');
        $this->db->from('map_student_class');
        $this->db->join('student', 'map_student_class.student_id=student.id', 'Left');
        $this->db->join('classes', 'map_student_class.class_id=classes.id', 'Left');
        $this->db->where('class_id',$classes_id);
        return $query = $this->db->get()->result();
    }
    function fetch_records($username)
    {
        $this->db->select('*');
        $this->db->like('username');
        $this->db->from('authentication');
        // $this->db->join('student', 'map_student_class.student_id=student.id', 'Left');
        // $this->db->join('classes', 'map_student_class.class_id=classes.id', 'Left');
        $this->db->where('id',1);
        return $query = $this->db->get()->result();
    }
    function add_invoice($invoiceprocess)
    {
        $this->db->insert('invoices',$invoiceprocess);
        return $this->db->insert_id();
    }
    function  add_transaction($accountTransaction)
    {
       $this->db->insert('account_transaction',$accountTransaction);
       return $this->db->insert_id();
   }
   function get_all_invoice($id,$student_id)
   {
       $this->db->select('invoices.*,student.name');
       $this->db->from('invoices');
       $this->db->order_by('invoices.id', 'DESC');
       $this->db->where('invoices.school_id', $id);
       if($student_id){
       $this->db->where('invoices.student_id', $student_id);
        }
       // $this->db->join('account_transaction', 'account_transaction.reference_id=invoices.id', 'Left');
       $this->db->join('student', 'student.id=invoices.student_id', 'Left');
       
        // $this->db->where('class_id',$classes_id);
       return $query = $this->db->get()->result_array();
   }
   function get_invoice($invoice_id)
   {
       $this->db->select('student.*,invoices.invoice_id as inv,invoices.school_name,master_invoice.name as particular,master_invoice.price,school.address');
       $this->db->from('invoices');
       $this->db->join('account_transaction', 'account_transaction.reference_id=invoices.id', 'Left');
       $this->db->join('master_invoice','master_invoice.invoice_id_mul=invoices.invoice_id', 'Left');
       $this->db->join('student', 'invoices.student_id=student.id', 'Left');
       $this->db->join('school', 'invoices.school_id=school.id', 'Left');
       $this->db->where('invoices.invoice_id',$invoice_id);
       return $query = $this->db->get()->row();
   }
   function get_invoiceRow($invoice_id)
   {
       $this->db->select('master_invoice.name as particular,master_invoice.price');
       $this->db->from('master_invoice');
       $this->db->where('invoice_id_mul',$invoice_id);
       return $query = $this->db->get()->result_array();


   }
   function get_max_invoiceno($school_id)
   {
    $this->db->select_max('invoice_id');
    $this->db->from('invoices');
    $this->db->where('school_id',$school_id);       
     $id = $this->db->get()->row();
    if($id=="")
  {
   $id=1;
  }
  else
  {
     $id= $id->invoice_id+1;
  }
  return $id;
  }


function insertMultiple($entries)
{
  $this->db->insert_batch('master_invoice',$entries);

}



function get_school_information($school_id)
{
   $this->db->select('school.*');
   $this->db->from('invoices');
   $this->db->join('school', 'school.id=invoices.school_id', 'Left');

   $this->db->where('school_id',$school_id);
   return $query = $this->db->get()->row();
}

function add_transaction_reciept($accountTransaction)
{
   $this->db->insert('account_transaction',$accountTransaction);
   return $this->db->insert_id();
}
function add_reciept($reciept)
{ 

    $this->db->insert('reciepts',$reciept);
    return $this->db->insert_id();
}
function get_all_reciept($id,$student_id)
{
   $this->db->select('reciepts.*,account_transaction.credit,student.name');
   $this->db->from('reciepts');
   $this->db->order_by('reciept_id','desc');
$this->db->where('reciepts.school_id',$id);
if($student_id)
{
    
$this->db->where('reciepts.student_id',$student_id);
}
   $this->db->join('account_transaction', 'account_transaction.reference_id=reciepts.id', 'Left');
   $this->db->join('student', 'student.id=reciepts.student_id', 'Left');

        // $this->db->where('class_id',$classes_id);
   return $query = $this->db->get()->result_array();
}   
function get_reciept($reciept_id)
{
   $this->db->select('reciepts.*,student.*');
   $this->db->from('reciepts');
   $this->db->join('account_transaction', 'account_transaction.reference_id=reciepts.id', 'Left');
$this->db->join('student', 'reciepts.student_id=student.id', 'Left');
   $this->db->where('reciepts.reciept_id',$reciept_id);

   return $query = $this->db->get()->row();
}

function fetchRecordStudents($keyword)
{

   $this->db->select('student.*');
   $this->db->from('authentication');
   $this->db->where('username',$keyword);  
        // $this->db->join('map_school_student', 'map_school_student.student_id=student.id');
        // $this->db->join('student', 'invoice.student_id=student.id', 'Left');
   $this->db->join('student', 'authentication.user_id=student.id', 'Left');
        // $this->db->where('school_id',$school_id);
   return  $query = $this->db->get()->row();

}
function get_information_invoice($invoiceId)
{
$this->db->select('invoices.*');
   $this->db->from('invoices');
   $this->db->where('invoice_id',$invoiceId);  
        // $this->db->join('master_invoice', 'master_invoice.invoice_id_mul=invoices.invoice_id');
        // $this->db->join('student', 'invoice.student_id=student.id', 'Left');
   // $this->db->join('student', 'authentication.user_id=student.id', 'Left');
        // $this->db->where('school_id',$school_id);
   return  $query = $this->db->get()->row();
}
function get_information_student($studentId)
{
    $this->db->select('student.*');
   $this->db->from('invoices');
   $this->db->where('student_id',$studentId);  
         $this->db->join('student', 'student.id=invoices.student_id');
       
   return  $query = $this->db->get()->row();
}
function get_total_amount_invoice($invoice_id)

{
 $this->db->select('price');
 $this->db->from('master_invoice');
 $this->db->where('invoice_id_mul',$invoice_id);
 $query = $this->db->get()->result();
 




}
function get_information_invoice_payment($invoiceId)
{
$this->db->select('master_invoice.*');
   $this->db->from('invoices');
   $this->db->where('invoice_id',$invoiceId);  
         $this->db->join('master_invoice', 'master_invoice.invoice_id_mul=invoices.invoice_id');
       
   return  $query = $this->db->get()->result_array();
}
function get_student_school($student_id)
{
    $this->db->select('organization_name');
   $this->db->from('student');
   $this->db->where('id',$student_id);  
         $this->db->join('school', 'school.=invoices.invoice_id');
       
   return  $query = $this->db->get()->result_array();
}


function searchBalInformatiion($studentId)
{
     $this->db->select_sum('debit');
   $this->db->from('account_transaction');
  
   $this->db->where('account_transaction.student_id',$studentId);  
    $this->db->join('invoices', 'account_transaction.reference_id=invoices.id');
   
       
   return  $query = $this->db->get()->row();
   }

function gettingTransactionInfo($keyword)
{

     $this->db->select_sum('account_transaction.credit');
     $this->db->from('account_transaction');
   // $parameter="student_id=$studentId and school_id=1";
   $this->db->where('account_transaction.student_id',$keyword);  
    $this->db->join('reciepts', 'account_transaction.reference_id=reciepts.id');
    return  $query = $this->db->get()->row();


}
##for get credit information
function searchCreditBalInformation($studentId)
{
     $this->db->select('reciepts.id as recieptId');
   $this->db->from('reciepts');
   // $parameter="student_id=$studentId and school_id=1";
   $this->db->where('student_id',$studentId);  
    // $this->db->join('student', 'student.id=invoices.student_id');
    // $this->db->join('student', 'student.id=invoices.student_id');

       
   return  $query = $this->db->get()->result_array();
   
}

function gettingTransactionInfoCredit($keyword)
{
    
     $this->db->select('account_transaction.credit');
     $this->db->from('account_transaction');
   // $parameter="student_id=$studentId and school_id=1";
   $this->db->where('reference_id',$keyword);  
    $this->db->join('reciepts', 'account_transaction.reference_id=reciepts.id');
    return  $query = $this->db->get()->row();


}
function getSchoolName($id)
{
     $this->db->select('school.organization_name');
     $this->db->from('school');
      $this->db->where('id',$id);  
       return  $query = $this->db->get()->row();
}

function get_information_reciept_payment($id)
{
    $this->db->select('reciepts.*');
     $this->db->from('reciepts');
      $this->db->where('reciept_id',$id);  
       return  $query = $this->db->get()->row();
}

function get_max(){




 $this->db->select_max('invoice_id');
    $this->db->from('intt');
    // $this->db->where('school_id',1);       

    $query = $this->db->get()->row();
    if(is_null($query))
    {
    return $query=1;
  }
  else{
   return $query+1;

}
}
function generate_reciept_num()
{

  $this->db->select_max('reciept_id');
  $this->db->from('reciepts');
  $id= $this->db->get()->row();
   // var_dump($id);die;
  // echo $id->reciept_id;
  if(isset($id))
  {
    return $id->reciept_id+1;
  }
  else
  {
    return 1;
  }
}
function get_ledger($id)
{
  $this->db->select('*');
  $this->db->from('account_transaction');
 // $this->db->join('invoices','invoices.id=account_transaction.reference_id');
   $this->db->where('student_id',$id);
 
  // $this->db->join('reciepts','reciepts.id=account_transaction.reference_id');
    // $this->db->where('student_id',18);
   return  $this->db->get()->result_array();

}
 function GetRow($query) {        
        // $this->db->order_by('id', 'DESC');

     $this->db->select('student.name,student.mobile,authentication.username,student.id as student_id');

    

     $this->db->from('student');
     $this->db->join('authentication','student.id=authentication.user_id');
      $this->db->where("name like '%$query%'");
      // $this->db->where("student_name like '%$query%'");
  $this->db->or_where("mobile like '%$query%'");
  $this->db->or_where("username like '%$query%'");
    // $query=$this->db->query("select * from student where email like '%$keyword'");
  return $this->db->get()->result_array();

    
    }
function get_autofill_value($id)
{

  $this->db->select('student.name,student.mobile,authentication.username,student.id as student_id');
 $this->db->from('student');
     $this->db->join('authentication','student.id=authentication.user_id');
      $this->db->where("student.id",$id);
  
    // $query=$this->db->query("select * from student where email like '%$keyword'");
  return $this->db->get()->row();

}
}
?>