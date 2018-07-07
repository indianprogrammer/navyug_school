<?php


class School_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

    /*
     * Get school by id
     */
    function get_school($id)
    {   
     $this->db->select('master_country.country_name,school.id as school_id, master_state.state_name,school_name,master_cities.city_name,address,latlong,contact_pri,contact_sec,email,logo,banner,master_country.id,master_cities.id,master_state.id,school.country_id,master_state.id as state_id,school.city_id');
     $this->db->join('master_country', 'master_country.id = school.country_id');
     $this->db->join('master_state', 'master_state.id = school.state_id');
     $this->db->join('master_cities', 'master_cities.id = school.city_id');
          // $this->db->from('school');
     return $this->db->get_where('school',array('school.id'=>$id))->row_array();
   }

    /*
     * Get all school
     */
    function get_all_school()
    {
         // $this->db->order_by('id', 'desc');

     $this->db->select('master_country.country_name,school.id, master_state.state_name,school_name,master_cities.city_name,address,latlong,contact_pri,contact_sec,email,logo,banner');
     $this->db->join('master_country', 'master_country.id = school.country_id');
     $this->db->join('master_state', 'master_state.id = school.state_id');
     $this->db->join('master_cities', 'master_cities.id = school.city_id');
     $this->db->from('school');
     return $this->db->get()->result_array();

        // return $this->db->get('school')->result_array();
   }

    /*
     * function to add new school
     */
    function add_school($params)
    {
      $this->db->insert('school',$params);
      return $this->db->insert_id();
    }
    
    /*
     * function to update school
     */
    function update_school($id,$params)
    {
      $this->db->where('id',$id);
      return $this->db->update('school',$params);
    }
    
    /*
     * function to delete school
     */
    function delete_school($id)
    {
      return $this->db->delete('school',array('id'=>$id));
    }

    function fetch_country()
    {

      $query = $this->db->get("master_country");
      return $query->result_array();
    }

    function fetch_state($country_id)
    {
      $this->db->where('country_id', $country_id);
      // $this->db->order_by('name', 'ASC');
      $query = $this->db->get('master_state');  
      return $query->result_array();

    }

    function fetch_city($state_id)
    {
      $this->db->where('state_id', $state_id);
      // $this->db->order_by('state_name', 'ASC');
      $query = $this->db->get('master_cities');
      return $query->result_array();
     }
    function fetchState($countryId)
    { 
      $this->db->select('*');
      $this->db->join('master_country', 'master_country.id = master_state.country_id');
      $this->db->where('country_id',$countryId);
      //$this->db->from('school');
      $query=$this->db->get('master_state');
      return $query->result_array();


    }

    function fetchCity($stateId)
    {
    // {   $this->db->select('*');
    //    $this->db->join('master_country', 'master_country.id = school.country_id');
    //  $this->db->join('master_state', 'master_state.id = school.state_id');
      $this->db->where('state_id',$stateId);
          //$this->db->from('school');
      $query=$this->db->get('master_cities');
      return $query->result_array();


    }









  }
  ?>