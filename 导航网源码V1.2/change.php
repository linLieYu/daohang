<!DOCTYPE html>
<html lang="en">
  <head>
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
      $sq="select * from web";
      $rs=mysqli_query($con,$sq);
      $array=mysqli_fetch_array($rs);
     ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $array['3']; ?>">
    <meta name="author" content="<?php echo $array['1']; ?>">
    <meta name="keyword" content="<?php echo $array['4']; ?>">
    <link rel="shortcut icon" href="img/favicon.png">
    <title><?php echo $array['1']; ?>-管理后台</title>

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

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="#" class="logo" >We<span>Do</span></a>
          <!--logo end-->
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="http://ww2.sinaimg.cn/large/a15b4afegw1f6oorabpbkj200t00t0k2">
                          <span class="username"><?php echo $array['7']; ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <li><a href="admin.php"><i class="icon-dashboard"></i>仪表盘</a></li>
                          <li><a href="links.php"><i class=" icon-th"></i>导航链接</a></li>
                          <li><a href="setting.php"><i class="icon-cog"></i> 设置</a></li>
                          <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="admin.php">
                          <i class="icon-dashboard"></i>
                          <span>仪表盘</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="icon-th"></i>
                          <span>导航链接</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="linksimg.php">图片导航</a></li>
                          <li><a  href="links.php">文字导航</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="up.php">
                          <i class=" icon-picture"></i>
                          <span>背景上传</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="change.php">
                          <i class=" icon-check"></i>
                          <span>修改密码</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="setting.php">
                          <i class="icon-cogs"></i>
                          <span>设置</span>
                      </a>
                  </li>
                  <li>
                      <a  href="logout.php">
                          <i class="icon-user"></i>
                          <span>退出登录</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              修改密码
                          </header>
                          <div class="panel-body">
                              <form action="change.php" method="post" role="form" class="form-horizontal tasi-form">
                                  <div class="form-group has-success">
                                      <label class="col-lg-2 control-label">现在的密码</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="now" placeholder="" id="f-name" class="form-control">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>
                                  <div class="form-group has-success">
                                      <label class="col-lg-2 control-label">修改密码</label>
                                      <div class="col-lg-10">
                                          <input type="text" name="change" placeholder="" id="f-name" class="form-control">
                                          <p class="help-block"></p>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button name="ok" class="btn btn-danger" type="submit">修改</button>
                                      </div>
                                  </div>
                                  <?php
                                  if(isset($_POST['ok'])){
                                    if(isset($_POST['now']) && isset($_POST['change']) && $_POST['now']!='' && $_POST['change']!=''){
                                      $now=$_POST['now'];
                                      $change=$_POST['change'];
                                        if($now==$array['8']){
                                          $xg="update web set password='$change' where id=1";
                                          mysqli_query($con,$xg);
                                          mysqli_close($con);
                                          echo '修改成功(ヾ(o◕∀◕)ﾉ';
                                        }else{
                                          echo '密码错误(ヾ(o◕∀◕)ﾉ';
                                        }
                                      }else{
                                        echo '(ヾ(o◕∀◕)ﾉ信息为空';
                                      }
                                    }
                                   ?>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <footer class="site-footer">
          <div class="text-center">
            Copyright &copy; 2016-2020 by <a href="https://www.2ii.me">WeDo</a>
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/form-validation-script.js"></script>


  </body>
</html>
