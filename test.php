<?php 
 $ipaddress = '';
 
    // if(($_SERVER['HTTP_CLIENT_IP']))
    // {
    //     $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    // }
    // else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    // else if(isset($_SERVER['HTTP_X_FORWARDED']))
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    // else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    //     $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    // else if(isset($_SERVER['HTTP_FORWARDED']))
    //     $ipaddress = $_SERVER['HTTP_FORWARDED'];
    // else if(isset($_SERVER['REMOTE_ADDR']))
    //     $ipaddress = $_SERVER['REMOTE_ADDR'];
    // else
    //     $ipaddress = 'UNKNOWN';
 
    // echo $ipaddress;
  $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        echo $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
   echo $ipaddress.'<br>'; 
   // echo ipconfig();
  echo $localIP = getHostByName(getHostName());
  echo $ipaddress = getenv('REMOTE_ADDR');
 echo $ipaddress = $_SERVER['REMOTE_ADDR'].'<br>';
 echo "Created date is " . date("Y-m-d h:i:s");
 // echo now();
    ?>
    <?php

date_default_timezone_set("Asia/Kolkata");
echo date_default_timezone_get();
     echo $d= date("Y-m-d h:i:s"); ?>