<?php

 
class Email_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


function insertEmailLog($data)

{
  $this->db->insert('log_outgoing_email',$data);
  return $this->db->insert_id();
}














   } 
    ?>