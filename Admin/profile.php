<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile <small>Semua tentang kost</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-book"></i> Profile
                            </li>
                        </ol>

                        <?php 
                        	$profile = mysqli_query($connecDB, "SELECT * FROM static_page WHERE id_static_page = '1'");
                        	$p = mysqli_fetch_array($profile);
                        ?>

                        <form action="<?php echo $baseUrl; ?>Machine/record" method="POST" enctype="multipart/form-data">
                        	<img src="<?php echo $baseUrl.$p['thumb']; ?>" /><br /><br />
                        	Thumbnail
                        	<input type="file" name="thumb" /><br />
                        	Judul
                        	<input type="text" class="form-control" name="title" value="<?php echo $p['title']; ?>" /><br />
                        	Description
                        	<textarea class="form-control" name="description"><?php echo $p['description']; ?></textarea><br />
                        	<button type="submit" name="editProfileKost" class="btn btn-primary">Save Change</button><br /><br /><br />
                        </form>
                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
