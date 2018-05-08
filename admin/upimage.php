<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
header("Content-type:text/html;charset=utf-8");
if (isset($_POST['submit'])) {
    $form_description = $_POST['form_description'];
    $form_data_name = $_FILES['form_data']['name'];
    $form_data_size = $_FILES['form_data']['size'];
    $form_data_type = $_FILES['form_data']['type'];
    $form_data = $_FILES['form_data']['tmp_name'];
    
    $link = mysqli_connect('localhost','web123','123','db_shop');//链接数据库
    mysqli_set_charset($link,'utf8'); //设定字符集
    $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
    //echo "mysqlPicture=".$data;
    
    $sql=("INSERT INTO ccs_image (ibsn,bin_data,filename,filesize,filetype)
                  VALUES ('$form_description','$data','$form_data_name','$form_data_size','$form_data_type')");
	$result=mysqli_query($link,$sql);
    if ($result) {
        echo "图片已存储到数据库";
    } else {
        echo "请求失败,请重试";}}
?>