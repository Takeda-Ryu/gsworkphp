<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="gs_work.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
  
<!-- JSONデータを表示 -->
<table id="data"></table>  
  

  
<script>
//JSON取得
$.getJSON("rslt.php",function(data) {
    
  
    
    
//        $("#data").append(td);
    }
);
    
console.log("ok");    
</script>      
   
   
    
</body>
</html>




<?php


//$start_time = ;//回答開始時間
//$deci_time =; //回答終了時間
//$tmOfDeci = $deci_time - $start_time;//回答開始から回答終了までにかかった時間
$tmOfDeci = "　秒";
//
//$ans = $_POST["q1"];
//
//echo "<p>".$ans."</p>"


echo "<p>あなたがこの回答を出すまでにかかった時間は".$tmOfDeci."です</p>";

echo "<p>平均回答時間は".$tmOfDeci."です</p>";
    
//初期値
$filename = "data.txt"; //File名
$ar = array();               //配列格納用



//ファイルからデータ取得
$fp = fopen($filename ,'r'); //Fileを読み込み
while($fp && !feof($fp)){          //ファイルの最後行までループを繰り返す
  $txt = fgets($fp);         //1行取得
  $exp = explode(",", $txt); //文字を配列変換
  array_push($ar, $exp);     //$ar配列に$expを追加
}
fclose($fp);


//
//JSON形式に変換
$json = json_encode($ar);   //$ar配列をjsonに変換
echo $json;                 //jsonを表示    
//    







?>