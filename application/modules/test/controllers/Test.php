
<?php


class Test extends MY_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Test_model');
    $this->load->model('sms/Sms_model');

  }

  function studentcross(){
#cross controller function
// echo   modules::run('student/Student/crossmoduleadd');   //without argument default value
// echo   modules::run('student/Student/crossmoduleadd',2,5);   //with argument
echo   modules::run('student/Student/crossmoduleadd',20);   //with argument
}

function index()
{
  $params=array(
    'mobile'=>7828161459,
    'msg'=>'i am great'

  );
  $q=$this->Test_model->insert_data("test",$params);
}


function graph()
{
  $q=$this->Test_model->get_student_count();
// var_dump($q);
  print_r(json_encode($q)); 
}
function bar()
{
  $data['_view'] = 'bar';
  $this->load->view('index',$data);
}
function line()
{
  $data['_view'] = 'line';
  $this->load->view('index',$data);
}


function sendarray()
{   
  $f=array('a'=>3,'b'=>5,'c'=>"tret");
  echo modules::run('email/email/sendarray',$f);
}
function tests() 
{
  $emailinfo=array('msg'=>'fsefsf','email'=>null,'subject'=>'admission','student_id'=>2,'module'=>'student','school_id'=>$this->session->SchoolId);
  echo modules::run('email/email/send_email',$emailinfo);
}
function smstest()
{
  $smsinfo=array('user_name'=>'vivek123','password'=>12345,'student_name'=>'vivek','mobile'=>9148725074,'student_id'=>2,'module'=>'student add','school_id'=>$this->session->SchoolId);
  echo modules::run('sms/sms/send_sms',$smsinfo);
}
function templatetests()
{
  $test=$this->Test_model->templatetest(1,"student");
  $r=$test->context;
// echo $r.'<br>';
  $user="vivek";
  $school_name="ssm";
  $password=12345;
  $templatemsg=array('{school_name','{username','{password','}','email');
  $phpmsg=array( $school_name,$user,$password,'','email');
  echo $withoutparam =str_replace($templatemsg, $phpmsg, $r);
// echo str_replace('%username',  $user, $withoutparam );

}
function testschool()
{
  $schoolName= modules::run('admin/admin/getSchoolName',$school_id);
  var_dump($var);
}
function ipadd()
{
echo $IP = $_SERVER['REMOTE_ADDR'];        // Obtains the IP address
// echo $computerName = gethostbyaddr($IP); 
}

function real_ip()
{
// $ipaddress = '';

// $_SERVER['HTTP_CLIENT_IP'])
  $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
// else if($_SERVER['HTTP_X_FORWARDED_FOR'])
//     $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
// else if($_SERVER['HTTP_X_FORWARDED'])
//     $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
// else if($_SERVER['HTTP_FORWARDED_FOR'])
//     $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
// else if($_SERVER['HTTP_FORWARDED'])
//     $ipaddress = $_SERVER['HTTP_FORWARDED'];
// else if($_SERVER['REMOTE_ADDR'])
//     $ipaddress = $_SERVER['REMOTE_ADDR'];
// else
//     $ipaddress = 'UNKNOWN';

  echo $ipaddress;
// echo getHostByName(getHostName());
}
function check()
{
  $data['_view'] = 'checkbox';
  $this->load->view('index',$data);
// calling(1,2);
}   
function calling($a,$b)
{
  echo $a;
  echo $b;

}
function sales()
{
  $data['_view'] = 'sales';
  $this->load->view('index',$data);
}
function sales2()
{
  $data['_view'] = 'sales2';
  $this->load->view('index',$data);
}
function chartall()
{
  $data['_view'] = 'chartall';
  $this->load->view('index',$data);
}
function barchart()
{
  $data['_view'] = 'barchart';
  $this->load->view('index',$data);
}


function upload()
{
  $data['_view'] = 'upload';
  $this->load->view('index',$data);
}
function add ()
{

  $this->load->library('form_validation');
  $config['upload_path']          = './uploads/';
  // $config['allowed_types']        = 'gif|jpg|png';
  $this->load->library('upload', $config);
  // $this->form_validation->set_rules('employee_Name','employee Name','required|max_length[100]');
  // if($this->form_validation->run())     
  // {   
#employ information
    // $params = array(
    //   'name' => $this->input->post('employee_Name'),


    // );
    if($this->upload->do_upload('profile_image'))
    {
      var_dump($data['image'] =  $this->upload->data());
      var_dump( $image_path=rand(1,1000).date('d').$data['image']['raw_name'].$data['image']['file_ext']);
      $params['profile_image']=$image_path;
    }
    // if($this->upload->do_upload('profile'))
    // {
    //   $data['images'] =  $this->upload->data();
    //   $image_path=$data['images']['raw_name'].$data['images']['file_ext'];
    //   $params['profile']=$image_path;
    // }
    // var_dump($params);
  }
 

