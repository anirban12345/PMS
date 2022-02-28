<?php if($this->session->userdata('successmsg')){?>
<script>
toastr.options = {
					  "closeButton": true,		
					  "debug": false,
					  "positionClass": "toast-bottom-center",
					  "progressBar": true,
					  "onclick": null,
					  "fadeIn": 300,
					  "fadeOut": 1000,
					  "timeOut": 5000,
					  "extendedTimeOut": 1000
					}
					// show when the button is clicked
toastr.info('<?php echo $this->session->userdata('successmsg'); ?></span>','<?=$this->title?>');
</script>
<?php } ?> 
<?php if($this->session->userdata('errmsg')){?>

<script>
	toastr.options = {
					  "closeButton": true,		
					  "debug": false,
					  "positionClass": "toast-bottom-center",
					  "progressBar": true,
					  "onclick": null,
					  "fadeIn": 300,
					  "fadeOut": 1000,
					  "timeOut": 5000,
					  "extendedTimeOut": 1000
					}
					// show when the button is clicked
	toastr.error('<?php echo $this->session->userdata('errmsg'); ?></span>','<?=$this->title?>');
</script>
<?php } ?> 
