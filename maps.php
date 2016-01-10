<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
	<br /><br /><br /><br />
    <section id="fasilitas">
        <div class="container">
                <div class="row">
                <br /><br />
                    <div id="g-map" class="no-padding">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="map" id="map"></div>
                            </div>
                        </div>
                    </div>
                </div> 
        </div>  <!-- Container End -->
    </section>
    <br /><br /><br />
<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>
<?php 
    $showMap = mysqli_query($connecDB, "SELECT * FROM maps");
    $m = mysqli_fetch_array($showMap);
    $pieces = explode(",", $m['latlong']);
    $mapMarker = explode(",", $m['mapmarker']);
    $lat = $pieces[0];
    $long = $pieces[1];
    $mlat = $mapMarker[0];
    $mlong = $mapMarker[1];
?>
<script type="text/javascript">
        // Google Map - with support of gmaps.js
       var map;
          map = new GMaps({
            div: '#map',
            lat: <?php echo $lat; ?>,
            lng: <?php echo $long; ?>,
            scrollwheel: false,
            panControl: false,
            zoomControl: false,
          });

          map.addMarker({
            lat: <?php echo $mlat; ?>,
            lng: <?php echo $mlong; ?>,
            title: 'Smilebuddy',
            infoWindow: { 
              content: '<p> Smilebuddy, Dhanmondhi 27</p>'
            },
            icon: "images/map1.png"
          });
</script>