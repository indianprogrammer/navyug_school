<?php
class Admin_model extends CI_Model{


public function __construct() {
			parent::__construct();
						}
public function student_insert($data){
// Inserting in Table(students) of Database(college)
	
				$return=$this->db->insert('students', $data);
				return $return;
									}
public function get_view_student()
			{
				$qry=$this->db->select('*')
							->get('students');	
							return $qry->result();
			}
public function del_list_student($id)
			{

				$qry=$this->db->where('id',$id)->delete('students');
				return $qry;
			}									

public function add_course_model($data)
			{

				$return=$this->db->insert('courses', $data);
				return $return;
			}

public function get_view_course()
			{
				$qry=$this->db->select('*')
							->get('courses');	
							return $qry->result();
			}
public function del_list_course($id)
			{

				$qry=$this->db->where('course_id',$id)->delete('courses');
				return $qry;
			}
public function teacher_insert($data)
			{
				$return=$this->db->insert('teachers', $data);
				return $return;
			}
public function get_view_teacher()
			{
				$qry=$this->db->select('*')
							->get('teachers');	
							return $qry->result();
			}
public function del_list_teacher($id)
			{

				$qry=$this->db->where('teacher_id',$id)->delete('teachers');
				return $qry;
			}	
public function add_matearial_model($data)
			{

				$return=$this->db->insert('matearial', $data);
				return $return;
			}		
}		
?>