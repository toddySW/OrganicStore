<!-- plugins:js -->

    <!-- End custom js for-->
    <script src="../view/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../view/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../view/assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../view/assets/js/off-canvas.js"></script>
    <script src="../view/assets/js/hoverable-collapse.js"></script>
    <script src="../view/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../view/assets/js/dashboard.js"></script> 
    
    <script>
        $(document).ready(function() {
            $("#btn-test").click(function (){
                var numbers = $("#txt_email").val();
                var filter = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix;
                 $abc = $.trim(numbers).match(filter) ? true : false;
                 
                 if(!$abc) {
                     e.preventDefault();
                     alert("K Hop le");
                 }
            });
        });
    </script>