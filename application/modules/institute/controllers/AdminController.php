<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends MX_Controller {
	function __construct() {
	parent::__construct();
	$this->load->model('Admin_model');
	$this->load->library('form_validation');
							}
	
	public function index(){
		
		$this->load->view('admin/index');
		
	}
	public function dashboard()
	{


	}
	public function add_Student()
	{
		$this->load->view('admin/student_add');
	}




	public function storeStudent()
	{
				

				//Validating Name Field
				$this->form_validation->set_rules('sname', 'Username', 'required|min_length[5]|max_length[25]');

				//Validating Email Field
				$this->form_validation->set_rules('semail', 'Email', 'required|valid_email|is_unique[students.Student_Email]');

				//Validating Mobile no. Field
				$this->form_validation->set_rules('smobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');	
				 $this->form_validation->set_rules('scourse', 'Course', 'required');	

				 $this->form_validation->set_rules('sgender', 'Gender', 'required');	

				 $this->form_validation->set_rules('sbday', 'Birthday', 'required');	
				 $this->form_validation->set_rules('saddress', 'Birthday', 'required');	
				 $this->form_validation->set_rules('sfee', 'Birthday', 'required');	


				
				if ($this->form_validation->run() == FALSE ) {
					
				$this->load->view('admin/student_add');
			} 
				else {
						$data = array(
						'Student_Name' => $this->input->post('sname'),
						'Student_Email' => $this->input->post('semail'),
						'Student_Mobile' => $this->input->post('smobile'),
						'Student_Course' => $this->input->post('scourse'),
						'Student_Gender' => $this->input->post('sgender'),
						'Student_Birthday' => $this->input->post('sbday'),
						'Student_Address' => $this->input->post('saddress'),
						'Fees_Status' => $this->input->post('sfee')
						
						);
						$data=$this->security->xss_clean($data);
							$result=$this->Admin_model->student_insert($data);
							if($result){
								$this->session->set_flashdata('status','Successfully added');
							$this->load->view('admin/student_add',$data);
									}
									else
									{
										 $this->session->set_flashdata('status','Failed to added');
									}
					}
				}
	public function view_student()
    {
        $result=$this->Admin_model->get_view_student();
        if ($result) 
        {  
            $this->load->view('admin/student_view',['data'=>  $result]);
        }
    }

     public function delete_list_student($id)
     {
        $result=$this->Admin_model->del_list_student($id);
        if($result)
   				{

		        $this->session->set_flashdata('status','Successfully deleted one item');
		        return redirect('institute/AdminController/view_student');   
     			}
    	 else
			    {
			        $this->session->set_flashdata('status','Failed to delete');
			    }

     }		

			
public function add_course()
	{
		$this->load->view('admin/add_course');
	}
	 public function insert_course()
    {
                    $course_name=$this->input->post('course');
         			$this->form_validation->set_rules('course','Course','trim|required|is_unique[courses.course_name]');
         
          		 if ($this->form_validation->run() ==FALSE)
                {
                    
                    $this->load->view('admin/add_course');
                }
                else
                {
                    $created_at=date('d/m/y');
                    $data=array(
                        'course_name'=>$course_name,
                        'created_at'=>$created_at


                    );
                    
						$data=$this->security->xss_clean($data);
                     $result=$this->Admin_model->add_course_model($data);
                     if($result)
                     {
                        $this->session->set_flashdata('status','Successfully added');
                        return $this->load->view('admin/add_course');   
                     }
                     else
                     {
                        $this->session->set_flashdata('status','Failed to add');
                     }
                    
                }
        

    }
    public function view_course()
    {
        $result=$this->Admin_model->get_view_course();
        if ($result) 
        {  
            $this->load->view('admin/course_list',['data'=>  $result]);
        }
    }

     public function delete_list_course($id)
     {
        $result=$this->Admin_model->del_list_course($id);
        if($result)
   				{

		        $this->session->set_flashdata('status','Successfully deleted one item');
		        return redirect('institute/AdminController/view_course');   
     			}
    	 else
			    {
			        $this->session->set_flashdata('status','Failed to delete');
			    }

     }
 
 	public function add_teacher()
 	{
 		$this->load->view('admin/add_teacher');
 	}
 	public function store_teacher()
 	{
 		 $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

				//Validating Name Field
				 $this->form_validation->set_rules('tname', 'Username', 'required');
				 $this->form_validation->set_rules('texp', 'Experience', 'required|numeric');
				 $this->form_validation->set_rules('tqua', 'Qualification', 'required');
				 $this->form_validation->set_rules('tcourse', 'Course', 'required');	
				 $this->form_validation->set_rules('tgender', 'Gender', 'required');	
				 $this->form_validation->set_rules('tbday', 'Birthday', 'required');	

				//Validating Email Field
				 $this->form_validation->set_rules('temail', 'Email', 'required|valid_email|is_unique[teachers.Teacher_Email]');

				//Validating Mobile no. Field
				 $this->form_validation->set_rules('tmobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');	

				//Validating Address Field
				 $this->form_validation->set_rules('tpassword', 'Password', 'required|min_length[3]|max_length[13]');

				if ($this->form_validation->run() == FALSE  ) {
				 	$this->load->view('admin/add_teacher');
				 				} 
				 else {
								$data = array(
							'Teacher_Name' => $this->input->post('tname'),
							'Teacher_Email' => $this->input->post('temail'),
							'Teacher_Password' => $this->input->post('tpassword'),
							'Teacher_Experience' => $this->input->post('texp'),
							'Teacher_Qualification' => $this->input->post('tqua'),
							'Teacher_Certification' => $this->input->post('tcer'),
							'Teacher_Mobile' => $this->input->post('tmobile'),
							'Teacher_Course' => $this->input->post('tcourse'),
							'Teacher_Gender' => $this->input->post('tgender'),
							'Teacher_Birthday' => $this->input->post('tbday')
							// 'Teacher_Address' => $this->input->post('taddress')
							
							);
					
						
							$data=$this->security->xss_clean($data);
							$result=$this->Admin_model->teacher_insert($data);
							
							  if($result)
			                     {
			                        $this->session->set_flashdata('status','Successfully added');
									$this->load->view('admin/add_teacher',$data);		
			                        // return $this->load->view('admin/add_course');   
			                     }
			                     else
			                     {
			                        $this->session->set_flashdata('status','Failed to add');
			                     }

							}
						
 	}

 public function view_teacher()
    {
        $result=$this->Admin_model->get_view_teacher();
        if ($result) 
        {  
            $this->load->view('admin/view_teacher',['data'=>  $result]);
        }
    }

     public function delete_list_teacher($id)
     {
        $result=$this->Admin_model->del_list_teacher($id);
        if($result)
   				{

		        $this->session->set_flashdata('status','Successfully deleted one item');
		        return redirect('institute/AdminController/view_teacher');   
     			}
    	 else
			    {
			        $this->session->set_flashdata('status','Failed to delete');
			    }
	}

public function add_study_matearial()
		{
			$this->load->view('admin/add_studymatearial');
		}    
		public function insert_studym()
		{
			 $matearial_name=$this->input->post('studym');
         			$this->form_validation->set_rules('studym','Content','trim|required|is_unique[matearial.matearial_name]');
         
          		 if ($this->form_validation->run() ==FALSE)
                {
                    
                    $this->load->view('admin/studymatearial');
                }
                else
                {
                    $created_at=date('d/m/y');
                    $data=array(
                        'matearial_name'=>$matearial_name,
                        'created_at'=>$created_at


                    );
                   
						$data=$this->security->xss_clean($data);
                     $result=$this->Admin_model->add_matearial_model($data);
                     if($result)
                     {
                        $this->session->set_flashdata('status','Successfully added');
                        return $this->load->view('admin/add_studymatearial');   
                     }
                     else
                     {
                        $this->session->set_flashdata('status','Failed to add');
                     }
                    
                }
        

   		 }
	}

    





















				?>

