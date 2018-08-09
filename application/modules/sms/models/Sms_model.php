<?php

 
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
function insertLogInfo($data)
{
 $this->db->insert('log_outgoing_sms',$data);
        return $this->db->insert_id();
    }











 }
 ?>