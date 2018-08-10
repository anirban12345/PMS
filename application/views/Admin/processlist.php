
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $this->session->userdata('firstname')." ".$this->session->userdata('lastname'); ?>
        <small>Control panel</small>
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
			<a role="button" class="btn btn-info" href="<?php echo site_url('Admin/AdminUser/export_excel_process');?>">Export To Excel</a>        
			<a role="button" target="_blank" class="btn btn-info" href="<?php echo site_url('Admin/AdminUser/export_pdf_process');?>">Export To Pdf</a>
        </div>
		<hr/>		
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">All Process</h3>			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
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
					  <a style="padding:0" class="btn btn-default example-image-link" href="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
						<img src="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" alt="Img Not Found" width="20">
					  </a>
					  <?php } } ?>
					  </td>
					  <td><?=$r->Status?></td>					  
					  <td><a href="<?php echo base_url().'Admin/AdminUser/delete/'.$r->id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						  <a href="<?php echo base_url().'Admin/AdminUser/process_detail/'.$r->id; ?>" class="btn btn-warning"><i class="fa fa-clipboard"></i></a>
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
	
  </div>
  <!-- /.content-wrapper -->
  
  
 
  


