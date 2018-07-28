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
        $data['invoice'] = $this->Account_model->get_all_invoice();
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
        $invoiceId=1134;
        $checkInvoiceId=$this->Account_model->get_max_invoiceno($invoiceId);
        // var_dump($checkInvoiceId);die;
        $incrementedUniqueInvoiceId=$checkInvoiceId;
        

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
            'reference_type'=>'invoice',
            'debit'=>1

        );
        // var_dump($accountTransaction);
        $transaction = $this->Account_model->add_transaction($accountTransaction);


        $this->load->view('pdfreport', $params);



    }

 ##get pdf by invoice id
    function getPdf($invoice_id)
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
            $percentage=0.18;
            $tax=$total*$percentage;
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
         var_dump($getStudentDetails);
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
       $recieptId=rand(1,1000).rand(1,100);
       $reciept=array(
        'reciept_id'=>$recieptId,
        'student_id'=>$getStudentDetails->id,
        'total_amount'=>$paid,
        'payment_method'=>$payment_method
        // 'invoice_id'=>$invoiceId
    );

        ##insert data to reciept table
       $addreciept=$this->Account_model->add_reciept($reciept);
        ##get invoice id and send details to account_trensaction table
       $accountTransaction=array(
        'reference_id'=>$addreciept,
        'reference_type'=>'reciept',
        'credit'=>$paid

    );
        // var_dump($accountTransaction);
       $transaction = $this->Account_model->add_transaction_reciept($accountTransaction);


        ##get input from reciept form
       $params=array(

        'student_name'=>$getStudentDetails->student_name,
        'school_name'=>"ssm",
        'email'=>$getStudentDetails->email,
        'contact'=>$getStudentDetails->mobile,
            // 'class'=>$this->input->post('class'),
        'paid'=>$paid,
        'reciepteId'=>$recieptId,
        'title'=>"reciept",
        'payment_method'=>$payment_method,
        // 'tax'=>$tax,
        // 'subtotal'=>$subtotal,
        // 'total'=>$total,
        // 'rows_bill'=>$rows
    );
       $this->load->view('recieptPdf', $params);



   }
   function reciept_list()
   {
    $data['reciept'] = $this->Account_model->get_all_reciept();
        // var_dump($data['invoice']);
    $data['_view'] = 'recieptList';
    $this->load->view('index',$data);
}

function getPdfReciept($reciept_id)
{
    $getReciept = $this->Account_model->get_reciept($reciept_id);
    $getInformationInvoicePayment['params']=$this->Account_model->get_information_invoice_payment($getReciept->invoice_id);
    // $getStudentSchool=$this->Account_model->get_student_school($getReciept->student_id);
        // var_dump($getReciept->invoice_id);die;
        // var_dump($getInformationInvoicePayment);
    $rows = "";
    $no =1;
    $subtotal=0;

    foreach ($getInformationInvoicePayment['params'] as $row) {


        $name = $row["name"];
        $price = $row["price"];
        $subtotal = $subtotal + $price;
        $percentage=0.18;
        $tax=$subtotal*$percentage;
        $total=$subtotal+$tax;
        if($name!=""){
           $rows = $rows."<tr><td>".$no."</td><td>".$name."</td><td>".$price."</td></tr>";
       }
       $no++;


   }
        // var_dump($getReciept);die;
   $params=array(


    'student_name'=>$getReciept->student_name,
    'school_name'=>"saraswati shishu mandir",
    'email'=>$getReciept->email,
    'contact'=>$getReciept->mobile,
            // 'class'=>12,
    'title'=>"reciept",
    'reciepteId'=>$getReciept->reciept_id,
    'paid'=>$getReciept->total_amount,
    'tax'=>$tax,
    'subtotal'=>$subtotal,
    "payment_method"=>$getReciept->payment_method,
    'rows_bill'=>$rows
);
         // var_dump($params);die;
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
    $invoiceId=1134;
        // var_dump($invoiceId);
    $checkInvoiceId=$this->Account_model->get_max_invoiceno($invoiceId);
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
    'student_id'=>$studentData->id
    // 'total_amount'=>$totalamount


);
        ##insert data to invoice table
   $addInvoice = $this->Account_model->add_invoice($invoiceprocess);

        ##get invoice id and send details to account_trensaction table
   $accountTransaction=array(
    'reference_id'=>$addInvoice,
    'reference_type'=>'invoice',
    'debit'=>$total

);
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
  // $credit_info=$this->Account_model->searchCreditBalInformation($this->input->post('keyword'));
    
    // echo json_encode($student_info);die;
     $data  = array( );
     foreach ( $student_info as $row) {
    
       
    array_push($data,$this->Account_model->gettingTransactionInfo($row['refId']));
   ## for getting transaction information
   
   
     }
    //  foreach ( $credit_info as $row) {
    
       
    // array_push($data,$this->Account_model->gettingTransactionInfoCredit($row['recieptId']));
    // }

   echo  json_encode($data);
}
}
?>