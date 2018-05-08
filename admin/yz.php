<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
session_start();
header("Content-type:text/html;charset=utf-8");
if (isset($_POST["submit"])){
$name=$_POST['name'];
$pwd=$_POST['pwd'];
 if($name==''){
 echo "<script>alert('请输入用户名');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
 exit;
 }
 if($pwd==''){
 echo "<script>alert('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
 exit;
 }
 $link = mysqli_connect('localhost','web123','123','db_shop');//链接数据库
 mysqli_set_charset($link,'utf8'); //设定字符集
  $sql_select="select * from td_admin where name='$name' and pwd='$pwd' limit 1"; //从数据库查询信息
 $result=mysqli_query($link,$sql_select);
 $row=mysqli_fetch_array($result);
 if($row){
 $_SESSION['name'] = $name;
echo "<script>alert('欢迎进入e读管理员界面');location='index.php'</script>";
 } else {
   exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
 }}
?>