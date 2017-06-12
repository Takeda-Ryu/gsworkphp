<?php

//$ans = $_POST["q1"];
//
//var_dump($ans);
//
//include("php_func.php");
//jp_date();

date_default_timezone_set('Asia/Tokyo');

$timestamp = time();
    
//echo date( "Y/m/d/H/i/s" , $timestamp ) ;
    
$time = date( "s," , $timestamp );

echo $time;

$file = fopen("data.txt","a");	// ファイル読み込み
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $time);
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);


//
//$start_time = date( "i/s" , $timestamp );
//$deci_time =50; 

//$tmOfDeci = $deci_time - $start_time;


//echo "p".$tmOfDeci;

    
 
















?>
