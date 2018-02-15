<?php
	//Start session
	session_start();
	require 'config.php';
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$name = clean($_POST['name']);
	$pass = clean($_POST['pass']);
	$category = clean($_POST['category']);
	
	
	//Create query
	$qry="SELECT * FROM users WHERE user_name = '$name' AND password = '$pass'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not

		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_NAME'] = $member['user_name'];
			$_SESSION['SESS_PASSPORT'] = $member['passport'];
			$_SESSION['SESS_CATEGORY'] = $category;
			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
			session_write_close();
			header("location: questions.php");
			exit();
		}else {
			//Login failed
			header("location: index.php");
			exit();
		}
	
?>