function form()
{
  $this->load->view('index4');
  $this->load->view('form');
// $data['_view'] = 'form';
  $this->load->view('footer');
}
function e()
{
  var_dump($this->input->post());
}
function edit()
{
// $data['_view'] = 'search';
// $this->load->view('index',$data);
  $this->load->view('edit');
}function search()
{
// $data['_view'] = 'search';
// $this->load->view('index',$data);

  $this->load->view('search');

}
function search2()
{
// $data['_view'] = 'search';
// $this->load->view('index',$data);
  $this->load->view('autocomplete');
}
function fetch()
{
  echo $this->Test_model->fetch_data($this->uri->segment(3));
}
function autocomplete(){
  $keyword=$this->input->post('keyword');
  $data=$this->Test_model->GetRow($keyword);        
  echo json_encode($data);
}
function button()
{
// $this->load->view('button');
  $data['_view'] = 'button';
  $this->load->view('index',$data);
}   
function templatemain()
{
// $this->load->view('button');
// $data['_view'] = 'button';
  $this->load->view('index4');
  $this->load->view('footer');
}  
function templatemain2()
{
// $this->load->view('button');
// $data['_view'] = 'button';
  $this->load->view('index4');
  $this->load->view('dashbord');
  $this->load->view('footer');
}   
function checkinvoice()
{
  $data['_view'] = 'checkinvoice';
  $this->load->view('index',$data);
}
function ba()
{
  $this->load->model('account/Account_model');
  $this->load->Account_model->update_balance(100,63,1)  ;
}
function array()
{
  $data['student']=array();
  $datas=array("aman","swapnil");
  array_push( $data['student'],$datas);
  var_dump( $data['student']);
}
function send_student()
{
  $studentdetails=array(
    'module'=>'student add',
    'user_name'=>'vivek',
    'password'=>'dsp',
    'student_id'=>18,
    'student_name'=>'akash',
    'school_id'=>1,
    'mobile'=>7828161459
  );
// echo modules::run('student/student/addStudentSms',$studentdetails);
  addStudentSms($studentdetails);




}
function addStudentSms($studentDetailsSms)
{
#get student details from $studentdetail
// var_dump($studentDetailsSms);die;
  $module=$studentDetailsSms['module'];
  $username=$studentDetailsSms['user_name'];
  $password=$studentDetailsSms['password'];
  $student_name=$studentDetailsSms['student_name'];
  $student_id=$studentDetailsSms['student_id'];
  $school_id=$studentDetailsSms['school_id'];
  $mobile=$studentDetailsSms['mobile'];
  $school_name='ssm';
  $fetchTemplateData=$this->Sms_model->fetch_template_data($school_id,$module);

  $context=$fetchTemplateData['context'];
  $contextString=array('{school_name','{username','{password','{student_name','}');
  $ReplaceString=array($school_name,$username,$password,$student_name,'');
  $message=str_replace($contextString,$ReplaceString,$context);
#prepair params 
  modules::run('sms/sms/sendSms',$mobile,$message);


#send mail
//sendMail($to,$subject,$body,$attachments)
}
function select()
{
// $data['_view'] = 'select';
// $this->load->view('index',$data);
  $this->load->view('select');
}

