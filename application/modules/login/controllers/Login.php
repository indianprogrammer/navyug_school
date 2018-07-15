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
        //load session library

        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        // var_dump($username);die;

        $result = $this->Login_model->getResult($username,$password);

        @$data = array(
            'userid' => $result->id,

            'authentication_id' => $result->autorization_id,
            'username' => $result->username,
            'validated' => true
        );
        $this->session->set_userdata($data);
// var_dump($data['authentication_id']);die;
        if(!$result){
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('login', $data);
        }

        elseif($data['authentication_id']=="2")
            // If user did validate, 
            // Send them to members area

        {
            redirect('school/index');
        }
        elseif($data['authentication_id']=="3")
        {
                // redirect('trainer/index');
          echo "welcome".$data['username']."teacher";
      }
      elseif($data['authentication_id']=="4")
      {
            // redirect('school/index');
        echo  $data['username'];
    }
    elseif($data['authentication_id']=="5")
    {
       echo  $data['username'];
   }


}
}
// }
?>