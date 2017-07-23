<script>
function delete_list(id)  
{
  var stat;
  stat =  confirm("Are you sure to delete this content?");
    if(stat==true){
    if(id !=""){
        location.href="index.php?page=user_list&del="+id;
    }
  }
}

</script>




                    <!-- /#left -->
                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
						<?php
						$msg=$_GET['msg'];
						$msg1=$_GET['msg1'];
						 if($msg=='added'||$msg=='updated'||$msg=='deleted'||$msg=='result'||$msg1=='added'){  ?>
						<div class="row">
						<div class="col-md-12">
						<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>বোর্ড সভার আলোচনা পত্র  বাতিল করা হয়েছে<?php }elseif($msg=='updated'){?> Meeting has been updated successfully!<?php }elseif($msg=='added'){?>বোর্ড সভার আলোচনা পত্র  পরিবর্তন সফলভাবে প্রস্তাপিত করা হয়েছে<?php }elseif($msg=='result'){?>বোর্ড সভার আলোচনা পত্র  ফলাফল সফলভাবে প্রস্তাপিত করা হয়েছে<?php }elseif($msg1=='added'){?>বোর্ড সভার আলোচনা পত্র  ফাইল সংযুক্ত করা হয়েছে<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
						<?php 
						if(isset($_GET['del'])&&strlen($_GET['del'])>0){
						try {
						  $stmt2 = $db->prepare('DELETE FROM application WHERE id = :thisid');
						  $stmt2->bindParam(':thisid', $_GET['del']);
						  $stmt2->execute();
						  $row_check=$stmt2->rowCount();
						   echo "<script>location.href='index.php?page=user_list&msg=deleted';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
						}
						 
						?>
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
													<p><textarea name="subject" id="editorial" class="form-control"><?php echo $row3['subject'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">২। আলোচ্য বিষয়ের উপস্থাপনকারী কর্মকর্তার নাম, পদবী ও দপ্তর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="profile" type="text"  class="form-control input-md" required value="<?php echo $row3['profile'];?>">
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৩। আলোচ্য বিষয়ের সারসংক্ষেপ:<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="summary" id="editorial" class="form-control"><?php echo $row3['summary'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৪। বোর্ড সভার উপস্থাপনের যৌক্তিকতা:<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="prove" id="editorial" class="form-control"><?php echo $row3['prove'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৫। বিভিন্ন পরিদপ্তরের / অফিসের মন্তব্য :<span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="pcomment" id="editorial" class="form-control"><?php echo $row3['pcomment'];?></textarea></p>
													
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
											<input id="title" name="money" type="text"  class="form-control input-md" required value="<?php echo $row3['money'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">খ. বাঝেট বরাদ্দ : </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(১) রাজস্ব:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="raj" type="text"  class="form-control input-md" required value="<?php echo $row3['raj'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(২) উন্নয়ন:  </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(i) স্থানীয় মুদ্রায় ( সিডি ভ্যাট বাদে) <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="currency" type="text"  class="form-control input-md" required value="<?php echo $row3['currency'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(ii) নগদ বৈদেশিক মুদ্রায় : <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="usd" type="text"  class="form-control input-md" required value="<?php echo $row3['usd'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(iii) সিডি ভ্যাট: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="vat" type="text"  class="form-control input-md" required value="<?php echo $row3['vat'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(৩) বরাদ্দকৃত বাজেটের অদ্যাবধি অবশিষ্টের পরিমাণ:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="budget" type="text"  class="form-control input-md" required value="<?php echo $row3['budget'];?>">
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail" > ৬। বোর্ড কর্তৃক আলোচ্য বিষয়ের উপর  সিদ্ধান্ত গ্রহণের প্রস্তাব: <span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="apply" id="editorial" class="form-control" readonly><?php echo $row3['apply'];?></textarea></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৭। প্রস্তাবিত সিদ্ধান্তের প্রেক্ষিতে সম্ভাব্য প্রতিক্রিয়া: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<p><textarea name="reaction" id="editorial" class="form-control" readonly><?php echo $row3['reaction'];?></textarea></p>
													
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৮। সিদ্ধান্ত গ্রহণের নিমিত্তে উপস্থাপনকারী কর্মকর্তার প্রস্তাবের উপর সংশ্লিষ্ট বোর্ড সদস্যের মন্তব্য / সুপারিশ:<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<p><textarea name="bcomment" id="editorial" class="form-control" readonly><?php echo $row3['bcomment'];?></textarea></p>
													
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
						
						
						<?php
						}else{
						
						$project_list = $db->prepare('SELECT * FROM application where user_id=:user_id order by id desc');
						$project_list->execute(array(':user_id' => $_SESSION['user_id'])); 
						$project_list->setFetchMode(PDO::FETCH_ASSOC);
						
						?>
								
						<div class="box">
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>বোর্ড সভা </h5>
							</header>
 
								<div class="table-responsive" style="padding:20px;">
									<table id="example" class="table table-bordered">
									
										<thead style="color:#000">
											<tr>
												<td align="center"><b>SL</b></td>
												<td align="center"><b> বিষয়ের শিরোনাম</b></td>
												<td align="center"><b> বোর্ড সভার  ফলাফল</b></td>
												<td align="center"><b>Files</b></td>
												<td align="center"><b>Edit</b></td>
												<td align="center"><b>Delete</b></td>
											</tr>
										</thead>
										<tbody style="color:#000">
										<?php 
										$sl=1;
										while($row = $project_list->fetch()) { 
										
										
										
										$stmt1 = $db->prepare('SELECT * FROM result where sub_no=:thisid && user_id=:user_id');
										$stmt1->execute(array(':thisid' => $row['id'],':user_id'=> $_SESSION['user_id']));
										$row1 = $stmt1->fetch();
										
										$stmt2 = $db->prepare('SELECT * FROM meeting where id=:thisID');
										$stmt2->execute(array(':thisID' => $row['m_id']));
										$row2 = $stmt2->fetch();
										
										 $stmt_gallery = $db->prepare('SELECT * FROM files WHERE aid = :aid');
                      				  $stmt_gallery->execute(array('aid' => $row['id']));
                      			      $row_num = $stmt_gallery->rowCount();
                      				  $row_g = $stmt_gallery->fetch();
										?>
											<tr>
												<td >
													<?=$sl?>
												</td >
												
												<?php $string = strip_tags($row['subject']);
													if (strlen($string) > 100) {
														$stringCut = substr($string, 0, 80);
														$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
													}
													?>
												<td >
													<a href="#" data-toggle="modal" data-target="#helpModal<?php echo $row['id']; ?>" ><?=$string?></a>
												</td >
												<td align="center">
												<? if($row1['publish']==1){?>
												বোর্ড সভার  ফলাফল  প্রকাশ হয়েছে  <br>
												<button class="btn btn-info" onclick="printContent1('result1<?=$row1['id'];?>')" ><i class="fa fa-print" aria-hidden="true"></i>  প্রিন্ট</button>
												<?  }else{ 
												if($row['m_id']!=0){  ?> 
												<a href="index.php?page=result&id=<?php echo $row['id']; ?>"><button class="btn btn-defult"><i class="fa fa-certificate" style="color:#CD1142;" aria-hidden="true"></i>বোর্ড সভার  ফলাফল প্রকাশ হয়নি</button></a>
												<?  }else{ ?>
												<button class="btn btn-danger">বোর্ড সভার তারিখ প্রকাশ হয়নি</button>
												<?  }} ?>
												</td>
												<td>
												  <? if($row1['publish']==1){?>
												  <p > No. of files: (<?=$row_num?>)</p>
												  <a class="btn btn-md btn-success" href="index.php?page=file&aid=<?=$row['id'];?>" ><i class="fa fa-plus" aria-hidden="true"></i> Add File</a><br><br><br>
												  <a class="btn btn-md btn-danger" href="index.php?page=file&gid=<?=$row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit File</a>
												  <?  }else{?>
												  <p>দুঃখিত,  সম্ভব নয়</p> 
												  <?  }  ?>
												  </td>
												<td align="center">
												<?  if($row['m_id']!=0){ ?>

													<p> <b>বোর্ড সভার তারিখ:</b> <?  echo date("jS F, Y", strtotime($row2['date']));?> </p>
													
												<?   }else{ ?>

												 <a href="index.php?page=user_list&id=<?php echo $row['id']; ?>"><span style="color:#CD1142;" class="glyphicon glyphicon-edit"></span></a>
												<?  } ?>
												 </td>
												
												 
												<td align="center" style="color:#000">
												<?  if($row['m_id']!=0){ ?>
													  <p>দুঃখিত, মুছে ফেলা সম্ভব নয়</p>
													  <?   }else{ ?>
													  <a href="#" onClick="delete_list('<?=$row['id'];?>')" ins="Delete"><span style="color:#F00;" class="glyphicon glyphicon-trash"></span></a>
													  <?  } ?>
													  
													  </td>
											</tr>
											
											
										<?php 
										$sl++; 
										} ?>
										</tbody>
									</table>
								</div>
								</div>
									
								<?php 
										
										} ?> 
                        </div>                    
						</div>
                    <!-- /#right -->
            </div>
            <!-- /#wrap -->
			
			<?php 
						$stmt_form3 = $db->prepare('SELECT * FROM result  where publish=1');
						$stmt_form3->execute();
						$stmt_form3->setFetchMode(PDO::FETCH_ASSOC);
						while($row_form3 = $stmt_form3->fetch()){
						$stmt_form1 = $db->prepare('SELECT * FROM application where id= :com_');
						$stmt_form1->execute(array(':com_' => $row_form3['id']));
						$row_form1 = $stmt_form1->fetch();
						?>
			<div style="display:none;" >
				<div id="result1<?=$row_form3['id']?>" class="row" >
				<table style="width:100%" class="table" >
					<tbody style="font-size:18px;">
						<tr><td  colspan="12"><h3>বোর্ড সভার খসড়া কার্যবিবরণী (মিনিট্স) প্রেরণের নমুনা</h3></td></tr>
						<tr><td  colspan="5"></td><td colspan="3">(১) বোর্ড সভার নং ও তারিখ:</td><td colspan="4">: <?php echo $row_form3['board'];?></td></tr>
						<tr><td  colspan="5"></td><td colspan="3">(২) আলোচ্য সূচী নং:</td><td colspan="4">: <?php echo $row_form1['id'];?></td></tr>
						<tr><td  colspan="5"></td><td colspan="3">(৩) আলোচিত বিষয়ের শিরোনাম: </td><td colspan="4">: <?php echo $row_form3['subject'];?></td></tr>
						<tr><td  colspan="5"></td><td colspan="3">(৪) বিষয়বস্তুর সারসংক্ষেপ:</td><td colspan="4">: <?php echo $row_form3['summary'];?></td></tr>
						<tr><td  colspan="5"></td><td colspan="3">(৫) বোর্ডের আলোচনা: </td><td colspan="4">: <?php echo $row_form3['meeting'];?></td></tr>
						<tr><td  colspan="5"></td><td colspan="3">(৬) বোর্ড কর্তৃক গৃহীত সিদ্ধান্ত:</td><td colspan="4">: <?php echo $row_form3['decesion'];?></td></tr>
						<tr><td colspan="12" style="height:100px;"></td></tr>
<tr class="text-left"><td colspan="4" ></td><td  colspan="4" ></td><td colspan="4"><p ><b style="font-size:16px;">প্রস্তাব উপস্থাপনকারী কর্মকর্তার স্বাক্ষর <br>নাম: <br>পরিচিতি নম্বর: <br>পদবী:  <br>দপ্তর:</b></p></td></tr>
					</tbody>
					</table>
				</div>
			</div>
						<?  }  ?>
<script type="text/javascript">

function printContent1(robi) {
     var printContents = document.getElementById(robi).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	 window.close();
	 window.location="index.php?page=user_list";
}
</script>