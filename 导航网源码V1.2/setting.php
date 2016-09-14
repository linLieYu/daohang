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
      if(isset($_POST['submit'])){
          $title=$_POST['title'];
          $keywords=$_POST['keywords'];
          $ms=$_POST['miaoshu'];
        if($title!=''){
          $u="update web set webtitle='$title' where id=1";
          mysqli_query($con,$u);
        }
        if($keywords!=''){
          $u1="update web set keywords='$keywords' where id=1";
          mysqli_query($con,$u1);
        }
        if($ms!=''){
          $u2="update web set miaoshu='$ms' where id=1";
          mysqli_query($con,$u2);
        }
      }
      $linknum=$_POST['linknum'];
      $linkname=$_POST['linkname'];
      $links=$_POST['links'];
      $drop=$_POST['drop'];
      if(isset($_POST['submit1'])){
        if($linknum!=''){
          if($linkname!=''){
          $l="update links set linkname='$linkname' where id=$linknum";
          mysqli_query($con,$l);
        }
          if($links!=''){
          $ls="update links set links='$links' where id=$linknum";
          mysqli_query($con,$ls);
          }
        }
      }
      if(isset($_POST['tj'])){
        if($linkname=='')$linkname='维度空间';
        if($links=='')$links='http://www.2ii.me';
        $tj="INSERT INTO links(linkname,links) VALUES('$linkname','$links')";
        mysqli_query($con,$tj);
      }
      if(isset($_POST['droplink'])){
        if($drop!=''){
        $d="DELETE FROM `links` WHERE `id` = $drop;";
        mysqli_query($con,$d);
        }
      }
      $q="select * from web";
      $r=mysqli_query($con,$q);
      $array=mysqli_fetch_array($r);
     ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $array['3']; ?>">
    <meta name="author" content="<?php echo $array['1']; ?>">
    <meta name="keyword" content="<?php echo $array['4']; ?>">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $array['1']; ?>-设置</title>

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
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              设置
                          </header>
                          <div class="panel-body">
                              <div class="stepy-tab">
                                  <ul id="default-titles" class="stepy-titles clearfix">
                                      <li id="default-title-0" class="current-step">
                                          <div>网站信息</div>
                                      </li>
                                      <li id="default-title-1" class="">
                                          <div>友情链接</div>
                                      </li>
                                      <li id="default-title-2" class="">
                                          <div>版权信息</div>
                                      </li>
                                  </ul>
                              </div>
                              <form class="form-horizontal" id="default" method="post" action="setting.php">
                                  <fieldset title="网站信息" class="step" id="default-step-0">
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">网站标题</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="title" class="form-control">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">网站关键字</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="keywords" class="form-control">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">网站描述</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="miaoshu" class="form-control">
                                          </div>
                                      </div>
                                      <input type="submit" class="finish btn btn-danger" name="submit" value="保存"/>
                                  </fieldset>
                                  <fieldset title="友情链接" class="step" id="default-step-1" >
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">您要修改第几个(编辑友链时用到)</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="linknum" class="form-control" placeholder="这里写友链ID,比如:1 或者2、3、4...">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">友链名称</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="linkname" class="form-control">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">友链地址</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="links" class="form-control" placeholder="需要写http://">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">删除友链(填写友链)</label>
                                          <div class="col-lg-10">
                                              <input type="text" name="drop" class="form-control" placeholder="您要删除第几个友链呢？填写数字即可">
                                          </div>
                                      </div>
                                      <?php
                                        $num="select count(*) from links";
                                        $query=mysqli_query($con,$num);
                                        $num1=mysqli_num_rows($query);
                                        if($num1){
                                          $rs=mysqli_fetch_array($query);
                                          //统计结果
                                          $count=$rs[0];
                                          }else{
                                            $count=0;
                                          }
                                          mysqli_close($con);
                                        echo '<center><h4>你总共添加了'.$count.'个友链</h4></center>';
                                        ?>
                                      <input type="submit" name="droplink" class="finish btn btn-danger" value="删除友链"/>
                                      <input type="submit" name="submit1" class="finish btn btn-danger" value="编辑友链"/>
                                      <input type="submit" name="tj" class="finish btn btn-danger" value="添加友链"/>
                                  </fieldset>
                                  <fieldset title="版权信息" class="step" id="default-step-2" >
                                      <legend> </legend>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">网站制作</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static"><a href="https://www.2ii.me" target="_blank">WeDo</a></p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">作者博客</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static"><a href="http://www.2ii.me" target="_blank">http://www.2ii.me</a></p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">高防主机</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static"><a href="http://www.0y0.cc" target="_blank">http://www.0y0.cc</a></p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">Email Address</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static">i@2ii.me</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">QQ</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static">809099942</p>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-lg-2 control-label">BUG反馈群</label>
                                          <div class="col-lg-10">
                                              <p class="form-control-static">523491245</p>
                                          </div>
                                      </div>
                                  </fieldset>
                                  <input type="submit" class="finish btn btn-danger" value="保存"/>
                              </form>
                          </div>
                      </section>
                  </div>
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
    <script src="js/respond.min.js" ></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/jquery.stepy.js"></script>


  <script>

      //step wizard

      $(function() {
          $('#default').stepy({
              backLabel: '返回',
              block: true,
              nextLabel: '前进',
              titleClick: true,
              titleTarget: '.stepy-tab'
          });
      });
  </script>


  </body>
</html>
