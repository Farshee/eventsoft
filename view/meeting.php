<?php if(isset($_POST['submit2'])){
				
					
					
							$sarok=$_POST['sarok'];
							$board=$_POST['board'];
							$date=$_POST['date'];
							$time=$_POST['time'];
                             $detail=$_POST['detail'];
                             $name=$_POST['name'];
                             $rank=$_POST['rank'];
                             $dept=$_POST['dept'];
							
							$list = implode(',', $_POST['list']);
						   
							 $stmt11 = $db->prepare('INSERT INTO meeting (sarok,board,date,time,user_id, detail,list,name,rank,dept, modified, created) VALUES (:sarok,:board,:date,:time,:user_id, :detail,:list,:name,:rank,:dept,:modified, :created)');
                             $stmt11->execute(array(
                               ':sarok' => $sarok, ':board' => $board, ':date' => $date, ':time' => $time,':user_id' => $_SESSION['user_id'],':detail' => $detail,':list' => $list,':name' => $name,':rank' => $rank,':dept' => $dept,':modified'=>time(),':created'=>time()
                             ));
							 $lastId = $db->lastInsertId();
							 $pieces = explode(',', $list);
							foreach($pieces as $lists ){
							 $stmt21 = $db->prepare('UPDATE application SET m_id= :m_id  WHERE id = :thisID');
							 $stmt21->execute(array( ':m_id' => $lastId,':thisID' =>  $lists ));
							}

							 $success=$stmt11->rowCount();
							 //$success=$stmt11->rowCount();
							 if($success==1)echo "<script>location.href='index.php?msg=added';</script>";
							/* echo "ERRORS: <br>";
							foreach($error_file as $error){if($error)echo $error.'<br>';}
							echo "SUCCESS: <br>";
							foreach($files as $success){if($success)echo '<img src="'.$success.'"/><br>';} */ 
				}
	
	
	?>
			<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
								<?php
						$msg=$_GET['msg'];

						 if($msg=='added'||$msg=='updated'||$msg=='deleted'){  ?>
						<div class="row">
						<div class="col-md-12">
						<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>Content deleted successfully!<?php }elseif($msg=='updated'){?> The content has been updated successfully!<?php }elseif($msg=='added'){?>The content has been added successfully!!<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
								<div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>সভা আহবান</h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">স্মারক নংঃ <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="sarok" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">বোর্ড নংঃ <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="board" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">তারিখঃ <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="demo" name="date" type="text"  placeholder="yyyy/dd/mm" class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group clockpicker">
											<label class="col-md-2 control-label" for="event_id">সময়ঃ <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="clockpicker" name="time" type="text" value=""  class="form-control input-md" required >
											
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">সভার আলোচ্য সূচী: <span style="color:#CD1142;">*</span></label>  
											<?php $stcat = $db->prepare('SELECT * FROM application where m_id=0 ');
											$stcat->execute();
											 ?>
											<div class="col-md-10">
											<ol type="1">
											<?  while($rowcat = $stcat->fetch()){  ?>
											<li><input type="checkbox" name="list[]" value="<?=$rowcat['id'] ;?>"> <?=$rowcat['subject'];?> &nbsp </li>
											<? } ?>
											</ol>
											</div>
										</div>
											
										<div class="form-group">
												<label class="col-md-2 control-label" for="detail"> সদয় অবগতি ও প্রয়োজনীয় ব্যবস্থা গ্রহণের জন্য অনুলিপি প্রেরণ করা হইল: <span style="color:#F00;">*</span></label>
												  <div class="col-md-10">
													<p><textarea name="detail" id="editorial" class="form-control"></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">বোর্ড সভার অনুমোদন কর্মকর্তার  নাম :<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="name" type="text"   class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">বোর্ড সভার অনুমোদন কর্মকর্তার  পদবী :<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="rank" type="text"   class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">বোর্ড সভার অনুমোদন কর্মকর্তার  দপ্তর:<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="dept" type="text"   class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
												  <div class="col-md-12" align="right">

													
												  <button type="submit" id="submit2" name="submit2" class="btn btn-md btn-success pull-right btnw">বোর্ড সভার ঘোষণা</button>
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
		</div>
		</div>
		</div>
