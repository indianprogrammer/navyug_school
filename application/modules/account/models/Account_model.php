<?php


class Account_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }



  function add_invoice($invoiceprocess)
  {
    $this->db->insert('invoices',$invoiceprocess);
    return $this->db->insert_id();
  }
  function add_transaction($accountTransaction)
  {
    $this->db->insert('account_transaction',$accountTransaction);
    return $this->db->insert_id();
  }
  function get_all_invoice($id,$student_id = null)
  {
    $this->db->select('invoices.customer_name,invoices.customer_address,invoices.mobile,invoices.email,invoices.organization_name,invoices.organization_email,invoices.organization_mobile,invoices.organization_address,invoices.student_id,invoices.total_amount,invoices.invoice_id,invoices.school_id,invoices.date,student.name,invoices.status');
    $this->db->from('invoices');
    $this->db->order_by('invoices.id', 'DESC');
    $this->db->where('invoices.school_id', $id);
    if(!is_null($student_id))
      $this->db->where('invoices.student_id',$student_id);
    $this->db->join('student', 'student.id=invoices.student_id','Left');
    return $query = $this->db->get()->result_array();
  }
  function get_invoice($invoice_id)
  {
    $this->db->select('invoices.customer_name,invoices.customer_address,invoices.mobile,invoices.email,invoices.organization_name,invoices.organization_email,invoices.organization_mobile,invoices.organization_address,invoices.student_id,invoices.total_amount,invoices.invoice_id as inv,invoices.school_id,DATE(invoices.date) as date');
    $this->db->from('invoices');
    $this->db->where('invoices.invoice_id',$invoice_id);

    $this->db->join('master_invoice','master_invoice.invoice_id_mul=invoices.invoice_id', 'Left');

    return $query = $this->db->get()->row_array();
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


  function insertMultipleParticular($entries)
  {
    $this->db->insert_batch('master_invoice',$entries);

  }



  function get_school_information($school_id)
  {
    $this->db->select('school.organization_name,school.address,school.contact_pri,school.email,school.logo');
    $this->db->from('invoices');
    $this->db->join('school', 'school.id=invoices.school_id', 'Left');

    $this->db->where('school_id',$school_id);
    return $query = $this->db->get()->row_array();
  }

  function add_reciept($reciept)
  { 

    $this->db->insert('reciepts',$reciept);
    return $this->db->insert_id();
  }
  function get_all_reciept($id,$student_id = null)
  {
    $this->db->select('reciepts.id,reciepts.organization_name,reciepts.organization_address,reciepts.organization_mobile,reciepts.organization_email,reciepts.customer_name,reciepts.email,reciepts.mobile,reciepts.payment_method,reciepts.date,reciepts.total_amount,reciepts.reciept_id,account_transaction.credit,student.name,student.id as student_id,reciepts.payer_name');
    $this->db->from('reciepts');
    $this->db->order_by('reciept_id','desc');
    $this->db->where('reciepts.school_id',$id);
    if(!is_null($student_id))


      $this->db->where('reciepts.student_id',$student_id);

    $this->db->join('account_transaction', 'account_transaction.reference_id=reciepts.id', 'Left');
    $this->db->join('student', 'student.id=reciepts.student_id', 'Left');


    return $query = $this->db->get()->result_array();
  }   
  function get_reciept($reciept_id)
  {
    $this->db->select('reciepts.id,reciepts.organization_name,reciepts.organization_address,reciepts.organization_mobile,reciepts.organization_email,reciepts.customer_name,reciepts.email,reciepts.mobile,reciepts.payment_method,reciepts.date,reciepts.total_amount,reciepts.reciept_id');
    $this->db->from('reciepts');
// $this->db->join('account_transaction', 'account_transaction.reference_id=reciepts.id', 'Left');
// $this->db->join('student', 'reciepts.student_id=student.id', 'Left');
    $this->db->where('reciepts.reciept_id',$reciept_id);

    return $query = $this->db->get()->row_array();
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


  function sum_of_debit($studentId,$school_id)
  {
    $this->db->select_sum('debit');
    $this->db->from('account_transaction');

    $this->db->where('account_transaction.student_id',$studentId);  
    $this->db->where('account_transaction.school_id',$school_id);  
// $this->db->join('invoices', 'account_transaction.reference_id=invoices.id');


    return  $query = $this->db->get()->row_array();
  }

  function sum_of_credit($studentId,$school_id)
  {

    $this->db->select_sum('account_transaction.credit');
    $this->db->from('account_transaction');
// $parameter="student_id=$studentId and school_id=1";
    $this->db->where('account_transaction.school_id',$school_id);  
    $this->db->where('account_transaction.student_id',$studentId);  
// $this->db->join('reciepts', 'account_transaction.reference_id=reciepts.id');
    return  $query = $this->db->get()->row_array();


  }
##for get credit information
// function searchCreditBalInformation($studentId)
// {
//  $this->db->select('reciepts.id as recieptId');
//  $this->db->from('reciepts');

//  $this->db->where('student_id',$studentId);  



//  return  $query = $this->db->get()->result_array();

// }

// function gettingTransactionInfoCredit($keyword)
// {

//  $this->db->select('account_transaction.credit');
//  $this->db->from('account_transaction');
//    // $parameter="student_id=$studentId and school_id=1";
//  $this->db->where('reference_id',$keyword);  
//  $this->db->join('reciepts', 'account_transaction.reference_id=reciepts.id');
//  return  $query = $this->db->get()->row();


// }
  function getSchoolName($id)
  {
    $this->db->select('school.organization_name,school.address,school.contact_pri,school.email');
    $this->db->from('school');
    $this->db->where('id',$id);  
    return  $query = $this->db->get()->row_array();
  }




  function generate_reciept_num($school_id)
  {

    $this->db->select_max('reciept_id');
    $this->db->from('reciepts');
    $this->db->where('school_id',$school_id); 
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
    $this->db->select('debit,credit,date,invoice_id,reciept_id');
    $this->db->from('account_transaction');

    $this->db->where('student_id',$id);


    return  $this->db->get()->result_array();

  }
  function GetRow($query) {        

      $this->db->select('student.name,student.mobile,authentication.username,student.id as student_id');



      $this->db->from('student');
      $this->db->join('authentication','student.id=authentication.user_id');
      // $this->db->join('map','student.id=authentication.user_id');
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
    $this->db->where("authentication.autorization_id",4);
    $this->db->where("student.id",$id);

// $query=$this->db->query("select * from student where email like '%$keyword'");
    return $this->db->get()->row_array();

  }
  function update_balance($balance,$customer_id,$school_id)
  {
    $this->db->where('customer_id',$customer_id);
    $this->db->where('school_id',$school_id);
    $this->db->set('balance',$balance);
    return $this->db->update('account_balance_information');
  }
  function get_balance_info($id,$school_id=null)
  {
    $this->db->select('balance');
    $this->db->from('account_balance_information');
     $this->db->where('school_id',$school_id);
     $this->db->where('customer_id',$id);
    return  $this->db->get()->row_array();

  }

 function maintain_status_invoice($paid,$school_id,$student_id)
{
  $this->db->select('total_amount,amount_paid,status');

  $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
 
  $this->db->where('status!=','paid');
  $this->db->limit(1);   
  $record=$this->db->get('invoices')->row_array();
  // var_dump($record);
  if(is_null($record))
  {
    return false;
  }
  else if($record['status']=='partially')
  {
   $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
   $this->db->where('status','partially');
   $this->db->limit(1);  
  echo  $addition=$record['amount_paid']+$paid;
         if($addition==$record['total_amount'])
         {
          $this->db->set('status',"paid");
          $this->db->set('amount_paid',$record['total_amount']);
         return $this->db->update('invoices');
        }
        else if($addition>$record['total_amount'])
        {
          $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
          // $this->db->where('status=!','paid');
          $this->db->limit(1);  
          $this->db->set('status',"paid");
          $reamaining=$addition-$record['total_amount'];
          $this->db->set('amount_paid',$record['total_amount']);
          $this->db->update('invoices');
          
          
          $this->maintain_status_invoice($reamaining,$school_id,$student_id);
        
        }
        else
        {
          $this->db->set('amount_paid', $addition);
           return $this->db->update('invoices');

        }
        
 
  
}


elseif($record['total_amount']==$paid)
{

  $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
  $this->db->where('status=!','paid');
  $this->db->limit(1);  
  $this->db->set('status',"paid");
  $this->db->set('amount_paid',$paid);
  return $this->db->update('invoices');
}
else if($record['total_amount']>$paid)
{
  $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
  $this->db->where('status=!','paid');
  $this->db->limit(1);  
  $this->db->set('status',"partially");
  $this->db->set('amount_paid',$paid);
  return $this->db->update('invoices');

}
else if($record['total_amount']<$paid)
{
  $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
  $this->db->where('status=!','paid');
  $this->db->limit(1);  
  $this->db->set('status',"paid");
  $reamaining=$paid-$record['total_amount'];
  $this->db->set('amount_paid',$record['total_amount']);
  $this->db->update('invoices');
  
  
  $this->maintain_status_invoice($reamaining,$school_id,$student_id);
}



}
function checkPriviousBalance($school_id=null,$customer_id)
{
$this->db->select('balance');
    $this->db->from('account_balance_information');
     $this->db->where('school_id',$school_id);
     $this->db->where('customer_id',$customer_id);
     $data=$this->db->get()->row_array();
    if($data['balance']<0)
    {
      return  $data;
    }

}
function get_partial_invoice($school_id)
{
$this->db->select('invoices.customer_name,invoices.customer_address,invoices.mobile,invoices.email,invoices.organization_name,invoices.organization_email,invoices.organization_mobile,invoices.organization_address,invoices.student_id,invoices.total_amount,invoices.invoice_id,invoices.school_id,invoices.date,invoices.status');
    $this->db->from('invoices');
    $this->db->order_by('invoices.id', 'DESC');
    $this->db->where('invoices.school_id', $school_id);
        $this->db->where('status',"partially");
  
    return $query = $this->db->get()->result_array();

}
function get_pending_invoice($school_id)
{
$this->db->select('invoices.customer_name,invoices.customer_address,invoices.mobile,invoices.email,invoices.organization_name,invoices.organization_email,invoices.organization_mobile,invoices.organization_address,invoices.student_id,invoices.total_amount,invoices.invoice_id,invoices.school_id,invoices.date,invoices.status');
    $this->db->from('invoices');
    $this->db->order_by('invoices.id', 'DESC');
    $this->db->where('invoices.school_id', $school_id);
    $this->db->where('status',"pending");
  
    return $query = $this->db->get()->result_array();

}

function get_all_pending_invoice_count($school_id)
{
   $this->db->where('school_id',$school_id);
   $this->db->where('school_id',$school_id);
    $query =$this->db->get('map_school_student')->num_rows();
  return $query;
}

}
?>