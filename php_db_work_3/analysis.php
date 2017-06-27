<?php


session_start();


$color1 = $_SESSION["color1"];

$color2 = $_SESSION["color2"];

$color3 = $_SESSION["color3"];

$color4 = $_SESSION["color4"];

$name = $_SESSION["name"];

$naiyou = $_SESSION["naiyou"];






 ?>




 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="css/analysis.css">
     <script src="library/jquery-3.2.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
   </head>
   <body>


     <canvas id="myChart"></canvas>


     <script type="text/javascript">



     var ctx = document.getElementById('myChart').getContext('2d');

     var myChart = new Chart(ctx, {


    type: 'bar',
    data: {
      labels: ['COLORS'],
      datasets:

      [{
        label: 'FIRST COLOR',
        data: [25, 19,10],
        backgroundColor: "#<?=$color1?>"
      },

      {
        label: 'SECOND COLOR',
        data: [18, 29,10],
        backgroundColor: "#<?=$color2?>"
      },

      {
        label: 'THIRD COLOR',
        data: [15, 29,10],
        backgroundColor: "#<?=$color3?>"
      },
      {
        label: 'FORTH COLOR',
        data: [9, 29,10],
        backgroundColor: "#<?=$color4?>"
      }]
    }
  });



</script>


<form class="" action="" method="post">

<div class="naiyou">
<input type="text" name="name" value=<?=$name?> readonly="readonly">
</div>



<div class="naiyou">

  <label><textArea name="naiyou" rows="4" cols="40" readonly="readonly">
  <?=$naiyou?>
  </textArea></label><br>

</div>


</form>

   </body>
 </html>
