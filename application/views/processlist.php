
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
			<a role="button" class="btn btn-info" href="<?php echo site_url('Process/export_excel');?>">Export To Excel</a>        
			<a role="button" target="_blank" class="btn btn-info" href="<?php echo site_url('Process/export_pdf');?>">Export To Pdf</a>
        </div>
		<hr/>		
        <div class="col-xs-12">
		
		  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Process List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Type</th>
                  <th>Send date</th>
                  <th>Req From</th>                  
				  <th>Subject</th>                  
				  <th>Recieve date</th>                  
				  <th>Memo No</th>                  
				  <th>Req Sendto</th>                  
				  <th>Remarks</th> 
				  <th>OC Putup Date</th> 
				  <th width="80px">Image Scan</th>				  
				  <th>Status</th>
				  <th width="70px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($rec as $r){ ?>			
					<tr>
					  <td><?=$r->Type?></td>
					  <td><?=date("d-M-Y",strtotime($r->Send_date))?></td>
					  <td><?=$r->Req_From?></td>
					  <td><?=$r->Subject?></td>
					  <td><?=date("d-M-Y",strtotime($r->Recieve_date))?></td>
					  <td><?=$r->Memo_no?></td>
					  <td><?=$r->Req_Sendto?></td>
					  <td><?=$r->Remarks?></td>
					  <td><?=date("d-M-Y",strtotime($r->Ocputup_Date))?></td>
					  <td>
					  <?php foreach($rec1 as $r1){ 
					    if($r->id==$r1->Process_Id){
					  ?>
					    
					   <!-- <a style="padding:0" class="image1 btn btn-default" data-toggle="modal" data-target="#modal-default" data-id="<?php echo base_url()."uploads/process/".$r1->Image_Name?>">
						<img src="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" alt="Img Not Found" width="20">
					   </a> -->
					   
					   <a style="padding:0" class="btn btn-default example-image-link" href="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
						<img src="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" alt="Img Not Found" width="20">
					   </a>
					   
					   <?php } } ?>
					   
					  </td>
					  <td><?=$r->Status?></td>
					  
					  <td><a href="<?php echo base_url().'Process/update/'.$r->id; ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>						  
						  <a href="<?php echo base_url().'Process/process_detail/'.$r->id; ?>" class="btn btn-warning"><i class="fa fa-clipboard"></i></a>
					  </td>
					</tr> 
				<?php } ?>
                </tbody>                
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
  
  
  

