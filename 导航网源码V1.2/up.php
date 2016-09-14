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
      if(isset($_POST['submit'])){
        $text=$_POST['text'];
        if($text!=''){
          $imgsql="update web set img='$text' where id=1";
          mysqli_query($con,$imgsql);
        }
      }
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
     <link href="assets/dropzone/css/dropzone.css" rel="stylesheet"/>
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
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                    壁纸设置
                  </header>
                  <form action="up.php" class="form-horizontal tasi-form" method="post">
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">全屏背景图片地址</label>
                          <div class="col-sm-10">
                            <textarea class="text" rows="2" name="text" placeholder="拖拽上传图片"></textarea>
                          </div>
                      </div>
                      <div class="col-lg-offset-2 col-lg-10">
                          <button name="submit" type="submit" class="btn btn-danger">保存</button>
                      </div>
                   <br /><br />
                    </form>
              </section>
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
  <script src="js/respond.min.js" ></script>
  <script>var pic=function(e,n,t){return t=function(e){return n.querySelector(e)},t.D={m:function(e){return n.createElement(e)},a:function(e,t){return!t&&(t=e)&&(e=n.body),e.appendChild(t)},c:function(e){return e.cloneNode(1)}},t}(window,document);window.$||($=pic);var UP=function(e){if(window.XMLHttpRequest&&window.FileReader){var n=e("html"),t=e("pace");t||(t=e.D.m("pace"),t.id="pace",e.D.a(t)),n.ondrop=function(e){e.preventDefault(),r(e.dataTransfer.files)};var r=function(n){if(0!=n.length){var t=0,r=n.length,a=function(){var o=n[t];if(0!=o.type.indexOf("image"))return void alert("这不是一个图像或音频！");if(!o.size>2e6)return void alert("请上传小于2MB大小的图像！");var i=new XMLHttpRequest;i.onreadystatechange=function(){if(4==i.readyState){var n=e('textarea[name="text"]');n.value+=(n.value?"\n":"")+"http://ww2.sinaimg.cn/large/"+i.responseText.match(/[\w]{24,32}/)+"\n",t++,t>=r||a()}},i.open("POST","http://x.mouto.org/wb/x.php?up&_r="+Math.random(),1),i.send(o)};a()}}}}(pic),F=$("form"),In=$("textarea");In.onfocus=In.onchange=In.onkeypress=In.onkeyup=function(){var e=this.value.match(/\n/g)||[];this.setAttribute("rows",e.length+6)};</script>
  <!--common script for all pages-->
  <script src="js/common-scripts.js"></script>


</body>
</html>
