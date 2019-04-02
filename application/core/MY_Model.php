<?php


class MY_Model extends CI_Model
{

  public $table_staff='staff';

  public $table_employee='employees';
  public $table_student='student';
  public $table_group='team_group';
  public $table_ticket='ticket';
  public $table_ticket_log='log_ticket';
  public $table_category='category';
  public $table_task='task';
  public $table_map_group='map_group_member';
  public $table_map_ticket_assign='ticket_assign_map';
  public $table_login='user_authentication';
 
  public $table_master_id='master_id_proof';
 
  // public $table_plan_time_limit='plan_time_limit';
  // public $table_plan_user='plan_user';
  // public $table_map_frenchise_plan='map_plan_frenchise';
  // public $table_school_setting='school_setting';
  // public $table_master_plan_type='master_plan_type';
  // public $table_frenchise='frenchise';
  // public $table_frenchise_tax='tax';
  public $table_invoices='invoices';
  public $table_master_invoice='master_invoice';
  public $table_payment_details='payment_details';
  // public $table_wallet='wallet';
  public $table_recharge='recharge_info';
  public $table_account_transaction='account_transaction';
  // public $table_one_time_install='table_one_time_installlation_info';
  public $table_customer_balance='customer_balance';
  // public $table_tax_frenchise_detail='tax_frenchise_count';
  public $table_payment_type='master_payment_type';
  public $table_sms_configuration='sms_configuration';
  public $table_sms_log='log_outgoing_sms';
  public $table_sms_template='template_sms';
  public $table_email_configuration='email_configuration';
  public $table_email_log='log_outgoing_email';
  public $table_email_template='template_email';
  public $table_attend_type='master_attend_type';
  public $table_log_login='log_login';
  public $table_transaction='transaction';
  public $table_item='item_list';
  public $table_item_details='item_details';
  public $table_sales='sales';
  public $table_sales_details='sales_details';
  public $table_target_sales='target_sales';
  public $table_services='services';

  public $table_vendor="vendor";
  public $table_purchase="purchase_item";
  public $table_quotation="quotation";
  public $table_quotation_details="quotation_details";
  public $table_item_graph="item_report";
  public $table_service_purchase="service_purchase";

    public $table_map_school_student='map_school_student';
    public $table_map_school_employee='map_school_employee';
    public $table_master_city="master_city";
    public $table_master_country="master_country";
    public $table_master_state="master_state";
    public $table_school='school';
    public $table_school_setting='school_setting';
    public $table_books='books';
    public $table_book_category='books_category';
    public $table_book_issue='book_issue';
    public $table_courses='course';
    public $table_batch='batch';
    public $table_subject='subjects';
    public $table_assign_subject='subject_assign';
    public $table_assign_student='map_student_batch';
    public $table_subject_allocation='subject_allocation';


  function __construct()
  {
   parent::__construct();
   
 }


  /* response stracture
    response: success,fail
    code    : 2XX,4XX,5XX
    data    : {json string}
  */

  #generic function for select
  function select($table_name,$condition=null,$content_display,$order=null){ //table names,columns,join type,condition
## condition and $content_dispaly show be an array
    #return json response
      /* response stracture
    response: success,fail
    code    : 2XX,4XX,5XX
    data    : {json string}

  */
    // $returnData=array('status'=>'not found','status_code'=>404);
    
    $this->db->select($content_display);
    if(!is_null($order))
    $this->db->order_by("DATE(created_at)", "desc");
    $this->db->from($this->$table_name);
    if(!is_null($condition))
      $this->db->where($condition);
    $data= $this->db->get()->result_array();
    if($data){
      
    return $data;
    }
    return array();
    // return json_encode($returnData);
  }

  #generic function for insert
  function insert($table_name,$params){ 
  //single insert or multiple inserts

  /* response stracture
    response: success,fail
    code    : 2XX,4XX,5XX
    data    : {json string} | last inserted id | error message
  */
    
    
    $this->db->insert($this->$table_name,$params);
    $id= $this->db->insert_id();
    return $id;
    // if($id)
    // {
    //   $returnData=array('status'=>'success','last_inserted_id'=>$id,'status_code'=>200) ;
    // }

    // return json_encode($returnData);
    
  }

  function select_id($table_name,$condition=null,$content_display,$order=null)
  {
    $this->db->select($content_display);
    if(!is_null($order))
    $this->db->order_by("DATE(created_at)", "desc");
    $this->db->from($this->$table_name);
    if(!is_null($condition))
      $this->db->where($condition);
    $data= $this->db->get()->row_array();
    if($data){
      
    return $data;
    }
    return array();

  }


  #generic function for delete
  function delete($table_name,$condition){

  /* response stracture
    response: success,fail
    code    : 2XX,4XX,5XX
    data    : {json string} | deleted id & query condition for delete
  */$returnData=array('status'=>'failure','status_code'=>400);
    
    $this->db->where($condition);
    $this->db->delete($this->$table_name);
    $row=$this->db->affected_rows();
    $query_condition=$this->db->last_query();

    
    if($row)
    {
      $returnData=array('status'=>'success','last_deleted_id'=>$condition,'status_code'=>200) ;
    }
    return json_encode($returnData);
  }

  #generic function for update
  function update($condition,$table_name,$params){

  /* response stracture
    response: success,fail
    code    : 2XX,4XX,5XX
    data    : {json string} | updated id | query condition for update
  */
    $returnData=array('status'=>'not updated','status_code'=>400);
    
    $this->db->where($condition);
    $this->db->update($this->$table_name,$params);
    $row=$this->db->affected_rows();
    $query_condition=$this->db->last_query();
    if($row)
    {
     $returnData=array('status'=>'success','last_updated_id'=>$condition,'status_code'=>200) ;
   }
   
   return $row;

 }

