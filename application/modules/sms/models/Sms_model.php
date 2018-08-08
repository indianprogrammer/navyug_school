<?php

 
class Sms_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
function insert_info($data)
{
 $this->db->insert('sms',$data);
        return $this->db->insert_id();
    }











 }
 ?>