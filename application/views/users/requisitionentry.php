<!-- page content -->
<div class="right_col" role="main">
            <div class="row">


 
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    
                    <form action="<?=base_url('Users/searchRequisitionEntryByDate')?>" method="post"> 

                            <div class="card-body table-responsive">
                                <h4 class="x_title">Search Requisition Entry Between Dates</h4>
                                <div class="row">

                                       <!-- CRSF -->
                                        <?php 
                                        $csrf = array(
                                                'name' => $this->security->get_csrf_token_name(),
                                                'hash' => $this->security->get_csrf_hash()
                                        );
                                        ?>
                                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                        <!-- CRSF -->
                          
                                    <div class='col-6'>
                                        <label class="m-t-20">From Date</label>
                                        <input type="text" class="form-control" placeholder="Enter From Date" id="from_date" name="from_date" />                                                                                
                                       
                                    </div>

                                    <div class='col-6'>
                                        <label class="m-t-20">To Date</label>
                                        <input type="text" class="form-control" placeholder="Enter To Date" id="to_date" name="to_date" />                                                                                                                      
                                    </div>
                                    
                                </div>
                                <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                           </div>
                           <div class="card-footer">
                             <button type="submit" class="btn waves-effect waves-light btn-primary btn-sm">Search</button>
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