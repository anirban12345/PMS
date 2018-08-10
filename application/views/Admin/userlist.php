
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
        <li class="active">Student</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	    <div class="col-md-offset-9 col-xs-3 text-right">
			<a role="button" class="btn btn-info" href="<?php echo site_url('Admin/AdminUser/export_excel');?>">Export To Excel</a>        
			<a role="button" target="_blank" class="btn btn-info" href="<?php echo site_url('Admin/AdminUser/export_pdf');?>">Export To Pdf</a>
        </div>
		<hr/>		
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users</h3>			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>                  
				  <th>Address</th>                  
				  <th>Phone</th>                  
				  <th>Email</th>                  
				  <th>User Type</th>                  
				  <th>Status</th> 
				  <th>Action</th>				  
                </tr>
                </thead>
                <tbody>
                <?php foreach($rec as $r){ ?>			
					<tr>
					  <td><?=$r->Firstname?></td>
					  <td><?=$r->Lastname?></td>
					  <td><?=$r->Address?></td>
					  <td><?=$r->Phone?></td>
					  <td><?=$r->Email?></td>
					  <td><?=$r->Title?></td>
					  <td><?php if($r->Uflag==0){ echo "Deactive"; }else{echo "Active";}?></td>
					  <td><a href="<?php echo base_url().'Admin/AdminUser/update_user/'.$r->id; ?>" class="btn btn-info">Edit</a>
						  <a href="<?php echo base_url().'Admin/AdminUser/delete_user/'.$r->id; ?>" class="btn btn-danger" onclick="return confirm('Are you sure  to Delete?')">Delete</a>
						  <?php if($r->Uflag==0){ ?>
						  <a href="<?php echo base_url().'Admin/AdminUser/activate_user/'.$r->id; ?>" class="btn btn-success">Activate</a>						  
						  <?php }else{?>
						  <a href="<?php echo base_url().'Admin/AdminUser/activate_user/'.$r->id; ?>" class="btn btn-warning">Deactivate</a>
						  <?php } ?>
						  
					  </td>
					</tr> 
				<?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>                  
				  <th>Address</th>                  
				  <th>Phone</th>                  
				  <th>Email</th>                  
				  <th>User Type</th>                  
				  <th>Status</th>                  
                </tr>
                </tfoot>
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
  
  
 
  


