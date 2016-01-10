<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
	<br /><br /><br /><br />
    <?php 
        $showProfile = mysqli_query($connecDB, "SELECT * FROM static_page where id_static_page = 1");
        $p = mysqli_fetch_array($showProfile);
    ?>
    <section id="fasilitas">
        <div class="container">
                <div class="row">
                <br /><br />
                    <div class="col-md-4">
                        <img src="<?php echo $baseUrl.$p['thumb']; ?>" class="thumbnail" width="360" />
                    </div>
                    <div class="col-md-8">
                        <div class="feature_header">
                            <h3><?php echo $p['title']; ?></h3>
                            <h4 class="feature_sub"><?php echo $p['description']; ?></h4>
                            <div class="divider"></div>
                        </div>
                    </div>  <!-- Col-md-12 End -->
                </div>
               
        </div>  <!-- Container End -->
    </section>
    <br /><br /><br />
<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>