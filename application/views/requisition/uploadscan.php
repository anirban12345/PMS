<!-- page content -->
<style>
.x_title span
{
    color:black;
}
</style>
<div class="right_col" role="main">
            <div class="row">
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                            <div class="card-body" id="myform">
                            <?php foreach($rdata as $r){ ?>
                            <h4 class="x_title ">Already Uploaded Scanned Documents of ORN: <span class="badge badge-warning"><?=$r->r_orn?></span></h4>
                            <table class="table table-bordered" >
                                                    <thead>
                                                        <tr>                                                        
                                                            <th>Requisition Date</th>                                                            
                                                            <th>Section For From</th>                                                                                                                                                                               
                                                            <th>Subject</th>   
                                                            <th>To Whom</th>                                                                                                                                                                            
                                                            <th>Forwarded To</th>
                                                            <th>Dealing Sec</th> 
                                                            <th>Recieve Date</th>                                                           
                                                            <th>Status</th>
                                                            <th>Supply Date</th>                                                             
                                                            <th>Remarks</th>   
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>                                                                
                                                                <td><?=date('d-M-Y',strtotime($r->r_date))?></td>                                                            
                                                                <td><?=$r->r_sectionfor?></td>                                                                                                                                                                               
                                                                <td><?=$r->r_sub?></td> 
                                                                <td><?=$r->r_towhom?></td>                                                                
                                                                <td><?=$r->r_forwardedto?></td>                                                                
                                                                <td><?=$r->r_dealingsec?></td> 

                                                                <?php if(date('d-M-Y',strtotime($r->r_recievedate))=='01-Jan-1970' || date('d-M-Y',strtotime($r->r_recievedate))=='30-Nov--0001'){ ?>                  
                                                                <td>PENDING</td>
                                                                <?php } else {?>
                                                                <td><?=date('d-M-Y',strtotime($r->r_recievedate))?></td>
                                                                <?php }?>
                                                                <td><?=$r->r_status?></td>                              
                                                                <?php if(date('d-M-Y',strtotime($r->r_supplydate))=='01-Jan-1970' || date('d-M-Y',strtotime($r->r_supplydate))=='30-Nov--0001'){ ?>                  
                                                                <td>PENDING</td>
                                                                <?php } else {?>
                                                                <td><?=date('d-M-Y',strtotime($r->r_supplydate))?></td>
                                                                <?php }?>
                                                                <td><?=$r->r_remarks?></td>                            
                                                            </tr> 
                                                    </tbody>       
                                                </table> 
                            <?php  } ?>


                            
                            <h4 class="x_title">Items</h4>                     
                            <table class="table table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th>Sl.No</th>                                                             
                                                            <th>Items Name</th>                                                            
                                                            <th>Qty</th>                                                                                                                                                                                                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; foreach($idata as $r){ ?>      
                                                            <tr>
                                                                <td><?=$i++?></td>                                                                                                                                
                                                                <td><?=$r->items_name?></td> 
                                                                <td><?=$r->ri_qty?></td>                                                                                                                                                                                                                                                                         
                                                            </tr> 
                                                        <?php  } ?>
                                                    </tbody>       
                            </table> 
                            
                            
                            <h4 class="x_title">Documents</h4>     
                            <?php if(count($sdata)==0) {?>
                                <h2 class="text-danger">No Files Has Been Uploaded Yet</h2>
                            <?php } else{ ?>                                    
                            <table>
                            <tr>
                            <?php foreach($sdata as $r){ ?>                            
                            <td>

                            <?php 
                                    //$image = file_get_contents('D:/uploads/requisitionscan/'.$r->r_orn.'/'.$r->rf_filename);
                                    //$image_codes = base64_encode($image);

                            ?>
                            <a class="example-image-link" href="<?=base_url().'uploads/requisitionscan/'.$r->r_orn.'/'.$r->rf_filename?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-thumbnail" width=100 src="<?=base_url().'uploads/requisitionscan/'.$r->r_orn.'/'.$r->rf_filename?>" alt=""/></a>
                                    

                            <?php if(in_array('deletescan',$user_permission)){ ?>
                            <p class="text-center"><a class="text-danger" href="<?=base_url('Requisition/deleteScan/?q='.urlencode($this->encrypt->encode($r->rf_id)))?>"> Delete </a></p>
                            <?php  } ?>    
                            </td>                            
                            <?php }} ?>
                            </tr>                            
                            </table>
                            <br />    
                            <br />    
                                <?php foreach($rdata as $r){ ?>
                                <h4 class="x_title">Upload Scanned Documents(MAX 2MB) of ORN: <span class="badge badge-warning"><?=$r->r_orn?></span></h4> 
                                
                                
                                <form action="<?php echo site_url('Requisition/upload/'.$r->r_id.'/'.$r->r_orn); ?>" class="dropzone" id="myDropzone2">
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
                             <button type="button" class="btn waves-effect waves-light btn-primary btn-sm" id="upload_button2">Upload</button> <span class="font-weight-bold text-success">After complition of file scan upload , please press F5 to refresh</span>
                            </div>                                                      
                        </div>                                                       
                    </div>
                </div>
            </div>
         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

