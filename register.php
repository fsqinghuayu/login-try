<!DOCTYPE html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>基于jquery和Bootstrap3的隐藏侧边栏|DEMO_jQuery之家-自由分享jQuery、html5、css3的插件库</title>
	<script type="text/javascript">
 function checkinput()
 {
 if(myform.name.value=="")
 {
 alert("请输入用户名");
 myform.name.focus();
 return false;
 }
 if (myform.pwd.value=="")
 {
 alert("请输入密码");
 myform.pwd.focus();
 return false;
 }

 if(myform.pwd.value != myform.repwd.value){
 alert("你输入的两次密码不一致，请重新输入！");
 myform.pwd.focus();
 return false;
 }
 
 if (myform.email.value=="")
 {
 alert("请输入邮箱");
 myform.email.focus();
 return false;
 }
 
 if (myform.tel.value=="")
 {
 alert("请输入联系方式");
 myform.tel.focus();
 return false;
 }
 
 if (myform.truename.value=="")
 {
 alert("请输入真实姓名");
 myform.truename.focus();
 return false;
 }
 </script>
	<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css" />
        <link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link href="css/hover.css" rel="stylesheet" media="all">
</head>
<body>
<?php session_start();header("Content-type:text/html;charset=utf-8");?>
	<div class="page-wrapper">
            <nav id="sidebar" class="sidebar-wrapper">
              <div class="sidebar-content">
                <a href="#" id="toggle-sidebar"><i class="fa fa-bars"></i></a>
                <div class="sidebar-brand">
                    <a href="#">pro sidebar</a>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="assets/img/user.jpg" alt="">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon <strong>Smith</strong></span>
                        <span class="user-role">Administrator</span>
                        <div class="user-status">                       
                            <a href="#"><span class="label label-success">Online</span></a>                           
                        </div>
                    </div>
                </div><!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>                   
                        <div class="input-group">                          
                            <input type="text" class="form-control search-menu" placeholder="Search for...">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
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
                            <a href="http://www.baidu.com"><i class="fa fa-photo"></i><span>最新热门</a>
                      </li>
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
                            <a href="#"><i class="fa fa-diamond"></i><span>书友会</span></a>
                      </li>
					     <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-diamond"></i><span>DIY_YOURBOOK</span></a>
                      </li>
                        <li class="header-menu"><span>order menu</span></li>
                        <li class="sidebar-dropdown">
                            <a href="#"><i class="fa fa-bar-chart-o"></i><span>购物车</span></a>
                      </li>                   
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
                </div><!-- sidebar-content  -->
        
                <div class="sidebar-footer">
                    <a href="#"><i class="fa fa-bell"></i><span class="label label-warning notification">3</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span class="label label-success notification">7</span></a>
                    <a href="#"><i class="fa fa-gear"></i></a>
                    <a href="#"><i class="fa fa-power-off"></i></a>
                </div>
            </nav><!-- sidebar-wrapper  -->
            <main class="page-content">
                <div class="container-fluid">
                <form method="post" onSubmit="retrun checkinput();" name="myform" action="">
  <h2 class="nomargin-bottom">新用户注册</h2>
  <span class="input input--haruki">
    <input class="input__field input__field--haruki" type="text" name="name" id="input-1" />
    <label class="input__label input__label--haruki" for="input-1">
        <span class="input__label-content input__label-content--haruki">用户名</span>
    </label>
  </span>
  <span class="input input--haruki">
    <input class="input__field input__field--haruki" type="password"  name="pwd" id="input-1" />
    <label class="input__label input__label--haruki" for="input-1">
        <span class="input__label-content input__label-content--haruki">密码</span>
    </label>
  </span>
  <span class="input input--haruki">
    <input class="input__field input__field--haruki" type="password"  name="repwd" id="input-1" />
    <label class="input__label input__label--haruki" for="input-1">
        <span class="input__label-content input__label-content--haruki">确认密码</span>
    </label>
  </span>
  <span class="input input--haruki">
    <input class="input__field input__field--haruki" type="text" name="email" id="input-1" />
    <label class="input__label input__label--haruki" for="input-1">
        <span class="input__label-content input__label-content--haruki">邮箱</span>
    </label>
  </span>
  <span class="input input--haruki">
    <input class="input__field input__field--haruki" type="text" name="tel" id="input-1" />
    <label class="input__label input__label--haruki" for="input-1">
        <span class="input__label-content input__label-content--haruki">联系方式</span>
    </label>
  </span>
  <span class="input input--haruki">
    <input class="input__field input__field--haruki" type="text" name="truename" id="input-1" />
    <label class="input__label input__label--haruki" for="input-1">
        <span class="input__label-content input__label-content--haruki">真实姓名</span>
    </label>
  </span>
  <br/>
<button type="submit" name="submit" class="hvr-radial-out" style="background-color:#FFFFFF">&nbsp;注册</button> 
</form></div>
            </main><!-- page-content" -->
        </div><!-- page-wrapper -->
	
	
	<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="assets/js//jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="assets/js/custom.js"></script>
		
<?php 
if (isset($_POST["submit"])){
$link = mysqli_connect('localhost', 'web123', '123', 'db_shop');
	mysqli_set_charset($link,'utf8');
	$name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $repwd=$_POST['repwd'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $truename=$_POST['truename'];
    if($name==''){

 echo"<script>alert('你的用户名不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;

}
if($pwd==''){

 echo"<script>alert('你的密码不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;

}
if($pwd != $repwd){

 echo"<script>alert('你输入的两次密码不一致，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;

}

if($email==''){

 echo"<script>alert('你的邮箱不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;

}

if($tel==''){

 echo"<script>alert('你的联系方式不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;

}

if($truename==''){

 echo"<script>alert('你的真实姓名不能为空，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;

}

$sql="select name from td_user where name='$name'";
$result=mysqli_query($link,$sql);
$row =mysqli_fetch_array($result);
if(!$row){
$insert_sql="insert into td_user(name,pwd,email,tel,truename)values($name,$pwd,$email,$tel,$truename)";
$sql_result=mysqli_query($link,$insert_sql);
if($sql_result){
echo "<script>alert('您已注册成功，返回登录');location='index.php'</script>";
exit;
 }else{echo "该学生没有添加进数据表，请重新输入。<br>";}
}else{
echo "<script>alert('您输入的用户名已存在,请重新注册！');location='register.php'</script>";
 exit;
}
}
?>
</body>
</html>