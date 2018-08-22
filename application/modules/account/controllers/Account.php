    <?php


    class Account extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('Account_model');
            $this->load->helper('pdf_helper');
        } 

    /*
     * Listing of attendance
     */
    function invoice_list()
    {   
        $schoolId=$this->session->SchoolId;
        $data['invoice'] = $this->Account_model->get_all_invoice($schoolId);
        // var_dump($data['invoice']);
        $data['_view'] = 'invoiceList';
        $this->load->view('index',$data);
    }

    /*
     * Adding a new attendance
     */
    function accountForm()
    {   
        $school_id=$this->session->SchoolId;
        // $data['classes'] = $this->Attendance_model->fetch_classes($school_id);
        $data['_view'] = 'add';
        $this->load->view('index',$data);
    }

    function add_invoice()
    {
        $data['_view'] = 'addInvoice';
        $this->load->view('index',$data);
    }

    function generate_invoice()
    {   

        ##get school information
        $schoolId=$this->session->SchoolId;
        $getSchoolInformation = $this->Account_model->get_school_information($schoolId);
        // var_dump($getSchoolInformation);die;
        ##generate random invoice number
        // $invoiceId=1134;
        $checkInvoiceId=$this->Account_model->get_max_invoiceno();
        if(is_null($checkInvoiceId))
        {
            $invoice_id=1;
        }
        else{
        // var_dump($checkInvoiceId);die;
        $incrementedUniqueInvoiceId=$checkInvoiceId;
        }

        // var_dump($entries);die;
        $data=$this->db->insert_batch('master_invoice',$entries);

         ##get input from invoice form
        $params=array(
            'student_id'=>$this->input->post('id'),
            'student_name'=>$this->input->post('stuName'),
            'total'=>$this->input->post('total'),
            'email'=>$this->input->post('email'),
            'contact'=>$this->input->post('contact'),
            'class'=>$this->input->post('class'),
            'title'=>"invoice",
            'invoice_id'=>$incrementedUniqueInvoiceId,
            'school_name'=>$getSchoolInformation->organization_name
        );
        $invoiceprocess=array(
            'invoice_id'=>$incrementedUniqueInvoiceId,
            'school_id'=>$this->session->SchoolId,
            'school_name'=>$getSchoolInformation->organization_name
            

        );
        ##insert data to invoice table
        $addInvoice = $this->Account_model->add_invoice($invoiceprocess);

        ##get invoice id and send details to account_trensaction table
        $accountTransaction=array(
            'reference_id'=>$addInvoice,
            'reference_type'=>1,
            'debit'=>1

        );
        // var_dump($accountTransaction);
        $transaction = $this->Account_model->add_transaction($accountTransaction);


        $this->load->view('pdfreport', $params);



    }

 ##get pdf by invoice id
    function getpdf($invoice_id)
    {
        $getInvoice = $this->Account_model->get_invoice($invoice_id);
         // var_dump($getInvoice);die;
        $get_row_type['params']= $this->Account_model->get_invoiceRow($invoice_id);
          //var_dump($get_row_type['params']);
          //$v='<td></td>';

        $rows = "";
        $no =1;
        $subtotal=0;

        foreach ($get_row_type['params'] as $row) {


            $name = $row["name"];
            $price = $row["price"];
            $subtotal = $subtotal + $price;
            // $percentage=;
            $tax=$subtotal*0.18;
             $total=$subtotal+$tax;
            if($name!=""){
                $rows = $rows."<tr><td>".$no."</td><td>".$name."</td><td>".$price."</td></tr>";
            }
            $no++;


        }
          //echo $v;


        $params=array(

            'student_name'=>$getInvoice->student_name,
            'school_name'=>$getInvoice->school_name,
            'email'=>$getInvoice->email,
            'contact'=>$getInvoice->mobile,
            'class'=>$getInvoice->classes,
            'title'=>"invoice",

            'invoice_id'=>$getInvoice->inv,

            'permanent_address'=>$getInvoice->permanent_address,
            'price'=>$rows,
            'subtotal'=>$subtotal,
            'tax'=>$tax,
            'total'=>$total

        );
          // var_dump($params);die;
        $this->load->view('pdfreport', $params);
    }



    ##for receipt start
    function add_reciept()
    {
        $data['_view'] = 'addReciept';
        $this->load->view('index',$data);
    }

    function generate_reciept()
    {

        ##getting information of student
        $studId=$this->input->post('stuid');
        $payment_method=$this->input->post('method');
        $paid=$this->input->post('pay');
        // $getInformationInvoice=$this->Account_model->get_information_invoice($invoiceId);
        // $student_info=$this->Account_model->searchBalInformatiion($studId);
         // var_dump($student_info);die;
        ##get student details by student_id
        $getStudentDetails=$this->Account_model->get_information_student($studId);
          // var_dump($getStudentDetails);die;
        ##getting information of invoice payment
       //  $getInformationInvoicePayment['params']=$this->Account_model->get_information_invoice_payment($invoiceId);
     
       //  $rows = "";
       //  $no =1;
       //  $subtotal=0;

       //  foreach ($getInformationInvoicePayment['params'] as $row) {


       //      $name = $row["name"];
       //      $price = $row["price"];
       //      $subtotal = $subtotal + $price;
       //      $percentage=0.18;
       //      $tax=$subtotal*$percentage;
       //      $total=$subtotal+$tax;
       //      if($name!=""){
       //         $rows = $rows."<tr><td>".$no."</td><td>".$name."</td><td>".$price."</td></tr>";
       //     }
       //     $no++;


       // }
        




        ##generate random reciept number
       // $recieptId=rand(1,1000).rand(1,100);
        $recieptId=$this->Account_model->generate_reciept_num();
     // echo( $invoice_id);die;
       $reciept=array(
        'reciept_id'=>$recieptId,
        'student_id'=>$getStudentDetails->id,
        'total_amount'=>$paid,
        'payment_method'=>$payment_method,
        'school_id'=>$this->session->SchoolId
    );

        ##insert data to reciept table
       $addreciept=$this->Account_model->add_reciept($reciept);
        ##get  and send details to account_trensaction db2_tables(connection)
// var_dump($addreciept);die;
       $accountTransaction=array(
        'reference_id'=>$addreciept,
        'reference_type'=>2,
        'credit'=>$paid,
        'school_id'=>$this->session->SchoolId

    );
        // var_dump($accountTransaction);
       $transaction = $this->Account_model->add_transaction_reciept($accountTransaction);
      $schoolName= $this->Account_model->getSchoolName($this->session->SchoolId) ;

        ##get input from reciept form
       $params=array(

        'student_name'=>$getStudentDetails->student_name,
        'school_name'=>$schoolName->organization_name,
        'email'=>$getStudentDetails->email,
        'address'=>$getStudentDetails->temporary_address,
        'contact'=>$getStudentDetails->mobile,
           
        'paid'=>$paid,
        'reciepteId'=>$recieptId,
        'title'=>"reciept",
        'payment_method'=>$payment_method,
        'date'=>date('y/m/d')
       
    );
       $this->load->view('recieptPdf', $params);



   }
   function reciept_list()
   {
     $schoolId=$this->session->SchoolId;
    $data['reciept'] = $this->Account_model->get_all_reciept($schoolId);
        // var_dump($data['invoice']);
    $data['_view'] = 'recieptList';
    $this->load->view('index',$data);
}

