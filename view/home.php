<script>
function delete_list(id)  
{
  var stat;
  stat =  confirm("Are you sure to delete this content?");
    if(stat==true){
    if(id !=""){
        location.href="index.php?del="+id;
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
						<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php  if($msg=='deleted'){?>User deleted successfully!<?php }elseif($msg=='updated'){?> User has been updated successfully!<?php }elseif($msg=='added'){?>User has been added successfully!!<?php } ?> </strong> </center>

						</div>
						</div>
						</div>
						<?php } ?>
						<?php 
						if(isset($_GET['del'])&&strlen($_GET['del'])>0){
						try {
						  $stmt2 = $db->prepare('DELETE FROM users WHERE user_id = :thisid');
						  $stmt2->bindParam(':thisid', $_GET['del']);
						  $stmt2->execute();
						  $row_check=$stmt2->rowCount();
						   echo "<script>location.href='index.php?msg=deleted';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
						}
						?>
						<?php if($_GET['id']!=''){ 
						$stmt3 = $db->prepare('SELECT * FROM users where user_id= :com_');
						$stmt3->execute(array(':com_' => $_GET['id']));
						$stmt3->setFetchMode(PDO::FETCH_ASSOC);
						$row3 = $stmt3->fetch();
						
						?>
						
						<?php
						if(isset($_POST['update'])&&$_POST['update']=='content'){	
						try {
						$upd_project = $db->prepare	('UPDATE users SET user_type=:user_type, user_active=:user_active WHERE user_id = :id');
						$upd_project->execute(array(
						':user_type' => $_POST['user_type'],
						':user_active' => 1,
						':id' => $_GET['id']
						));
						$success=$upd_project->rowCount(); // 1
						if($success)echo "<script>location.href='index.php?msg=updated';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
					}
						
						?>
						<div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>Update User Type</h5>
							</header>
						<div class="col-md-12" style="padding:20px;">
								<form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">User Type<span style="color:#CD1142;">*</span></label>  
											<div class="col-md-8">
											<select name="user_type" class="form-control middle">
												  <option  disabled>Select User Type</option>
												  <option value="2">সচিব</option>
												  <option value="3">উপ-সচিব</option> 
												</select>
											</div>
										</div>
										
										<div class="form-group">
												  <div class="col-md-12" align="right">

													
												  <button type="submit" id="submit1" name="update" value="content" class="btn btn-md btn-danger pull-right btnw">Update</button>
												  </div>
											  </div>
										
								</form>
								
								</div>
								</div>
						
						
						<?php
						}else{
						$project_list = $db->prepare('SELECT * FROM users where user_id!=1 order by user_id desc');
						$project_list->execute(); 
						$project_list->setFetchMode(PDO::FETCH_ASSOC);
						
						?>
								
						<div class="box">
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>Users</h5>
							</header>
 
								<div class="table-responsive" style="padding:20px;">
									<table id="example" class="table table-bordered">
									
										<thead style="color:#000">
											<tr>
												<td><b>SL</b></td>
												<td><b> উপস্থাপকের  নাম</b></td>
												<td><b>অবস্থা</b></td>
												<td><b>উপস্থাপকের পদবী</b></td>
												
												<td><b>Edit</b></td>
												<td ><b>Delete</b></td>
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
												<td><?=$row['user_name']?></td>
												<td><?php  if($row['user_active']==1){ ?><button type="button" class="btn btn-success">Active</button><?php }else{ ?><button type="button" class="btn btn-danger">Inactive</button><?php } ?></td>
												<td><?php  if($row['user_type']==2){ ?><button type="button" class="btn btn-success">সচিব</button><?php }elseif($row['user_type']==3){ ?><button type="button" class="btn btn-info">উপ-সচিব</button><?php }else{ ?><button type="button" class="btn btn-danger">Not Selected Yet</button><?php } ?></td>
												
												<td align="center"><a href="index.php?id=<?php echo $row['user_id']; ?>"><span style="color:#CD1142;" class="glyphicon glyphicon-edit"></span></a></td>
												<td align="center" style="color:#000">
													  <a href="#" onClick="delete_list('<?=$row['user_id'];?>')" ins="Delete"><span style="color:#F00;" class="glyphicon glyphicon-trash"></span></a>
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
            
