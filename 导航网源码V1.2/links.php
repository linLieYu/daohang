<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      require('config.php');
      session_start();
      if(isset($_SESSION['ok'])&&$_SESSION['ok']==1){
      }else{
        echo "<script>alert( '(ヾ(o◕∀◕)ﾉ请先登录' ); window.location.href = 'login.php'; </script>";
        exit;
      }
        mysqli_query($con,"set names utf8");
        $q="select * from web";
        $r=mysqli_query($con,$q);
        $array1=mysqli_fetch_array($r);
        $q1="select * from nav1";
        $r1=mysqli_query($con,$q1);
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $array1['3']; ?>">
    <meta name="author" content="<?php echo $array1['1']; ?>">
    <meta name="keyword" content="<?php echo $array1['4']; ?>">
    <link rel="shortcut icon" href="img/favicon.png">
    <title><?php echo $array1['1']; ?>-管理后台</title>

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
                            <span class="username"><?php echo $array1['7']; ?></span>
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
                              网址导航(ctrl+f搜索)
                          </header>
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="  icon-bookmark-empty"></i> 分类</th>
                                  <th><i class=" icon-bolt"></i> 网址名称</th>
                                  <th><i class=" icon-globe"></i> 导航链接</th>
                                  <th><i class="  icon-star"></i> 状态</th>
                                  <th><i class=""></i></th>
                                  <th></th>
                              </tr>
                            </thead>
                              <tbody>
                                <?php
                                $h=1;
                                  while($array = mysqli_fetch_array($r1)){
                                    echo "<tr x-id=".$array['0'].">
                                          <div data-role=\"fieldcontain\">
                                          <td>".$array['1']."</td>
                                          <td><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></td>
                                          <td class=\"hidden-phone\" type=\"text\">".$array['3']."</td>
                                          <td><span class=\"label label-success label-mini\">true</span></td>
                                        <td>
                                            <button class=\"btn btn-success btn-xs x-submit\" type=\"submit\"><i class=\"icon-ok\"></i></button>
                                            <button class=\"btn btn-primary btn-xs x-edit\"><i class=\"icon-pencil\"></i></button>
                                            <button class=\"btn btn-danger btn-xs\"><i class=\"icon-trash \"></i></button>
                                        </td>
                                      </div>
                                    </tr>";
                                  }
                                  mysqli_close($con);
                                    ?>
                              </tbody>
                          </table>
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
            Copyright &copy; 2016-2020 by <a href="http://www.2ii.me">WeDo</a>
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
    <script type="text/javascript">
			$(document).ready(function() {
				//edit
				$("button.x-edit").bind("click", function() {
					var nodes = this.parentNode.parentNode.children;
					//取值&賦值
					//1
          var ftext = nodes[0].innerText;
					nodes[0].innerHTML = '<input type="text" value="' + ftext + '"></input>';
					//2
          var atext = nodes[1].children[0].innerText;
          nodes[1].innerHTML = '<input type="text" value="' + atext + '"></input>';
					//3
					var ltext = nodes[2].innerText;
					nodes[2].innerHTML = '<input type="text" value="' + ltext + '"></input>';
				});
				//submit
				$("button.x-submit").bind("click", function() {
					var nodes = this.parentNode.parentNode.children;

					if(nodes[1].children[0] != undefined) {
						//取值
						//1
						var ftext = nodes[0].children[0].value;
						//2
						var atext = nodes[1].children[0].value;
						//3
						var ltext = nodes[2].children[0].value;

						//此處調用的  this.parentNode.parentNode.getAttribute('x-id'), atext, ltext, ptext  即需要用ajax提交到action的四個值
						//alert('请确认您修改的第【' + this.parentNode.parentNode.getAttribute('x-id') + '】条数据：\n' + atext + ', ' + ltext + ', ' + ptext);

						//注意！！！以下邏輯應當放到ajax的回調函數中，需根據實際情形修改
						isEdit = $.ajax({data: {id: this.parentNode.parentNode.getAttribute('x-id'),ftext:ftext,atext: atext, ltext: ltext },type:'POST',url:"ajax1.php",async:false});

						if(isEdit == 'undefined') { //若未成功，將三個需要顯示的值替換為ajax返回的從數據庫中取得的值（此下為模擬值）
							alert('编辑失败！！(；′⌒`)');
							ftext = '未成功';
							atext = '未成功';
							ltext = '未成功';
						}
						//Ps. 以上判定儘為模擬，實際情形中提交時，還應當判定是否為空字符串，是否剔除首尾空格，url是否合法等

						//賦值
						//1
            nodes[0].innerHTML = ftext;
						//2
            nodes[1].innerHTML = '<a href="' + ltext + '">' + atext + '</a>';
						//3
						nodes[2].innerHTML = ltext;
					}
				});
			});
		</script>
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

  </body>
</html>
