<?php
  session_start();
  
  // エラーメッセージ
  $errorMessage = "";
  // 画面に表示するため特殊文字をエスケープする
  $viewUserId = htmlspecialchars($_POST["userid"], ENT_QUOTES);

  // ログインボタンが押された場合      
  if (isset($_POST["login"])) {

    // 認証成功
    if ($_POST["userid"] == "hoge" && $_POST["password"] == "hoge") { //初期ではユーザー名hoge パスワードhoge でログインできます
      // セッションIDを新規に発行する
      session_regenerate_id(TRUE);
      $_SESSION["USERID"] = $_POST["userid"];
      header("Location: main.php");
      exit;
    }
    else {
      $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
    }
  }

?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
  </head>
  <body>
  <form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
  <fieldset>
  <legend>ログインフォーム</legend>
  <div><?php echo $errorMessage ?></div>
  <label for="userid">ユーザID</label><input type="text" id="userid" name="userid" value="<?php echo $viewUserId ?>">
  <br>
  <label for="password">パスワード</label><input type="password" id="password" name="password" value="">
  <br>
  <label></label><input type="submit" id="login" name="login" value="ログイン">
  </fieldset>
  </form>
  </body>
</html>