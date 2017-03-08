<!doctype html>
<html>
<head>
<title>ホームページ作成</title>
<meta charset="utf-8">
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
</style>
</head>
<body style="text-align:center;">
<h1>ファイルをアップロード</h1>
<p>画像などのファイルをアップロードできます</p>
<p>index.htmlと同じ階層にアップロードされます</p>
<form action="./step3.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upfile">
    <input type="submit" value="決定" class="btn">
</form>
<button type="botton" class="sample" onclick="next();">Next</button>
</form>
<script>
function next(){
window.location.href = "./completion.php" ;
};
</script>
<?php
if($_SERVER['REQUEST_METHOD'] != "POST"){
}else{
try{
        if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
                move_uploaded_file($_FILES['upfile']['tmp_name'], '../'.$_FILES['upfile']['name']);
        }
}catch(Exception $e) {
        echo 'エラー:', $e->getMessage().PHP_EOL;
}
}
?>

</body>
</html>