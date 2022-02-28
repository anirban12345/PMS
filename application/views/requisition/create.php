<!-- page content -->
<div class="right_col" role="main">
            <div class="row">


 
    <div class="col-12 col-sm-12">
                    <div class="card" id="myform">
                    
                    <form action="<?=base_url('Requisition/saveRequisition')?>" method="post"> 
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
                                <h4 class="x_title">Create Requisition</h4>
                                <div class="row">

                                    <div class='col-12'>
                                        <label class="m-t-20">Requisition Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Requisition Date" id="r_date" name="r_date" value="<?=set_value('r_date')?>" />                                                                                
                                        <?php echo form_error('r_date'); ?>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Section For</label>
                                        <input type="text" class="form-control" placeholder="Enter Section For" id="r_sectionfor" name="r_sectionfor" value="<?=set_value('r_sectionfor')?>">                                                                                
                                        <?php echo form_error('r_sectionfor'); ?>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label class="m-t-20">Subject</label>
                                        <textarea rows=5 placeholder="Enter Subject" class="form-control" id="r_sub" name="r_sub"></textarea>                                                                                
                                        <?php echo form_error('r_sub'); ?>
                                    </div>
                                    
                                    <div class="col-12">
                                    <br/>
                                    <button type="button" name="add" id="add" class="btn btn-success btn-sm m-t-20">Add Items</button>
                                    </div>


                                    <div id="dynamic_field" style="width:100%;">
                                    
                                    </div> 
                                    

                                    <div class="col-12">
                                        <label class="m-t-20">To Whom</label>
                                        <input type="text" class="form-control" placeholder="Enter To Whom" id="r_towhom" name="r_towhom" value="<?=set_value('r_towhom')?>">                                                                                
                                        <?php echo form_error('r_towhom'); ?>
                                    </div>   

                                    <div class='col-12'>
                                        <label class="m-t-20">Forwarded To</label>
                                        <input type="text" class="form-control" placeholder="Enter Forwarded To" id="r_forwardedto" name="r_forwardedto" value="<?=set_value('r_forwardedto')?>" />                                                                                
                                        <?php echo form_error('r_forwardedto'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Dealing Section</label>
                                        <input type="text" class="form-control" placeholder="Enter Dealing Section" id="r_dealingsec" name="r_dealingsec" value="<?=set_value('r_dealingsec')?>">                                                                                
                                        <?php echo form_error('r_dealingsec'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Enter Status</label>
                                        <select class="form-control" id="r_status" name="r_status" required>
                                            <option value="">Select</option>
                                            <option value="PENDING">PENDING</option>
                                            <option value="PENDING(Reminder)">PENDING(Reminder)</option>
                                            <option value="RECEIVED">RECEIVED</option>                                            
                                            <option value="PARTLY RECEIVED">PARTLY RECEIVED</option>                                            
                                            <option value="REJECTED">REJECTED</option>                                                                                      
                                        </select>
                                        <?php echo form_error('r_status'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Recieve Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Recieve Date" id="r_recievedate" name="r_recievedate" value="<?=set_value('r_recievedate')?>">                                                                                
                                        <?php echo form_error('r_recievedate'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Supply Date</label>
                                        <input type="text" class="form-control" placeholder="Enter Supply Date" id="r_supplydate" name="r_supplydate" value="<?=set_value('r_supplydate')?>">                                                                                
                                        <?php echo form_error('r_supplydate'); ?>
                                    </div>

                                    <div class="col-12">
                                        <label class="m-t-20">Remarks</label>
                                        <textarea rows=5 placeholder="Enter Remarks" class="form-control" id="r_remarks" name="r_remarks"></textarea>                                        
                                        <?php echo form_error('r_remarks'); ?>
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

/*
$('#add').click(function(){  
        
        alert('aa');

});
*/

    var i=1;  
    $('#add').click(function(){  
        
        //alert('aa');

           i++;  
           $('#dynamic_field').append('<div id="row'+i+'" class="col-12">'+
                                        '<div class="row">'+
                                        '<div class="col-6">'+
                                        '<label class="m-t-20">Item Name</label>'+
                                        '<select class="form-control" id="itemid" name="itemid[]">'+
                                        '<option value="select">Select</option>'+
                                        <?php foreach($items as $r) { ?>
                                        '<option value="<?=$r->items_id?>"><?=$r->items_name?></option>'+
                                        <?php }?>
                                        '</select>'+
                                        '</div>'+
                                        '<div class="col-5">'+
                                        '<label class="m-t-20">Quantity</label>'+
                                        '<input type="text" class="form-control" placeholder="Enter Quantity" id="qty" name="qty[]" value="" />'+
                                        '</div>'+
                                        '<div class="col-1">'+
                                        '<label class="m-t-20">Remove</label>'+
                                        '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button>'+
                                        '</div>'+
                                        '</div>'+
                                        '</div>');  
    });  

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

</script>