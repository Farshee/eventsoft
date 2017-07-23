<script>

function delete_gallery(id)  //User Delete
{
 	var stat;
	stat =  confirm("Are you sure to delete this file?");
	  if(stat==true){
	 	if(id !=""){
  			location.href="index.php?page=file&delI="+id;
		}
	}
}
</script>
<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
							

							<?
							if(isset($_GET['delI'])&&strlen($_GET['delI'])>0){
							try {
							  $stmt2 = $db->prepare('DELETE FROM files WHERE id = :id');
							  $stmt2->bindParam(':id', $_GET['delI']);
							  $stmt2->execute();
							  $row_check=$stmt2->rowCount();
							  echo "<script>location.href='index.php?page=file&msgI=deleted';</script>";
							} catch(PDOException $e) {
							  echo 'Error: ' . $e->getMessage();
							}
						  }
						?>
							<?  if($_GET['aid']!=''){?>
								<?
								require("controller/libraries/single.php");
						  $sizes = array(0=>0);
						  $dir = "ui/file/";
						 
						   
							if(isset($_POST['gallery']) && $_POST['gallery']=="Submit")
							  {
								try{
									if($_FILES['image']['name']!=''){
										$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
										if ( in_array($ext, $valid_formats)) {
											if( $_FILES['image']['size'] < $max_file_size ){
												$uniq = base_convert(uniqid(), 16, 10);
												$uniq_file_name = $uniq.".".$ext;
												foreach ($sizes as $w => $h) {
													$thisFILE[]= build_image($w,$h,$uniq_file_name,$dir,'resize',70,100);
												}
											}else $msg[] = "File is too large";
										}else $msg[] = "Worng file format";
									} else $thisFILE[]=NULL;
									$stmt = $db->prepare('INSERT INTO files (aid,caption,image,user_id,modify_date,create_date) VALUES(:aid,:caption,:image,:user_id,:modify_date,:create_date)');
									$stmt->execute(array(
									':aid' => $_GET['aid'],
									':caption' => $_POST['name'],
									':image' => $thisFILE[0],
									':user_id' => $_SESSION['user_id'],
									':modify_date' =>time(),
									':create_date' =>time()
									));
									$row_check1=$stmt->rowCount();
									echo "<script>location.href='index.php?page=user_list&msg1=added';</script>";
								} catch(PDOException $e) {
									echo 'Error: ' . $e->getMessage();
								}
							  }
								
								?>
							<div class="col-md-12" style="padding-top:15px;" >
							  <form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
								  <div class="panel panel-primary" style="border:1px solid #FF0A00;">
									  <div class="panel-heading" style="background-color:#FF0A00; border:1px solid #FF0A00;">
										  <b>Add image </b>
									  </div><!--panel-heading end-->
									  <div class="panel-body">
										  <div class="form-group">
											<label class="col-md-3 control-label" for="event_id">Caption of file <span style="color:#CD1142;">*</span></label>
											<div class="col-md-9 col-xs-12">
											<input id="name" name="name" type="text"  class="form-control input-md" required="required">
											  <input type="hidden" name="album" value="<?=$row['id'];?>" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="image">Image </label>
											<div class="col-md-9 col-xs-12">
												<input id="image_file" name="image" type="file" accept="image/*" class="btn btn-primary">
											</div>
											
										</div>
									  <div class="form-group">
										  <div class="col-md-12" align="right">
										  <a href="index.php?page=user_list"><input type="button" name="cancel" align="right pull-right" value="cancel" class="btn btn-danger btnw"/></a>
										  <button type="submit"  name="gallery" value="Submit" class="btn btn-md btn-success pull-right btnw">Add this File</button>
										  </div>
									  </div>

									  </div><!--panel-body end-->
								  </div><!--panel content end-->

							  </form>
							  </div>
							<?  }elseif($_GET['gid']!=''){?>  
						  <?php
							$gid=$_GET['gid'];
							$msgI=$_GET['msgI'];
							$msg=$_GET['msg'];
							if($row_check==1||$msg=='deleted'||$msg=='updated'||$row_check1==1||$msg1=='deleted'||$msg1=='updated'||$msgA=='deleted'||$msgI=='deleted'){  ?>
						  <div class="row">
							<div class="col-md-12">
							<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<center><i class="fa fa-info-circle"></i>  <strong style="font-size:16px;"><?php if($row_check==1||$msgA=='deleted'){?>album<? }else{ if($msgI=='deleted'){ ?>Image<? }else{?>File<? } }?> has been <?php if($row_check==1 || $row_check1==1){?> added <?php }elseif($msg=='deleted'||$msgA=='deleted'||$msgI=='deleted'){?> deleted <?php }elseif($msg=='updated'){?> updated <?php } ?> successfully! </strong> </center>
							</div>
							</div>
						  </div>
						  <?php } ?>
						  
						  <?php
                       if(isset($_POST['Updateg']) && $_POST['Updateg']=="Save")
                      {
                      	try {
                      	if($_FILES['image']['name']!=''){
                      			$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                      			if ( in_array($ext, $valid_formats)) {
                      				if( $_FILES['image']['size'] < $max_file_size ){
                      					$uniq = base_convert(uniqid(), 16, 10);
                      					$uniq_file_name = $uniq.".".$ext;
                      					foreach ($sizes as $w => $h) {
                      						$thisFILE[]= build_image($w,$h,$uniq_file_name,$dir,'resize',50,100);
                      					}
                      				}else $msg[] = "File is too large";
                      			}else $msg[] = "Worng file format";
                      		} else $thisFILE[]=$_POST['old_image'];
                        $upd = $db->prepare('UPDATE files SET caption= :caption, image= :image,user_id= :user_id, modify_date= :modify_date WHERE id = :thisid');
                        $upd->execute(array(
                      	//':aid' => $_POST['main_album'],
                      	':caption' => $_POST['name'],
                      	':image' => $thisFILE[0],
						':user_id' => $_SESSION['user_id'],
                      	':modify_date' => time(),
                          ':thisid' => $_POST['image_id'],
                        ));
                        $success=$upd->rowCount();
                        echo "<script>location.href='index.php?page=file&gid=$gid&msg=updated';</script>";
                      } catch(PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                      }

                      }
                      ?>
						  
						  <div class="box">
							
							<header>
								<div class="icons"><i class="fa fa-table"></i></div>
								<h5>Update File List</h5>
								
							</header>
							<div class="col-md-12" align="right">
                      					<a href="index.php?page=user_list"><button type="button"  align="right"  class="btn btn-info"/><i class="fa fa-chevron-circle-left" aria-hidden="true"></i>  Back to বোর্ড সভা </button></a>
								</div>
						  <div class="table-responsive" style="padding:20px;">
						  <table id="example" class="table table-bordered">
							<thead style="color:#000">
                              <tr>
									<td><b>SL</b></td>
                                  <th align="center">File</th>
                                  <th align="center">Caption</th>
                                  <th align="center">Last Modified Date</th>
                                  <th align="center">Edit</th>
                                  <th align="center">Delete</th>
                              </tr>
							  </thead>
							  <tbody style="color:#313131">
                                 <?
                      		    $stmt_gu1 = $db->prepare('SELECT * FROM files where aid= :gid_&& user_id=:user_id order by id desc');
                      			$stmt_gu1->execute(array(':gid_' => $_GET['gid'],':user_id' => $_SESSION['user_id']));
                      			$stmt_gu1->setFetchMode(PDO::FETCH_ASSOC);
								$sl=1;
                      			while($row_gu = $stmt_gu1->fetch()){
                      		   ?>
                              <tr>
							  <td >
								<?=$sl?>
								</td >
                              	<td><img src="<?=$row_gu['image']?>" width="180" height="200" class="thumbnail" /></td>
                      			<td><?=$row_gu['caption']?></td>
                                  <td><?=date("j F, Y", $row_gu['modify_date'])?></td>
                                  <td align="center"><a href="#edit<?=$row_gu['id']?>" onClick="tr_show('edit<?=$row_gu['id']?>')" title="Edit"><span style="color:#CD1142;" class="glyphicon glyphicon-edit"></span></a></td>
                                  <td align="center"><a href="#" onClick="delete_gallery('<?=$row_gu['id']?>','<?=$row_gu['aid']?>','Gallery')" title="Delete"><span style="color:#CD1142;" class="glyphicon glyphicon-trash"></span></a></td>
                              </tr>
                           <!--Gallery Update-->
                              <tr id="edit<?=$row_gu['id']?>" style="display:none;"><td colspan="8">
                                  <div class="col-md-12" style="padding-top:15px;">
                                  <form class="form-horizontal" method="post" action="" name="form" enctype="multipart/form-data">
                                      <div class="panel panel-primary" style="border:1px solid #FF0A00;">
                                          <div class="panel-heading" style="background-color:#FF0A00; border:1px solid #FF0A00;">
                                              <b>Update image of: <?=$row_gu['caption'];?></b>
                                          </div><!--panel-heading end-->
                                          <div class="panel-body">
                                              <div class="form-group">
                                                  <label class="col-md-3 control-label" for="event_id">Caption of image <span style="color:#CD1142;">*</span></label>
                                                  <div class="col-md-9 col-xs-12">
                                                  <input id="name" name="name" type="text" value="<?=$row_gu['caption']?>"  class="form-control input-md" required="required">
                                                  <input type="hidden" name="main_album" value="<?=$row_gu['aid']?>" />
                                                  <input type="hidden" name="old_image" value="<?=$row_gu['image']?>" />
                                                  </div>
                                              </div>
                      						<script>
                                              $(document).ready(function () {
                                                      $("#image_file<?=$row_gu['id']?>").fileinput({
                                                      showUpload : false,
                                                      maxFileCount : 1,
                                                      minFilesCount : 1,
                                                      maxFileSize : 5120, //In kilobyte
                                                      allowedFileExtensions : ["jpg","jpeg","JPG", "png", "gif"],
                                                      elErrorContainer : "#errorBlock43",
                                                      previewFileType : "image",
                                                      previewClass: "bg-warning col-md-6",
                                                      browseClass : "btn btn-success",
                                                      browseLabel : "Pick Image",
                                                      browseIcon : '<i class="glyphicon glyphicon-picture"></i>',
                                                      removeClass : "btn btn-danger",
                                                      removeLabel : "Delete",
                                                      removeIcon : '<i class="glyphicon glyphicon-trash"></i>',
                                                      <?php if($row_gu['image']!=''&&$row_gu['image']!=NULL){ ?>initialPreview: ["<img src='<?=$row_gu['image'];?>' class='file-preview-image' width='180' height='200' >"]<?php } ?>
                                                  });
                                              });
                                              </script>
                                              <div class="form-group">
                                                  <label class="col-md-3 control-label" for="image">Image</label>
                                                  <div class="col-md-9 col-xs-12">
                                                      <input id="image_file<?=$row_gu['id']?>" name="image" type="file" accept="image/*" class="btn btn-primary">
                                                  </div>
                                              </div>
                      						<input type="hidden" name="image_id" value="<?=$row_gu['id']?>">
                                          <div class="form-group">
                                              <div class="col-md-12" align="right">
                                              <input type="button" name="cancel" align="right" value=" Cancel " class="btn btn-danger btnw" onClick="tr_hide('edit<?=$row_gu['id']?>');"/>
                                              <button type="submit"  name="Updateg" value="Save" class="btn btn-md btn-success pull-right btnw"> Update </button>
                                              </div>
                                          </div>

                                          </div><!--panel-body end-->
                                      </div><!--panel content end-->

                                  </form>
                                  </div>
                              </td></tr>
                              <tr id="show" style="display:none"><td align="right" colspan="2">
                      	     <input type="button" value="Processing.."  class="btn btn-md btn-red">
                      	    </td></tr>
                              <? 
							   $sl++;
							  } ?>
                             </tbody>
                          </table>
                      </div>
					  
                      </div>
						<?  }  ?>  
						  
						  
						   </div>                    
						</div>
                    <!-- /#right -->
            </div>
            <!-- /#wrap -->