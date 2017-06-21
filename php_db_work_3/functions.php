<?php
/** 共通で使うものを別ファイルにしておきましょう。*/



//DB接続関数（PDO） ///ローカル環境用
function db_con(){
  $dbname='gs＿db';
  try {
    $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function qerror($stmt){
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}


/**
* chkSSID
* @Param:
* @Return:
*/

function chkSSID(){
    if(
        !isset($_SESSION["chk_ssid"])
        ||
        $_SESSION["chk_ssid"]!=session_id()
    ){
        echo "Login Error.";
        exit;
    }else{

        //新しいセッションIDを発行（前のSESSION IDは無効）
        session_regenerate_id(true);

        $_SESSION["chk_ssid"]  = session_id();
    }
}



//logout処理

function logout(){


      //必ずsession_startは最初に記述
      session_start();

      //SESSIONを初期化（空っぽにする）
      $_SESSION = array();

      //Cookieに保存してある"SessionIDの保存期間を過去にして破棄
      if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
          setcookie(session_name(), '', time()-4200000, '/');
      }

      //サーバ側での、セッションIDの破棄
      session_destroy();

      //処理後、index.phpへリダイレクト
      header("Location: login.php");
      exit();

}



?>
