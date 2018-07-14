<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }
    
    public function index($msg = NULL){
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('login', $data);
    }
    
    public function process(){
        // Load the model
        // Validate the user can login
        $result = $this->Login_model->validate();
         // var_dump($result);
        // Now we verify the result
        // var_dump($result['authentication_id']);die;  
        // var_dump($authentication_id);die;
        if(!$result){
            // If user did not validate, then show them login page again
         $data = array(
            'error_message' => 'Invalid Username or Password'
        );
         $this->load->view('login', $data);
     }
 
 elseif($result['authentication_id']=="1")
            // If user did validate, 
            // Send them to members area

 {
    redirect('school/index');
}
elseif($result['authentication_id']=="3")
{
                // redirect('trainer/index');
  echo "welcome".$result['username'];."teacher"
}
elseif($result['authentication_id']=="4")
{
            // redirect('school/index');
    echo  $result['username'];
}
elseif($result['authentication_id']=="5")
{
   echo  $result['username'];
}
}
}
?>