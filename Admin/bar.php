<?php 
    $link =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url = $link;
    $path = parse_url($url, PHP_URL_PATH);
    $segments = explode('/', rtrim($path, '/'));
?>
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Putra Barito Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a target="_blank" href="<?php echo $baseUrl; ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Visit Site</a>
                </li> 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo $baseUrl; ?>Admin/settings"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo $baseUrl; ?>Admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if (end($segments)==$baseUrl || end($segments)=='Admin') { echo 'class="active"'; } ?> >
                        <a href="<?php echo $baseUrl ?>Admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if (end($segments)=='fasilitas' XOR end($segments)=='add' XOR end($segments)=='edit') { echo 'class="active"'; } ?> >
                        <a href="<?php echo $baseUrl ?>Admin/fasilitas"><i class="fa fa-beer"></i> Fasilitas</a>
                    </li>
                    <li <?php if (end($segments)=='profile') { echo 'class="active"'; } ?> >
                        <a href="<?php echo $baseUrl ?>Admin/profile"><i class="fa fa-book"></i> Profile</a>
                    </li>
                    <li <?php if (end($segments)=='maps') { echo 'class="active"'; } ?> >
                        <a href="<?php echo $baseUrl ?>Admin/maps"><i class="fa fa-map-marker"></i> Maps</a>
                    </li>
                    <li <?php if (end($segments)=='reservasi') { echo 'class="active"'; } ?>>
                        <a href="<?php echo $baseUrl ?>Admin/reservasi"><i class="fa fa-asterisk"></i> Reservasi</a>
                    </li>
                    <li <?php if (end($segments)=='contact') { echo 'class="active"'; } ?> >
                        <a href="<?php echo $baseUrl ?>Admin/contact"><i class="fa fa-phone-square"></i> Contact</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-user"></i> Member <i class="fa fa-fw fa-caret-down"></i></a>
                        <?php 
                            if (end($segments)=='usermessage' || end($segments)=='memberlist' || end($segments)=='postmessage') {
                        ?>
                            <ul id="demo" class="collapse in">
                        <?php } else { ?>
                            <ul id="demo" class="collapse">
                        <?php } ?>

                            <li <?php if (end($segments)=='usermessage') { echo 'style="background-color: #101010"'; } ?>>
                                <a href="<?php echo $baseUrl ?>Admin/usermessage"><i class="fa fa-envelope-o"></i> User Message</a>
                            </li>
                            <li <?php if (end($segments)=='memberlist') { echo 'style="background-color: #101010"'; } ?> >
                                <a href="<?php echo $baseUrl ?>Admin/memberlist"><i class="fa fa-align-left"></i> Member List</a>
                            </li>
                            <li <?php if (end($segments)=='postmessage') { echo 'style="background-color: #101010"'; } ?> >
                                <a href="<?php echo $baseUrl ?>Admin/postmessage"><i class="fa fa-mail-reply-all"></i> Post Message</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php if (end($segments)=='settings') { echo 'class="active"'; } ?>>
                        <a href="<?php echo $baseUrl ?>Admin/settings"><i class="fa fa-cogs"></i> Settings</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

 <div id="page-wrapper">
            <div class="container-fluid">