
 <?php
$stmt3 = $db->prepare('SELECT * FROM users where user_id= :com_');
$stmt3->execute(array(':com_' => $_SESSION['user_id']));
$stmt3->setFetchMode(PDO::FETCH_ASSOC);
$row3 = $stmt3->fetch();

?>

<?php
						if(isset($_POST['update'])&&$_POST['update']=='content'){	
						try {
						$name=$_POST['name'];
							$identity=$_POST['identity'];
							$dept=$_POST['dept'];
						
						$upd_project = $db->prepare	('UPDATE users SET name=:name, identity=:identity, dept=:dept WHERE user_id = :user_id');
						$upd_project->execute(array(
						':name' => $name, ':identity' => $identity, ':dept' => $dept,':user_id' => $_SESSION['user_id']
						));
						$success=$upd_project->rowCount(); // 1
						if($success)echo "<script>location.href='index.php?page=profile&msg=updated';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
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
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>Meeting Cancel successfully!<?php }elseif($msg=='updated'){?> সদস্যার তথ্য সফলভাবে পরিবর্তিত হয়েছে<?php }elseif($msg=='added'){?>Meeting has been added successfully!!<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
						<div class="box">
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>বোর্ড সদস্যার তথ্য </h5>
							</header>
								<div class="col-md-12" style="padding:20px;">
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">সদস্যার নামঃ<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="name" type="text"  class="form-control input-md" required value="<?php echo $row3['name'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">পরিচিতিঃ <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="identity" type="text"  class="form-control input-md" required value="<?php echo $row3['identity'];?>">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label" for="event_id">দপ্তরঃ <span style="color:#CD1142;">*</span></label>  
											<div class="col-md-10">
											<input id="title" name="dept" type="text"  class="form-control input-md" required value="<?php echo $row3['dept'];?>">
											</div>
										</div>

										<div class="form-group">
												  <div class="col-md-12" align="right">

												  <button type="submit"  name="update" value="content" class="btn btn-md btn-success pull-right btnw">পরিবর্তন</button>
												  </div>
											  </div>
										
								</form>
								
								</div>
								
								</div>
						</div>                    
						</div>
                    <!-- /#right -->
            </div>