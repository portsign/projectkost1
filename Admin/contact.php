<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contact List
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-phone-square"></i> Contact
                            </li>
                        </ol>
                        
                        <?php 
                            if (isset($_GET['type'])) {
                                if ($_GET['type']=='detail') {
                                    $getID = $_GET['id'];
                                    $showContactD = mysqli_query($connecDB, "SELECT * FROM contact WHERE id_contact = '$getID' ORDER BY id_contact DESC");
                                    $n = mysqli_fetch_array($showContactD);
                        ?>

                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php echo $n['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $n['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>No Telepon</td>
                                    <td>:</td>
                                    <td><?php echo $n['no_telp']; ?></td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td>:</td>
                                    <td><?php echo $n['message']; ?></td>
                                </tr>
                                <tr>
                                    <td>Time Contact</td>
                                    <td>:</td>
                                    <td><?php echo $n['time']; ?></td>
                                </tr>
                            </table>
                            <a href="<?php echo $baseUrl; ?>Machine/record/?t=delcont&id=<?php echo $_GET['id']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pesan ini?')" class="btn btn-danger"><i class="fa fa-remove"></i> Hapus</a>
                            &nbsp;
                            <a href="<?php echo $baseUrl; ?>Admin/contact" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                        <?php 
                                }
                            } else {
                        ?>

                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                            $showContact = mysqli_query($connecDB, "SELECT * FROM contact ORDER BY id_contact DESC");
                            $no = 1;
                            while($c = mysqli_fetch_array($showContact)){
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $c['nama']; ?></td>
                                    <td><?php echo $c['email']; ?></td>
                                    <td><a href="<?php echo $baseUrl; ?>Admin/contact/detail/<?php echo $c['id_contact']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-circle-left"></i> Detail</a>&nbsp;<a href="<?php echo $baseUrl; ?>Machine/record/?t=delcont&id=<?php echo $c['id_contact']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pesan ini?')"><i class="fa fa-remove"></i> Delete</a></td>
                                </tr>
                            <?php $no++; } ?>
                            </tbody>
                        </table>

                        <?php } ?>
                        <ul class="pagination">
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
