<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
	<br /><br /><br /><br />
    <section id="fasilitas">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="feature_header text-center">
                            <h3 class="feature_title"><b>Fasilitas</b> Kami</h3>
                            <h4 class="feature_sub">Fasilitas yang kami sediakan <br>Untuk Para penghuni Kost Putra Barito Antara Lain</h4>
                            <div class="divider"></div>
                        </div>
                    </div>  <!-- Col-md-12 End -->
                </div>
                <div class="row">
                    <div class="main_feature">
                    <?php 
                        $showFac = mysqli_query($connecDB, "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC");
                        while($f = mysqli_fetch_array($showFac)) {
                    ?>
                        <div class="col-md-3 col-xs-12 col-sm-6 text-center">
                                <div class="feature_content">
                                    <img src="<?php echo $f['thumb']; ?>" width="200" />
                                    <h5><?php echo $f['title']; ?></h5>
                                    <p><?php echo $f['description']; ?></p>
                                    <button class="btn btn-main" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $f['id_fasilitas']; ?>"> Read More</button>
                                </div>
                        </div>
                        <div class="modal fade bs-example-modal-lg<?php echo $f['id_fasilitas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="padding:15px;">
                                <h3>DETAIL</h3>
                                <hr />
                                <img src="<?php echo $f['thumb']; ?>" style="width:100%" />
                                <h4><?php echo $f['title']; ?></h4>
                                  <p><?php echo $f['description']; ?></p>
                                <hr />
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <!-- <button class="btn btn-main"> Read More</button> -->

                        <!-- Large modal -->


                    </div>
            </div>  <!-- Row End -->
        </div>  <!-- Container End -->
    </section>
    <br /><br /><br />
<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>