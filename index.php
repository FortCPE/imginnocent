<?php
header("Access-Control-Allow-Origin: *");

     if ( 0 < $_FILES['file']['error'] ) {
         echo 'Error: ' . $_FILES['file']['error'];
     }
     else {
         if(move_uploaded_file($_FILES['file']['tmp_name'],/* 'uploads/' .*/ $_FILES['file']['name'])){
         	echo (md5_file(/*'uploads/'.*/$_FILES['file']['name']));
         	unlink(/*'uploads/'.*/$_FILES['file']['name']);
         }
     }
//   echo "HERE"; 
?>