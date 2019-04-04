<?php


class Library_model extends MY_Model
{
  function __construct()
  {
    parent::__construct();
  }

/*
* Get subject by id
*/

function searchBooks($table_name,$condition=null,$content_display,$search)
{

 $this->db->select($content_display);



 $this->db->from($this->$table_name);  

 $this->db->where($condition);

 $this->db->group_start();
 $this->db->where("book_no like '$search%' ");
 $this->db->or_where("title like '$search%' ");
               // $this->db->or_where("crn.name like '%search_query%' ");
 $this->db->or_where("isbn_no like '$search%' ");

 $this->db->group_end();

 $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
 return $data;

}
function select_issued_book_stu($table_name,$condition=null,$content_display)
{

  $this->db->select($content_display);
  $this->db->from($this->$table_name);  
  $this->db->where($condition);
  $this->db->join('student', 'student.id='.$this->$table_name.'.taker_id', 'Left');
  $this->db->join('books', 'books.id='.$this->$table_name.'.book_id');
  
  $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
  return $data;
}
function select_issued_book_emp($table_name,$condition=null,$content_display)
{

  $this->db->select($content_display);
  $this->db->from($this->$table_name);  
  $this->db->where($condition);
  $this->db->join('employees', 'employees.id='.$this->$table_name.'.taker_id', 'Left');
  $this->db->join('books', 'books.id='.$this->$table_name.'.book_id');
  
  $data=$this->db->get()->result_array();
   // $sql = $this->db->last_query();
  return $data;
}

function issue_book_list_emp($table_name,$condition=null,$content_display)
{

  $this->db->select($content_display);
  $this->db->from($this->$table_name);  
  $this->db->where($condition);
  $this->db->join('employees', 'employees.id='.$this->$table_name.'.taker_id');
  $this->db->join('books', 'books.id='.$this->$table_name.'.book_id');
  
  $data1=$this->db->get()->result_array();
  return $data1;
   // array_push($result,$data1);
}
    ##for employee
function issue_book_list_stu($table_name,$condition=null,$content_display)
{
  $this->db->select($content_display);
  $this->db->from($this->$table_name);  
  $this->db->where($condition);
  
  $this->db->join('student', 'student.id='.$this->$table_name.'.taker_id');
  $this->db->join('books', 'books.id='.$this->$table_name.'.book_id');
  
  $data2=$this->db->get()->result_array();
  
  return $data2;
}


}
?>