function getPdfReciept($reciept_id)
{
    $getReciept = $this->Account_model->get_reciept($reciept_id);
     // var_dump($getReciept);
   // $getInformationReciept['params']=$this->Account_model->get_information_reciept_payment($getReciept->id);
    // $getStudentSchool=$this->Account_model->get_student_school($getReciept->student_id);
      //var_dump( $getInformationReciept['params']);die;
        // var_dump($getInformationInvoicePayment);
   $schoolName= $this->Account_model->getSchoolName($this->session->SchoolId) ;
     $params=array(

        'student_name'=>$getReciept->student_name,
        'school_name'=>$schoolName->organization_name,
        'email'=>$getReciept->email,
        'address'=>$getReciept->temporary_address,
        'contact'=>$getReciept->mobile,
           
        'paid'=>$getReciept->total_amount,
        'reciepteId'=>$reciept_id,
        'title'=>"reciept",
        'payment_method'=>$getReciept->payment_method,
        'date'=>$getReciept->date
       
    );

   $this->load->view('recieptPdf', $params);
}

function fetchRecordStudent()
{   
    $school_id=$this->session->SchoolId;

    echo json_encode($this->Account_model->fetchRecordStudents($this->input->post('keyword')));
}
## invoice
function addMultiple()
{   

    $studentData=$this->Account_model->fetchRecordStudents($this->input->post('keyword'));

    $schoolId=$this->session->SchoolId;
    $getSchoolInformation = $this->Account_model->get_school_information($schoolId);

        ##generate random invoice number
    // $invoiceId=1134;
        // var_dump($invoiceId);
    $checkInvoiceId=$this->Account_model->get_max_invoiceno($schoolId);
        // var_dump($checkInvoiceId);die;
    $incrementedUniqueInvoiceId=$checkInvoiceId;
    $item_name=$this->input->post('item_name');

    $item_price=$this->input->post('item_price');
    $subtotal=0;
    $total=0;
    for($count = 0; $count<count($item_name); $count++)
    {
       $entries[]=array(
        'name'=>$item_name[$count],
        'price'=>$item_price[$count],
        'invoice_id_mul'=>$incrementedUniqueInvoiceId,


    );
$subtotal=$subtotal+$item_price[$count];
$total=$subtotal+$subtotal*0.18;
   }


        // var_dump($entries);die;
   $data=$this->Account_model->insertMultiple($entries);
   $totalamount= $this->Account_model->get_total_amount_invoice($incrementedUniqueInvoiceId);
     // $this->output->enable_profiler(TRUE);
   $invoiceprocess=array(
    'invoice_id'=>$incrementedUniqueInvoiceId,
    'school_id'=>$this->session->SchoolId,
    'school_name'=>$getSchoolInformation->organization_name,
    'student_id'=>$studentData->id,
     'total_amount'=>$total


);
        ##insert data to invoice table
   $addInvoice = $this->Account_model->add_invoice($invoiceprocess);

        ##get invoice id and send details to account_trensaction table
   $accountTransaction=array(
    'reference_id'=>$addInvoice,
    'reference_type'=>1,
    'debit'=>$total,
    'school_id'=>$this->session->SchoolId

);
   ## map invoice school
   // $map_invoice=array(
   //  'invoice_id'=>$incrementedUniqueInvoiceId,
   //  'school_id'=>$this->session->SchoolId
   // );
   // $schoolInvoice=$this->Account_model->map_invoice($map_invoice);
   $params=array(

    'student_name'=>$studentData->student_name,
            // 'total'=>$this->input->post('total'),
    'email'=>$studentData->email,
    'contact'=>$this->input->post('contact'),
    'class'=>$this->input->post('class'),
    'title'=>"invoice",
    'invoice_id'=>$incrementedUniqueInvoiceId,
    'school_name'=>$getSchoolInformation->organization_name
);
        // var_dump($accountTransaction);
   $transaction = $this->Account_model->add_transaction($accountTransaction);

   // redirect('school/add_school');
     // $this->load->view('pdfreport', $params);
}

##for check balance of student
function checkBalance()
{
    $student_info=$this->Account_model->searchBalInformatiion($this->input->post('keyword'));
   $credit_info=$this->Account_model->gettingTransactionInfo($this->input->post('keyword'));
   $total_debit=$student_info->debit;
    $total_credit=$credit_info->credit;
     $balance=$total_debit-$total_credit;
    echo $balance;
}
function testtemplate()
{
    $data=array(
'name'=>'vivek chourasiya',
'email'=>'vivek.et1993@gmail.com'

<<<<<<< HEAD

=======
    );
    $this->load->view('templates/invoice_template/two',$data);
}
>>>>>>> bba20effa4491f12edda37e376e64628b9739c6e
}
?>