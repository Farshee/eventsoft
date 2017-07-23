<?php
if (version_compare(PHP_VERSION, '5.3.7', '<')) exit('Sorry, this script does not run on a PHP version smaller than 5.3.7 !');
else if (version_compare(PHP_VERSION, '5.5.0', '<')) require_once('controller/libraries/password_compatibility_library.php');
require_once('controller/config/config.php');
require_once('view/translations/en.php');
require_once('controller/libraries/PHPMailer.php');
require_once('controller/classes/Login.php');
require_once('controller/classes/Registration.php');
$login = new Login();
$registration = new Registration();
if ($login->isUserLoggedIn() == true) {
require_once('controller/classes/db.php');
	include('view/_header.php');
	
if($_SESSION['user_type']==1){	
if(isset($_GET['page'])&&strlen($_GET['page'])>1){
	if(file_exists("view/".$_GET['page'].'.php'))include("view/".$_GET['page'].'.php'); else include("view/404.php");
}else include("view/home.php");
include('view/_footer.php');

}elseif($_SESSION['user_type']==2){	
if(isset($_GET['page'])&&strlen($_GET['page'])>1){
	if(file_exists("view/".$_GET['page'].'.php'))include("view/".$_GET['page'].'.php'); else include("view/404.php");
}else include("view/meeting.php");
include('view/_footer.php');
	
}else{
	if(isset($_GET['page'])&&strlen($_GET['page'])>1){
	if(file_exists("view/".$_GET['page'].'.php'))include("view/".$_GET['page'].'.php'); else include("view/404.php");
}else include("view/application.php");
include('view/_footer.php');	
}
	} else include("view/login.php");
?>