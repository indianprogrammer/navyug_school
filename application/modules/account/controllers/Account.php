<?php


class Account extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Account_model');
    $this->load->model('student/Student_model');
    $this->load->helper('pdf_helper');
    date_default_timezone_set("Asia/Kolkata");

  } 

/*
* Listing of attendance
*/
function invoice_list()
{   
  $data['invoice_prefix']='';
  $data['title']="Invoice List";
  $schoolId=$this->session->SchoolId;
  if($this->input->get('student_id'))
  {
    $student_id=$this->input->get('student_id');
    $data['invoice'] = $this->Account_model->get_all_invoice($schoolId,$student_id);
  }
  else
  {    
    $data['invoice'] = $this->Account_model->get_all_invoice($schoolId);
  }
// var_dump($data['invoice']);
  $data['_view'] = 'invoiceList';
  $this->load->view('index',$data);
}

function partialPaidInvoiceList()
{
   $schoolId=$this->session->SchoolId;
  $data['invoice'] = $this->Account_model->get_partial_invoice($schoolId);
   $data['_view'] = 'invoiceList';
  $this->load->view('index',$data);

}
function pendingInvoiceList()
{
   $schoolId=$this->session->SchoolId;
  $data['invoice'] = $this->Account_model->get_pending_invoice($schoolId);
   $data['_view'] = 'invoiceList';
  $this->load->view('index',$data);

}


function add_invoice()
{
  $data['title']="Add Invoice";
  $data['_view'] = 'addInvoice';
  $this->load->view('index',$data);
}



##get pdf by invoice id
function getpdf($invoice_id)
{
  $getInvoiceDetails = $this->Account_model->get_invoice($invoice_id);

  $get_row_type['params']= $this->Account_model->get_invoiceRow($invoice_id);
//var_dump($get_row_type['params']);

  $rows = "";
  $no =1;
  $subtotal=0;

  foreach ($get_row_type['params'] as $row) {


    $name = $row["particular"];
    $price = $row["price"];
    $subtotal = $subtotal + $price;
// $percentage=;
##it comes through database 
    $tax=0;
// $tax=$subtotal*0.18;
    $total=$subtotal+$tax;
    if($name!=""){
      $rows = $rows."<tr><td>".$no."</td><td>".$name."</td><td>".$price."</td></tr>";
    }
    $no++;


  }
//echo $v;


  $params=array(

    'invoice_id'=>$getInvoiceDetails['inv'],
    'school_id'=>$this->session->SchoolId,
    'organization_name'=>$getInvoiceDetails['organization_name'],
    'organization_mobile'=>$getInvoiceDetails['organization_mobile'],
    'organization_email'=>$getInvoiceDetails['organization_email'],
    'student_id'=>$getInvoiceDetails['student_id'],
    'total_amount'=>$getInvoiceDetails['total_amount'],
    'organization_address'=>$getInvoiceDetails['organization_address'],

    'customer_name'=>$getInvoiceDetails['customer_name'],
    'customer_address'=>$getInvoiceDetails['customer_address'],
    'email'=>$getInvoiceDetails['email'],
    'mobile'=>$getInvoiceDetails['mobile'],
    'particularlist'=>$rows,
    'date'=>$getInvoiceDetails['date']



  );

  $this->load->view('templates/invoice_template/six',$params);
}



##for receipt start
function add_reciept()
{
  $data['title']="Add Reciept";
  $data['_view'] = 'addReciept';
  $this->load->view('index',$data);
}

