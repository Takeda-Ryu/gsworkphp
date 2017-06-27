<?php
//0.外部ファイル読み込み
include("functions.php");
session_start();



chkSSID();

$pdo = db_con();
//２．データ登録SQL作成(gs_an_table)     //もし検索フォームからpostされた値があればその値を元にWHEREやLIKEなどで取得する

if(isset($_POST["search"])){

  $stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE name LIKE :title");
  $stmt->bindValue(":title", '%'.$_POST["search"].'%');

} elseif (isset($_GET["clock"])) {


  $stmt = $pdo->prepare("SELECT * FROM gs_an_table  ORDER BY indate DESC ");  //時間の新しい順に並ぶ


}elseif (isset($_GET["asc"])) {

  $stmt = $pdo->prepare("SELECT * FROM gs_an_table  ORDER BY name ASC ");

}elseif (isset($_GET["star"])) {

  $stmt = $pdo->prepare("SELECT * FROM gs_an_table  ORDER BY star_rate DESC ");


}else{

  $stmt = $pdo->prepare("SELECT * FROM gs_an_table  ORDER BY indate DESC ");  //時間の新しい順に並ぶ


}


  $status  = $stmt->execute();

  // $status2 = $stmt2->execute();






//$stmt = $pdo->prepare("SELECT * FROM gs_an_table ORDER BY RAND() LIMIT 1");  //ランダムに一つだけ取得

//３．データ表示
$view="";
if($status==false){
    qerror($stmt);
}else{



    //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){




     //共通のif文の条件  ログインしているユーザーが投稿したものだけ

    $branch =  $_SESSION["id"] == h($result["user_id"]);



    //
    //               function match_ans(){
    //
    //               $that_image = h($result["image"]);  //自分が回答した画像
    //
    //               $stmt       = $pdo->prepare("SELECT * FROM gs_an_table WHERE image LIKE $that_image "); //自分が選択した画像と同じものをデータベースから全て
    //
    //               $status     = $stmt->execute();
    //
    //
    //               if($status==false){
    //
    //                     qerror($stmt);
    //
    //                                 }else{
    //
    //                                         $result = $stmt->fetch();
    //
    //
    //                                      }
    //
    //                                         return $result;
    //
    //
    //                                   }
    //
    //
    //
    //
    //
    // $result = function match_ans();
    //





    $view .= '<p>';
    $view .= '<div class="inner-wrap">';

    $view .= '<a  href="detail.php?id='.h($result["id"]).'">';
    $view .= '<span class="name">';
    $view .= h($result["name"]);
    $view .= "</span>";
    $view .= '</a>';
    $view .= '  ';


if($branch && !$_SESSION["kanri_flg"]=="1"){

    //ログインしているユーザーが投稿したものだけ削除できるようにする

    $view .= '<a href="delete.php?id='.h($result["id"]).'">';
	  $view .= "<span class='dele_btn'>";
    $view .= '<i class="fa fa-trash" aria-hidden="true"></i>';
	  $view .= "</span>";
    $view .= '</a>';


    //管理者は全て削除できる

    }else if($_SESSION["kanri_flg"]=="1"){

    $view .= '<a href="delete.php?id='.h($result["id"]).'">';
    $view .= "<span class='dele_btn'>";
    $view .= '<i class="fa fa-trash" aria-hidden="true"></i>';
    $view .= "</span>";
    $view .= '</a>';

}




// if( $branch ){

    // $result = function match_ans();

    $view .= '<a  href="detail.php?id='.h($result["id"]).'">';
	  $view .= "<span class='edit_btn'>";
    $view .= '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
	  $view .= "</span>";
	  $view .= '</a>';

    $view .= '<a  href="select.php?clock='.h($result["indate"]).'">';
	  $view .= "<span class='clock_btn'>";
    $view .= '<i class="fa fa-clock-o" aria-hidden="true"></i>';
	  $view .= "</span>";
	  $view .= '</a>';

    $view .= '<a  href="select.php?asc='.h($result["name"]).'">';
	  $view .= "<span class='asc_btn'>";
    $view .= '<i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>';
	  $view .= "</span>";
	  $view .= '</a>';

    $view .= '<a  href="select.php?star='.h($result["star_rate"]).'">';
	  $view .= "<span class='star_btn'>";
    $view .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
	  $view .= "</span>";
	  $view .= '</a>';

    $view .= "<span class='star_rate'>";
    $view .= '<div class="rateYo'.h($result["star_rate"]).'"></div>';
	  $view .= "</span>";

//外部化するとしたら配列化してデータ属性を使い、jsに配列を渡してfor文で個数分回す。


    $view .=              '

                  <script>
                  $(function(){

                  $(".rateYo'.h($result["star_rate"]).'").rateYo({

                  starWidth: "10px",
                  readOnly: true,
                  rating: '.h($result["star_rate"]).'

                  });


                  // 色変更
                  $(".rateYo'.h($result["star_rate"]).'").rateYo({
                  ratedFill: "#fff16f"
                  });

                  $(".rateYo'.h($result["star_rate"]).'").rateYo({
                  numStars: 5
                  });

                              });
                  </script>



                          ';


    $view .= '</div>';
    $view .= "</p>";

  // }//if2

  }//while


} //else


?>

<!-- //html//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!DOCTYPE html>
	<html lang="ja">

	<head>

      <meta charset="utf-8">
      <title>data_list</title>

      <link rel="stylesheet" href="css/select.css">
	    <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="star_rate/jquery.rateyo.min.css"/>

      <script src="library/jquery-3.2.1.min.js"></script>
  <!-- rete yo本体 -->
      <script type="text/javascript" src="star_rate/jquery.rateyo.min.js"></script>
      <!-- <script type="text/javascript" src="js/index2js.php"></script> -->

	</head>

	<body id="main">
		<!-- Head[Start] -->
		<header>

      <div class="search">
          <form id="form1" method="post" action="select.php" >
              <input id="search" type="text" name="search">
              <input id="set" type="submit" value="SEARCH">
          </form>
      </div>


		</header>



		<!-- Head[End] -->

		<!-- Main[Start] -->
		<div>
			<div class="del_wrap">
				<?=$view?>
			</div>
		</div>

		<div class="data_inp">
						<a class="navbar-brand" href="index.php">Main Page</a>
		</div>

    <div class="another_wrap">

    </div>

		<!-- Main[End] -->

	</body>

	</html>
