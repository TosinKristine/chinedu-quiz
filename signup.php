
<!---
Author	:	Chinedu Ukeje
--->

<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<header>
			<p class="text-center">
				Register a new Account
			</p>
		</header>
		<div class="container">
			<div class="row">
				<div class="col-xs-14 col-sm-7 col-lg-7">
					<div class='image'>
						<img src="image/logo.png" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-10 col-sm-5 col-lg-5">
					<div class="intro">
					<?php
						$res = $_GET['res'];
					if( $res == 'true' ){
						echo'<p class="text-center">
							Your Data Has Been Registered, Click <a href="index.php" style="color:#00CCFF">Here</a> to Login and have fun!
						</p>';
						}
						?>
						
						
						<form class="form-signin" method="post" id='signup' name="signin" action="signup_process.php" enctype="multipart/form-data"	>
							<div class="form-group">
								<input type="text" id='name' name='name' class="form-control" placeholder="Enter your Name"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<input type="text" id='pass' name='pass' class="form-control" placeholder="Enter your Password"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<input type="file" id='file' name='image_upload' class="form-control"/>
								<span class="help-block"></span>
							</div>
							<br>
							<button class="btn btn-success btn-block" type="submit">
								Register a Free Account
							</button>
						</form>
					
					</div>
				</div>
			</div>
		</div>
		<footer>
			<p class="text-center" id="foot">
				&copy; <a href="#" target="_blank">EasySoft</a>2018
			</p>
		</footer>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/jquery.validate.min.js"></script>

		<script>
			$(document).ready(function() {
				$("#signup").validate({
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {
						name : {
							required : true,
						},
						pass:{
						    required : true
						}
					},
					messages : {
						name : {
							required : "Please enter your name",
							remote : "Name is already taken, Please choose some other name"
						},
						pass:{
                            required : "Please enter a password"
                        }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
						var num = Math.floor(Math.random() * 6);
						$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>

	</body>
</html>
