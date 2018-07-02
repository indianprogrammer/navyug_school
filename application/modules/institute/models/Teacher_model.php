<?php
class Teacher_model extends CI_Model{


public function __construct() {
			parent::__construct();
						}

public function get_view_student()
			{
				$qry=$this->db->select('*')
								->from('teachers','students')		
							->where('Student_Course','Teacher_Course')
							->get('students');	
							return $qry->result();
			}		
}							