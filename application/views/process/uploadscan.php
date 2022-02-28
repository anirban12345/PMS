<!-- page content -->
<div class="right_col" role="main">
            <div class="row">
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                            <div class="card-body " id="myform">
                            <?php foreach($pdata as $r){ ?>
                            <h4 class="x_title">Already Uploaded Scanned Documents of ORN: <span class="text-white badge badge-primary"><?=$r->p_orn?></span></h4>
                            <div class="table-responsive">
                            <table class="table table-bordered" >
                                                    <thead>
                                                        <tr>                                                      
                                                            <th>Type</th>   
                                                            <th>Recieve Date</th>                                                            
                                                            <th>Recieve From</th>                                                                                                                                                                               
                                                            <th>Memo No</th>   
                                                            <th>Subject</th>                                                                                                                                                                            
                                                            <th>Send Date</th>
                                                            <th>Send To</th> 
                                                            <th>Remarks</th>                                                           
                                                            <th>OC Putup Date</th>
                                                            <th>Status</th>                                                             
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td><?=$r->p_type?></td>   
                                                                <td><?=date('d-M-Y',strtotime($r->p_recievedate))?></td>                                                            
                                                                <td><?=$r->p_recievefrom?></td>                                                                                                                                                                               
                                                                <td><?=$r->p_memono?></td> 
                                                                <td><?=$r->p_subject?></td>                                                                
                                                                <td><?=date('d-M-Y',strtotime($r->p_senddate))?></td>
                                                                <td><?=$r->p_sendto?></td> 
                                                                <td><?=$r->p_remarks?></td>                                                                                                                                                                                                                                              
                                                                <td><?=date('d-M-Y',strtotime($r->p_ocputup_date))?></td>
                                                                <td><?=$r->p_status?></td>                              
                                                            </tr> 
                                                    </tbody>       
                                                </table>
                            </div>                     
                            <?php  } ?>

                            <?php if(count($sdata)==0) {?>
                                <h2 class="text-danger">No Files Has Been Uploaded Yet</h2>
                            <?php } else{ ?>                                    
                            <table>
                            <tr>
                            <?php foreach($sdata as $r){ ?> 
                                <td>
                                    
                                    <?php 
                                    //$image = file_get_contents(base_url().'uploads/processscan'.'/'.$r->p_orn.'/'.$r->pi_name);
                                    //$image_codes = base64_encode($image);
                                    ?>
                                    <a class="example-image-link" href="<?=base_url().'uploads/processscan'.'/'.$r->p_orn.'/'.$r->pi_name?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-thumbnail" width=100 src="<?=base_url().'uploads/processscan'.'/'.$r->p_orn.'/'.$r->pi_name?>" alt=""/></a>
                                    
                                    <?php if(in_array('deletescan',$user_permission)){ ?>
                                    <p class="text-center"><a class="text-danger" href="<?=base_url('Process/deleteScan/?q='.urlencode($this->encrypt->encode($r->pi_id)))?>"> Delete </a></p>
                                    <?php } ?>
                                </td>
                            <?php }} ?>
                            </tr>                            
                            </table>

                            <br />    
                            <br />    
                                <?php foreach($pdata as $r){ ?>
                                <h4 class="x_title">Upload Scanned Documents(Max 2MB) of ORN: <span class="text-white badge badge-primary"><?=$r->p_orn?></span]></h4> 
                                
                                <form action="<?php echo site_url('Process/upload/'.$r->p_id.'/'.$r->p_orn); ?>" class="dropzone" id="myDropzone1">
                                    <!-- CRSF -->
                                    <?php 
                                    $csrf = array(
                                            'name' => $this->security->get_csrf_token_name(),
                                            'hash' => $this->security->get_csrf_hash()
                                    );
                                    ?>
                                    <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                    <!-- CRSF -->
                                </form>
                                <?php } ?> 			 
                            </div> 
                            <div class="card-footer">
                             <button type="button" class="btn waves-effect waves-light btn-primary btn-sm" id="upload_button1">Upload</button> <span class="font-weight-bold text-success">After complition of file scan upload , please press F5 to refresh</span>
                            </div>                                                      
                        </div>                                                       
                    </div>
                </div>
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

