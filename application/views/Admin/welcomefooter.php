<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="<?php echo base_url()."assets/" ?>">Scientific Wing | Kolkata Police</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()."assets/" ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()."assets/" ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="<?php echo base_url()."assets/" ?>js/lightbox-plus-jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()."assets/" ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Morris.js charts -->
<script src="<?php echo base_url()."assets/" ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>bower_components/morris.js/morris.min.js"></script>


<!-- Sparkline -->
<script src="<?php echo base_url()."assets/" ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url()."assets/" ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()."assets/" ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()."assets/" ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url()."assets/" ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url()."assets/" ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/" ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/" ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()."assets/" ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url()."assets/" ?>dist/js/demo.js"></script>
<script src="<?php echo base_url()."assets/" ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/" ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>

<script>
  $(function () {
    $('#example2').DataTable()
    /*$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })*/
  })
</script>


<?php
if(isset($rec))
{
	$chart_data="";
	foreach($rec as $r)
	{ 
	  $date=date_create($r->udate);
	  $chart_data.= "{Date:'".date_format($date,"d-M-Y")."',Users:".$r->noofuser."},";
	}
}
?>
<script>
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'bar-chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [<?php echo $chart_data; ?>],
  
  // The name of the data record attribute that contains x-values.
  xkey: 'Date',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['Users'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Users']
});
</script>

<?php
//print_r($rec2);
if(isset($rec2))
{
	$chart_data1="";
	foreach($rec2 as $r)
	{ 
	  $date=date_create($r->Entry_Date);
	  $chart_data1.= "{Date:'".date_format($date,"d-M-Y")."',No_of_Porcess:".$r->noofprocess."},";
	}
}
//print_r($chart_data1);
?>

<script>
new Morris.Bar({  
  element: 'line_chart_process',  
  data: [<?php echo $chart_data1; ?>],
  xkey: 'Date',
  ykeys: ['No_of_Porcess'],
  labels: ['No_of_Porcess']
});
</script>




