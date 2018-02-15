<?php
session_start();
?>
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
	
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{1825777134387417}',
      cookie     : true,
      xfbml      : true,
      version    : '{latest-api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=1825777134387417&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<header>
			<p class="text-center">
				Welcome <?php if(!empty($_SESSION['SESS_NAME'])){echo $_SESSION['SESS_NAME'];}?>
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
						<p class="text-center">
							Start The Quiz !
						</p>
						<?php if(empty($_SESSION['SESS_NAME'])){?>
						<form class="form-signin" method="post" id='signin' name="signin" action="login.php">
							<div class="form-group">
								<input type="text" id='name' name='name' class="form-control" placeholder="Enter your Name"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
								<input type="password" id='pass' name='pass' class="form-control" placeholder="Enter your Password"/>
								<span class="help-block"></span>
							</div>
							<div class="form-group">
							    <select class="form-control" name="category" id="category">
							        <option value="">Choose your category</option>
                                  <option value="1">Sports</option>
                                  <option value="2">HTML</option>
                                  <option value="3">PHP</option>
                                  <option value="4">CSS</option>                                
                                </select>
                                <span class="help-block"></span>
							</div>
							
							<br>
							<button class="btn btn-success btn-block" type="submit">
								
								 Have Fun!!
							</button>
						</form>
						
<?php
//facebook login
//$fb = new Facebook\Facebook([
 // 'app_id' => '{1825777134387417}',
  //'app_secret' => '{1209ef0daeac9bd6cbbcb1357577ce30}',
  //'default_graph_version' => 'v2.2',
//]);
 
//$helper = $fb->getRedirectLoginHelper();
 
//$permissions = []; // Optional information that your app can access, such as 'email'
//$loginUrl = $helper->getLoginUrl('https://uchapp.com.ng/questions.php', $permissions);
 
//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook</a>';
?>
						<p>
						<a href="signup.php" style="color:#00CCFF">Signup</a>
						</p>
						<?php }else{?>
						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">
                          
                            
                            <br>
                            <button class="btn btn-success btn-block" type="submit">
                                Countinue Have Fun!!!
                            </button>
                        </form>
						

						<a href="signup.php">Signup</a>
						<?php }?>
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
				$("#signin").validate({
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
						category:{
						    required : true
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
						category:{
                            required : "Please choose your category to start Quiz"
                        },
						pass:{
                            required : "Please enter your password"
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
