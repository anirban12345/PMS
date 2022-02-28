<!-- page content -->
<div class="right_col" role="main">
            <div class="row">


 
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    
                    <form action="<?=base_url('Items/saveItems')?>" method="post"> 
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
                                <h4 class="card-title">Create Items Details</h4>                                    
                                   
                                        <label class="m-t-20">Item Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Items Name" id="items_name" name="items_name" value="" autocomplete="off" />                                                                                
                                        <?php echo form_error('items_name'); ?>
                           </div>
                           <div class="card-footer">
                             <button type="submit" class="btn btn-sm waves-effect waves-light btn-primary">Save</button>
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