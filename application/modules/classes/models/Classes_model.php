<?php


class Classes_model extends MY_Model
{


/*
* Get class by id
*/
function get_class($id)
{
  return $this->db->get_where('classes',array('id'=>$id))->row_array();
}

/*
* Get all class
*/
function get_all_class($schoolId)
{
  $this->db->select('classes.*');
  $this->db->order_by('id', 'desc');

  $this->db->order_by('id', 'desc');
  $this->db->from('map_school_class');
  $this->db->where('school_id',$schoolId);
  $this->db->join('school', 'map_school_class.school_id=school.id', 'Left');
  $this->db->join('classes', 'map_school_class.class_id=classes.id', 'Left');
  return $this->db->get()->result_array();
}

/*
* function to add new class
*/
function add_class($params)
{
  $this->db->insert('classes',$params);
  return $this->db->insert_id();
}

function add_mapping($ids)
{
  $this->db->insert('map_school_class',$ids);
  return $this->db->insert_id();
}
/*
* function to update class
*/
function update_class($id,$params)
{
  $this->db->where('id',$id);
  return $this->db->update('classes',$params);
}

/*
* function to delete class
*/
function delete_class($id)
{
  $this->db->delete('classes',array('id'=>$id));
  $this->db->delete('map_student_class',array('class_id'=>$id));
  $this->db->delete('map_class_subject',array('class_id'=>$id));
}

function get_student_count()
{

##will improve
  $this->db->select('student_id,class_id');
// $this->db->where('class_id',3);
  $query=$this->db->get('map_student_class')->result_array();
  return $query;
}
function get_subject_count()
{

##will improve
  $this->db->select('subject_id,class_id');
// $this->db->where('class_id',3);
  $query=$this->db->get('map_class_subject')->result_array();
  return $query;
}
function add_mapping_subject($ids)
{
  $this->db->insert('map_class_subject',$ids);
}
function delete_classSchoolMap($id,$school_id)
{
  $this->db->delete('map_school_class',array('class_id'=>$id,'school_id'=>$school_id));
}
function add_mapping_employee($ids)
{
  $this->db->insert('map_class_employee',$ids);
  return $this->db->insert_id();
}
##calling by admin module show in dashboard
function get_all_class_count($school_id)
{
  $this->db->where('school_id',$school_id);
  $query=$this->db->get('map_school_class')->num_rows();
  return $query;
}
## called by attendance module fetch class by school id
function fetch_classes($school_id)
{

  $this->db->select('classes.name,classes.id');
  $this->db->from('map_school_class');
  $this->db->where('school_id',$school_id);
  $this->db->join('school', 'map_school_class.school_id=school.id','Left');
  $this->db->join('classes', 'map_school_class.class_id=classes.id', 'Left');
  return $query = $this->db->get()->result_array();
} 

function batch_list($table_name,$condition,$content_display)
{
$this->db->select($content_display);
$this->db->from($this->$table_name);  
$this->db->where($condition);
  $this->db->join('course', 'course.id='.$this->$table_name.'.course_id', 'Left');
 
 
   $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
   return $data;
}

}
?>