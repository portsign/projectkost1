<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
	
    <section id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Reservasi <b>Yang Kami Jalankan</b></h3>
                    <h4 class="feature_sub">Berikut adalah perbaikan-perbaikan pada kost putra barito. </h4>
                    <div class="divider"></div>
                </div>
            </div>  <!-- Col-md-12 End -->

            <div id="owl-demo" class="owl-carousel owl-theme team-items">

            <!-- BEGIN LOOP -->
            <?php 
                $showReservasi = mysqli_query($connecDB, "SELECT * FROM reservasi ORDER BY id_reservasi DESC");
                while($r = mysqli_fetch_array($showReservasi)) {
            ?>
                <div class="item text-center">
                    <div class="single-member">
                        <div class="overlay-hover">
                            <img src="<?php echo $baseUrl.$r['thumb']; ?>" alt="" class="img-responsive">
                            <div class="overlay-effect">
                                
                                <p><?php echo $r['description']; ?></p>
                            </div>
                        </div>
                        <h3><?php echo $r['title']; ?></h3>
                    </div>
                </div>  <!-- item wrapper end -->
            <?php } ?>
            <!-- END LOOP -->

            </div>
        </div>
    </div> <!-- Conatiner Team end -->
    <!-- </div> -->

</section>

<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>