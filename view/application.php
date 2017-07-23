 <?php
$stmt3 = $db->prepare('SELECT * FROM users where user_id= :com_');
$stmt3->execute(array(':com_' => $_SESSION['user_id']));
$stmt3->setFetchMode(PDO::FETCH_ASSOC);
$row3 = $stmt3->fetch();

?>
<?php
	if(isset($_POST['submit1'])){
				
					
							$subject=$_POST['subject'];
							$profile=$_POST['profile'];
							$summary=$_POST['summary'];
							$prove=$_POST['prove'];
							$pcomment=$_POST['pcomment'];
							$money=$_POST['money'];
							$raj=$_POST['raj'];
							$currency=$_POST['currency'];
							$usd=$_POST['usd'];
							 $vat=$_POST['vat'];
							 $apply=$_POST['apply'];
							 $budget=$_POST['budget'];
							 $reaction=$_POST['reaction'];
							 $bcomment=$_POST['bcomment'];
                       
							
							 $stmt11 = $db->prepare('INSERT INTO application (user_id,profile,summary,prove,subject,pcomment,money,raj,currency,usd, vat,budget,apply,reaction,bcomment, modified, created) VALUES (:user_id,:profile,:summary,:prove,:subject,:pcomment,:money,:raj,:currency,:usd, :vat,:budget,:apply,:reaction,:bcomment,:modified, :created)');
                             $stmt11->execute(array(
                              ':user_id' => $_SESSION['user_id'], ':profile' => $profile, ':summary' => $summary, ':prove' => $prove, ':subject' => $subject, ':pcomment' => $pcomment, ':money' => $money, ':raj' => $raj, ':currency' => $currency, ':usd' => $usd,':vat' => $vat,':budget' => $budget,':apply' => $apply,':reaction' => $reaction,':bcomment' => $bcomment,':modified'=>time(),':created'=>time()
                             ));
							 
							 $success=$stmt11->rowCount();
							 if($success==1)echo "<script>location.href='index.php?msg=added';</script>";
							/* echo "ERRORS: <br>";
							foreach($error_file as $error){if($error)echo $error.'<br>';}
							echo "SUCCESS: <br>";
							foreach($files as $success){if($success)echo '<img src="'.$success.'"/><br>';} */ 
				}
	
	
	?>			<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
								<?php
						$msg=$_GET['msg'];

						 if($msg=='added'||$msg=='updated'||$msg=='deleted'){  ?>
						<div class="row">
						<div class="col-md-12">
						<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>Content deleted successfully!<?php }elseif($msg=='updated'){?> The content has been updated successfully!<?php }elseif($msg=='added'){?>বোর্ড সভার আলোচনা পত্র  সফলভাবে প্রস্তাপিত করা হয়েছে<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
								<div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>বোর্ড সভার আলোচনা পত্র</h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">১। বিষয়ের শিরোনাম: <span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="subject" id="editorial" class="form-control"></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">২। আলোচ্য বিষয়ের উপস্থাপনকারী কর্মকর্তার নাম, পদবী ও দপ্তর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="profile" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৩। আলোচ্য বিষয়ের সারসংক্ষেপ:<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="summary" id="editorial" class="form-control"></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৪। বোর্ড সভার উপস্থাপনের যৌক্তিকতা:<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="prove" id="editorial" class="form-control"></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৫। বিভিন্ন পরিদপ্তরের / অফিসের মন্তব্য :<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="pcomment" id="editorial" class="form-control"></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৬। আলোচ্য বিষয়ের: </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">ক. আর্থিক সংশ্লিষ্টতা :<span style="color:#CD1142;">*</span>
											</label>  
											<div class="col-md-8">
											<input id="title" name="money" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">খ. বাঝেট বরাদ্দ : </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(১) রাজস্ব:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="raj" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(২) উন্নয়ন:  </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(i) স্থানীয় মুদ্রায় ( সিডি ভ্যাট বাদে) <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="currency" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(ii) নগদ বৈদেশিক মুদ্রায় : <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="usd" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(iii) সিডি ভ্যাট: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="vat" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(৩) বরাদ্দকৃত বাজেটের অদ্যাবধি অবশিষ্টের পরিমাণ:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="budget" type="text"  class="form-control input-md" required >
											</div>
										</div>
										
										<div class="form-group">
												  <div class="col-md-12" align="right">

													
												  <button type="submit" id="submit1" name="submit1" class="btn btn-md btn-success pull-right btnw">প্রস্থাপন</button>
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
	</div>
	</div>
	</div>