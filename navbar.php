<?php 
    $link =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url = $link;
    $path = parse_url($url, PHP_URL_PATH);
    $segments = explode('/', rtrim($path, '/'));
?>
<!-- <div class="row"> -->
<div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="margin-top:10px;" href="#">
            Putra Barito
        </a>
 </div><!--Navbar header End-->
 	<nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
        <ul class="nav navbar-nav navbar-right ">
           	<li <?php if (end($segments)==$baseUrl || end($segments)=='') { echo 'class="active"'; } ?> > <a href="<?php echo $baseUrl; ?>" class="page-scroll">Home </a></li>
            <li <?php if (end($segments)=='fasilitas') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>fasilitas"  class="page-scroll">Fasilitas</a> </li>
            <li <?php if (end($segments)=='profile') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>profile" class="page-scroll" >Profile</a> </li>
            <li <?php if (end($segments)=='maps') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>maps" class="page-scroll">Maps </a> </li>
            <li <?php if (end($segments)=='tipekamar') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>tipekamar" class="page-scroll">Reservasi</a></li>
            <li <?php if (end($segments)=='contact') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>contact" class="page-scroll">Contact</a></li>
            <li <?php if (end($segments)=='login') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>login" class="page-scroll">Login</a> </li>
        </ul>
     </nav>
</div><!-- /.container-fluid -->
</header>