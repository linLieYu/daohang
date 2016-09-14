<?php
  require('config.php');
  mysqli_query($con,"set names utf8");
  $q="select * from web";
  $r=mysqli_query($con,$q);
  $array1=mysqli_fetch_array($r);
  $q1="select * from nav";
  $r1=mysqli_query($con,$q1);
  $i=0;
  $q2="select * from nav1 LIMIT $i,7";
  $r2=mysqli_query($con,$q2);
  $l="select * from links";
  $lsql=mysqli_query($con,$l);
 ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $array1['2']; ?></title>
<meta name="description" content="<?php echo $array1['3']; ?>">
<meta name="author" content="<?php echo $array1['1']; ?>">
<meta name="keyword" content="<?php echo $array1['4']; ?>">
<link href="favicon.ico" type="image/x-icon" rel="icon">
<link type="text/css" rel="stylesheet" href="css/wedo.css" />
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<style>
<?php echo "#bg-over {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(20,29,36,0.1)url(".$array1['img'].") repeat;
    opacity: 1;
    z-index: -10086;
}
"; ?>
</style>
</head>
<body>
  <div id="bg-over"></div>
<!-- top -->
<div id="top">
    <div class="kuandu">
      <div class="logo"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>" title="<?php echo $array1['1']; ?>"><img src="http://ww2.sinaimg.cn/large/a15b4afegw1f6njxv1r12j208202awei" alt="<?php echo $array1['1']; ?>" title="<?php echo $array1['1']; ?>"></a></div>
      <div class="search fr">
        <form target="_blank"  name="submitform2" >
          <input type="text"  id="opentext" onfocus="checkHttps" name="word" autocomplete="off" />
          <input type="submit" class="baidu" value="百度搜索"  onclick="webopen('http://www.baidu.com/baidu','word')">
          <input type="submit" class="haosou" id="so360_submit" value="360搜索" onclick="webopen('http://www.haosou.com/s','q')" />
        </form>
    </div>
  </div>
</div>
<script>
function webopen(url,get) {
window.open(url+'?'+get+'='+$("#opentext").val());
}
</script>

<!-- 分隔符 主要栏目 -->
<div id="icon_list">
  <ul>
    <?php
    while($array2 = mysqli_fetch_array($r1)){
      echo "<li class=\"project\"> <a href=".$array2['3']." title=".$array2['1']." target=_blank> <img alt=".$array2['1']." src=".$array2['2'].">
          <div class=\"title\"><span>".$array2['1']."</span></div>
        </a></li>";
    }
    ?>
  </ul>
</div>
<div class="clear"></div>

<!-- 分隔符 右侧浮动导航 -->
<div id="rfloat">
  <ul>
    <li><a href="http://weibo.com/234099326" title="站长微博" target="_blank">站长微博</a></li>
    <li><a href="tencent://Message/?Uin=<?php echo $array1['5']; ?>" target="_blank">网址提交</a></li>
    <li><a href="tencent://Message/?Uin=<?php echo $array1['5']; ?>" target="_blank">合作洽谈</a></li>
    <li><a href="#">返回顶部</a></li>
  </ul>
</div>

<!-- 导航明细 -->
<div class="nav_list">
  <!--<div class="fl fenlei">视频 · 游戏 · 小说 · 资讯 · 漫画 · 音乐</div>-->
  <div class="category">
    <div class="type video"><font class="yellow text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <a href="#" class="more">更多 &#187;</a></div>
  <div class="category">
    <div class="type game"><font class="yellow text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="game.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type novel"><font class="yellow text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="xiaoshuo.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type news"><font class="yellow text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="xinwen.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type war"><font class="yellow text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="manhua.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type music"><font class="yellow text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="music.html" class="more">更多 &#187;</a>--></div>
</div>
<div class="nav_list">
  <!-- 预留广告位 960*100 -->
  <!--<div class="ad"></div>-->
  <div class="category">
    <div class="type group"> <font class="blue text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <a href="#" class="more">更多 &#187;</a></div>
  <div class="category">
    <div class="type friend"><font class="blue text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="cos.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type women"><font class="blue text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="shouban.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type community"><font class="blue text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    <!--<a href="bbs.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type shopping"><font class="blue text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
        ?>
    </ul>
    </div>
  <div class="category">
    <div class="type bank"><font class="blue text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="jishu.html" class="more">更多 &#187;</a>--></div>
</div>
<div class="nav_list">
  <!-- 预留广告位 960*100 -->
  <!--<div class="ad"></div>-->
  <div class="category">
    <div class="type financial"><font class="purple text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <a href="#" class="more">更多 &#187;</a></div>
  <div class="category">
    <div class="type car"><font class="purple text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="zimu.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type mobile"><font class="purple text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="app.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type digital"><font class="purple text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="boke.html" class="more">更多 &#187;</a>--></div>
    <div class="category">
    <div class="type digital"><font class="purple text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="sheying.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type mail"><font class="purple text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="mail.html" class="more">更多 &#187;</a>--></div>
</div>
<div class="nav_list">
  <!-- 预留广告位 960*100 -->
  <!--<div class="ad"></div>-->
  <div class="category">
    <div class="type sports"><font class="green text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <a href="#" class="more">更多 &#187;</a></div>
  <!--  <div class="category">
    <div class="type tour"><font class="green text">社团</font></div>
    <ul>
      <li><a href="#" target="_blank">深圳地区</a></li>
      <li><a href="#" target="_blank">上海地区</a></li>
      <li><a href="#" target="_blank">北京地区</a></li>
      <li><a href="#" target="_blank">成都地区</a></li>
      <li><a href="#" target="_blank">广州地区</a></li>
      <li><a href="#" target="_blank">杭州地区</a></li>
      <li><a href="#" target="_blank">天津地区</a></li>
    </ul>
    <a href="group.html" class="more">更多 &#187;</a></div>-->
  <div class="category">
    <div class="type caipiao"><font class="green text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    </div>
  <div class="category">
    <div class="type house"><font class="green text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="shenghuo.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type house"><font class="green text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    </div>
  <div class="category">
    <div class="type coolSite"><font class="green text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        $i+=7;
        $q2="select * from nav1 LIMIT $i,7";
        $r2=mysqli_query($con,$q2);
      ?>
    </ul>
    <!--<a href="cool.html" class="more">更多 &#187;</a>--></div>
  <div class="category">
    <div class="type coolSite"><font class="green text"><?php $wedo=mysqli_fetch_row($r2); echo $wedo['1']; mysqli_data_seek($r2,0); ?></font></div>
    <ul>
      <?php
        while($array=mysqli_fetch_array($r2)){
          echo "<li><a href=".$array['3']." target=\"_blank\">".$array['2']."</a></li>";
        }
        mysqli_close($con);
      ?>
    </ul>
    </div>
</div>
<div class="clear"></div>
<div class="footer">
	<div class="link">
		<div class="linktop">
        <span>友情链接</span></div>
		<ul>
    <?php
      while($link=mysqli_fetch_array($lsql)){
        echo "<li><a href=".$link['2']." title=".$link['1']." target=\"_blank\">".$link['1']."</a></li>";
      }
    ?>
  </ul>
	<?php include('justice.php'); ?>
  <center><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260229617'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1260229617%26online%3D1%26show%3Dline' type='text/javascript'%3E%3C/script%3E"));</script></center>
</body>
</html>
