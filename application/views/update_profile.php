
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()."assets/" ?>#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
                <?php 
				  $upodate_success_msg=$this->session->flashdata('upodate_success_msg');
                  if($upodate_success_msg){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
					<h4><i class="icon fa fa-check"></i>Success</h4>				
				<?php echo $upodate_success_msg; ?>
				</div>        
				<?php } ?>
				
	    <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo form_open_multipart('user/update_user');?>            
              <div class="box-body">
                <div class="form-group">
                  <label for="profilefirstname">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value="<?php echo $this->session->userdata('firstname'); ?>">
                </div>
				<div class="form-group">
                  <label for="profilelastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?php echo $this->session->userdata('lastname'); ?>">
                </div>
				<div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo $this->session->userdata('address'); ?>">
                </div>
				<div class="form-group">
                  <label for="phone">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" value="<?php echo $this->session->userdata('phone'); ?>">
                </div>
				<div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $this->session->userdata('email'); ?>">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
				<div class="form-group">
                  <label for="exampleInputFile">Add Profile Picture</label>
                  <input type="file" id="imagefile" name="imagefile">
                  <p class="help-block">Please Attach Your File</p>
				</div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Profile</button>
              </div>
            </form>
          </div>
		  
    </section>	
	<!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
  
  

