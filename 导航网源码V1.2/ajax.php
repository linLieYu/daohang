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
    $atext=$_POST['atext'];
    $ptext=$_POST['ptext'];
    $ltext=$_POST['ltext'];
    $id=$_POST['id'];
    $q="update nav set nav='$atext',navimg='$ptext',navlinks='$ltext' where id=$id";
    mysqli_query($con,$q);
?>
