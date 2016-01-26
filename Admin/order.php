<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Reservasi Order <small> list</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-asterisk"></i> Reservasi List
                            </li>
                        </ol>
                        
                        <?php 
                            if (isset($_GET['type'])) {
                                if ($_GET['type']=='add') {
                        ?>
                             
                                <form action="<?php echo $baseUrl; ?>Machine/record" method="POST" enctype="multipart/form-data">
                                    Gambar : <input type="file" name="thumb" /><br />
                                    Nama Tipe Kamar :
                                    <input type="text" class="form-control" name="title" Placeholder="Input Judul" /><br />
                                    Harga Kamar
                                    <input type="number" class="form-control" name="harga" Placeholder="Input Harga Kamar" /><br />
                                    Stok
                                    <input type="number" class="form-control" name="stok" style="width:130px;" Placeholder="Input Stok" /><br />
                                    Keterangan :
                                    <textarea class="form-control" name="description" rows="6" Placeholder="Keterangan Reservasi"></textarea><br />
                                    <button type="submit" name="inputTipeKamar" class="btn btn-primary">Submit</button>&nbsp;
                                    <a href="<?php echo $baseUrl; ?>Admin/tipekamar" class="btn btn-default">Cancel</a><br /><br />
                                </form>
                        
                        <?php 
                                } else if ($_GET['type']=='edit') {
                                    $getDataFas = mysqli_query($connecDB, "SELECT * FROM reservasi ORDER BY id_reservasi DESC");
                                    $f = mysqli_fetch_array($getDataFas);
                        ?>

                                <!-- BAGIAN EDIT TIPE KAMAR -->
                                <form action="<?php echo $baseUrl; ?>Machine/record" method="POST" enctype="multipart/form-data">
                                    <img src="<?php echo $baseUrl.$f['thumb']; ?>" class="thumbnail" width="200" />
                                    Ganti gambar : <input type="file" name="thumb" /><br />
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <input type="hidden" name="thumbBefore" value="<?php echo $f['thumb']; ?>">
                                    Nama Tipe Kamar
                                    <input type="text" class="form-control" name="title" Placeholder="Input Judul" value="<?php echo $f['title']; ?>" /><br />
                                    Harga :
                                    <input type="number" class="form-control" name="harga" Placeholder="Input Judul" value="<?php echo $f['harga']; ?>" /><br />
                                    Stok
                                    <input type="number" class="form-control" name="stok" style="width:130px;" Placeholder="Input Stok" value="<?php echo $f['stok']; ?>" /><br />
                                    Keterangan :
                                    <textarea class="form-control" name="description" rows="6" Placeholder="Keterangan Tipe Kamar"><?php echo $f['description']; ?></textarea><br />
                                    <button type="submit" name="editTipeKamar" class="btn btn-primary">Save Change</button>&nbsp;
                                    <a href="<?php echo $baseUrl; ?>Admin/tipekamar" class="btn btn-default">Cancel</a><br /><br />
                                </form>

                        <?php
                                }
                            } else {
                        ?>

                        <br />
                        <table class="table table-striped" style="border-top:1px solid #dfdfdf;">
                            <thead>
                                <th>No</th>
                                <th>Thumb</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            <?php 
                                $showFas = mysqli_query($connecDB, "SELECT * FROM reservasi ORDER BY id_reservasi DESC");
                                $no = 1;
                                while($s = mysqli_fetch_array($showFas)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><img src="<?php echo $baseUrl.$s['thumb']; ?>" width="80" /></td>
                                    <td><?php echo $s['title']; ?></td>
                                    <td><?php echo $s['description']; ?></td>
                                    <td><?php echo $s['harga']; ?></td>
                                    <td><?php echo $s['stok']; ?></td>
                                    <td><a href="<?php echo $baseUrl ?>Machine/record/?t=del_fas&id=<?php echo $s['id_reservasi']; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Tipe Kamar ini?')"><i class="fa fa-remove"></i> Delete</a></td>
                                </tr>
                            <?php $no++; } ?>
                            </tbody>
                        </table>

                        <?php } ?>

                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
