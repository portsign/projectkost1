 <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
    	<div class="container">
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
                        Member Area
                    </a>
             </div><!--Navbar header End-->
                <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                    <ul class="nav navbar-nav navbar-right ">
                        <li <?php if (end($segments)==$baseUrl."user/" || end($segments)=='user') { echo 'class="active"'; } ?> > <a href="<?php echo $baseUrl; ?>user/" class="page-scroll">Dashboard </a></li>
                        <li <?php if (end($segments)=='anggota') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>user/anggota"  class="page-scroll">Anggota Kos</a> </li>
                        <li <?php if (end($segments)=='message') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>user/message" class="page-scroll">Message </a> </li>
                        <li <?php if (end($segments)=='lapor') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>user/lapor" class="page-scroll">Contact Admin</a></li>
                        <li <?php if (end($segments)=='myprofile') { echo 'class="active"'; } ?> ><a href="<?php echo $baseUrl; ?>user/myprofile" class="page-scroll">My Profile</a></li>
                        <li><a href="<?php echo $baseUrl; ?>user/logout.php" class="page-scroll" style="color:red;"><i class="glyphicon glyphicon-off"></i> Logout</a> </li>
                    </ul>
                 </nav>
            </div><!-- /.container-fluid -->
            <!--/.navbar -->
        </div>
    </header>