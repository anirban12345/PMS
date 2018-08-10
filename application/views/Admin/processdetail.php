
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Process List Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/" ?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Process List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	    <div class="col-md-offset-9 col-xs-3 text-right">
			<a role="button" class="btn btn-info" href="<?php echo site_url('Admin/AdminUser/export_excel_process_details');?>">Export To Excel</a>        
			<a role="button" target="_blank" class="btn btn-info" href="<?php echo site_url('Admin/AdminUser/export_pdf_process_details');?>">Export To Pdf</a>
        </div>
		<hr/>		
        <div class="col-xs-12">
		
		  <div class="box box-primary">
			<div class="box-header">
			    <h3 class="box-title">Process Details</h3>
			</div>		  
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr><th colspan="4">Process Details</th></tr>
                <tr>
                  <th>Send date</th>
                  <th>Req From</th>                  
				  <th>Subject</th>                  
				  <th>Recieve date</th>                  
				  <th>Memo No</th>                  
				  <th>Req Sendto</th>                  
				  <th>Remarks</th> 				  
				  <th>Status</th>
				  <th>User</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rec as $r){ ?>			
					<tr>
					  <td><?=date("d-M-Y",strtotime($r->Send_date))?></td>
					  <td><?=$r->Req_From?></td>
					  <td><?=$r->Subject?></td>
					  <td><?=date("d-M-Y",strtotime($r->Recieve_date))?></td>
					  <td><?=$r->Memo_no?></td>
					  <td><?=$r->Req_Sendto?></td>
					  <td><?=$r->Remarks?></td>
					  <td><?=$r->Status?></td>					  
					  <td><?=$r->Firstname?></td>
					</tr> 
				<?php } ?>
                </tbody>
              </table>
			  <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr><th colspan="4">Process Status Details</th></tr>		
                <tr>	
				  <th>Status Date</th>
				  <th>Status Time</th>
				  <th>Status</th>
				  <th>User</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rec2 as $r){ ?>			
					<tr>					  
					  <td><?=date("d-M-Y",strtotime($r->Status_Date))?></td>					  
					  <td><?=$r->Status_Time?></td>					  
					  <td><?=$r->Status?></td>
					  <td><?=$r->Firstname?></td>
					</tr> 
				<?php } ?>
                </tbody>
              </table>
			  
			  <table  id="example1" class="table table-bordered table-striped">
			  <tr><th colspan="4">Process Scan Documents</th></tr>
			  <tr>
			  <td colspan="4">
			  <?php foreach($rec1 as $r1){ ?>
					<a style="padding:0" class="btn btn-default example-image-link" href="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
						<img src="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" alt="Img Not Found" width="60">
					</a>
			  <?php }?>
			  </td>
			  </tr>
			  </table>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
	  </div>
	    
	</div>
      
    </section>	
	<!-- /.content -->
	
	<!-- .modal -->
  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Image</h4>
              </div>
              <div class="modal-body">
                <img id="image" width="100%"/>
              </div>
              <div class="modal-footer">                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		
  </div>
  <!-- /.content-wrapper -->
 <script>
 
</script> 
  
  
  

