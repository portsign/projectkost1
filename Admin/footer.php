		</div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo $baseUrl; ?>Admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl; ?>Admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo $baseUrl; ?>Admin/js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo $baseUrl; ?>Admin/js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo $baseUrl; ?>Admin/js/plugins/morris/morris-data.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl; ?>js/gmaps.js"></script>
        <script src="<?php echo $baseUrl; ?>js/custom.js"></script>
          <script>
        // Google Map - with support of gmaps.js
       var map;
          map = new GMaps({
            div: '#map',
            lat: -7.760982,
            lng: 110.4076677,
            scrollwheel: false,
            panControl: false,
            zoomControl: false,
          });

          map.addMarker({
            lat: 23.709921,
            lng: 90.407143,
            title: 'Smilebuddy',
            infoWindow: { 
              content: '<p> Smilebuddy, Dhanmondhi 27</p>'
            },
            icon: "images/map1.png"
          });
            </script>
</body>

</html>