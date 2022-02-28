</div>
<!-- footer content -->
<footer>
          <div class="pull-right">
          
          <?=$this->title?> by  <img src="<?=base_url()?>assets/images/logo-icon.png" alt="logo" width=25 class="img-fluid" />
          <span class="damion" style="font-size:18px;">Scientific Wing, DD</span>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>assets/build/js/custom.js"></script>



<script>

    /* datepicker */
    $('#p_recievedate').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
    $('#p_senddate').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
    $('#p_ocputup_date').datetimepicker({
        format: 'DD-MMM-YYYY'
    });

    $('#r_date').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
    $('#r_recievedate').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
    $('#r_supplydate').datetimepicker({
        format: 'DD-MMM-YYYY'
    });

    $('#from_date').datetimepicker({
        format: 'DD-MMM-YYYY'
    });

    $('#to_date').datetimepicker({
        format: 'DD-MMM-YYYY'
    });
    
/* datepicker */    

    /* User index */
        $('#file_export').DataTable({   
            dom: 'Bfrtip',
            autoWidth: false,
            order: [[ 0, "asc" ]],    
            scrollY:"350px",
            scrollX:true,
            scrollCollapse: true,
            fixedColumns: true,
            paging:false,
            buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
            rowReorder: {
                    selector: 'td:nth-child(2)'
                },
            responsive: true,    
            ajax: {
              type:'GET',
                url: '<?=base_url('Users/getUsers')?>',								
                }
        });
        $('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');

    /* User index */

/* User Group index */

    $('#file_export2').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    order: [[ 0, "asc" ]],    
    scrollY:"350px",
    scrollX:true,
    scrollCollapse: true,
    fixedColumns: true,
    paging:false,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },
    responsive: true,    
    ajax: {
			type:'GET',
		    url: '<?=base_url('User_Group/getUserGroup')?>',								
	      }
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');


/* User Group index */

/*Process index */

$('#file_export3').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    order: [[ 3, "desc" ]],        
    paging:true,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 },
        { responsivePriority: 3, targets: -2 },
        { responsivePriority: 4, targets: -3 }
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },
    responsive: true,    
    ajax: {
			type:'GET',
		    url: '<?=base_url('Process/getProcess')?>',								
	      }
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');


/* Process index */

/* Process upload scan */
Dropzone.options.myDropzone1 = {	
    autoProcessQueue:false,    
	dictDefaultMessage: "<i class='fa fa-cloud-upload' style='font-size:80px;'></i> <br /> Drop Image Here",
    acceptedFiles:".png,.jpg,.jpeg,.gif,.bmp,.JPEG,.JPG",		
	maxFiles: 1,
    //parallelUploads: 10000,    
    maxFilesize: 2,
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="anirban_secure_token"]').attr('content')
    },
    init: function() {
		
			var myDropzone1 = this;
			
			$("#upload_button1").click(function() {
				//alert("hh");
				//e.preventDefault();
				myDropzone1.processQueue();
				//alert("hh2");	                     
			});	
            
		}		
  };
/* Process upload scan */
/* Requisition upload scan */
Dropzone.options.myDropzone2 = {	
    autoProcessQueue:false,    
	dictDefaultMessage: "<i class='fa fa-cloud-upload' style='font-size:80px;'></i> <br /> Drop Image Here",
    acceptedFiles:".png,.jpg,.jpeg,.gif,.bmp,.JPEG,.JPG",		
	maxFiles: 1,
    //parallelUploads: 10000,        
    maxFilesize: 2,
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="anirban_secure_token"]').attr('content')
    },
    init: function() {
		
			var myDropzone2 = this;
			
			$("#upload_button2").click(function() {
				//alert("hh");
				//e.preventDefault();
				myDropzone2.processQueue();
				//alert("hh2");				
			});			
		}		
  };

 /* Requisition upload scan */ 

/*Requisition index */

$('#file_export4').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    order: [[ 2, "desc" ]],    
    
    scrollCollapse: true,
    fixedColumns: true,
    paging:true,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },
    responsive: true,    
    ajax: {
			type:'GET',
		    url: '<?=base_url('Requisition/getRequisition')?>',								
	      }
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');


/* Requisition index */




 /* Requisition requisition search */ 
 $('#file_export5').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    order: [[ 2, "desc" ]],    
    
    scrollCollapse: true,
    fixedColumns: true,
    paging:true,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },
    responsive: true,       
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');

 /* Requisition requisition search */ 


/* Items search */ 
$('#file_export6').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    order: [[ 2, "desc" ]],    
    
    scrollCollapse: true,
    fixedColumns: true,
    paging:true,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },       
    responsive: true,       
    ajax: {
			type:'GET',
		    url: '<?=base_url('Items/getItems')?>',								
	      }
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');

 /* items search */ 

 /* user log */ 
$('#file_export7').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    scrollCollapse: true,
    fixedColumns: true,
    paging:true,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },       
    responsive: true,       
    ajax: {
			type:'GET',
		    url: '<?=base_url('Users/getUsersLog')?>',								
	      }
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');

 /* user log */ 

 

 /* entry log */ 
$('#file_export8').DataTable({   
    dom: 'Bfrtip',
    autoWidth: false,
    scrollCollapse: true,
    fixedColumns: true,
    paging:true,
    buttons: [
                    { 
                extend: 'pdf', 
                text:'<i class="fa fa-file-pdf-o"></i> Pdf',
                        className: 'btn btn-danger btn-sm btn-flat btn-raised',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'				
              },
                    { 
                extend: 'excel', 
                text:'<i class="fa fa-file-excel-o"></i> Excel',
                className: 'btn btn-success btn-sm btn-flat btn-raised'				
              }
            ],
    columnDefs: [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: -1 }
    ],
    rowReorder: {
            selector: 'td:nth-child(2)'
        },       
    responsive: true           
});
$('.buttons-print, .buttons-excel').addClass('btn btn-primary mr-1');

 /* entry log */ 


  </script>  



    </body>
</html>    