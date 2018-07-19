<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		// $this->load->model('Trainer_model');
		if (!isset($_SESSION['username'])) {
             redirect('login');
        }
        $schoolId= $_SESSION['SchoolId'];
	} 


	
}
