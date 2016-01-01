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
                  
                        <form action="role">
                            <div class="form-level-login">
                                <input name="name" placeholder="Email" id="name" type="email" class="input-block">
                                <span class="form-icon-login fa fa-user"></span>
                            </div>
                            <div class="form-level-login">
                                <input name="email" placeholder="Password" id="mail" class="input-block" value="" type="password">
                                <span class="form-icon-login fa fa-gear"></span>
                            </div>
                            <a href="<?php echo $baseUrl; ?>register">Belum Memiliki Account?</a>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-main featured">Login</button>
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