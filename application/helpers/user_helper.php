<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('islogged')) {
  function islogged() {
	$CI = & get_instance();
   	$session = $CI->session->userdata('isLogin');
	// if($session == FALSE)
	// 	return false;
	// else
		return true;
  }
}
 function date_change_db($date){
	 if(!empty($date)){
		$exp_date = explode('-',$date);
		if(sizeof($exp_date)>1)
			return $exp_date[2].'-'.$exp_date[1].'-'.$exp_date[0];
	 }
	 else
	 	return;
	}
	function date_change_crud($date){
	 if(!empty($date)){
		$exp_date = explode('/',$date);
		if(sizeof($exp_date)>1)
			return $exp_date[1].'-'.$exp_date[0].'-'.$exp_date[2];
	 }
	 else
	 	return;
	}
	function date_change_view($date){
		if(!empty($date)){
			$exp_date = explode('-',$date);
			if(sizeof($exp_date)>1)
				return $exp_date[2].'/'.$exp_date[1].'/'.$exp_date[0];
		}
		else		
			return;
	}
		
	function endCycle($d1, $months)
    {
        $date = new DateTime($d1);

        // call second function to add the months
        $newDate = $date->add(add_months($months, $date));

        // goes back 1 day from date, remove if you want same day of month
        // $newDate->sub(new DateInterval('P1D')); 

        //formats final date to Y-m-d form
        $dateReturned = $newDate->format('Y-m-d'); 

        return $dateReturned;
    }
    function add_months($months, DateTime $dateObject) 
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            return $dateObject->diff($next);
        } else {
            return new DateInterval('P'.$months.'M');
        }
    }
 ?>