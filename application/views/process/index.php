<!-- page content -->
<div class="right_col" role="main">
            <div class="row">
            <?php $this->load->view('template/message');?>	

                    <div class="col-12 col-sm-12">
                    
                            
                            <div class="table-responsive">
                            <h4 class="x_title">All Process</h4>
                            <h5>(ORN : Office Recognition Number) Please note the ORN for future use</h5>
                                                <table id="file_export3" class="table table-bordered" >
                                                    <thead>
                                                        <tr>
                                                            <th>Sl No.</th>                                                            
                                                            <th>ORN</th> 
                                                            <th>Type</th>   
                                                            <th>Recieve Date</th>                                                            
                                                            <th>Recieve From</th>                                                                                                                                                                               
                                                            <th>Memono</th>                                                                                                                                                                               
                                                            <th>Send Date</th>
                                                            <th>Send To</th>                                                            
                                                            <th>OC Putup Date</th>                                                            
                                                            <th>Subject</th>                                                            
                                                            <th>Upload</th>
                                                            <th>File</th>
                                                            <?php if(in_array('createusers',$user_permission)){ ?>
                                                            <th>User</th>                                                            
                                                            <?php } ?>
                                                            <th>Entry Date Time</th>
                                                            <th>Action</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                           
                                                    </tbody>       
                                                </table>       
                            </div>                            
                           
                    </div>
                    </div>
</div>

         <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

        