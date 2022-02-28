
<!-- page content -->
<div class="right_col" role="main">
            <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card" id="myform">
                        <?php foreach($users as $r) {?>
                        <form action="<?=base_url('Users/updateMyprofile?q='.urlencode($this->encrypt->encode($r->u_id)))?>" method="post"> 
                            
                            <!-- CRSF -->
                            <?php 
                            $csrf = array(
                                    'name' => $this->security->get_csrf_token_name(),
                                    'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <!-- CRSF -->

                            <div class="card-body">
                                <h4 class="card-title">My Profile</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="m-t-20">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="u_title" name="u_title" value="<?=$r->u_title?>">                                                                                
                                        <?php echo form_error('u_title'); ?>
                                    </div>                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Username" id="u_username" name="u_username" value="<?=$r->u_username?>" readonly />                                                                                
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Password</label>
                                        <input type="text" class="form-control" placeholder="Enter Password" id="u_password1" name="u_password1" value="<?=$this->encrypt->decode($r->u_password)?>">                                                                                
                                        <?php echo form_error('u_password1'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Enter Password" id="u_password2" name="u_password2" value="<?=$this->encrypt->decode($r->u_password)?>">                                                                                
                                        <?php echo form_error('u_password2'); ?>
                                    </div>
                                </div>                         
                            </div>
                            <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary">Save</button>
                            </div>
                        </form>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->


<script>
    $('.select2').select2();

    // MAterial Date picker    
    $('#c_date').bootstrapMaterialDatePicker({ 
        weekStart: 0, 
        time: false,
        format: 'DD-MMMM-YYYY'
        });
</script>    
