<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Message <small>Pesan dari Penghuni Kost</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-envelope-o"></i> User Message
                            </li>
                        </ol>
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                                $showMessage = mysqli_query($connecDB, "SELECT l.*, m.* FROM laporan l JOIN member m ON l.id_member=m.id_member ORDER BY l.id_laporan DESC")or die(mysqli_error());
                                $no = 1;
                                while($m = mysqli_fetch_array($showMessage)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $m['nama']; ?></td>
                                    <td><?php echo $m['email']; ?></td>
                                    <td><a href="" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $m['id_laporan'] ?>"><i class="glyphicon glyphicon-eye-open"></i> See Message</a>
                                        <a href="<?php echo $baseUrl; ?>Machine/record/?type=del_lap&id=<?php echo $m['id_laporan']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Pesan ini?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                                    </td>
                                </tr>
                                <!-- Large modal -->

                                <div class="modal fade bs-example-modal-lg<?php echo $m['id_laporan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="padding:12px;">
                                        <h3>Message From <?php echo $m['nama']; ?></h3>
                                        <small><i>Sent from Browser at <?php echo $m['time_post'] ?></i></small>
                                        <hr />
                                        <span style="font-size:22px">"</span>
                                        <?php echo $m['message']; ?>
                                        <span style="font-size:22px">"</span>
                                        <hr />
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>

                            <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
