<!-- page content -->
<div class="right_col" role="main">
            <div class="row">
                    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    <?php foreach($user_group as $r) {?>
                    <form action="<?=base_url('User_Group/updateUserGroup?q='.urlencode($this->encrypt->encode($r->ug_id)))?>" method="post"> 
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
                                <h4 class="card-title">User Group Details</h4>
                                    
                                <label class="m-t-20">User Group Name</label>
                                <input type="text" class="form-control" placeholder="Enter User Group Name" id="ug_name" name="ug_name" value="<?=$r->ug_name?>" autocomplete="off" />                                                                                
                                <?php echo form_error('ug_name'); ?>
                            </div>
                            <div class="card-body">
                            
                            <h4 class="card-title">User Permissions</h4>                                   
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="createprocess" name="ug_permission[]" value="createprocess" <?php if(in_array('createprocess',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="createprocess">Create Process</label>
                            </div> 
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="updateprocess" name="ug_permission[]" value="updateprocess" <?php if(in_array('updateprocess',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="updateprocess">Update Process</label>
                            </div> 
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="uploadscan" name="ug_permission[]" value="uploadscan" <?php if(in_array('uploadscan',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="uploadscan">Upload Scan</label>
                            </div> 

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="deletescan" name="ug_permission[]" value="deletescan" <?php if(in_array('deletescan',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="deletescan">Delete Scan</label>
                            </div> 
                            

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="createusers" name="ug_permission[]" value="createusers" <?php if(in_array('createusers',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="createusers">Create Users</label>
                            </div> 

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="updateusers" name="ug_permission[]" value="updateusers" <?php if(in_array('updateusers',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="updateusers">Update Users</label>
                            </div> 

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="createusergroup" name="ug_permission[]" value="createusergroup"  <?php if(in_array('createusergroup',unserialize($r->ug_permission))){echo 'checked';} ?> />
                                <label class="custom-control-label m-t-20" for="createusergroup">Create User Group</label>
                            </div> 

                            <?php } ?>
                           </div>
                           <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary">Save</button>
                            </div>
                        </form> 
                        </div>                                                       
                    </div>
                </div>
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

<script>
    $('.select2').select2();
</script>