 ##update particular coloumn in a table
 function update_col($table_name,$condition,$params)
 {
  
  $this->db->where($condition);

  $this->db->set($params);
  $this->db->update($this->$table_name);
  $row=$this->db->affected_rows();
  if($row)
  {
   return 'success';
 }
 else
 {
   return 'failure';
 }
}


##counting number of rows in table
function counting($table_name,$condition=null)
{
  
  if(!is_null($condition))
    $this->db->where($condition);

  $count=$this->db->get($this->$table_name)->num_rows();
  return $count;

}
##sum particular col of table
function sum_column($table_name,$condition=null,$coloumn_name,$start_date='',$end_date='')
{
  
  $this->db->select_sum($coloumn_name);
  if(!is_null($condition))
    $this->db->where($condition);
   if(!empty($start_date) && !empty($end_date))
  $this->db->where("date(created_at) BETWEEN '$start_date' AND '$end_date'");
  $count=$this->db->get($this->$table_name)->row_array();
    if($count[$coloumn_name])
    {
 return $count[$coloumn_name];
}
else
{
  return 0;
  // return json_encode(array('status'=>'success','data'=>$count,'status_code'=>200));
}

}


## fetch data between particular two date
function report($table_name,$display_contents,$condition,$start_date='',$end_date='',$status='',$coloumn='created_at')
{

 
 
 $this->db->select($display_contents);
 $this->db->from($this->$table_name);

 $this->db->where($condition);
 if(!empty($start_date) && !empty($end_date))
  $this->db->where("date(".$coloumn.") BETWEEN '$start_date' AND '$end_date'");
if(!empty($status))
  $this->db->where('status',$status);
$data=$this->db->get()->result_array();


return $data;

}


## fetch data between two dates(special we can given time intervel )
function data_between_date($table_name,$display_contents,$condition,$interval_unit,$table_row='created_at',$group_by='',$order_by='')
{


 
 $this->db->select($display_contents);
 $this->db->from($this->$table_name);

 $this->db->where($condition);
 // if(!empty($start_date) && !empty($end_date))
 if($table_row)
  $this->db->where(" DATE(".$table_row.") BETWEEN DATE_SUB( CURDATE( ),".$interval_unit." ) AND CURDATE( )");
  if($group_by)
     $this->db->group_by(''.$group_by.'(created_at)');
   if($order_by)
    $this->db->order_by(''.$order_by.'(created_at)','asc');
$data=$this->db->get()->result_array();


return ($data);

}
## fetch data of current month and year 
function data_current($table_name,$display_contents,$condition,$interval_unit,$table_row='created_at',$start_date='',$end_date='')
{


 
 $this->db->select($display_contents);
 $this->db->from($this->$table_name);

 $this->db->where($condition);
 // if(!empty($start_date) && !empty($end_date))
  $this->db->where(" DATE(".$table_row.") BETWEEN DATE_FORMAT( CURDATE( ),".$interval_unit." ) AND CURDATE( )");

$data=$this->db->get()->result_array();


return ($data);

}

## count data between data and interval given
function data_between_date_count($table_name,$display_contents,$condition,$interval_unit='',$start_date='',$end_date='')
{


 
 $this->db->select($display_contents);


 $this->db->where($condition);
 // if(!empty($start_date) && !empty($end_date))
 if($interval_unit)
  $this->db->where(" date(created_at) BETWEEN DATE_SUB( CURDATE( ),".$interval_unit." ) AND CURDATE( )");

$data=$this->db->get($this->$table_name)->num_rows();;

return ($data);

}
## count data between current year,month,week data and interval given
function data_current_count($table_name,$display_contents,$condition,$interval_unit,$start_date='',$end_date='')
{


 
 $this->db->select($display_contents);


 $this->db->where($condition);
 // if(!empty($start_date) && !empty($end_date))
   $this->db->where(" date(created_at) between  DATE_FORMAT(CURDATE() ,".$interval_unit.") AND CURDATE()");

$data=$this->db->get($this->$table_name)->num_rows();;


return ($data);

}
## sum data betwwen date and given interval
function data_sum_between_date($table_name,$display_contents,$condition,$interval_unit,$coloumn='created_at',$start_date='',$end_date='')
{
  $this->db->select_sum($display_contents);
 // $this->db->from($this->$table_name);

 $this->db->where($condition);
 // if(!empty($start_date) && !empty($end_date))
  $this->db->where(" date(".$coloumn.") between  DATE_SUB(CURDATE() ,".$interval_unit.") AND CURDATE()");

      $count=$this->db->get($this->$table_name)->row_array();
        if(!is_null($count[$display_contents]))
        {
      return $count[$display_contents];
        }
        else
        {
          $count[$display_contents]=0;
          return $count[$display_contents];
        }
}
## sum data betwwen date and given interval of current year,month,weak
function data_sum_current($table_name,$display_contents,$condition,$interval_unit,$coloumn='created_at',$start_date='',$end_date='')
{


 
 $this->db->select_sum($display_contents);


 $this->db->where($condition);
 // if(!empty($start_date) && !empty($end_date))
   $this->db->where(" date(".$coloumn.") between  DATE_FORMAT(CURDATE() ,".$interval_unit.") AND CURDATE()");

$count=$this->db->get($this->$table_name)->row_array();
  if(!is_null($count[$display_contents]))
        {
      return $count[$display_contents];
        }
        else
        {
          $count[$display_contents]=0;
          return $count[$display_contents];
        }

// return ($data);

}

}
?>