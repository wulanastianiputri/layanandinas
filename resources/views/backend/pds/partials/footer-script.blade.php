<!-- FOOTER SCRIPT AWAL -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script> 
<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- SlimScroll -->
<script type="text/javascript" src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script> 

<script>
  $(function () {
	 $('#example1').DataTable()
     $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@yield('script')
<!-- FOOTER SCRIPT AKHIR -->