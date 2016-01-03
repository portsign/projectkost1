<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Fasilitas <small>Fasilitas yang ada</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-beer"></i> Fasilitas
                            </li>
                        </ol>

                        <?php 
                            if (isset($_GET['type'])) {
                                if ($_GET['type']=='add') {
                        ?>
                             
                                <form action="<?php echo $baseUrl; ?>Machine/record" method="POST" enctype="multipart/form-data">
                                    Gambar : <input type="file" name="thumb" /><br />
                                    Nama Fasilitas :
                                    <input type="text" class="form-control" name="title" Placeholder="Input Judul" /><br />
                                    Keterangan :
                                    <textarea class="form-control" name="description" rows="6" Placeholder="Keterangan Fasilitas"></textarea><br />
                                    <button type="submit" name="inputFasilitas" class="btn btn-primary">Submit</button>&nbsp;
                                    <a href="<?php echo $baseUrl; ?>Admin/fasilitas" class="btn btn-default">Cancel</a><br /><br />
                                </form>
                        
                        <?php 
                                } else if ($_GET['type']=='edit') {
                                    $getDataFas = mysqli_query($connecDB, "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC");
                                    $f = mysqli_fetch_array($getDataFas);
                        ?>

                                <!-- BAGIAN EDIT FASILITAS -->
                                <form action="<?php echo $baseUrl; ?>Machine/record" method="POST" enctype="multipart/form-data">
                                    <img src="<?php echo $baseUrl.$f['thumb']; ?>" class="thumbnail" width="200" />
                                    Ganti gambar : <input type="file" name="thumb" /><br />
                                    Nama Fasilitas :
                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                    <input type="hidden" name="thumbBefore" value="<?php echo $f['thumb']; ?>">
                                    <input type="text" class="form-control" name="title" Placeholder="Input Judul" value="<?php echo $f['title']; ?>" /><br />
                                    Keterangan :
                                    <textarea class="form-control" name="description" rows="6" Placeholder="Keterangan Fasilitas"><?php echo $f['description']; ?></textarea><br />
                                    <button type="submit" name="editFasilitas" class="btn btn-primary">Save Change</button>&nbsp;
                                    <a href="<?php echo $baseUrl; ?>Admin/fasilitas" class="btn btn-default">Cancel</a><br /><br />
                                </form>

                        <?php
                                }
                            } else {
                        ?>

                        <a href="<?php echo $baseUrl; ?>Admin/fasilitas/add" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Fasilitas</a>
                        <br />
                        <br />
                        <table class="table table-striped" style="border-top:1px solid #dfdfdf;">
                            <thead>
                                <th>No</th>
                                <th>Thumb</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                            <?php 
                                $showFas = mysqli_query($connecDB, "SELECT * FROM fasilitas ORDER BY id_fasilitas DESC");
                                $no = 1;
                                while($s = mysqli_fetch_array($showFas)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><img src="<?php echo $baseUrl.$s['thumb']; ?>" width="80" /></td>
                                    <td><?php echo $s['title']; ?></td>
                                    <td><?php echo $s['description']; ?></td>
                                    <td><a href="<?php echo $baseUrl ?>Machine/record/?t=del_fas&id=<?php echo $s['id_fasilitas']; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Fasilitas ini?')"><i class="fa fa-remove"></i> Delete</a>&nbsp;<a href="<?php echo $baseUrl; ?>Admin/fasilitas/edit/<?php echo $s['id_fasilitas']; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a></td>
                                </tr>
                            <?php $no++; } ?>
                            </tbody>
                        </table>

                        <?php } ?>

                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
