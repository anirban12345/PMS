
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Process 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/" ?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Process</li>
      </ol>
    </section>

    <section class="content">
	
                <?php 
				  $update_success_msg=$this->session->flashdata('update_success_msg');
                  if($update_success_msg){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
					<h4><i class="icon fa fa-check"></i>Success</h4>				
				<?php echo $update_success_msg; ?>
				</div>        
				<?php } ?>
	    <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo form_open_multipart('Process/update_process');?>
			 <?php foreach($rec as $r){ ?>            
              <div class="box-body">
			    <div class="form-group">
                  <label for="Req_From">Type</label>
                    <select name="Type" class="form-control">
				     <option value="File" <?php if($r->Type=="File"){ echo "Selected";} ?>>File</option>
					 <option value="Folder" <?php if($r->Type=="Folder"){ echo "Selected";} ?>>Folder</option>
					 <option value="Zimbra Mail" <?php if($r->Type=="Zimbra Mail"){ echo "Selected";} ?>>Zimbra Mail</option>
				    </select>
                </div> 
				<div class="form-group">
					<label>Send Date:</label>
					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" class="form-control" id="Send_date" name="Send_date" placeholder="Enter Send Date" value="<?=date("d-M-Y",strtotime($r->Send_date))?>">					  
					</div>
                </div>
				<div class="form-group">
                  <label for="Req_From">From</label>
                  <input type="text" class="form-control" id="Req_From" name="Req_From" placeholder="Enter From" value="<?=$r->Req_From?>">
                </div>
				<div class="form-group">
                  <label for="Subject">Subject</label>
                  <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Enter Subject" value="<?=$r->Subject?>">
                </div>
				<div class="form-group">
					<label>Recieve Date:</label>
					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" class="form-control" id="Recieve_date" name="Recieve_date" placeholder="Enter Recieve Date"  value="<?=date("d-M-Y",strtotime($r->Recieve_date))?>">					  
					</div>
                </div>
				<div class="form-group">
                  <label for="email">Memo no</label>
                  <input type="text" class="form-control" id="Memo_no" name="Memo_no" placeholder="Enter Memo No" value="<?=$r->Memo_no?>">
                </div>
				<div class="form-group">
                  <label for="email">Send to</label>
                  <input type="text" class="form-control" id="Req_Sendto" name="Req_Sendto" placeholder="Enter Sendto" value="<?=$r->Req_Sendto?>">
                </div>
				<div class="form-group">
                  <label for="email">Remarks</label>
                  <input type="text" class="form-control" id="Remarks" name="Remarks" placeholder="Enter Remarks" value="<?=$r->Remarks?>">
                </div>
				<div class="form-group">
                  <label for="Ocputup_Date">OC Putup Date</label>
				    <div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" class="form-control" id="Ocputup_Date" name="Ocputup_Date" placeholder="Enter OC Putup Date" value="<?=date("d-M-Y",strtotime($r->Ocputup_Date))?>">					  
				    </div>
                </div>
				<div class="form-group">
                  <label for="pre_stat">Present Status</label>				   
                    <select name="pre_stat" class="form-control">
					 <?php foreach($rec as $r2){ ?>					
				     <option value="Active" <?php if($r->Status=="Active"){ echo "Selected";} ?>>Active</option>
					 <option value="Processing" <?php if($r->Status=="Processing"){ echo "Selected";} ?>>Processing</option>
					 <option value="Processed" <?php if($r->Status=="Processed"){ echo "Selected";} ?>>Processed</option>
					 <?php } ?>
				    </select>
                </div>
              </div>
			 <?php }?>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Process</button>
              </div>
            </form>
          </div>
		  
		  <div class="box box-primary">
		    <div class="box-body">
				<?php foreach($rec1 as $r1){ ?>
					<a style="padding:0" class="btn btn-default example-image-link" href="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
						<img src="<?php echo base_url()."uploads/process/".$r1->Image_Name?>" alt="Img Not Found" width="60">
					</a>
				<?php }?>
			</div>
		  </div>
		  
		<div class="box box-primary">
		 <?php echo form_open_multipart('Process/do_upload/'.time());?>            
            <div class="box-body">
				<div class="form-group addfile">
					<label for="Image_Scan">Add File Image</label>
					<input type="file" id="Imagescan" name="Image_Scan">
					<p class="help-block">Please Attach Your File</p>
				</div>
			</div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </div>
		 </form>
		</div>
		 
    </section>	
	<!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
  
  

