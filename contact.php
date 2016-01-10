<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php 
// require_once('lib/recaptchalib.php');
// $publickey = "YOUR_PUBLIC_KEY"; // You got this from the signup page.
// echo recaptcha_get_html($publickey);
?>
	<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Kontak <b>Kami Disini</b></h3>
                    <h4 class="feature_sub">Kami terbuka dalam melayani anda. </h4>
                    Jl. Tambak Boyo Gg. Tambak Rejo No.52A <br />RT 22 RW 61, Condong Catur, Depok, Sleman, Yogyakarta 55283<br />
                    Mulyo : 0813 28228818 / 
                    Tomy : 0852 00167413<br />
                    Alamat : <a href="<?php echo $baseUrl; ?>maps">Maps</a>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="contact_full">
             <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                <div class="col-md-6 left">
                <?php 
                    if (isset($_GET['scs'])) {
                        if ($_GET['scs']=='true') {
                            echo '
                                <div class="alert alert-info" role="alert">
                                  <a href="#" class="alert-link"><i class="glyphicon glyphicon-info-sign"></i> Pesan Anda Berhasil Terkirim, Kami akan mengirim balasan via email</a>
                                </div>
                            ';
                        }
                    }
                ?>
                    <div class="left_contact">
                        
                            <div class="form-level">
                                <input name="nama" placeholder="Name" id="name"  value="" type="text" class="input-block" required>
                                <span class="form-icon fa fa-user"></span>
                            </div>
                            <div class="form-level">
                                <input name="email" placeholder="Email" id="mail" class="input-block" value="" type="email" required>
                                <span class="form-icon fa fa-envelope-o"></span>
                            </div>
                            <div class="form-level">
                                <input name="no_telp" placeholder="Phone" id="phone" class="input-block" value="" type="text" required>
                                <span class="form-icon fa fa-phone"></span>
                            </div>
                        
                    </div>
                    
                </div>

                <div class="col-md-6 right">
                    <div class="form-level">
                        <textarea name="messege" rows="6" class="textarea-block" placeholder="message"></textarea>
                        <span class="form-icon fa fa-pencil"></span>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <br />
                    <center>
                        <div class="g-recaptcha" data-sitekey="6Lew6xQTAAAAAP97wFRQqslCZE2rYwN7yzypEkP2"></div>
                        <?php 
                            if (isset($_GET['recaptcha'])) {
                                if ($_GET['recaptcha']=='false') {
                                    echo '
                                        <div class="alert alert-warning" style="width:304px;" role="alert">
                                          <a href="#" class="alert-link"><i class="glyphicon glyphicon-info-sign"></i> Pastikan Anda Bukan Robot</a>
                                        </div>
                                    ';
                                }
                            }
                        ?>
                        
                    </center>
                    <button class="btn btn-main featured">Submit Now</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>