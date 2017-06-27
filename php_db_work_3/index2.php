<?php



include_once("library/paletter-master/colors.inc.php");

$num_results = 1;

$ex=new GetMostCommonColors();
$ex->image="images/robo.png";
$colors=$ex->Get_Color();

$colors_key=array_keys($colors);

$color1 = $colors_key[0];

$color2 = $colors_key[1];

$color3 = $colors_key[2];







// echo "<img src='imges/robo.png'">";
// foreach ($colors as $key => $value) {
//  echo "<p style='background: #$key;'> #$key</p>";
// }







 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body style="background: #<?php echo $color1 ?>;">
  <div class="" style="width: 90px; height: 90px; background-color:#<?= $color2 ?>;">

  <div class="" style="width: 30px; height: 30px; background-color:#<?= $color3 ?>;">

  </div>














   </body>
 </html>
