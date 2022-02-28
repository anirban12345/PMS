<!-- page content -->
<div class="right_col" role="main">
            <div class="row">


 
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    <?php foreach($process as $r) {?>
                    <form action="<?=base_url('Process/updateProcess?q='.urlencode($this->encrypt->encode($r->p_id)))?>" method="post"> 
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
                                <h4 class="x_title">Edit Process</h4>
                                    
                               

                                <div class="row">
                                    <div class="col-12">
                                        <label class="m-t-20">ORN</label>
                                        <h3><span class="badge badge-primary"><?=$r->p_orn?></span></h3>                                        
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Process Type</label>
                                        <select class="form-control select2_single" id="p_type" name="p_type" >
                                            <option>Select</option>                                            
                                            <option value="File" <?=$r->p_type=='File'?'selected':''?>>File</option>
                                            <option value="Paper"<?=$r->p_type=='Paper'?'selected':''?>>Paper</option>                                            
                                            <option value="Folder" <?=$r->p_type=='Folder'?'selected':''?>>Folder</option>
                                            <option value="Gov.Mail"<?=$r->p_type=='Gov.Mail'?'selected':''?>>Gov.Mail</option>
                                            <option value="GMail"<?=$r->p_type=='GMail'?'selected':''?>>GMail</option>
                                            <option value="Zimbra" <?=$r->p_type=='Zimbra'?'selected':''?>>Zimbra</option> 
                                        </select>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Recieve Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Recieve Date" id="p_recievedate" name="p_recievedate" value="<?=date('d-M-Y',strtotime($r->p_recievedate))?>" />                                                                                
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Recieve From</label>
                                        <input type="text" class="form-control" placeholder="Enter Recieve From" id="p_recievefrom" name="p_recievefrom" value="<?=$r->p_recievefrom?>">                                                                                
                                        <?php echo form_error('p_recievefrom'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Memo No</label>
                                        <input type="text" class="form-control" placeholder="Enter Memo No" id="p_memono" name="p_memono" value="<?=$r->p_memono?>">                                                                                
                                        <?php echo form_error('p_memono'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Subject</label>
                                        <input type="text" class="form-control" placeholder="Enter Subject" id="p_subject" name="p_subject" value="<?=$r->p_subject?>">                                                                                
                                        <?php echo form_error('p_subject'); ?>
                                    </div>                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Send Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Send Date" id="p_senddate" name="p_senddate" value="<?=date('d-M-Y',strtotime($r->p_senddate))?>" />                                                                                
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Send To</label>
                                        <input type="text" class="form-control" placeholder="Enter Send To" id="p_sendto" name="p_sendto" value="<?=$r->p_sendto?>">                                                                                
                                        <?php echo form_error('p_sendto'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Remarks</label>
                                        <input type="text" class="form-control" placeholder="Enter Remarks" id="p_remarks" name="p_remarks" value="<?=$r->p_remarks?>">                                                                                
                                        <?php echo form_error('p_remarks'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">OC Putup Date</label>
                                        <input type="text" class="form-control" placeholder="Enter OC Putup Date" id="p_ocputup_date" name="p_ocputup_date" value="<?=date('d-M-Y',strtotime($r->p_ocputup_date))?>">                                                                                
                                        <?php echo form_error('p_ocputup_date'); ?>
                                    </div>
                                    <div class="col-12">
                                        <label class="m-t-20">Status</label>
                                        <input type="text" class="form-control" placeholder="Enter Status" id="p_status" name="p_status" value="<?=$r->p_status?>">                                                                                
                                        <?php echo form_error('p_status'); ?>
                                    </div>
                                </div>
                            
                            <?php } ?>
                           </div>
                           <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary btn-sm">Update</button>
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