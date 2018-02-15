<?php
/*
Author	:	Chinedu Ukeje
 * 
 */
 require_once 'config.php';

 if(!empty($_POST['name'])){
     $name=$_POST['name'];
	 $pass=$_POST['pass'];
	 
if($_FILES['image_upload']['error'] > 0){
    die('An error ocurred when uploading.');
}
if($_FILES['image_upload']['size'] > 500000000){
    die('File uploaded exceeds maximum upload size.');
}
if(file_exists('file_folder/' . $_FILES['image_upload']['name'])){
    die('File with that name already exists.');
}
$image_path = 'file_folder/' . $_FILES['image_upload']['name']; 
 if(!move_uploaded_file($_FILES["image_upload"]["tmp_name"], "file_folder/" . $_FILES["image_upload"]["name"])){
die('error uploading file-check if destination is writable');
   
} 
    
	 $res=mysql_query("insert into users (user_name,score,category_id,passport,password) values('$name','0','1','$image_path','$pass')")or die(mysql_error());
		
     if($res){
         header("location: signup.php?res=true");
     }else{
         echo 'false';
     }
 }
?>