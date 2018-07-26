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
            'school_name'=>$getSchoolInformation->organization_name,
            'total'=>$this->input->post('total')

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
          var_dump($getInvoice);
         $params=array(
            
            'student_name'=>$getInvoice->student_name,
            'school_name'=>$getInvoice->school_name,
            'email'=>$getInvoice->email,
            'contact'=>$getInvoice->mobile,
            'class'=>$getInvoice->classes,
            'title'=>"invoice",
            'total'=>$getInvoice->total,
            'invoice_id'=>$getInvoice->invoice_id
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
        ##generate random reciept number
        $recieptId="REC".rand(1,1000).rand(1,100);
        $reciept=array(
            'reciept_id'=>$recieptId
        );
        
        ##insert data to reciept table
        $addreciept=$this->Account_model->add_reciept($reciept);
        ##get invoice id and send details to account_trensaction table
        $accountTransaction=array(
            'reference_id'=>$addreciept,
            'reference_type'=>'reciept',
            'credit'=>1

        );
        // var_dump($accountTransaction);
        $transaction = $this->Account_model->add_transaction_reciept($accountTransaction);
       

        ##get input from reciept form
        $params=array(
            'student_id'=>$this->input->post('id'),
            'student_name'=>$this->input->post('stuName'),
            'school_name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'contact'=>$this->input->post('contact'),
            'class'=>$this->input->post('class'),
            'paid'=>$this->input->post('paid'),
            'reciepteId'=>$recieptId,
            'title'=>"reciept"
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
        // var_dump($getInvoice);die;
         $params=array(
            
            // 'student_name'=>$getreciept->student_name,
            // 'school_name'=>"dd",
            // 'email'=>$getreciept->email,
            // 'contact'=>$getreciept->mobile,
            // 'class'=>$getreciept->classes,
            // 'title'=>"reciept",
            // 'invoiceId'=>$getreciept->invoice_id 
            'student_name'=>'vivek',
            'school_name'=>"dd",
            'email'=>"vivek@gmail.com",
            'contact'=>987654347647,
            'class'=>12,
            'title'=>"reciept",
            'reciepteId'=>55,
            'paid'=>200
        );
         // var_dump($params);die;
         $this->load->view('recieptPdf', $params);
    }

    function fetchRecordStudent()
    {   
        $school_id=$this->session->SchoolId;

        echo json_encode($this->Account_model->fetchRecordStudents($this->input->post('keyword')));
    }







   
}
?>