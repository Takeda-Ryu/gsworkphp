<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Hills Like White Elephants</title>
<!--  <link rel="stylesheet" href="library/jquery-emojiarea-master/jquery.emojiarea.css">-->
  <link rel="stylesheet" href="css/index.css">


  <link rel="stylesheet" href="star_rate/jquery.rateyo.min.css"/>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!--  <script src="library/jquery-emojiarea-master/jquery.emojiarea.js"></script>-->


<!--  jQuery UI-->
  <link type="text/css" rel="stylesheet"
  href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
<script type="text/javascript"
  src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
 <!--  jQuery UI-->
<script src="js/index.js"></script>

<!-- rete yo本体 -->
<script type="text/javascript" src="star_rate/jquery.rateyo.min.js"></script>




 </head>
<body>

<!-- Head[Start] -->
<header>




</header>
<!-- Head[End] -->



<!-- Main[Start] -->
<div id="img" >
<img class="animated bounce" src="images/Turtle_Emoji.png" alt="">
</div>




  <!-- <div id="rateYo1"></div> -->

  <div class="Q_title">What is this？</div>



<!-- フォーム部分 ------------------------------------------------------------------------------------------->

<div id="drag" class="form_wrap">
<form method="post" action="insert.php">


     <div class="hash">This is...<input type="text" name="name"><br>

     <!-- <label><input type="hidden" name="email"></label><br> -->
     <p>Reason why</p>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <!-- <input id="star_rate" type="hidden" name="star_rate" value="3"> -->
     <input type="submit" value="answer">

     </div>

</form>
</div>



<div class="data_list"><a href="select.php">someone said...</a></div>
<!-- Main[End] -->


</body>
</html>
