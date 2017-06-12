<?php






//日本の現在時刻を取得


function jp_date(){

date_default_timezone_set('Asia/Tokyo');

$timestamp = time();
    
//echo date( "Y/m/d/H/i/s" , $timestamp ) ;
    
$time = date( "i分s秒" , $timestamp );


 
    
    }

 ?>
