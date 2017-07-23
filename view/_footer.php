<footer class="Footer bg-brick dk">
                <p>2017 &copy; <?php echo Projecet_NAME;?></p>
            </footer>
            <!-- /#footer -->
            <?php 
						$stmt_modal = $db->prepare('SELECT * FROM application  ');
						$stmt_modal->execute();
						$stmt_modal->setFetchMode(PDO::FETCH_ASSOC);
						while($row_modal = $stmt_modal->fetch()){
						$stmt_result = $db->prepare('SELECT * FROM result where sub_no=:thisID');
						$stmt_result->execute(array(':thisID' => $row_modal['id']));
						$row_result = $stmt_result->fetch();
						?>
			<!-- #helpModal -->
            <div id="helpModal<?=$row_modal['id'];?>" class="modal fade" style="color:#000">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title"><?php echo $row_modal['subject'];?></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" >
							
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">২। আলোচ্য বিষয়ের উপস্থাপনকারী কর্মকর্তার নাম, পদবী ও দপ্তর: </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['profile'];?></p>
											</div>
										</div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৩। আলোচ্য বিষয়ের সারসংক্ষেপ:</label>
												  <div class="col-md-8">
													<p><?php echo $row_modal['summary'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৪। বোর্ড সভার উপস্থাপনের যৌক্তিকতা:</label>
												  <div class="col-md-8">
													<p><?php echo $row_modal['prove'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail">৫। বিভিন্ন পরিদপ্তরের / অফিসের মন্তব্য :</label>
												  <div class="col-md-8">
													<p><?php echo $row_modal['pcomment'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৬। আলোচ্য বিষয়ের: </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">ক. আর্থিক সংশ্লিষ্টতা :
											</label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['money'];?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">খ. বাঝেট বরাদ্দ : </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(১) রাজস্ব:  </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['raj'];?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(২) উন্নয়ন:  </label>  
											<div class="col-md-8"></div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(i) স্থানীয় মুদ্রায় ( সিডি ভ্যাট বাদে) </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['currency'];?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(ii) নগদ বৈদেশিক মুদ্রায় : </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['usd'];?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(iii) সিডি ভ্যাট: </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['vat'];?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">(৩) বরাদ্দকৃত বাজেটের অদ্যাবধি অবশিষ্টের পরিমাণ:  </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['budget'];?></p>
											</div>
										</div>
										<?  if($row_result['publish']==1){  ?>
										<div class="form-group">
												<label class="col-md-4 control-label" for="detail" > ৬। বোর্ড কর্তৃক আলোচ্য বিষয়ের উপর  সিদ্ধান্ত গ্রহণের প্রস্তাব: </label>
												  <div class="col-md-8">
													<p><?php echo $row_modal['apply'];?></p>
													
												  </div>
											  </div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৭। প্রস্তাবিত সিদ্ধান্তের প্রেক্ষিতে সম্ভাব্য প্রতিক্রিয়া: </label>  
											<div class="col-md-8">
											<p><?php echo $row_modal['reaction'];?></p>	
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="event_id">৮। সিদ্ধান্ত গ্রহণের নিমিত্তে উপস্থাপনকারী কর্মকর্তার প্রস্তাবের উপর সংশ্লিষ্ট বোর্ড সদস্যের মন্তব্য / সুপারিশ:</label>  
											<div class="col-md-8">
											<p ><?php echo $row_modal['bcomment'];?></p>
											</div>
										</div>
										<?  }  ?>
									</form>
                        </div>
                        <div class="modal-footer">
                            <?  if($row_modal['user_id']==$_SESSION['user_id']&&$row_modal['m_id']!=0){  ?>
							<a href="index.php?page=edit_app&id=<?php echo $row_modal['id']; ?>"><input type="button" class="btn btn-success"  value="পরিবর্তন"/></a>
							<?}?>
							<button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
							
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
						<?  }  ?>
            <!-- /.modal -->
            <!-- /#helpModal -->
            <!--jQuery -->
            
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    
    
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'copy', 'excel', 'print'
        ]
    } );
} );
    </script>
    
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    
    
    <!-- datepicker -->
    <script type="text/javascript">
	$('#demo').daterangepicker({
		locale: {
            format: 'YYYY-MM-DD'
        },
		"singleDatePicker": true,
		
		"showDropdowns": true
		
	});
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript">
$('.clockpicker').clockpicker({
align: 'right',
    donetext: 'Done',
	autoclose: true,
	'default': 'now'
});
</script>	
<script src="ui/js/showhide.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>


            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>
            


            <script src="assets/js/style-switcher.js"></script>
        </body>

</html>