<?php
  require('config.php');
  mysqli_query($con,"set names utf8");
  $q="select * from web";
  $r=mysqli_query($con,$q);
  $array=mysqli_fetch_array($r);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $array['3']; ?>">
    <meta name="author" content="<?php echo $array['1']; ?>">
    <meta name="keyword" content="<?php echo $array['4']; ?>">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $array['1']; ?> -登录</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <div class="login-wrap">
            <input name="user" type="text" class="form-control" placeholder="User ID" autofocus />
            <input name="pass" type="password" class="form-control" placeholder="Password" />
            <label class="checkbox">
                <input type="checkbox" value="remember-me" /> Remember me
            </label>
            <button name="submit" class="btn btn-lg btn-login btn-block" type="submit">登录</button>
            <?php
            session_start();
            $user=$_POST['user'];
            $passw=$_POST['pass'];
            if(isset($_POST['submit'])){
              if($user==''||$passw=''){
                echo '<center> (╯‵□′)╯︵┻━┻ 不准提交空字符</center>';
                exit;
              }
                if($user == $array['7'] && $_POST['pass'] == $array['8']){
                  $_SESSION['ok'] = 1;
                  echo "<script>window.location.href = 'admin.php'</script>";
                }else{
                  echo '<center>o(*≧▽≦)ツ┏━┓>账号或密码错误,请重新输入</center>';
                }
              }
            ?>
        </div>
      </form>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
