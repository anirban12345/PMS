<!-- page content -->
<div class="right_col" role="main">
            <div class="row">


 
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    <?php foreach($users as $r) {?>
                    <form action="<?=base_url('Users/updateUsers?q='.urlencode($this->encrypt->encode($r->u_id)))?>" method="post"> 
                        <!-- CRSF -->
                        <?php 
                        $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                        );
                        ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <!-- CRSF -->

                            <div class="card-body table-responsive">
                                <h4 class="card-title">User Details</h4>
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>Username</th>                                        
                                    </tr>
                                   
                                    <tr>
                                        <td><?=$r->u_username?></td> 
                                    </tr>
                                    
                                    </table>

                                   
                                        <label class="m-t-20">Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Name" id="u_title" name="u_title" value="<?=$r->u_title?>" autocomplete="off" />                                                                                
                                        <?php echo form_error('u_title'); ?>
                                   

                                   
                                        <label class="m-t-20">User Group</label>
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="u_ugid" name="u_ugid">
                                                        <option value="select">Select</option>
                                                        <?php foreach($user_group as $r1){ ?>
                                                        <option value="<?=$r1->ug_id?>" <?=$r->u_ugid==$r1->ug_id?'selected':''?>><?=$r1->ug_name?></option>
                                                        <?php } ?>   
                                        </select>   
                                   
                            
                            
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