function run()
{
  $this->maintain_status_invoice(20,1,63);


}
function maintain_status_invoice($paid,$school_id,$student_id)
{
  $this->db->select('total_amount,amount_paid,status');

  $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
// $this->db->where(array('status'=>'partially'));
// $this->db->or_where('status','pending');
  $this->db->where('status!=','paid');
  $this->db->limit(1);   
  $record=$this->db->get('invoices')->row_array();
  var_dump($record);
  if(is_null($record))
  {
    echo "not found";
  }
  else if($record['status']=='partially')
  {
    $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
    $this->db->where('status','partially');
    $this->db->limit(1);  
    echo  $addition=$record['amount_paid']+$paid;
    if($addition==$record['total_amount'])
    {
      $this->db->set('status',"paid");
      $this->db->set('amount_paid',$record['total_amount']);
      $this->db->update('invoices');
    }
    else if($addition>$record['total_amount'])
    {
      $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
// $this->db->where('status=!','paid');
      $this->db->limit(1);  
      $this->db->set('status',"paid");
      $reamaining=$addition-$record['total_amount'];
      $this->db->set('amount_paid',$record['total_amount']);
      $this->db->update('invoices');


      $this->maintain_status_invoice($reamaining,$school_id,$student_id);
      echo "hh";
    }
    else
    {
      $this->db->set('amount_paid', $addition);
      $this->db->update('invoices');

    }



  }


  elseif($record['total_amount']==$paid)
  {

    $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
    $this->db->where('status=!','paid');
    $this->db->limit(1);  
    $this->db->set('status',"paid");
    $this->db->set('amount_paid',$paid);
    return $this->db->update('invoices');
  }
  else if($record['total_amount']>$paid)
  {
    $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
    $this->db->where('status=!','paid');
    $this->db->limit(1);  
    $this->db->set('status',"partially");
    $this->db->set('amount_paid',$paid);
    return $this->db->update('invoices');

  }
  else if($record['total_amount']<$paid)
  {
    $this->db->where(array('school_id'=>$school_id,'student_id'=>$student_id));
    $this->db->where('status=!','paid');
    $this->db->limit(1);  
    $this->db->set('status',"paid");
    $reamaining=$paid-$record['total_amount'];
    $this->db->set('amount_paid',$record['total_amount']);
    $this->db->update('invoices');


    $this->maintain_status_invoice($reamaining,$school_id,$student_id);
  }




}



function templatetest()
{
  // $this->load->model('sms/Sms_model');
  $module="add student";
  $fetchTemplateData=$this->Test_model->fetch_template_sms(1,$module);
  var_dump($fetchTemplateData);

}

function baltest()
{
  $this->load->model('account/Account_model');
$currentBalance=$this->Account_model->checkPriviousBalance(1,72);
  var_dump($currentBalance);
  if(is_null($currentBalance))
  {
    $status='pending';
  $amount_paid=0;
  }
  if($currentBalance<0)
  {
  $BalanceExtra=(-($currentBalance['balance']));
  if($BalanceExtra==$total)
  {
    $status="paid";
    $amount_paid=$total;
  }
  if($BalanceExtra<$total)
  {
    $status="partially";
    $amount_paid=$BalanceExtra;
  }
  if($BalanceExtra>$total)
  {
    $status="partially";
    $amount_paid=$total;
  }
}

}



function citest()
{
   $query = $this->db->query("select MONTHNAME(created_at) as month,count(id) as count from student LEFT JOIN  map_school_student ON map_school_student.student_id = student.id where school_id=1 group by MONTH(created_at),MONTHNAME(created_at) order by MONTH(created_at) asc");
    var_dump($query->result_array());
}

function citest2()
{


  $this->db->select('MONTHNAME(created_at) as month,count(id) as count');
  $this->db->from('student');
  $this->db->join('map_school_student','map_school_student.student_id = student.id');
  $this->db->where('school_id',1);
  $this->db->group_by('MONTH(created_at),MONTHNAME(created_at)');
  $this->db->order_by('MONTH(created_at)','asc');
  $data=$this->db->get()->result_array();
  var_dump($data);
}

function reciepttemp()
{
    $this->load->view('reciept/one.php');
}

function acctest($query="e")
{

$this->db->select('authentication.username,authentication.autorization_id');
 $this->db->from('authentication');
 $this->db->where("username like '%$query%'");
 var_dump($data=$this->db->get()->row_array());
 switch($data['autorization_id'])
 {
case 4:

$this->db->select('student.name,student.mobile,authentication.username,student.id as student_id');
    $this->db->join('authentication','student.id=authentication.user_id');
     $this->db->where("username like '%$query%'");

$this->db->from('student');
echo '<pre>';
print_r($this->db->get()->result_array());
echo '</pre>';
break;
case 2:

$this->db->select('employees.name,employees.mobile,authentication.username,employees.id as employee_id');
    $this->db->join('authentication','employees.id=authentication.user_id');
     $this->db->where("username like '%$query%'");

$this->db->from('employees');
echo '<pre>';
print_r($this->db->get()->result_array());
echo '</pre>';
break;

}



 }









/*$this->db->select('student.name,student.mobile,authentication.username,student.id as student_id');



    $this->db->from('student');
    // $this->db->join('map','student.id=authentication.user_id');
    $this->db->where("name like '%$query%'");
// $this->db->where("student_name like '%$query%'");
    $this->db->or_where("mobile like '%$query%'");
    $this->db->or_where("username like '%$query%'");
// $query=$this->db->query("select * from student where email like '%$keyword'");
    return $this->db->get()->result_array();*/


