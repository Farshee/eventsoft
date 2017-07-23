<?php
	if(isset($_POST['submit1'])){
				
					
					
							$board=$_POST['board'];
							$sarok=$_POST['sarok'];
							$date=$_POST['date'];
							$subject=$_POST['subject'];
							$uname=$_POST['uname'];
							$rank=$_POST['rank'];
							$email=$_POST['email'];
							$mobile=$_POST['mobile'];
							$ref=$_POST['ref'];
                             $detail=$_POST['detail'];
							 $location=$_POST['location'];
							 $decesion=$_POST['decesion'];
                       
							
							 $stmt11 = $db->prepare('INSERT INTO application (board,sarok,date,subject,uname,rank,email,mobile,ref, detail,location,decesion, modified, created) VALUES (:board,:sarok,:date,:subject,:uname,:rank,:email,:mobile,:ref, :detail,:location,:decesion,:modified, :created)');
                             $stmt11->execute(array(
                               ':board' => $board, ':sarok' => $sarok, ':date' => $date, ':subject' => $subject, ':uname' => $uname, ':rank' => $rank, ':email' => $email, ':mobile' => $mobile, ':ref' => $ref,':detail' => $detail,':location' => $location,':decesion' => $decesion,':modified'=>time(),':created'=>time()
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
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>Content deleted successfully!<?php }elseif($msg=='updated'){?> The content has been updated successfully!<?php }elseif($msg=='added'){?>The content has been added successfully!!<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
								<div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>সভার আবেদন</h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">বোর্ড সভার নম্বর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="board" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">স্বারক নম্বর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="sarok" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">তারিখ: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="date" name="date" type="text"  class="form-control input-md" required placeholder="mm/dd/yyyy">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">বিষয়:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="subject" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">উপস্থাপকের নাম: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="uname" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">পদবী:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="rank" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">ইমেইল নম্বর:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="email" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">মোবাইল নম্বর:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="mobile" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">কোন সদ্যসের মাধ্যমে উপস্থাপিত হয়েছে:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="ref" type="text"  class="form-control input-md" required >
											</div>
										</div>
											
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail"> বিষয় বস্তু: <span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="detail" id="editorial" class="form-control"></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">কোন সভায় উপস্থাপন:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="location" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">সিদ্ধান্ত: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="decesion" type="text"  class="form-control input-md" required >
											</div>
										</div>
										<div class="form-group">
												  <div class="col-md-12" align="right">

													
												  <button type="submit" id="submit1" name="submit1" class="btn btn-md btn-danger pull-right btnw">Save</button>
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
	</div>
	</div>
	</div>