function generate_reciept()
{

##getting information of student
  $studId=$this->input->post('username');
  $payment_method=$this->input->post('method'); 
// $studId="stu1_63";
// $payment_method="cash";
  $payer_name=$this->input->post('payer_name');
  $payer_mobile=$this->input->post('payer_mobile');
  $paid=$this->input->post('pay');
// $paid=200;

##get student details by student_id

  $studentData=$this->Student_model->fetchRecordStudents($studId);

##generate random reciept number
// $recieptId=rand(1,1000).rand(1,100);
  $school_id=$this->session->SchoolId;
  $schoolInfo= $this->Account_model->getSchoolName($school_id) ;
  $recieptId=$this->Account_model->generate_reciept_num($school_id);

  $reciept=array(
    'reciept_id'=>$recieptId,
    'student_id'=> $studentData['id'],
    'customer_name'=> $studentData['name'],
    'customer_address'=> $studentData['permanent_address'],
    'email'=> $studentData['email'],
    'mobile'=> $studentData['mobile'],
    'organization_name'=>$schoolInfo['organization_name'],
    'organization_email'=>$schoolInfo['email'],
    'organization_mobile'=>$schoolInfo['contact_pri'],
    'organization_address'=>$schoolInfo['address'],

    'total_amount'=>$paid,
    'payment_method'=>$payment_method,
    'school_id'=>$this->session->SchoolId,
    'payer_name'=>$payer_name,
    'payer_mobile'=>$payer_mobile
  );

##insert data to reciept table
  $addreciept=$this->Account_model->add_reciept($reciept);
##get  and send details to account_trensaction db2_tables(connection)

  $accountTransaction=array(
    'reference_id'=>$addreciept,
    'reference_type'=>2,
    'credit'=>$paid,
    'school_id'=>$this->session->SchoolId,
    'reciept_id'=>$recieptId,
    'student_id'=>$studentData['id']

  );

  $transaction = $this->Account_model->add_transaction($accountTransaction);




##update balance information

  $customer_id=$studentData['id'];

// $balance=22;
  $debitSum=$this->Account_model->sum_of_debit($customer_id,$school_id);
  $creditSum=$this->Account_model->sum_of_credit($customer_id,$school_id);
  $balance=$debitSum['debit']-$creditSum['credit'];
  $this->Account_model->update_balance($balance,$customer_id,$school_id);
  $this->Account_model->maintain_status_invoice($paid,$school_id,$customer_id);
##send sms and email to particular user


  $detailInfo= array(
    'mobile'=>$studentData['mobile'],
    'school_id'=>$this->session->SchoolId,
    'module'=>'reciept add',
    'student_id'=>$studentData['id'],


    'id'=>$recieptId,
    'total_amount'=>$paid,
    'organization_name'=>$schoolInfo['organization_name'],
    'email'=>$studentData['email'],

    'name'=>$studentData['name'],




  );

   $this->addSms($detailInfo);
  $this->addMail($detailInfo);
  





}
function reciept_list()
{
  $data['title']="Reciept List";
  $schoolId=$this->session->SchoolId;
  if($this->input->get('student_id'))
  {
    $student_id=$this->input->get('student_id');
    $data['reciept'] = $this->Account_model->get_all_reciept($schoolId,$student_id);
  }
  else
  {   

    $data['reciept'] = $this->Account_model->get_all_reciept($schoolId);
  }
// var_dump($data['invoice']);
  $data['_view'] = 'recieptList';
  $this->load->view('index',$data);
}

function getPdfReciept($reciept_id)
{
  $getReciept = $this->Account_model->get_reciept($reciept_id);

  $params=array(

    'customer_name'=>$getReciept['customer_name'],
    'mobile'=>$getReciept['mobile'],
    'email'=>$getReciept['email'],
    'organization_name'=>$getReciept['organization_name'],
    'organization_email'=>$getReciept['organization_email'],
    'organization_address'=>$getReciept['organization_address'],
    'organization_mobile'=>$getReciept['organization_mobile'],

    'paid'=>$getReciept['total_amount'],
    'recieptId'=>$getReciept['reciept_id'],
    'title'=>"reciept",
    'payment_method'=>$getReciept['payment_method'],
    'date'=>$getReciept['date']

  );

  $this->load->view('recieptPdf', $params);
}

