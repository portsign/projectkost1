<?php include('header.php'); ?>
<?php include('bar.php'); ?>

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Settings <small>rubah setelah disini</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-cogs"></i> Settings Ganti Password
                </li>
            </ol>
            <?php

                if (isset($_GET['val'])) {
                    if ($_GET['val']=='wop') {
                        echo '
                            <div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-remove-circle"></i> Wrong Old Password</div>
                        ';
                    }
                    else if ($_GET['val']=='wcp') {
                        echo '
                            <div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-remove-circle"></i> Wrong New Password Confirmation</div>
                        ';
                    }
                    else if ($_GET['val']=='true') {
                        echo '
                            <div class="alert alert-success" role="alert"><i class="glyphicon glyphicon-info-sign"></i> Password anda berhasil diganti</div>
                        ';
                    }
                }
            ?>
            
            <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                <input type="password" class="form-control" style="margin-top:10px;" name="oldpass" placeholder="Password Lama" required />
                <input type="password" class="form-control" style="margin-top:10px;" name="newpass" placeholder="Password baru" required />
                <input type="password" class="form-control" style="margin-top:10px;" name="renewpass" placeholder="Konfirmasi Password baru" required />
                <input type="submit" name="changePasswordAdmin" style="margin-top:10px;" class="btn btn-primary" value="Submit" />
            </form>
        </div>
    </div>
    <!-- /.row -->


<?php include('footer.php'); ?>
