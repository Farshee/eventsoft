<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
<?php if($_GET['id']!=''){ 
						$stmt3 = $db->prepare('SELECT * FROM application where id= :com_ && user_id=:user_id ');
						$stmt3->execute(array(':com_' => $_GET['id'],':user_id'=> $_SESSION['user_id']));
						$stmt3->setFetchMode(PDO::FETCH_ASSOC);
						$row3 = $stmt3->fetch();
						
						?>
						
						<?php
						if(isset($_POST['update'])&&$_POST['update']=='content'){	
						try {
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
						$upd_project = $db->prepare	('UPDATE application SET user_id=:user_id, subject=:subject, profile=:profile, summary=:summary, prove=:prove, pcomment=:pcomment, money=:money, raj=:raj, currency=:currency, usd=:usd, vat=:vat, budget=:budget,apply=:apply,reaction=:reaction,bcomment=:bcomment, modified=:modified, created=:created WHERE id = :id');
						$upd_project->execute(array(
						':user_id' => $_SESSION['user_id'], ':profile' => $profile, ':summary' => $summary, ':prove' => $prove, ':subject' => $subject, ':pcomment' => $pcomment, ':money' => $money, ':raj' => $raj, ':currency' => $currency, ':usd' => $usd,':vat' => $vat,':budget' => $budget,':apply' => $apply,':reaction' => $reaction,':bcomment' => $bcomment,':modified'=>time(),':created'=>time(),':id' => $_GET['id']
						));
						$success=$upd_project->rowCount(); // 1
						if($success)echo "<script>location.href='index.php?page=user_list&msg=updated';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
					}
						
						?>
						<div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>বোর্ড সভার আহবান পরিবর্তন</h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">১। বিষয়ের শিরোনাম: <span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="subject" id="editorial" class="form-control" readonly><?php echo $row3['subject'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">২। আলোচ্য বিষয়ের উপস্থাপনকারী কর্মকর্তার নাম, পদবী ও দপ্তর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="profile" type="text"  class="form-control input-md" required value="<?php echo $row3['profile'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৩। আলোচ্য বিষয়ের সারসংক্ষেপ:<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="summary" id="editorial" class="form-control" readonly><?php echo $row3['summary'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৪। বোর্ড সভার উপস্থাপনের যৌক্তিকতা:<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="prove" id="editorial" class="form-control" readonly><?php echo $row3['prove'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৫। বিভিন্ন পরিদপ্তরের / অফিসের মন্তব্য :<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="pcomment" id="editorial" class="form-control" readonly><?php echo $row3['pcomment'];?></textarea></p>
													
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
											<input id="title" name="money" type="text"  class="form-control input-md" required value="<?php echo $row3['money'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">খ. বাঝেট বরাদ্দ : </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(১) রাজস্ব:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="raj" type="text"  class="form-control input-md" required value="<?php echo $row3['raj'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(২) উন্নয়ন:  </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(i) স্থানীয় মুদ্রায় ( সিডি ভ্যাট বাদে) <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="currency" type="text"  class="form-control input-md" required value="<?php echo $row3['currency'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(ii) নগদ বৈদেশিক মুদ্রায় : <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="usd" type="text"  class="form-control input-md" required value="<?php echo $row3['usd'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(iii) সিডি ভ্যাট: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="vat" type="text"  class="form-control input-md" required value="<?php echo $row3['vat'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(৩) বরাদ্দকৃত বাজেটের অদ্যাবধি অবশিষ্টের পরিমাণ:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="budget" type="text"  class="form-control input-md" required value="<?php echo $row3['budget'];?>" readonly>
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail" > ৬। বোর্ড কর্তৃক আলোচ্য বিষয়ের উপর  সিদ্ধান্ত গ্রহণের প্রস্তাব: <span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="apply" id="editorial" class="form-control" ><?php echo $row3['apply'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৭। প্রস্তাবিত সিদ্ধান্তের প্রেক্ষিতে সম্ভাব্য প্রতিক্রিয়া: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<p><textarea name="reaction" id="editorial" class="form-control" ><?php echo $row3['reaction'];?></textarea></p>
													
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৮। সিদ্ধান্ত গ্রহণের নিমিত্তে উপস্থাপনকারী কর্মকর্তার প্রস্তাবের উপর সংশ্লিষ্ট বোর্ড সদস্যের মন্তব্য / সুপারিশ:<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<p><textarea name="bcomment" id="editorial" class="form-control" ><?php echo $row3['bcomment'];?></textarea></p>
													
											</div>
										</div>
										<div class="form-group">
												  <div class="col-md-12" align="right">

													<a href="index.php?page=user_list"><input type="button" name="cancel" align="right pull-right" value="বাতিল" class="btn btn-danger btnw"/></a>
												 
												 <button type="submit"  name="update" value="content" class="btn btn-md btn-success pull-right btnw">পরিবর্তন</button>
												
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
<?  } ?>
</div>                    
						</div>
                    <!-- /#right -->
            </div>
            <!-- /#wrap -->