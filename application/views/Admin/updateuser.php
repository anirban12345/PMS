
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
        <li class="active">User Edit</li>
      </ol>
    </section>
	
    <!-- Main content -->
    <section class="content">
	<div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
			<?php echo form_open_multipart('');?>   
			  <?php foreach($rec as $r){ ?>		
              <div class="box-body">
                <div class="form-group">
                  <label for="profilefirstname">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" value="<?=$r->Firstname?>">
                </div>
				<div class="form-group">
                  <label for="profilelastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?=$r->Lastname?>">
                </div>
				<div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?=$r->Address?>">
                </div>
				<div class="form-group">
                  <label for="phone">Phone No</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" value="<?=$r->Phone?>">
                </div>
				<div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?=$r->Email?>">
                </div>
				<div class="form-group">
                  <label for="email">User Type</label>
				  <select class="form-control">
					  <option value="Admin" <?php if($r->Title=="Admin"){echo "Selected";}?>>Admin</option>
					  <option value="User" <?php if($r->Title=="User"){echo "Selected";}?>>User</option>					
				  </select>
                </div>
			  <?php } ?>
			  
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
  
  


