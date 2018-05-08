<!DOCTYPE html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>index</title>
	<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css" />
        <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
    <?php session_start();?>
	<div class="page-wrapper">
            <nav id="sidebar" class="sidebar-wrapper">
              <div class="sidebar-content">
                <a href="#" id="toggle-sidebar"><i class="fa fa-bars"></i></a>
                <div class="sidebar-brand">
                    <a href="#">WELCOME</a>                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="assets/img/user.jpg" alt="">                    </div>
                    <div class="user-info">
                        <span class="user-name"><strong><?php echo "欢迎您&nbsp;".$_SESSION['username']; ?></strong></span>
                        <span class="user-role">user</span>
                        <div class="user-status">                       
                            <a href="#"><span class="label label-success">Off-line</span></a>                        </div>
                    </div>
                </div><!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>                   
                        <div class="input-group">                          
                             <form action="sousuo.php">
						    <span class="input-group-addon"><i class="fa fa-search"></i></span>                         
                            <input type="text" name="sousuo" class="form-control search-menu" placeholder="Search for..."></form>                        </div>
                    </div>                    
                </div><!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu"><span>user  menu</span></li>
                        <li class="sidebar-dropdown">
                            <a  href="#" ><i class="fa fa-tv"></i><span>用户</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="www.baidu.com">登录</a> </li>
                                    <li><a href="#">注册</a></li>
									 <li><a href="#">修改密码</a></li>
                                </ul>
                            </div>
                      </li>                  
                        <li class="sidebar-dropdown">
                            <a href="http://www.baidu.com"><i class="fa fa-photo"></i><span>最新热门</a>                      </li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-bar-chart-o"></i><span>图书分类</span></a>
                            <div class="sidebar-submenu">
                                <ul>

                                    <li><a href="#">文艺</a></li>
                                    <li><a href="#">教育</a></li>
                                    <li><a href="#">理智</a></li>
                                    <li><a href="#">科技</a></li>
                                </ul>
                            </div>
                      </li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-diamond"></i><span>书友会</span></a>                      </li>
					     <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-diamond"></i><span>DIY_YOURBOOK</span></a>                      </li>
                        <li class="header-menu"><span>order menu</span></li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-bar-chart-o"></i><span>购物车</span></a>                      </li>                   
                        <li class="sidebar-dropdown">
                            <a  href="#" ><i class="fa fa-tv"></i><span>订单</span></a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="www.baidu.com">未收货</a> </li>
                                    <li><a href="#">已收货</a></li>
                                </ul>
                            </div>
                      </li>    
                        <li><a href="#"><i class="fa fa-bar-chart-o"></i><span>评价</span></a></li>
                    </ul>
                   </div><!-- sidebar-menu  -->            
                </div>
              <!-- sidebar-content  -->
        
                <div class="sidebar-footer">
                    <a href="#"><i class="fa fa-bell"></i><span class="label label-warning notification">3</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span class="label label-success notification">7</span></a>
                    <a href="#"><i class="fa fa-gear"></i></a>
                    <a href="#"><i class="fa fa-power-off"></i></a>                </div>
            </nav><!-- sidebar-wrapper  -->
            <main class="page-content">
                <?php
if (isset($_POST["submit"])){
	$link = mysqli_connect('localhost','web123','123','db_shop');//链接数据库
    mysqli_set_charset($link,'utf8'); //设定字符集
     $sousuo=$_POST['sousuo'];
      if($sousuo==''){
 echo"<script>alert('搜索不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;
 }
     $sql="select * from td_shangping where bookname='$sousuo'";
	 $mysql="select content from message where title='$sousuo'";
     $result=mysqli_query($link,$sql);
	 $results=mysqli_query($link,$mysql);
     /*mysqli_fetch_array($result);*/
     while ($row = mysqli_fetch_array($result)) {
	     $ibsn=$row['ibsn'];
		 $url=$row['photo'];
		 echo "<form method='POST' action='gwctj.php?ids=$ibsn' name='myform'>";
     	 echo "<table align='center' border='1' width='600'>";
     	 echo "<tr><td width='350px' rowspan='5'><img width=350px src='$url'></td>";
     	 echo "<td>".$row['bookname']."</td></tr>";
     	 echo "<tr><td>"."作者：".$row['writer']."</td></tr>";
     	 echo "<tr><td>"."出版社：".$row['publish']."&nbsp;IBSN:".$ibsn."</td></tr>";
     	 echo "<tr><td>"."图书类型：".$row['type']."&nbsp;价格￥:".$row['price']."</td></tr>";
		 echo "<tr><td>"."<button type='submit' name='submit' >加入购物车</button>"."</td></tr>";
     	 echo "<tr><td colspan='2'>"."简介：".$row['abstract']."</td></tr>";
     	 echo "</table></form>";

     }
	 
}
?>       
         <hr width="90%" color="#00FF33" size="3">
				<div style="padding:0px 40px; margin-left:30px"><span><h3>评&nbsp;论</h3></span></div>
				<hr width="90%" color="#00FF33" size="3">
				<div style="padding:0px 20px; margin-left:30px"><span>
<?php 
         while ($rows = mysqli_fetch_array($results)) {
		 echo $rows['content'];
		 echo"<hr/><br/><br/>";}
?>
               </span></div>
            </main><!-- page-content" -->
        </div><!-- page-wrapper -->
	
	
	<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/js//jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/js/custom.js"></script>
</body>
</html>