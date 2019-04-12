<?php


class Attendance_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
    /*
     * Get student by id
     */
    
    
    function get_all_attendance()
    {
     $this->db->select('id,student_id,class_id,school_id,attendance_status,date');
     $this->db->from('attendance_record');
     
     
     return $query = $this->db->get()->result_array();
   }
   function insert_attendance($data)
   {
    $this->db->insert('attendance_record',$data);
    return $this->db->insert_id();
  }
  function fetch_report($school_id,$class_id,$date)
  {
    $this->db->select('id,student_id,batch_id,school_id,attendance_status,date');
    $this->db->from('attendance_record');
    $this->db->where(array('school_id'=>$school_id,'batch_id'=>$class_id,'date'=>$date));
        // $this->dv->join('student','student.id=attendance_record.student_id','Left');
    return $query = $this->db->get()->result_array();
    

  }

function fetch_students_by_batch($table_name,$condition,$content_display)
{

$this->db->select($content_display);
$this->db->from($this->$table_name);  
$this->db->where($condition);
  $this->db->join('student', 'student.id='.$this->$table_name.'.student_id');
 
 
   $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
   return $data;
}




function fetch_students_by_batchs($table_name,$condition,$content_display)
{ 
$temp=[];
$this->db->select($content_display);
$this->db->from($this->$table_name);  
$this->db->where($condition);
  // $this->db->join('student', 'student.id='.$this->$table_name.'.student_id');
 // $this->db->group_by('student_id');
 
   $data=$this->db->get()->result_array();
   for($i=0;$i<count($data);$i++)
   {
      $this->db->select('date,attendance_status,student_id');
$this->db->from($this->$table_name);  
$this->db->where('student_id',2);
$data1=$this->db->get()->result_array();
// array_push($temp,$data1);
   }
   // $data[]
  
   // return $temp;
   return $data1;
}


function fetch_name_batch($table_name,$condition,$content_display)
{

$this->db->select($content_display);
$this->db->from($this->$table_name);  
$this->db->where($condition);
  $this->db->join('course', 'course.id='.$this->$table_name.'.course_id');

 
   $data=$this->db->get()->row_array();
   // $sql = $this->db->last_query();
   return $data;

}






}

?>