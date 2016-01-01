<!-- Footer Area Start -->
<section id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
               

            </div>
        </div>
    </div>

    <div class="footer_b">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom">
                        <p class="text-block"> &copy; Copyright reserved to <span>PutraBarito </span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer Area End -->

<!-- Back To Top Button -->
    <div id="back-top">
        <a href="#slider_part" class="scroll" data-scroll>
            <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
        </a>
    </div>
    <!-- End Back To Top Button -->

		<script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.js"></script>
        <script src="<?php echo $baseUrl; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo $baseUrl; ?>js/owl.carousel.min.js"></script>
        <script src="<?php echo $baseUrl; ?>js/jquery.isotope.js"></script>
		<script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/smooth-scroll.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.fancybox.pack.js?v=2.1.5"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.counterup.min.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.scrollTo.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/jquery.easing.1.3.js"></script>
        <script src="<?php echo $baseUrl; ?>js/jquery.singlePageNav.js"></script>
        <script type="js/javascript" src="<?php echo $baseUrl; ?>js/wow.min.js"></script>
        <script type="text/javascript" src="<?php echo $baseUrl; ?>js/gmaps.js"></script>
        <script src="<?php echo $baseUrl; ?>js/custom.js"></script>
	      <script>
  		// Google Map - with support of gmaps.js
       var map;
          map = new GMaps({
            div: '#map',
            lat: 23.709921,
            lng: 90.407143,
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