function fetchRecordStudent()
{   
  $school_id=$this->session->SchoolId;
  $username=$this->input->post('keyword');
  echo json_encode($this->Student_model->fetchRecordStudents($username));
}
## invoice
function invoiceGenerate()
{   
  $input_key=$this->input->post('keyword');
  $studentData=$this->Student_model->fetchRecordStudents($input_key);

  $schoolId=$this->session->SchoolId;
  $getSchoolInformation = $this->Account_model->get_school_information($schoolId);
// print_r($getSchoolInformation);die;
##generate random invoice number

  $incrementedUniqueInvoiceId=$this->Account_model->get_max_invoiceno($schoolId);

  $particular=$this->input->post('particular');
// $particular="FF";

  $price=$this->input->post('price');
// $price=300;
  $subtotal=0;
  $total=0;
// $noOfParticular=count($particular);
  for($count = 0; $count<count($particular); $count++)
  {
    $entries[]=array(
      'name'=>$particular[$count],
      'price'=>$price[$count],
      'invoice_id_mul'=>$incrementedUniqueInvoiceId


    );
    $subtotal=$subtotal+$price[$count];
##in future tax is added in subtotal by db
    $total=$subtotal;
  }


$customer_id=$studentData['id'];
  $data=$this->Account_model->insertMultipleParticular($entries);
  $currentBalance=$this->Account_model->checkPriviousBalance($schoolId,$customer_id);
  
  if(is_null($currentBalance))
  {
    $status='pending';
  $amount_paid=0;   
  }
  if($currentBalance['balance']<0)
  {
  $BalanceExtra=(-($currentBalance['balance']));
  if($BalanceExtra==$total)
  {
    $status="paid";
    $amount_paid=$total;
  }
  if($BalanceExtra<$total)
  {
    $status="partially";
    $amount_paid=$BalanceExtra;
  }
  if($BalanceExtra>$total)
  {
    $status="partially";
    $amount_paid=$total;
  }
}
// $totalamount= $this->Account_model->get_total_amount_invoice($incrementedUniqueInvoiceId);

$extraBalance=$currentBalance['balance'];                                                                 
  $invoiceprocess=array(
    'invoice_id'=>$incrementedUniqueInvoiceId,
    'school_id'=>$this->session->SchoolId,
    'organization_name'=>$getSchoolInformation['organization_name'],
    'organization_mobile'=>$getSchoolInformation['contact_pri'],
    'organization_email'=>$getSchoolInformation['email'],
    'student_id'=>$studentData['id'],
    'total_amount'=>$total,
    'organization_address'=>$getSchoolInformation['address'],
    'customer_name'=>$studentData['name'],
    'customer_address'=>$studentData['permanent_address'],
    'email'=>$studentData['email'],
    'mobile'=>$studentData['mobile'],
    'status'=>$status,
    'amount_paid'=> $amount_paid,
    'date'=>date("Y-m-d h:i:s")


  );

##insert data to invoice table
  $addInvoice = $this->Account_model->add_invoice($invoiceprocess);

##get invoice id and send details to account_trensaction table
  $accountTransaction=array(
    'reference_id'=>$addInvoice,
    'reference_type'=>1,
    'debit'=>$total,
    'school_id'=>$this->session->SchoolId,
    'invoice_id'=>$incrementedUniqueInvoiceId,
    'student_id'=>$studentData['id']

  );



  $transaction = $this->Account_model->add_transaction($accountTransaction);

##update balance information

  $customer_id=$studentData['id'];
  $school_id=$this->session->SchoolId;
// $balance=22;
  $debitSum=$this->Account_model->sum_of_debit($customer_id,$school_id);
  $creditSum=$this->Account_model->sum_of_credit($customer_id,$school_id);
  $balance=$debitSum['debit']-$creditSum['credit'];
  $this->Account_model->update_balance($balance,$customer_id,$school_id);

##send sms and email to particular user

  $detailInfo= array(
    'mobile'=>$studentData['mobile'],
    'school_id'=>$this->session->SchoolId,
    'module'=>'invoice add',
    'student_id'=>$studentData['id'],


    'id'=>$incrementedUniqueInvoiceId,
    'total_amount'=>$total,
    'organization_name'=>$getSchoolInformation['organization_name'],
    'email'=>$studentData['email'],

    'name'=>$studentData['name']




  );
  $this->addSms($detailInfo);
  $this->addMail($detailInfo);
  



## for email info

}

