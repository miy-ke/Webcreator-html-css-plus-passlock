<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["USERID"])) {
  header("Location: logout.php");
  exit;
}

?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ホームページ作成</title>
    <style>
@import url(https://fonts.googleapis.com/css?family=Raleway:300);

// Mixin below used to center the button. If using in production, remove the mixin and add position relative or absolute to button.

@mixin center($extend: true) {
    @if $extend {
        @extend %center;
    } @else {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
}

%center {
    @include center($extend: false);
}

button{
  @include center;
  background: #2fedcd;
  color: #fff;
  width: 200px;
  height: 60px;
  border: 0;
  font-size: 18px;
  border-radius: 4px;
  font-family: 'Raleway', sans-serif;
  transition: .6s;
  overflow: hidden;
  &:focus{
    outline: 0;
  }
  &:before{
    content: '';
    display: block;
    position: absolute;
    background: rgba(255,255,255,0.5);
    width: 60px;
    height: 100%;
    left: 0;
    top: 0;
    opacity: .5;
    filter: blur(30px);
    transform: translateX(-100px)  skewX(-15deg);
  }
  &:after{
    content: '';
    display: block;
    position: absolute;
    background: rgba(255,255,255,0.2);
    width: 30px;
    height: 100%;
    left: 30px;
    top: 0;
    opacity: 0;
    filter: blur(5px);
    transform: translateX(-100px) skewX(-15deg);
  }
  &:hover{
    background: #338033;
    cursor: pointer;
    &:before{
      transform: translateX(300px)  skewX(-15deg);  
      opacity: 0.6;
      transition: .7s;
    }
    &:after{
      transform: translateX(300px) skewX(-15deg);  
      opacity: 1;
      transition: .7s;
    }
  }
}
.e {
  text-align:left;
}
</style>
  </head>
  <body>
  <center>
  <div class="e">
<?php echo "ようこそ" . $_SESSION["USERID"] . "さん"; ?>
</div>
  <h1>さあ、ホームページ制作を始めましょう!</h1>
  <br>
  <p>使用する言語</p>
  <ul>
  <li>html</li>
  <li>css(必須ではありません)</li>
  <li>javascript(必須ではありません)</li>
  <li>php(必須ではありません)</li>
  </ul>
  <hr>
  <button type="button" class="sample" onclick="next();">開始</button>
  <hr>
  <a href="logout.php">ログアウト</a>
  </center>
  <script>
  function next(){
window.location.href = "./step1.php" ;
  };
  </script>
  </body>
</html>