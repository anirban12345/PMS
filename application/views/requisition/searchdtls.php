<!-- page content -->
<div class="right_col" role="main">
            <div class="row">
            <?php $this->load->view('template/message');?>	

                    <div class="col-12 col-sm-12">
                    
                            
                            <div class="table-responsive">
                            <h4 class="x_title">All Requisition Between <?=$fromdate?> And  <?=$todate?></h4>
                                                <table id="file_export5" class="table table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>                                                            
                                                            <th>ORN</th> 
                                                            <th>Requisition Date</th>                                                            
                                                            <th>Section For From</th>                                                                                                                                                                               
                                                            <th>Subject</th> 
                                                            <th>To Whom</th>                                                                                                                                                                                                                                        
                                                            <th>Forwarded To</th>                                                                                                                                                                                  
                                                            <th>Status</th>                                                            
                                                            <th>Remarks</th>   
                                                            <th>Action</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php $i=1; foreach($allrec as $r){ ?> 
                                                          <tr>
                                                            <td><?=$i++?></td> 
                                                            <td><h6><span class="badge badge-warning"><?=$r->r_orn?></span></h6></td> 
                                                            <td><?=date('d-M-Y',strtotime($r->r_date))?></td>                                                            
                                                            <td><?=$r->r_sectionfor?></td>                                                                                                                                                                               
                                                            <td><?=$r->r_sub?></td>     
                                                            <td><?=$r->r_towhom?></td>
                                                            <td><?=$r->r_forwardedto?></td>                                                                                                      
                                                            <td><?=$r->r_status?></td>                                                            
                                                            <td><?=$r->r_remarks?></td>   
                                                            <td>
                                                            <a role="button" href="<?=base_url('Requisition/edit?q='.urlencode($this->encrypt->encode($r->r_id)))?>" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-edit"></i> Edit</a>
                                                            <a role="button" href="<?=base_url('Requisition/uploadScan?q='.urlencode($this->encrypt->encode($r->r_id)))?>" class="btn btn-success btn-sm waves-effect waves-light"><i class="fa fa-upload"></i> Upload</a>
                                                            </td> 
                                                           </tr> 
                                                          <?php } ?> 
                                                    </tbody>       
                                                </table>       
                            </div>                            
                           
                    </div>
                    </div>
</div>

         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

        