//   }

// }




function attendanceview()
{
$this->db->select('*');
$this->db->from('attendance_record');
$this->db->where(array('student_id'=>22));
$this->db->where('date >=',"2018-7-31" );
$this->db->where('date <=',"2018-8-1" );
$data=$this->db->get()->result_array();
var_dump($data);

}
function totalAdmin()

{
  $this->db->from('authentication');
  $this->db->where(array('school_id'=>1,'autorization_id'=>1));
  echo $this->db->get()->num_rows();
}
function totalAdminDetails()

{
  $this->db->from('authentication');
  $this->db->where(array('school_id'=>1,'autorization_id'=>1));
  echo $this->db->get()->num_rows();
  // echo __class__;
}
function map()
{

$geolocation = "21.215831".','."81.454086";
$request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=AIzaSyCxFvUlxVx60IiWs7NTSgkWktWQPs9p6UY'; 
var_dump($file_contents = file_get_contents($request));die;
$json_decode = json_decode($file_contents);
if(isset($json_decode->results[0])) {
    $response = array();
    foreach($json_decode->results[0]->address_components as $addressComponet) {
        if(in_array('political', $addressComponet->types)) {
                $response[] = $addressComponet->long_name; 
        }
    }

    if(isset($response[0])){ $first  =  $response[0];  } else { $first  = 'null'; }
    if(isset($response[1])){ $second =  $response[1];  } else { $second = 'null'; } 
    if(isset($response[2])){ $third  =  $response[2];  } else { $third  = 'null'; }
    if(isset($response[3])){ $fourth =  $response[3];  } else { $fourth = 'null'; }
    if(isset($response[4])){ $fifth  =  $response[4];  } else { $fifth  = 'null'; }

    if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$fourth;
        echo "<br/>Country:: ".$fifth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$third;
        echo "<br/>Country:: ".$fourth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
        echo "<br/>City:: ".$first;
        echo "<br/>State:: ".$second;
        echo "<br/>Country:: ".$third;
    }
    else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>State:: ".$first;
        echo "<br/>Country:: ".$second;
    }
    else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>Country:: ".$first;
    }
  }

}
function maprun()
{
// echo $this->map("21.215831","81.454086");
$data['latitude']="21.215831";
$data['longitude']="81.454086";
// $data['_view'] = 'search';
  $this->load->view('pathmap',$data);
}
function reversegio()
{
   $data['latitude']="21.215831";
$data['longitude']="81.454086";
$data['last_seen']="2 hour ago";
// $data['_view'] = 'search';
  $this->load->view('location',$data);
} 

function getCurrentLocation()
{
  $this->db->select('date,latitude,longitude');
  $this->db->from('apigps');
  $this->db->order_by('date','desc');
  $this->db->where('device_id',123);
  
  $location=$this->db->get()->row_array();
  $data['latitude']=$location['latitude'];
  $data['longitude']=$location['longitude'];
   $this->load->view('search',$data);

  // var_dump($data);

}
function substractdate()
{
//   $delta_time = 7204 ;
//   // echo $delta_time;
//  $hours = floor($delta_time / 3600);
//  // echo $hours;
// $delta_time %= 3600;
// $minutes = floor($delta_time / 60);
// echo $minutes;
//  $strStart = '2013-06-19'; 
//    $strEnd   = '2013-06-22'; 
// $diff=date_diff($strStart,$strEnd);
// echo $diff;
// $start  = date_create('2018-09-20 01:05:25');
// $end = date_create(); // Current time, 05:40
// $diff  = date_diff( $end, $start );
  $this->db->select('date');
  $this->db->from('invoices');
  $ab=$this->db->get()->row_array();
  // echo $ab['date'];die;
// echo $diff->h; // Result: 1
$a='2018-01-30 09:05:25';
date_default_timezone_set('Asia/kolkata');
$start  = date_create($a);
$end = date_create(); // Current time, 05:40
// print_r($end);
$diff  = date_diff( $end, $start );
echo $diff->h.'hour ago' ;
echo $diff->d.'DAYS ago' ;
   // $dteDiff  = $strStart->diff($strEnd); 





   // print $dteDiff->format("%H:%I:%S"); 
// echo "{$hours} hours ago and {$minutes} and minutes";
  // echo time();
  // echo date();
}
function various()
{


   $this->load->view('track');
}
function various2()
{


   $this->load->view('multiple_direction');
}

}
?>
