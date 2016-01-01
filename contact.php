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
                    <h3 class="feature_title">Kontak <b>Kami Disini</b></h3>
                    <h4 class="feature_sub">Kami terbuka dalam melayani anda. </h4>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="contact_full">
                <div class="col-md-6 left">
                    <div class="left_contact">
                        <form action="role">
                            <div class="form-level">
                                <input name="name" placeholder="Name" id="name"  value="" type="text" class="input-block">
                                <span class="form-icon fa fa-user"></span>
                            </div>
                            <div class="form-level">
                                <input name="email" placeholder="Email" id="mail" class="input-block" value="" type="email">
                                <span class="form-icon fa fa-envelope-o"></span>
                            </div>
                            <div class="form-level">
                                <input name="name" placeholder="Phone" id="phone" class="input-block" value="" type="text">
                                <span class="form-icon fa fa-phone"></span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 right">
                    <div class="form-level">
                        <textarea name="" id="messege"  rows="5" class="textarea-block" placeholder="message"></textarea>
                        <span class="form-icon fa fa-pencil"></span>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-main featured">Submit Now</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>