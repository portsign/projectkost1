<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
	<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Login <b>Member Area</b></h3>
                    <h4 class="feature_sub">Kami terbuka dalam melayani anda. </h4>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="contact_full">
            <center>
            <?php 
                if (isset($_GET['s'])) {
                    if ($_GET['s']=='false') {
                        echo '
                            <div class="alert alert-warning" style="width:465px;" role="alert">
                              <a href="#" class="alert-link">Failed to login, wrong username or password or admin has not confirmed your existence in this bording house</a>
                            </div>
                        ';
                    }
                } 
            ?>
                    
                        <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                            <div class="form-level-login">
                                <input name="email" placeholder="Email" type="email" class="input-block" />
                                <span class="form-icon-login fa fa-user"></span>
                            </div>
                            <div class="form-level-login">
                                <input name="password" placeholder="Password" class="input-block" type="password" />
                                <span class="form-icon-login fa fa-gear"></span>
                            </div>
                            <a href="<?php echo $baseUrl; ?>register">Belum Memiliki Account?</a>
                            <div class="col-md-12 text-center">
                                <button name="login" class="btn btn-main featured">Login</button>
                            </div>
                        </form>
           
            </center>
            </div>
        </div>
    </div>
</section>
<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>