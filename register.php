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
                    <h3 class="feature_title">Register <b>Member</b></h3>
                    <h4 class="feature_sub">Kami Menyediakan Fasilitas Member Area, Silahkan Daftar. </h4>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="contact_full">
             <center>
                    <?php 
                        if (isset($_GET['status'])) {
                            echo '
                            <div class="alert alert-warning" style="width:300px;" role="alert">
                                <a href="#" class="alert-link"><i class="glyphicon glyphicon-remove-sign"></i> Konfirmasi Password Anda Salah</a>
                            </div>
                            ';
                        }
                        if (isset($_GET['s'])) {
                            echo '
                            <div class="alert alert-warning" style="width:300px;" role="alert">
                                <a href="#" class="alert-link"><i class="glyphicon glyphicon-remove-sign"></i> Email Sudah Terdaftar</a>
                            </div>
                            ';
                        }
                    ?> 
                        <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                            <div class="form-level-login">
                                <input name="nama" placeholder="Nama" type="text" class="input-block" required />
                                <span class="form-icon-login fa fa-user"></span>
                            </div>
                            <div cl
                            <div class="form-level-login">
                                <input name="email" placeholder="Email" type="email" class="input-block" required />
                                <span class="form-icon-login fa fa-envelope"></span>
                            </div>
                            <div class="form-level-login">
                                <input name="password" placeholder="Password" class="input-block" type="password" required />
                                <span class="form-icon-login fa fa-gear"></span>
                            </div>
                            <div class="form-level-login">
                                <input name="repassword" placeholder="Password Confimation" class="input-block" type="password" required />
                                <span class="form-icon-login fa fa-gear"></span>
                            </div>
                            <a href="<?php echo $baseUrl; ?>login">Sudah Memiliki Account?</a>
                            <div class="col-md-12 text-center">
                                <button name="register" class="btn btn-main featured">Daftar</button>
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