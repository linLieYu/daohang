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
      mysqli_close($con);
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
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="http://ww4.sinaimg.cn/large/a15b4afegw1f6oocidn3oj20jg0jgdhv" alt="">
                              </a>
                              <h1><?php echo $array['7']; ?></h1>
                              <p><?php echo $array['6']; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="#"> <i class="icon-user"></i>站点信息</a></li>
                              <li><a href="https://www.0y0.cc/index.php/" target="_blank"> <i class="icon-bolt"></i>高防主机</a></li>
                              <li><a href="http://t.cn/Rt3Zwj8" target="_blank"> <i class=" icon-comments-alt"></i>加入QQ群</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="bio-graph-heading">
                            维度博客:<a href="http://www.2ii.me" target="_blank">http://www.2ii.me</a>     程序bug反馈群:<a href="http://t.cn/Rt3Zwj8" target="_blank">523491245</a>    <br />低价高防主机:<a href="http://www.0y0.cc/index.php/" target="_blank">http://www.0y0.cc</a>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>站点信息</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>网站名称 </span>: <?php echo $array['1']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>网站标题 </span>: <?php echo $array['2']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>网站描述 </span>: <?php echo $array['3']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>网站关键字</span>: <?php echo $array['4']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>QQ </span>: <?php echo $array['5']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: <?php echo $array['6']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>用户名 </span>: <?php echo $array['7']; ?></p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>导航程序版本号 </span>: WeDoNav 1.0</p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      <section>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="red">导航程序版本</h4>
                                              <br />
                                              <p>WeDoNav 1.0</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="63" data-fgColor="#4CC5CD" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="terques">基于PHP制作 </h4>
                                              <br />
                                              <p>By:WeDo</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="75" data-fgColor="#96be4b" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="green">开源程序</h4>
                                              <br />
                                              <p>助力PHP初学者</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="50" data-fgColor="#cba4db" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="purple">扁平化界面</h4>
                                              <br />
                                              <p>更好的用户体验</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </section>
                  </aside>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
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
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
