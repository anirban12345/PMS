<!-- page content -->
<div class="right_col" role="main">

            <div class="row">


 
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    
                    <form action="<?=base_url('Process/saveProcess')?>" method="post"> 
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
                                <h4 class="x_title">Create Process</h4>
                                <div class="row">
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Process Type</label>
                                        <select class="form-control select2_single" id="p_type" name="p_type" >
                                            <option>Select</option>
                                            <option value="File">File</option>
                                            <option value="Paper">Paper</option>                                            
                                            <option value="Folder">Folder</option>
                                            <option value="Gov.Mail">Gov.Mail</option>
                                            <option value="GMail">GMail</option>
                                            <option value="Zimbra">Zimbra</option>                                            
                                        </select>
                                        <?php echo form_error('p_type'); ?>
                                    </div>

                                    <div class='col-12'>
                                        <label class="m-t-20">Recieve Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Recieve Date" id="p_recievedate" name="p_recievedate" value="<?=set_value('p_recievedate')?>" />                                                                                
                                        <?php echo form_error('p_recievedate'); ?>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Recieve From</label>
                                        <input type="text" class="form-control" placeholder="Enter Recieve From" id="p_recievefrom" name="p_recievefrom" value="<?=set_value('p_recievefrom')?>">                                                                                
                                        <?php echo form_error('p_recievefrom'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Memo No</label>
                                        <input type="text" class="form-control" placeholder="Enter Memo No" id="p_memono" name="p_memono" value="<?=set_value('p_memono')?>">                                                                                
                                        <?php echo form_error('p_memono'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Subject</label>
                                        <input type="text" class="form-control" placeholder="Enter Subject" id="p_subject" name="p_subject" value="<?=set_value('p_subject')?>">                                                                                
                                        <?php echo form_error('p_subject'); ?>
                                    </div>   
                                    <div class='col-12'>
                                        <label class="m-t-20">Send Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Send Date" id="p_senddate" name="p_senddate" value="<?=set_value('p_senddate')?>" />                                                                                
                                        <?php echo form_error('p_senddate'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Send To</label>
                                        <input type="text" class="form-control" placeholder="Enter Send To" id="p_sendto" name="p_sendto" value="<?=set_value('p_sendto')?>">                                                                                
                                        <?php echo form_error('p_sendto'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Remarks</label>
                                        <input type="text" class="form-control" placeholder="Enter Remarks" id="p_remarks" name="p_remarks" value="<?=set_value('p_remarks')?>">                                                                                
                                        <?php echo form_error('p_remarks'); ?>
                                    </div>

                                    <div class='col-12'>
                                        <label class="m-t-20">OC Putup Date</label>
                                        <input type="text" class="form-control" placeholder="Enter OC Putup Date" id="p_ocputup_date" name="p_ocputup_date" value="<?=set_value('p_ocputup_date')?>" />                                                                                
                                        <?php echo form_error('p_ocputup_date'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Status</label>
                                        <input type="text" class="form-control" placeholder="Enter Status" id="p_status" name="p_status" value="<?=set_value('p_status')?>">                                                                                
                                        <?php echo form_error('p_status'); ?>
                                    </div>
                                </div>
                            
                            
                           </div>
                           <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary btn-sm">Save</button>
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
 
</script>