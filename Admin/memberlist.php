<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Member list <small>Semua penghuni Kost</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-align-left"></i> Member List
                            </li>
                        </ol>
                        
                        <?php 
                            if (isset($_GET['type'])) {
                                if ($_GET['type']=='detail') {
                                $getIDM = $_GET['id'];
                                $showDetail = mysqli_query($connecDB, "SELECT * FROM member WHERE id_member = '$getIDM'");
                                $d = mysqli_fetch_array($showDetail);
                        ?>
                            <center><img src="<?php echo $baseUrl.$d['foto']; ?>" width="200" /></center>
                            <br />
                            <br />
                            <table class="table">
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>:</td>
                                    <td><a href="mailto:<?php echo $d['email']; ?>"><?php echo $d['email']; ?></a></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Kelamin</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['jenis_kelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Instansi</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['instansi']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Alamat</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>No Telepon</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['no_telp']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['status']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Waktu Daftar</strong></td>
                                    <td>:</td>
                                    <td><?php echo $d['time_reg']; ?></td>
                                </tr>
                            </table>
                            <a href="<?php echo $baseUrl; ?>Admin/memberlist" class="btn btn-default"><i class="glyphicon glyphicon-menu-left"></i> Back</a>
                            <a href="<?php echo $baseUrl; ?>Admin/memberlist/edit/<?php echo $_GET['id']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Ubah Status</a>
                            <br />
                            <br />
                            <?php
                                } else if ($_GET['type']=='edit') {
                                $gid = $_GET['id'];
                                $showM = mysqli_query($connecDB, "SELECT * FROM member WHERE id_member = '$gid'");
                                $h = mysqli_fetch_array($showM);
                            ?>
                                <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                                <table class="table">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $h['nama']; ?>
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                        <select name="status" class="form-control" style="width:300px;">
                                            <option value="notconfirm" <?php if ($h['status']=='notconfirm') { echo 'selected'; } ?> >notconfirm</option>
                                            <option value="dikeluarkan" <?php if ($h['status']=='dikeluarkan') { echo 'selected'; } ?> >dikeluarkan</option>
                                            <option value="Melarikan Diri" <?php if ($h['status']=='Melarikan Diri') { echo 'selected'; } ?> >Melarikan Diri</option>
                                            <option value="accept" <?php if ($h['status']=='accept') { echo 'selected'; } ?> >accept</option>
                                            <option value="Pindah" <?php if ($h['status']=='Pindah') { echo 'selected'; } ?> >Pindah</option>
                                        </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <a href="<?php echo $baseUrl; ?>Admin/memberlist" class="btn btn-default">Cancel</a>
                                        <button type="submit" name="editStatus" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button></td>
                                    </tr>
                                </table>
                                </form>
                        <?php
                                }
                            } else {
                        ?>

                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>No Telepon</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            <?php 
                                $showMember = mysqli_query($connecDB, "SELECT * FROM member ORDER BY id_member DESC");
                                $no = 1;
                                while($m = mysqli_fetch_array($showMember)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $m['nama']; ?></td>
                                    <td><?php echo $m['email']; ?></td>
                                    <td><?php echo $m['status']; ?></td>
                                    <td><?php echo $m['no_telp']; ?></td>
                                    <td><a href="<?php echo $baseUrl; ?>Admin/memberlist/detail/<?php echo $m['id_member']; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>&nbsp;
                                        <a href="<?php echo $baseUrl; ?>Admin/memberlist/edit/<?php echo $m['id_member']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Uban Status</a></td>
                                </tr>
                            <?php $no++; } ?>
                            </tbody>
                        </table>

                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->


<?php include('footer.php'); ?>
