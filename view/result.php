<?php if($_GET['id']!=''){ 

$stmt3 = $db->prepare('SELECT * FROM application where id= :com_ && user_id=:user_id ');
$stmt3->execute(array(':com_' => $_GET['id'],':user_id'=> $_SESSION['user_id']));
$stmt3->setFetchMode(PDO::FETCH_ASSOC);
$row3 = $stmt3->fetch();

$stmt2 = $db->prepare('SELECT * FROM meeting where id=:thisId');
$stmt2->execute(array(':thisId' => $row3['m_id']));
$row2 = $stmt2->fetch();

?>
<?php if(isset($_POST['submit2'])){
				
					
					
							$board=$_POST['board'];
							$sub_no=$_POST['sub_no'];
							$subject=$_POST['subject'];
							$summary=$_POST['summary'];
                             $meeting=$_POST['meeting'];
                             $decesion=$_POST['decesion'];
							
							
						   
							 $stmt11 = $db->prepare('INSERT INTO result (board,sub_no,subject,summary,meeting, decesion,user_id,publish, modified, created) VALUES (:board,:sub_no,:subject,:summary,:meeting, :decesion,:user_id,:publish,:modified, :created)');
                             $stmt11->execute(array(
                               ':board' => $board, ':sub_no' => $sub_no, ':subject' => $subject, ':summary' => $summary,':meeting' => $meeting,':decesion' => $decesion,':user_id' => $_SESSION['user_id'],':publish' => 1,':modified'=>time(),':created'=>time()
                             ));
							 
							 $success=$stmt11->rowCount();
							 if($success==1)echo "<script>location.href='index.php?page=user_list&msg=result';</script>";
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
								<h5>বোর্ড সভার খসড়া কার্যবিবরণী (মিনিট্স) প্রেরণের নমুনা</h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">(১) বোর্ড সভার নং ও তারিখ:<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="board" type="text"  class="form-control input-md" required readonly value="<?php 
													echo $row2['board']; echo ' & '; echo date("jS F, Y", strtotime($row2['date']));
													?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">(২) আলোচ্য সূচী নং:<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="sub_no" type="text"  class="form-control input-md" required readonly value="<?php echo $row3['id'];?>">
											</div>
										</div>

										<div class="form-group">
												<label class="col-md-2 control-label" for="detail">(৩) আলোচিত বিষয়ের শিরোনাম: <span style="color:#F00;">*</span></label>
												  <div class="col-md-10">
													<p><textarea name="subject" id="editorial" class="form-control" ><?php echo $row3['subject'];?></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
											  <div class="form-group">
												<label class="col-md-2 control-label" for="detail">(৪) বিষয়বস্তুর সারসংক্ষেপ: <span style="color:#F00;">*</span></label>
												  <div class="col-md-10">
													<p><textarea name="summary" id="editorial" class="form-control" ><?php echo $row3['summary'];?></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
											  <div class="form-group">
												<label class="col-md-2 control-label" for="detail">(৫) বোর্ডের আলোচনা: <span style="color:#F00;">*</span></label>
												  <div class="col-md-10">
													<p><textarea name="meeting" id="editorial" class="form-control"></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
											  <div class="form-group">
												<label class="col-md-2 control-label" for="detail">(৬) বোর্ড কর্তৃক গৃহীত সিদ্ধান্ত: <span style="color:#F00;">*</span></label>
												  <div class="col-md-10">
													<p><textarea name="decesion" id="editorial" class="form-control"></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
										<div class="form-group">
												  <div class="col-md-12" align="right">

													<a href="index.php?page=user_list"><input type="button" name="cancel" align="right pull-right" value="বাতিল" class="btn btn-danger btnw"/></a>
												  <?php $pieces = explode(',', $row2['list']);
												foreach($pieces as $lists ){
													if($_GET['id']==$lists){?>
													<button type="submit" id="submit2" name="submit2" class="btn btn-md btn-success pull-right btnw"> প্রেরণ</button>
												<?	}
												} ?>
												  
												  
												  
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
		</div>
		</div>
		</div>
<?  } ?>