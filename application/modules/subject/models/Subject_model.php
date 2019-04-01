<?php


class Subject_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }

/*
* Get subject by id
*/
function get_subject($id)
{
    $this->db->select('subjects.id,subjects.name,subjects.date');
    $this->db->from('subjects');
    $this->db->where('id',$id);
    return $this->db->get()->row_array();
}
function get_recieve_subject($id)
{
    $this->db->select('subjects.id,subjects.name,subjects.date');
    $this->db->from('subjects');
    $this->db->where('id',$id);
    return $this->db->get()->result_array();
}

/*
* Get all subject
*/
function get_all_subject($schoolId)
{   
    $this->db->select('subjects.id,subjects.name,subjects.date');
    $this->db->order_by('id', 'desc');
    $this->db->from('map_school_subject');
    $this->db->where('map_school_subject.school_id',$schoolId);
    $this->db->join('school', 'map_school_subject.school_id=school.id', 'Left');
    $this->db->join('subjects', 'map_school_subject.subject_id=subjects.id', 'Left');
    return $this->db->get()->result_array();
}

/*
* function to add new subject
*/
function add_subject($params)
{
    $this->db->insert('subjects',$params);
    return $this->db->insert_id();
}

function add_mapping($ids)
{
    $this->db->insert('map_school_subject',$ids);
    return $this->db->insert_id();
}

/*
* function to update subject
*/
function update_subject($id,$params)
{
    $this->db->where('id',$id);
    return $this->db->update('subjects',$params);
}

/*
* function to delete subject
*/
function delete_subject($id)
{
    return $this->db->delete('subjects',array('id'=>$id));
}
function delete_subjectSchoolMap($id,$school_id)
{
    $this->db->delete('map_school_subject',array('subject_id'=>$id,'school_id'=>$school_id));
}
##calling by admin module show in dashboard
function get_all_subject_count($school_id)
{
    $this->db->where('school_id',$school_id);
    $query=$this->db->get('map_school_subject')->num_rows();
    return $query;
}
##called by classes module
function get_all_subject_by_classid($class_id)
{
    $this->db->select('subject_id');
    $this->db->from('map_class_subject');
    $this->db->where('class_id',$class_id);
    return $this->db->get()->result_array();


}
function get_subject_by_subject_id($id=null)
{
    $this->db->select('name,date,id');
    $this->db->from('subjects');
    if(!is_null($id))
    {
        $this->db->where_in('id',$id);
    }
    return $this->db->get()->result_array();
}
function get_selected_subject($id)
{
    $this->db->select('subject_id');
    $this->db->from('map_class_subject');
    $this->db->where('class_id',$id);
    return $this->db->get()->result_array();

}
}
?>