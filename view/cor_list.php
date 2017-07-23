
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
						  $stmt2 = $db->prepare('DELETE FROM meeting WHERE user_id = :thisid');
						  $stmt2->bindParam(':thisid', $_GET['del']);
						  $stmt2->execute();
						  $row_check=$stmt2->rowCount();
						   echo "<script>location.href='index.php?page=cor_list&msg=deleted';</script>";
						} catch(PDOException $e) {
						  echo 'Error: ' . $e->getMessage();
						}
						}
						?>
						
						<?php
						
						$project_list = $db->prepare('SELECT * FROM meeting order by id desc');
						$project_list->execute(); 
						$project_list->setFetchMode(PDO::FETCH_ASSOC);
						while($row = $project_list->fetch()) {
								$meeting[]=$row;
						}
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
												<td align="center"><b>বোর্ড সভার নম্বর</b></td>
												<td align="center"><b>বোর্ড সভার তথ্য</b></td>
												
												<td align="center"><b>বিষয় বস্তু</b></td>
												<td align="center"><b>প্রিন্ট</b></td>
												<!--td align="center"><b>Edit</b></td>
												<td align="center"><b>Delete</b></td-->
											</tr>
										</thead>
										<tbody style="color:#000">
										
										<?php 
										$sl=1;
										foreach($meeting as $row) { 
										
										
										$stmt5 = $db->prepare('SELECT * FROM application where m_id= :com_');
										$stmt5->execute(array(':com_' => $row['id']));
										
										
										?>
											<tr>
												<td >
													<?=$sl?>
												</td >
												<td align="center"><?=$row['board']?></td>
												<td><b>স্বারক নম্বর:</b> <?=$row['sarok']?><br><b>তারিখ  ও সময়:</b> <?=date('D, d,M ,Y',strtotime($row['date']));?>,<?=date('h:i A', strtotime($row['time']));?><br><b>বোর্ড সভার অনুমোদন কর্মকর্তার  নাম ,পদবী  ও  দপ্তর:</b> <?=$row['name']?>,<?=$row['rank']?>,<?=$row['dept']?></td>
												<td >
												<ol type="1">
													<?php 
												while($row5 = $stmt5->fetch()){
													$stmt_result1 = $db->prepare('SELECT * FROM result where sub_no=:thisID');
													$stmt_result1->execute(array(':thisID' => $row5['id']));
													$row_result1 = $stmt_result1->fetch();
													
													$string = strip_tags($row5['subject']);
													if (strlen($string) > 200) {
														$stringCut = substr($string, 0, 150);
														$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
													}
													?>
													
													<li>
													<a href="#" data-toggle="modal" data-target="#helpModal<?php echo $row5['id']; ?>" ><?=$string?></a> <i class="fa fa-long-arrow-right" aria-hidden="true"></i><? if($row_result1['publish']==1) {?><a  href="#" data-toggle="modal" data-target="#result<?php echo $row_result1['id']; ?>"><p style="color:green">(ফলাফল প্রকাশ হয়েছে)</p></a><?   }else{ ?><p style="color:red">(ফলাফল প্রকাশ হয়নি) </p> <?  } ?>
													</li>
													
													<? } ?>
													</ol>
												</td >
												<td align="center">
												
												<button type="button"  onclick="printContent('robi<?=$row['id']?>')" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i> প্রিন্ট</button>
												</td>
												<!--td align="center"><a href="index.php?page=cor_list&id=<?php/*  echo $row['id']; */ ?>"><span style="color:#CD1142;" class="glyphicon glyphicon-edit"></span></a></td>
												<td align="center" style="color:#000">
													  <a href="#" onClick="delete_list('<?/* =$row['id']; */?>')" ins="Delete"><span style="color:#F00;" class="glyphicon glyphicon-trash"></span></a>
													  </td-->
											</tr>
										<?php 
										$sl++; 
										} ?>
										
										</tbody>
									</table>
								</div>
								</div>

								
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
			<!-- #helpModal -->
            <div id="result<?=$row_form3['id'];?>" class="modal fade" style="color:#000">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title">বোর্ড সভার খসড়া কার্যবিবরণী (মিনিট্স) প্রেরণের নমুনা</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" >
							
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(১) বোর্ড সভার নং ও তারিখ:</label>  
											<div class="col-md-8">
											<p><?php echo $row_form3['board'];?></p>
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">(২) আলোচ্য সূচী নং:</label>
												  <div class="col-md-8">
													<p><?php echo $row_form1['id'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">(৩) আলোচিত বিষয়ের শিরোনাম: </label>
												  <div class="col-md-8">
													<p><?php echo $row_form3['subject'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">(৪) বিষয়বস্তুর সারসংক্ষেপ: </label>
												  <div class="col-md-8">
													<p><?php echo $row_form3['summary'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(৫) বোর্ডের আলোচনা: </label>  
											<div class="col-md-8">
											<p><?php echo $row_form3['meeting'];?></p>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(৬) বোর্ড কর্তৃক গৃহীত সিদ্ধান্ত: </label>  
											<div class="col-md-8">
											<p><?php echo $row_form3['decesion'];?></p>
											</div>
										</div>

									</form>
                        </div>
                        <div class="modal-footer">
                            
							<button type="button"  onclick="printContent1('result1<?=$row_form3['id'];?>')" class="btn btn-info"><i class="fa fa-print" aria-hidden="true"></i> প্রিন্ট</button>
							
							<button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
							
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
			
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
						
					</tbody>
					</table>
				</div>
			</div>
						<?  }  ?>



            
<div style="display:none;" >

<?php 
 
foreach($meeting as $row11) { ?>
<div id="robi<?=$row11['id']?>" class="row" >
<table style="width:100%" class="table" >
<style>
@media print {
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border: none;
}
.table {
	background-image:url('assets/img/logo2.jpg');
	background: url('assets/img/logo2.jpg');
}
}
</style>
<tbody style="font-size:18px;">
<?  
$project_list1 = $db->prepare('SELECT * FROM meeting where id=:com_');
$project_list1->execute(array(':com_' => $row11['id']));
$project_list1->setFetchMode(PDO::FETCH_ASSOC);
while($row_print = $project_list1->fetch()){
$stmt55 = $db->prepare('SELECT * FROM application where m_id= :com_');
$stmt55->execute(array(':com_' => $row_print['id']));	
?>
<tr ><td></td><td class="text-left"><img src="assets/img/logo2.jpg" alt="" style="width:80px;"></td><td  colspan="8" class="text-center" ><b>বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড <br>Bangladesh Power Development Board</b></td><td  ></td><td ><p style="font-size:11px;" colspan="4">কেন্দ্রীয় সচিবালয় <br>বিউবো, ঢাকা</p></td></tr>
<tr ><td class="text-left"></td><td  colspan="9" class="text-center" ></td><td  ></td><td colspan="3"><p ><b style="font-size:13px;">“গোপনীয় ”</b></p></td></tr>
<tr ><td></td><td class="text-left" style="font-size:14px;">স্মারক নং -<?=$row_print['sarok']?></td><td  colspan="8" class="text-center" ></td><td  ></td><td colspan="4"><p ><b style="font-size:14px;">তারিখ:-<?=date("j F, Y" ,$row_print['created']);?></p></td></tr>
<tr ><td class="text-left"></td><td  colspan="12" class="text-center" ><b>“ নোটিশ “</b></td><td  ></td><td ></td></tr>
<tr ><td class="text-left"></td><td class="text-left" colspan="12" style="font-size:14px;">আগামী       তারিখ <?=date('D, d,M ,Y',strtotime($row_print['date']));?>      বেলা <?=date('h:i A', strtotime($row_print['time']));?>   ঘটিকায় বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড সভা কক্ষে অনুষ্ঠিত           <?=$row_print['board']?> -তম সাধারণ বোর্ড সভায় নিম্নলিখিত বিষয়গুলি অন্তর্ভক্ত করা হইল:</td><td  ></td><td ></td></tr>
<tr><td colspan="12" style="height:60px;"></td></tr>
<tr class="text-center"><td colspan="4" ></td><td  colspan="4" ></td><td colspan="4"><p ><b style="font-size:13px;"><?=$row_print['name']?><br> <?=$row_print['rank']?><br> <?=$row_print['dept']?> </b></p></td></tr>
<tr ><td class="text-left" colspan="12"  ><b>সভার আলোচ্য সূচী: -</b></td></tr>
<tr ><td></td><td colspan="12"  >
<ol type="1" style="font-size:13px;">
	<?  while($row55 = $stmt55->fetch()){  ?>
	<li><?=$row55['subject']?></li>
	<?  } ?>
</ol>
</td><td></td></tr>
<tr ><td></td><td class="text-left" style="font-size:14px;">স্মারক নং -<?=$row_print['sarok']?></td><td  colspan="8" class="text-center" ></td><td  ></td><td colspan="4"><p ><b style="font-size:14px;">তারিখ:<?=date("j F, Y" ,$row_print['created']);?></p></td></tr>
<tr ><td></td><td colspan="12" style="font-size:14px;" >সদয় অবগতি ও প্রয়োজনীয় ব্যবস্থা গ্রহণের জন্য অনুলিপি প্রেরণ করা হইল:</td><td></td></tr>
<tr ><td></td><td colspan="12"  ><?=$row_print['detail']?></td><td></td></tr>
<tr><td colspan="12" style="height:60px;"></td></tr>
<tr class="text-center"><td colspan="4" ></td><td  colspan="4" ></td><td colspan="4"><p ><b style="font-size:13px;"><?=$row_print['name']?><br> <?=$row_print['rank']?><br> <?=$row_print['dept']?> </b></p></td></tr>
<?  }  ?>
</tbody>
</table>
</div>
<?php } ?>
</div>
<script type="text/javascript">


function printContent(robi) {
     var printContents = document.getElementById(robi).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	 window.close();
	 
}
function printContent1(robi) {
     var printContents = document.getElementById(robi).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	 window.close();
	 window.location="index.php?page=cor_list";
}
</script>