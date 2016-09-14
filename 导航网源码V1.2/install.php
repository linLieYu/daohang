<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
      <title>维度导航安装程序🙄</title>
      <!-- Bootstrap -->
      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-reset.css" rel="stylesheet">
      <!--external css-->
      <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet" />
</head>
<body>
 <form class="form-signin" action="install.php" method="post">
   <h2 class="form-signin-heading">安装</h2>
   <div class="login-wrap">
    数据库地址：<input type="text" class="form-control" name="host" ><br />
    数据库用户名:<input type="text"  class="form-control" name="user"><br />
    数据库密码:<input type="password"  class="form-control" name="psw"><br />
    数据库名称:<input type="text"  class="form-control" name="db" ><br />
    管理员名称:<input type="text"  class="form-control" name="username" ><br />
    管理员密码:<input type="password"  class="form-control" name="password" ><br />
    <button type="submit" class="btn btn-lg btn-login btn-block" name="sub">安装</button>
</form>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
  $lockfile = "install.lock";
  if(file_exists($lockfile)){
  exit("<center>已经安装过了，如果要重新安装请先删除install.lock</center>");
}
if(isset($_POST['sub'])){
    $host=$_POST['host'];
    $user=$_POST['user'];
    $psw=$_POST['psw'];
    $db=$_POST['db'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    @$con=mysqli_connect($host,$user,$psw,$db);
    if(!$con){
      exit('数据库连接失败');
    }
     mysqli_query($con,"set names utf8");
     $sql2=file_get_contents("sql.sql"); //把SQL语句以字符串读入$sql
     $a=explode(";",$sql2); //用explode()函数把‍$sql字符串以“;”分割为数组
     foreach($a as $b){ //遍历数组
     $c=$b.";"; //分割后是没有“;”的，因为SQL语句以“;”结束，所以在执行SQL前把它加上
     mysqli_query($con,$c); //执行SQL语句
     }
     $sql3="INSERT INTO web(webname,webtitle,miaoshu,keywords,QQ,mail,username,password,img) VALUES
     ('维度空间','维度导航 -WeDo','维度导航,最赞的导航程序','维度导航,维度空间,WeDo,维度','809099942','i@2ii.me','$username','$password','http://bizhi.chainwon.com/bd/555.jpg')";
     mysqli_query($con,$sql3);
     mysqli_close($con);
     $fp = fopen("config.php",'w+');
     $config='<?php
   $user="'.$user.'";//数据库用户名
   $pass="'.$psw.'";//数据库密码
   $datebase="'.$db.'";//数据库名
   $sqlhost="'.$host.'";//数据库服务器
   @$con = mysqli_connect($sqlhost,$user,$pass,$datebase);
   if(!$con){
     exit("数据库连接错误");
   }
?>';
     fputs($fp,$config);
     fclose($fp);
     $fp2 = fopen($lockfile, 'w');
     fwrite($fp2,'已安装,需要重新安装请删除install.lock');
     fclose($fp2);
     echo '<center>安装完成,后台地址:'.$_SERVER['host'].'/admin.php</center>';
 }
?>
