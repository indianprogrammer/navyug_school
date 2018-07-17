<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index($msg = NULL)
    {
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('login', $data);
    }


    public function process()
    {
        //load session library

        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        // var_dump($username);die;

        $authenticationData = $this->Login_model->getResult($username, $password);

        var_dump($authenticationData);

        if (is_null($authenticationData)) {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('login', $data);
        }else{
            $autorizationData = $this->Login_model->getAutorization($authenticationData['autorization_id']);

            #set session data
            $this->session->user_id = $authenticationData['id'];
            $this->session->username = $authenticationData['username'];
            $this->session->autorization_id = $autorizationData['type'];

            $userData = '';
            switch ($authenticationData['autorization_id']){
                case 1:
                    #got for admin user at employ table & check for authentication ID and get school id
                    $userData = $this->Login_model->getEmployDetails($authenticationData['id']);
                    $this->session->SchoolId = $userData['school_id'];
                    break;
                case 2:
                    #got for teacher
                    break;
                case 3:
                    #got for parent
                    break;
                case 4:
                    #got for student
                    break;
            }
            #redirect it to $autorizationData['home']
            echo 'redirect it to '. $autorizationData['home'];
            $this->output->enable_profiler(TRUE);


        }




//// var_dump($data['authentication_id']);die;
//        if (!$result) {
//            $data = array(
//                'error_message' => 'Invalid Username or Password'
//            );
//            $this->load->view('login', $data);
//        } elseif ($data['authentication_id'] == "2")
//            // If user did validate,
//            // Send them to members area
//
//        {
//            redirect('school/index');
//        } elseif ($data['authentication_id'] == "3") {
//            // redirect('trainer/index');
//            echo "welcome" . $data['username'] . "teacher";
//        } elseif ($data['authentication_id'] == "4") {
//            // redirect('school/index');
//            echo $data['username'];
//        } elseif ($data['authentication_id'] == "5") {
//            echo $data['username'];
//        }


    }
}

// }
?>