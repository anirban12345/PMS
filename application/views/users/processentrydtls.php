<!-- page content -->
<div class="right_col" role="main">
            <div class="row">
            <?php $this->load->view('template/message');?>	

                    <div class="col-12 col-sm-12">
                    
                            
                            <div class="table-responsive">
                            <h4 class="x_title">All Process Entry Between <?=$fromdate?> And  <?=$todate?></h4>
                            <table id="file_export8" class="table table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>                                                                                                                        
                                                            <th>User</th>                                                            
                                                            <th>Entry Count</th>                                                                                                                                                                                                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php $i=1; foreach($entrydtls as $r){ ?> 
                                                          <tr>
                                                            <td><?=$i++?></td>                                                                                                                         
                                                            <td><?=$r->u_title?></td>                                                                                                                                                                               
                                                            <td><?=$r->count?></td>                                                                 
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

        