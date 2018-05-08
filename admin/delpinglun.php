<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
$id=$_GET['ids'];
$link = mysqli_connect('localhost','web123','123','db_shop');
mysqli_set_charset($link,'utf8');
$sql="delete from message where id='$id'";
mysqli_query($link,$sql);
header("Refresh:0.5;url=pinglun.php");
?>