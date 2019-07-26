<?php


class Transport extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transport_model');

    } 

    function add_vehicle()
    {

        // $data[]
     $condition=array('school_id'=>$this->session->SchoolId);
     $data['vehicle']=$this->Transport_model->select('table_vehicle',$condition,array('seats','vehicle_no','id','track_id','person','person_mobile'));
     $data['_view'] = 'add_vehicle';
     $this->load->view('index',$data);


 }
 function add_vehicle_process()
 {


   $this->load->library('form_validation');



   $this->form_validation->set_rules('vehicle_no','Vehicle Number','required');
   $this->form_validation->set_rules('person','Contact Person','required|alpha_numeric_spaces');
   $this->form_validation->set_rules('seats','author','required');



   if($this->form_validation->run() )     
   {   
    $params = array(

        'vehicle_no' => strip_tags($this->input->post('vehicle_no',1)),
        'seats'=> strip_tags($this->input->post('seats',1)),
        'person'=> strip_tags($this->input->post('person',1)),
        'person_mobile'=> strip_tags($this->input->post('mobile',1)),
        'track_id'=> strip_tags($this->input->post('track_id',1)),

        'school_id'=>$this->session->SchoolId,
        'created_at'=>date('Y-m-d H:i:s'),

    );


    $vehicle_id = $this->Transport_model->insert('table_vehicle',$params);


#set notifications
    if($vehicle_id)
    {
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'

        );
    }
    else
    {
     $this->session->alerts = array(
        'severity'=> 'danger',
        'title'=> 'not added'

    );  
 }

 redirect('transport/add_vehicle');
}
else
{            

    $this->add_vehicle();
}
}  

function add_driver()
{
   $vehicleCondition=array('school_id'=>$this->session->SchoolId);
   $data['vehicle']=$this->Transport_model->select('table_vehicle',$vehicleCondition,array('seats','vehicle_no','id','track_id','person','person_mobile'));
   $condition=array('bus_driver.school_id'=>$this->session->SchoolId);
   $data['driver']=$this->Transport_model->select_driver('table_driver',$condition,array('bus_driver.id','name','mobile','vehicle.vehicle_no','licence_no','address'));
   $data['_view'] = 'add_driver';
   $this->load->view('index',$data);

}



function add_driver_process()
{

   $this->load->library('form_validation');


   $this->form_validation->set_rules('vehicle_no','Vehicle Number','required');
   $this->form_validation->set_rules('name','Driver Name','required');
   $this->form_validation->set_rules('licence_no','Licence','required');
   $this->form_validation->set_rules('mobile','mobile','required');
   $this->form_validation->set_rules('address','address','required');
   


   if($this->form_validation->run() )     
   {                          
    $params = array(

        'vehicle_no' => strip_tags($this->input->post('vehicle_no',1)),
        'licence_no'=> strip_tags($this->input->post('licence_no',1)),
        'name'=> strip_tags($this->input->post('person',1)),
        'mobile'=> strip_tags($this->input->post('mobile',1)),
        'address'=> strip_tags($this->input->post('address',1)),
        

        'school_id'=>$this->session->SchoolId,
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),

    );


    $vehicle_id = $this->Transport_model->insert('table_driver',$params);


#set notifications
    if($vehicle_id)
    {
        $this->session->alerts = array(
            'severity'=> 'success',
            'title'=> 'successfully added'
// 'description'=> ''
        );
    }
    else
    {
     $this->session->alerts = array(
        'severity'=> 'danger',
        'title'=> 'not added'
// 'description'=> ''
    );  
 }

 redirect('transport/add_vehicle');
}
else
{            

    $this->add_driver();
}
}  



}
?>