<script>
function delete_list(id)  
{
  var stat;
  stat =  confirm("Are you sure to delete this content?");
    if(stat==true){
    if(id !=""){
        location.href="index.php?page=list&del="+id;
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

						 if($msg=='added'||$msg=='updated'||$msg=='deleted'){  ?>
						<div class="row">
						<div class="col-md-12">
						<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>Meeting Cancel successfully!<?php }elseif($msg=='updated'){?> Meeting has been updated successfully!<?php }elseif($msg=='added'){?>Meeting has been added successfully!!<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
						<?php 
						if(isset($_GET['del'])&&strlen($_GET['del'])>0){
						try {
						  $stmt2 = $db->prepare('DELETE FROM application WHERE user_id = :thisid');
						  $stmt2->bindParam(':thisid', $_GET['del']);
						  $stmt2->execute();
						  $row_check=$stmt2->rowCount();
						   echo "<script>location.href='index.php?page=list&msg=deleted';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
						}
						?>
						<?php if($_GET['id']!=''){ 
						$stmt3 = $db->prepare('SELECT * FROM application where id= :com_');
						$stmt3->execute(array(':com_' => $_GET['id']));
						$stmt3->setFetchMode(PDO::FETCH_ASSOC);
						$row3 = $stmt3->fetch();
						
						?>
						
						<?php
						if(isset($_POST['update'])&&$_POST['update']=='content'){	
						try {
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
						$upd_project = $db->prepare	('UPDATE application SET board=:board, sarok=:sarok, date=:date, subject=:subject, uname=:uname, rank=:rank, email=:email, mobile=:mobile, ref=:ref, detail=:detail, location=:location, decesion=:decesion, modified=:modified, created=:created WHERE id = :id');
						$upd_project->execute(array(
						':board' => $board, ':sarok' => $sarok, ':date' => $date, ':subject' => $subject, ':uname' => $uname, ':rank' => $rank, ':email' => $email, ':mobile' => $mobile, ':ref' => $ref,':detail' => $detail,':location' => $location,':decesion' => $decesion,':modified'=>time(),':created'=>time(),':id' => $_GET['id']
						));
						$success=$upd_project->rowCount(); // 1
						if($success)echo "<script>location.href='index.php?page=list&msg=updated';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
					}
						
						?>
						<div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>Update বোর্ড সভা </h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">বোর্ড সভার নম্বর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="board" type="text"  class="form-control input-md" required value="<?php echo $row3['board'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">স্বারক নম্বর: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="sarok" type="text"  class="form-control input-md" required value="<?php echo $row3['sarok'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">তারিখ: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="date" name="date" type="text"  class="form-control input-md" required placeholder="mm/dd/yyyy" value="<?php echo $row3['date'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">বিষয়:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="subject" type="text"  class="form-control input-md" required value="<?php echo $row3['subject'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">উপস্থাপকের নাম: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="uname" type="text"  class="form-control input-md" required value="<?php echo $row3['uname'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">পদবী:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="rank" type="text"  class="form-control input-md" required value="<?php echo $row3['rank'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">ইমেইল নম্বর:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="email" type="text"  class="form-control input-md" required value="<?php echo $row3['email'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">মোবাইল নম্বর:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="mobile" type="text"  class="form-control input-md" required value="<?php echo $row3['mobile'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">কোন সদ্যসের মাধ্যমে উপস্থাপিত হয়েছে:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="ref" type="text"  class="form-control input-md" required value="<?php echo $row3['ref'];?>">
											</div>
										</div>
											
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail"> বিষয় বস্তু: <span style="color:#F00;">*</span></label>
												  <div class="col-md-8">
													<p><textarea name="detail" id="editorial" class="form-control"><?php echo $row3['detail'];?></textarea></p>
													<script>CKEDITOR.replace( 'editorial', {toolbar : 'MyToolbar'});</script>
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">কোন সভায় উপস্থাপন:  <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="location" type="text"  class="form-control input-md" required value="<?php echo $row3['location'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">সিদ্ধান্ত: <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<input id="title" name="decesion" type="text"  class="form-control input-md" required value="<?php echo $row3['decesion'];?>">
											</div>
										</div>
										<div class="form-group">
												  <div class="col-md-12" align="right">

													<a href="index.php?page=list"><input type="button" name="cancel" align="right pull-right" value=" Cancel " class="btn btn-danger btnw"/></a>
												  <button type="submit"  name="update" value="content" class="btn btn-md btn-success pull-right btnw">Update</button>
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
						
						
						<?php
						}else{
						$project_list = $db->prepare('SELECT * FROM application order by id desc');
						$project_list->execute(); 
						$project_list->setFetchMode(PDO::FETCH_ASSOC);
						
						?>
								
						<div class="box">
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>বোর্ড সভা </h5>
							</header>
 
								<div class="table-responsive" style="padding:20px;">
									<table id="dataTable" class="table table-bordered">
									
										<thead style="color:#000">
											<tr>
												<td align="center"><b>SL</b></td>
												<td align="center"><b>বোর্ড সভার তথ্য</b></td>
												<td align="center"><b>উপস্থাপকের তথ্য</b></td>
												<td align="center"><b>সদ্যসের মাধ্যমে</b></td>
												<td align="center"><b>বিষয় বস্তু</b></td>
												
												<td align="center"><b>Edit</b></td>
												<td align="center"><b>Delete</b></td>
											</tr>
										</thead>
										<tbody style="color:#000">
										<?php 
										$sl=1;
										while($row = $project_list->fetch()) { ?>
											<tr>
												<td >
													<?=$sl?>
												</td >
												<td ><b>বোর্ড সভার নম্বর:</b> <?=$row['board']?><br><b>স্বারক নম্বর:</b> <?=$row['sarok']?><br><b>তারিখ:</b> <?=$row['date']?><br><b>বিষয়:</b> <?=$row['subject']?><br><b>কোন সভায় উপস্থাপন:</b> <?=$row['location']?><br><b>সিদ্ধান্ত:</b> <?=$row['decesion']?></td>
												<td ><b>উপস্থাপকের নাম:</b> <?=$row['uname']?><br><b>পদবী:</b> <?=$row['rank']?><br><b>ইমেইল নম্বর:</b> <?=$row['email']?><br><b>মোবাইল নম্বর:</b> <?=$row['mobile']?></td>
												<td >
													<?=$row['ref']?>
												</td >
												<?php $string = strip_tags($row['detail']);
													if (strlen($string) > 100) {
														$stringCut = substr($string, 0, 80);
														$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
													}
													?>
												<td >
													<?=$string?>
												</td >
												<td align="center"><a href="index.php?page=list&id=<?php echo $row['id']; ?>"><span style="color:#CD1142;" class="glyphicon glyphicon-edit"></span></a></td>
												<td align="center" style="color:#000">
													  <a href="#" onClick="delete_list('<?=$row['id'];?>')" ins="Delete"><span style="color:#F00;" class="glyphicon glyphicon-trash"></span></a>
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
            
