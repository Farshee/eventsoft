<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo Projecet_NAME;?></title>
    
    <meta name="description" content="<?php echo Projecet_NAME;?>">
    <meta name="author" content="Khandaker Salman Farshee">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    
    <!-- animate.css stylesheet -->
     
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css" rel="stylesheet">
	
<? 
error_reporting(E_ERROR | E_PARSE);
$Type="std"; include 'twcm_editor/editor.php';
?>
<script src="assets/lib/jquery/jquery-3.1.1.min.js"></script>
 <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>      
 <script src="ui/js/fileinput.min.js"></script>   
 


  </head>

        <body >
            <div class="bg-brick dk" id="wrap"  style="min-height:650px;" >
                <div id="top" >
                    <!-- .navbar -->
					<style>
					#top .navbar {
						margin-bottom: 0;
						 border-top: none; 
					}
					</style>
                    <nav class="navbar navbar-inverse navbar-static-top" style="background-color:#fff;">
                        <div class="container-fluid">
                    
                    
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <header class="navbar-header">
                    
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="/" class="navbar-brand"><img src="assets/img/logo2.jpg" alt="" style="width:60px;margin-top:-5px;"></a>
                    
                            </header>
                    
                    
                    
                            <div class="topnav">
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                       class="btn btn-default btn-sm" id="toggleFullScreen">
                                        <i class="glyphicon glyphicon-fullscreen"></i>
                                    </a>
                                </div>
                                
                                <div class="btn-group">
                                    <a href="index.php?logout" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom"
                                       class="btn btn-metis-1 btn-sm">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip"
                                       class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    
                                </div>
                    
                            </div>
                    
                    
                    
                    
                            
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <!-- /.navbar -->                        <header class="head">
                                
                                <!-- /.search-bar -->
                            <div class="main-bar" >
                                <h3 style="color:#fff">
              
            <?php echo Projecet_NAME;?>
          </h3>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <!-- /.head -->
                </div>
                <!-- /#top -->
                    <div id="left" >
                        <div class="media user-media bg-brick dk">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    
                                </a>
                        
                                <div class="media-body">
                                    <h5 class="media-heading">Welcome</h5>
                                    <ul class="list-unstyled user-info">
                                        <li><?php echo htmlspecialchars($_SESSION['user_name'])?></li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
						<!-- #menu -->
                        <ul id="menu" class="bg-orange dker">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  <?php if($_SESSION['user_type']==1){ ?>
								  <li <?php if($_GET['page']==''){ ?>class="active" <? } ?>>
                                    <a href="/">
                                      <i class="fa fa-users"></i><span class="link-title">&nbsp; সদ্যসের   তালিকা</span>
                                    </a>
                                  </li>
								  
								  <?php }elseif($_SESSION['user_type']==2){ ?>
								  <li <?php if($_GET['page']==''){ ?>class="active" <? } ?>>
                                    <a href="/">
                                      <i class="fa fa-plus"></i><span class="link-title">&nbsp; নতুন বোর্ড সভা</span>
                                    </a>
                                  </li>
                                  <li <?php if($_GET['page']=='cor_list'){ ?>class="active" <? } ?>>
                                        <a href="index.php?page=cor_list">
                                          <i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; বোর্ড সভার  তালিকা</a>
                                  </li>
								  
                                  <?php  }else{ ?>
								  <li <?php if($_GET['page']==''){ ?>class="active" <? } ?>>
                                    <a href="/">
                                      <i class="fa fa-plus"></i><span class="link-title">&nbsp; নতুন বোর্ড সভার  আহবান</span>
                                    </a>
                                  </li>
								  <li <?php if($_GET['page']=='user_list'){ ?>class="active" <? } ?>>
                                        <a href="index.php?page=user_list">
                                          <i class="fa fa-desktop" aria-hidden="true"></i>&nbsp; বোর্ড সভার আলোচনা পত্র তালিকা</a>
                                  </li>
								  
								  <?php  } ?>
                                      
                                    </ul>
                                  </li>
                                </ul>
                        <!-- /#menu -->
                    </div>