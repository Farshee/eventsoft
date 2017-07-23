<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>php-login-advanced</title>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo Projecet_NAME;?></title>

    <!-- Bootstrap core CSS -->
    <link href="ui/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ui/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->   
    <link href="ui/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ui/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
body{background-color:#7B0003;}
.topcontent{font-size:32px;}
.toplogo{text-align:center; text-align:-moz-center; text-align:-webkit-center; padding-top:10px;}
.btncolor{background-color:#449D44; color:#FFF;}
.checkbox label, .radio label{padding-left:23px;}
.form-control,.input-group-addon{border: 1px solid #807979;}
.mail{color:#7B0003;}
.mail:hover{text-decoration:none;}
.footlogo{text-align:right; text-align:-moz-right; text-align:-webkit-right;}
@media (max-width: 991px) {
	.footlogo{padding-bottom:15px;}
	.topcontent{font-size:26px;}
}
</style>
</head>
<body>



<div class="container">
	<div class="row">
    	<div class="col-md-12" style="text-align:center; color:#FFF;">
        	<h1 class="topcontent"><b>Twister Web Content Manager for <br> <?php echo Projecet_NAME;?></b></h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-4"></div>
        <div class="col-md-4" style="background-color:#E6DADC; border-radius:3%;">
        	<p class="toplogo"><img src="ui/img/TM-Logo.gif" class="img-responsive"></p>
        	<h3 style="text-align:center"><b>Password Reset</b></h3>
<?php if ($login->passwordResetLinkIsValid() == true) { ?>
<form method="post" action="password_reset.php" name="new_password_form">
    <input type='hidden' name='user_name' value='<?php echo htmlspecialchars($_GET['user_name']); ?>' />
    <input type='hidden' name='user_password_reset_hash' value='<?php echo htmlspecialchars($_GET['verification_code']); ?>' />

    <label for="user_password_new"><?php echo WORDING_NEW_PASSWORD; ?></label>
    <input id="user_password_new" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="user_password_repeat"><?php echo WORDING_NEW_PASSWORD_REPEAT; ?></label>
    <input id="user_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <input type="submit" name="submit_new_password" value="<?php echo WORDING_SUBMIT_NEW_PASSWORD; ?>" />
</form>
<!-- no data from a password-reset-mail has been provided, so we simply show the request-a-password-reset form -->
<?php } else { ?>
<form method="post" action="password_reset.php" name="password_reset_form">
    <label for="user_name"><?php echo WORDING_REQUEST_PASSWORD_RESET; ?></label>
    <input id="user_name" type="text" name="user_name" required />
    <input type="submit" name="request_password_reset" value="<?php echo WORDING_RESET_PASSWORD; ?>" />
</form>
<?php } ?>
<div>
<a href="index.php"><?php echo WORDING_BACK_TO_LOGIN; ?></a>
</div>

<span style="color:#7B0003;">For Support</span><hr style="border-top:1px solid #7B0003; margin-top:0px; margin-bottom:10px;opacity:.5;">
            <p>
            	<span style="font-size:22px;">Contact us</span><br>
                <span style="color:#7B0003;"><i class="fa fa-phone" aria-hidden="true"></i> +880258610418, +8801819214616<br>
                <a href="mailto:contact@twistermedia.com" class="mail"><i class="fa fa-envelope" aria-hidden="true"></i> contact@twistermedia.com</a><br>
                <a href="http://twistermedia.com" class="mail" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> www.twistermedia.com</a></span>
            </p>
            <p class="footlogo"><img src="ui/img/tm-logo.png" class="img-responsive"></p>
        </div>
        <div class="col-md-4"></div>
    </div>
</div><!--container end-->



<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->    
    <script src="ui/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