##for check balance of student
function checkBalance()
{
  $student_id=$this->input->post('keyword',1);
//   $student_info=$this->Account_model->searchBalInformatiion($this->input->post('keyword'));
// // var_dump($student_info);die;
//   $credit_info=$this->Account_model->gettingTransactionInfo($this->input->post('keyword'));
//   $total_debit=$student_info->debit;
//   $total_credit=$credit_info->credit;
//   $balance=$total_debit-$total_credit;
  $condition=array('school_id'=>$this->session->SchoolId,'customer_id'=>$student_id);
  $result=$this->Account_model->select_id('table_customer_balance',$condition,array('balance'));
  // print_r($result);
$balance=$result['balance'];
  echo $balance;
}

/*function balance()
{
  $this->db->select('balance');
  $this->db->from('account_balance_information');
  $this->db->where('customer_id',72);
  $this->db->where('school_id',1);
  var_dump($this->db->get()->row_array());


}*/
function getledger()
{
  $data['invoice_prefix']='inv_';
  $data['title']="ledger";
  $student_id=$this->input->get('student_id');
  $school_id=$this->session->SchoolId;
  $data['school_info']= $this->Account_model->getSchoolName($school_id) ;
  ##get customer info 
  $data['customer_info']= $this->Account_model->select_id('table_student',array('id'=>$student_id),array('name','email','mobile'));
  $condition=array('student_id'=>$student_id,'school_id'=>$this->session->SchoolId);
  $data['ledger']=$this->Account_model->get_ledger($condition);
  $data['_view'] = 'ledger';
  $this->load->view('index',$data);

}
function ledgerReportJson()
{
   $student_id=$this->input->post('id');
    echo json_encode($data['ledger']=$this->Account_model->get_ledger($student_id));
}
function autosuggest(){
  $keyword=$this->input->post('keyword');
  $data=$this->Account_model->GetRow($keyword);        
  echo json_encode($data);
}
##need improvement
function autofill()
{ 
   $school_id=$this->session->SchoolId;
  $id=trim($this->input->post("id",1));
  $balance=$this->Account_model->get_balance_info($id,$school_id);
  $data['balance']=$this->Account_model->get_balance_info($id,$school_id);
  // if($this->Account_model->get_balance_info($id))
  // {
  //   $data['balance']=$this->Account_model->get_balance_info($id);
  // }
  // else
  // {
  //  $data['balance']=array('balance'=>0);
 
  // }
  $data['autofill']=$this->Account_model->get_autofill_value($id);
echo json_encode($data);
}

function addMail($detailsMail)
{
#get student details from $studentdetail

#prepair params 
  $module=$detailsMail['module'];

  $name=$detailsMail['name'];
  $id=$detailsMail['id'];
  $school_id=$detailsMail['school_id'];
  $total_amount=$detailsMail['total_amount'];
  $to=$detailsMail['email'];
  $school_name=$detailsSms['organization_name'];
#get body data  from database
  $this->load->model('email/Email_model');
  $fetchTemplateData=$this->Email_model->fetch_template_data($school_id,$module);
  $context=$fetchTemplateData['context'];

  $contextString=array('{school_name','{id','{name','{total_amount','}');

  $ReplaceString=array($school_name,$id,$name,$total_amount,'');
  $body=str_replace($contextString,$ReplaceString,$context);

  $subject = 'invoice generate';

  $attachments = '';
  modules::run('email/email/sendMail',$to,$subject,$body,$attachments);

#send mail

}
function addSms($detailsSms)
{
#get student details from $studentdetail

  $module=$detailsSms['module'];

  $name=$detailsSms['name'];
  $id=$detailsSms['id'];
  $school_id=$detailsSms['school_id'];
  $total_amount=$detailsSms['total_amount'];
  $mobile=$detailsSms['mobile'];
  $school_name=$studentDetailsSms['organization_name'];
  $this->load->model('sms/Sms_model');
  $fetchTemplateData=$this->Sms_model->fetch_template_data($school_id,$module);

  $context=$fetchTemplateData['context'];
  $contextString=array('{school_name','{id','{name','{total_amount','}');

  $ReplaceString=array($school_name,$id,$name,$total_amount,'');
  $message=str_replace($contextString,$ReplaceString,$context);
#send sms
  modules::run('sms/sms/sendSms',$mobile,$message);



}

#
function invoice_counting()
{

}
/*function reciepttemp()
{
    $this->load->view('templates/reciept template/one.php');
}*/
}
?>