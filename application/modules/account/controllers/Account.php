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
        ##get input from invoice form
        $params=array(
            'student_id'=>$this->input->post('id'),
            'student_name'=>$this->input->post('stuName'),
            'school_name'=>$this->input->post('name'),
            'email'=>$this->input->post('email'),
            'contact'=>$this->input->post('contact'),
            'class'=>$this->input->post('class'),
            'title'=>"invoice"
        );
        ##generate random invoice number
        $invoiceId="inv".rand(1,1000).rand(1,100);
        $invoiceprocess=array(
            'invoice_id'=>$invoiceId
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
         $params=array(
            
            'student_name'=>$getInvoice->student_name,
            'school_name'=>"dd",
            'email'=>$getInvoice->email,
            'contact'=>$getInvoice->mobile,
            'class'=>$getInvoice->classes,
            'title'=>"invoice",
            'invoiceId'=>$getInvoice->invoice_id
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
        ##get input from invoice form
        ##generate random invoice number
        $recieptId="REC".rand(1,1000).rand(1,100);
        $reciept=array(
            'reciept_id'=>$recieptId
        );
        
        ##insert data to invoice table
        $addreciept=$this->Account_model->add_reciept($reciept);
        ##get invoice id and send details to account_trensaction table
        $accountTransaction=array(
            'reference_id'=>$addreciept,
            'reference_type'=>'reciept',
            'credit'=>1

        );
        // var_dump($accountTransaction);
        $transaction = $this->Account_model->add_transaction_reciept($accountTransaction);
       

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

}
