<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo Projecet_NAME;?></title>
    
    <meta name="description" content="">
    <meta name="author" content="Khandaker Salman Farshee">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="login">

      <div class="form-signin">
    <div class="text-center">
		<img src="assets/img/logo2.jpg" alt="" style="width:90px;" class="img-responsive center-block">
        <h3><?php echo Projecet_NAME;?></h3>
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form enctype="multipart/form-data" method="post" action="index.php" name="loginform" >
                <p class="text-muted text-center">
                   
					<?php
				if (isset($login)) {
					if ($login->errors) {
						echo '<div class="alert alert-warning"><strong>Warning! </strong>';
						foreach ($login->errors as $error){echo $error.' ';}
						echo '</div>';
					}
					if ($login->messages) {
						echo '<div class="alert alert-warning"><strong>Success! </strong>';
						foreach ($login->messages as $message){echo $message.' ';}
						echo '</div>';
					}
				
				}
				?>
                </p>
				
                <input name="user_name" type="text" placeholder="Username" class="form-control top">
                <input name="user_password" type="password" placeholder="Password" class="form-control bottom">
                <div class="checkbox">
		  <label>
		    <input type="checkbox"> Remember Me
		  </label>
		</div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" >Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane" >
            <?php if (!$registration->registration_successful && !$registration->verification_successful) { ?>
			<p class="text-muted text-center">
				<?php
				if (isset($registration)) {
					if ($registration->errors) {
						echo '<div class="alert alert-warning"><strong>Warning! </strong>';
						foreach ($registration->errors as $error){echo $error.' ';}
						echo '</div>';
					}
					if ($registration->messages) {
						echo '<div class="alert alert-warning"><strong>Success! </strong>';
						foreach ($registration->messages as $message){echo $message.' ';}
						echo '</div>';
					}
				
				}
				?>
                </p>
			<form action=""  method="post" name="registerform">
				
                <input type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="username" class="form-control top">
                <input type="email"  name="user_email" placeholder="mail@domain.com" class="form-control middle">
				
                <input type="password"  name="user_password_new" pattern=".{6,}" placeholder="password" class="form-control middle">
                <input type="password" name="user_password_repeat" pattern=".{6,}" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit" name="register">Register</button>
            </form>
			<?php } ?>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>
  </div>


    <!--jQuery -->
    <script src="assets/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.js"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
</body>

</html>
