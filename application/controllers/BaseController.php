<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Trainer_model');
	} 


	
}
