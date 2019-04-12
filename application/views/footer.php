 <footer class="main-footer" id="footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-<?= date('Y') ?> <a href="https://9yug.net">9YUG.NET</a>.</strong> All rights reserved.
  </footer>
  <script type="text/javascript">
function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  // Added to allow decimal, period, or delete
  if (charCode == 110 || charCode == 190 || charCode == 46) 
    return true;
  
  if (charCode > 31 && (charCode < 48 || charCode > 57)) 
    return false;
  
  return true;
} // isNumberKey


function autoLogout()
{

alert("hii2");
  // if(isset(session_id())
  // {
  //   alert("hii");
  // }
}



function isAlpha(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
    return false;

  return true;
}
/*use to make whole project autocomplete off*/
$(document).ready(function(){ 
    $("input").attr("autocomplete", "off");
}); 

/*form validation*/

</script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  -->
<script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/bootstrap/js/bootstrap.js"></script> -->
<!-- AdminLTE App -->

<script src="<?= base_url() ;?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/build/js/Treeview.js"></script> -->

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ;?>assets/admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="<?= base_url() ;?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/popper/popper.min.js"></script> -->
<!-- jVectorMap -->
<script src="<?= base_url() ;?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ;?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<!-- <script src="<?= base_url() ;?>assets/admin/plugins/chartjs-old/Chart.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
<script src="<?= base_url() ;?>assets/admin/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ;?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
 <script src="<?= base_url() ;?>assets/js/common.js"></script>
 <script src="<?= base_url() ;?>assets/admin/dist/js/plugins/bootbox.min.js"></script>
 <script src="<?= base_url() ;?>assets/admin/plugins/fastclick/fastclick.js"></script>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  -->
     
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script> -->

<!--  <script type="text/javascript">
     $(document).ready(function(){
  $('.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link').click(function(){
    $('.nav-item>.nav-link').removeClass("active");
    $(this).addClass("active");
});
});
   </script>
   <script type="text/javascript">
     $(document).ready(function(){
  $('.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-treeview>.nav-link').click(function(){
    $('.nav-item>.nav-link').removeClass("active");
    $(this).addClass("active");
});
});
   </script>	 -->

<!-- PAGE SCRIPTS -->
 <!-- <script src="<?= base_url() ;?><assets/admin/dist/js/pages/dashboard2.js"></script> -->
 
</body>
</html>