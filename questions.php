<?php
session_start();
?>
<!---
Author	:	Chinedu Ukeje
--->
<?php
//$fb = new Facebook\Facebook([
  //'app_id' => '{1825777134387417}',
 // 'app_secret' => '{1209ef0daeac9bd6cbbcb1357577ce30}',
  //'default_graph_version' => 'v2.2',
//]);
 
//$helper = $fb->getRedirectLoginHelper();
 
//try {
  //$accessToken = $helper->getAccessToken();
//} //catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  //echo 'Graph returned an error: ' . $e->getMessage();
 // exit;
//} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
 // echo 'Facebook SDK returned an error: ' . $e->getMessage();
 // exit;
//}
 
//if (! isset($accessToken)) {
 // if ($helper->getError()) {
  //  header('HTTP/1.0 401 Unauthorized');
  //  echo "Error: " . $helper->getError() . "\n";
   // echo "Error Code: " . $helper->getErrorCode() . "\n";
   // echo "Error Reason: " . $helper->getErrorReason() . "\n";
   // echo "Error Description: " . $helper->getErrorDescription() . "\n";
//  } else {
  //  header('HTTP/1.0 400 Bad Request');
   // echo 'Bad request';
 // }
 // exit;
//}
 
// Logged in
// The OAuth 2.0 client handler helps us manage access tokens
//$oAuth2Client = $fb->getOAuth2Client();
 
// Get the access token metadata from /debug_token
//$tokenMetadata = $oAuth2Client->debugToken($accessToken);
 
// Get user’s Facebook ID
//$userId = $tokenMetadata->getField('user_id');
//$userId = $tokenMetadata->getField('name');
//$user = $response->getGraphUser();
 
//$userId = $user['id']; // Retrieve user Id
//$userName = $user['name']; // Retrieve user name

require 'config.php';
	if(!empty($_SESSION['SESS_NAME'])){
     $name = $_SESSION['SESS_NAME'];
     $mid = $_SESSION['SESS_MEMBER_ID'];
	 $category=$_SESSION['SESS_CATEGORY'];
	 $passport=$_SESSION['SESS_PASSPORT'];
	 }else{
	 	$name = $userName;
     $mid = $userId;
	 $category= '1';
	 $passport='file_folder/chinedu.png';
	 
	 }
 
 mysql_query("UPDATE users SET category_id = '$category' WHERE id = '$mid' ")or die(mysql_error());
if(!empty($name)){
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
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.10.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
		<script src="js/countdown.js"></script>
		<style>
			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
		</style>
	</head>
	<body>
	    <header>
           <p class="text-center">
               Responsive Quiz Application Using PHP, MySQL, jQuery, Ajax and Twitter Bootstrap
            
        </header>
        <div id='timer'>
            <script type="application/javascript">
            var myCountdownTest = new Countdown({
                                    time: 60, 
                                    width:200, 
                                    height:80, 
                                    rangeHi:"minute"
                                    });
           </script>
            
        </div>
        
		<div class="container question">
			<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
				<p>
					 <?php echo '<img src="'.$passport.'" width="80" height="120"/><br><b>Welcome : '.$_SESSION['SESS_NAME'].'</b>';?>
				</p>
				<hr>
				<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
					<?php 
					$res = mysql_query("select * from questions where category_id=$category ORDER BY RAND()") or die(mysql_error());
                    $rows = mysql_num_rows($res);
					$i=1;
                while($result=mysql_fetch_array($res)){?>
                    
                    
                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['question_name'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>     
                      
                     <?php }elseif($i<1 || $i<$rows){?>
                     
                       <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>
                       
                       
                       
                        
                        
                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
                    <br/>
                    
                    <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='submit'>Finish</button>
                    </div>
					<?php } $i++;} ?>
					
				</form>
			</div>
		</div>
       <footer>
            <p class="text-center" id="foot">
                &copy; <a href="#" target="_blank">EasySoft</a>2018
            </p>
        </footer>


<?php

if(isset($_POST[1])){ 
   $keys=array_keys($_POST);
   $order=join(",",$keys);
   
   //$query="select * from questions id IN($order) ORDER BY FIELD(id,$order)";
  // echo $query;exit;
   
   $response=mysql_query("select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order)")   or die(mysql_error());
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=mysql_fetch_array($response)){
       if($result['answer']==$_POST[$result['id']]){
               $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
       
   }
   
   
   echo "right_answer : ". $right_answer."<br>";
   echo "wrong_answer : ". $wrong_answer."<br>";
   echo "unanswered : ". $unanswered."<br>";
}
?>
		
		
		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');
		 
		 $(document).on('click','.next',function(){
		     last=parseInt($(this).attr('id'));     
		     nex=last+1;
		     $('#question'+last).addClass('hide');
		     
		     $('#question'+nex).removeClass('hide');
		 });
		 
		 $(document).on('click','.previous',function(){
             last=parseInt($(this).attr('id'));     
             pre=last-1;
             $('#question'+last).addClass('hide');
             
             $('#question'+pre).removeClass('hide');
         });
            
         setTimeout(function() {
             $("form").submit();
          }, 60000);
		</script>
	</body>
</html>
<?php }else{
    
 header( 'Location: index.php' ) ;
      
}
?>