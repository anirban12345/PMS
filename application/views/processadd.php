
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Process 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/" ?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Process</li>
      </ol>
    </section>

    <section class="content">
	
                <?php 
				  $add_process=$this->session->flashdata('add_process');
                  if($add_process){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
					<h4><i class="icon fa fa-check"></i>Success</h4>				
				<?php echo $add_process; ?>
				</div>        
				<?php } ?>
				<?php 
				  $add_process_image=$this->session->flashdata('add_process_image');
                  if($add_process_image){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
					<h4><i class="icon fa fa-check"></i>Success</h4>				
				<?php echo $add_process_image; ?>
				</div>        
				<?php } ?>
				
	    <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo form_open_multipart('Process/add_process');?>            
              <div class="box-body">
			    <div class="form-group">
                  <label for="Req_From">Type</label>
                  <select name="Type" class="form-control">
				     <option value="File">File</option>
					 <option value="Folder">Folder</option>
					 <option value="Zimbra Mail">Zimbra Mail</option>
				  </select>
                </div>
				<div class="form-group">
					<label>Send Date:</label>
					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" class="form-control" id="Send_date" name="Send_date" placeholder="Enter Send Date" required>					  
					</div>
                </div>
				<div class="form-group">
                  <label for="Req_From">From</label>
                  <input type="text" class="form-control" id="Req_From" name="Req_From" placeholder="Enter From" value="" required>
                </div>
				<div class="form-group">
                  <label for="Subject">Subject</label>
                  <input type="text" class="form-control" id="Subject" name="Subject" placeholder="Enter Subject" value="" required>
                </div>
				<div class="form-group">
					<label>Recieve Date:</label>
					<div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" class="form-control" id="Recieve_date" name="Recieve_date" placeholder="Enter Recieve Date" required>					  
					</div>
                </div>
				<div class="form-group">
                  <label for="email">Memo no</label>
                  <input type="text" class="form-control" id="Memo_no" name="Memo_no" placeholder="Enter Memo No" value="" required>
                </div>
				<div class="form-group">
                  <label for="email">Send to</label>
                  <input type="text" class="form-control" id="Req_Sendto" name="Req_Sendto" placeholder="Enter Sendto" value="" required>
                </div>
				<div class="form-group">
                  <label for="email">Remarks</label>
                  <input type="text" class="form-control" id="Remarks" name="Remarks" placeholder="Enter Remarks" value="" required>
                </div>
				<div class="form-group">
                  <label for="Ocputup_Date">OC Putup Date</label>
				    <div class="input-group date">
					  <div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					  </div>
					  <input type="text" class="form-control" id="Ocputup_Date" name="Ocputup_Date" placeholder="Enter OC Putup Date" required>					  
				    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Process</button>
              </div>
            </form>
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
  
  

