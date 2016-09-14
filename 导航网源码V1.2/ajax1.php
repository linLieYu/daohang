<meta charset="utf-8">
<?php
    require('config.php');
    session_start();
    if(isset($_SESSION['ok'])&&$_SESSION['ok']==1){
    }else{
      echo "<script>alert( '(ヾ(o◕∀◕)ﾉ请先登录' ); window.location.href = 'login.php'; </script>";
      exit;
    }
    mysqli_query($con,"set names utf8");
    $ftext=$_POST['ftext'];
    $atext=$_POST['atext'];
    $ltext=$_POST['ltext'];
    $id=$_POST['id'];
    $q="update nav1 set fl='$ftext',nav='$atext',navlinks='$ltext' where id=$id";
    mysqli_query($con,$q);
?>
