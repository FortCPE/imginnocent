<?php
header("Access-Control-Allow-Origin: *");
	$host = "us-cdbr-iron-east-03.cleardb.net";
	$user = "b73ff6a945948c";
	$pass = "cfa2a84a";
	$db_name = "heroku_787d7bb33332c9e";
	$connect = mysqli_connect($host,$user,$pass,$db_name);
    if(isset($_GET['upload'])){
    	if ( 0 < $_FILES['file']['error'] ) {
         	echo 'Error: ' . $_FILES['file']['error'];
     	}
     	else {
     	$show = pathinfo($_FILES['file']['name']);
        //echo ($show['extension']);
         	if(move_uploaded_file($_FILES['file']['tmp_name'],/* 'uploads/' .*/ $_FILES['file']['name'])){
	         	if($show['extension'] == 'jpg' || $show['extension'] == 'JPG' || $show['extension'] == 'jpeg' || $show['extension'] == 'JPEG' || $show['extension'] == 'png' || $show['extension'] == 'PNG' || $show['extension'] == 'gif' || $show['extension'] == 'GIF'){
		         	$md5_result = md5_file(/*'uploads/'.*/$_FILES['file']['name']);
		         	$sql = "INSERT INTO tb_img (img_md5, login_id) VALUES ('$md5_result', '1')";
		         	$sql1 = "select img_md5 from tb_img where img_md5='$md5_result'";
		         	$row = mysqli_query($connect, $sql1);
		         	if(mysqli_num_rows($row) > 0){
		         		echo "Image is uploaded";
		         	}else{
		         		mysqli_query($connect, $sql);
		         		echo ("Upload success your md5 is : ".$md5_result);
		         	}
	         	}else{
	         		echo "File isn't supported";
	         	}
         	unlink(/*'uploads/'.*/$_FILES['file']['name']);
        }
     }
    }
    if(isset($_GET['check'])){
    	if ( 0 < $_FILES['file']['error'] ) {
         echo 'Error: ' . $_FILES['file']['error'];
     	}
     else {
         if(move_uploaded_file($_FILES['file']['tmp_name'],/* 'uploads/' .*/ $_FILES['file']['name'])){
         	//echo (explode(".",$_FILES['file']['name']));
         	$md5_result = md5_file(/*'uploads/'.*/$_FILES['file']['name']);
         	//echo ($_FILES['file']['name']);
         	$sql1 = "select img_md5,login_id from tb_img where img_md5='$md5_result'";
         	$row = mysqli_query($connect, $sql1);
         	$who = mysqli_fetch_assoc($row);
         	if(mysqli_num_rows($row) > 0){
         		echo "Not modified Owner is : ".$who["login_id"];
         	}else{
         		echo "Modified or No Data";
         	}
         	unlink(/*'uploads/'.*/$_FILES['file']['name']);
         }
     }
    }
//   echo "HERE"; 
?>