<?php 
include('header.php');
include('navbar.php');
?>
<!-- Fasilitas Area start -->
	
    <section id="team">
    <div class="container">
        <div class="row">


        <?php
        $getiD = $_GET['id'];
        $showRes = mysqli_query($connecDB, "SELECT * FROM reservasi WHERE id_reservasi = '$getiD' ORDER BY id_reservasi DESC");
        $s = mysqli_fetch_array($showRes);

        if (isset($_GET['step'])) {
            if ($_GET['step']=='1') {
      
            ?>

            <h3>Detail Reservasi</h3>
            Tipe Kamar : <strong><?= $s['title'] ?></strong><br />
            Keterangan : <strong><?= $s['description'] ?></strong><br />
            Harga : <strong>Rp <?= $s['harga'] ?>,-</strong>
            <br />
            <br />
            <a href="<?= $baseUrl ?>tipekamar/order/<?= $_GET['id'] ?>/2" class="btn btn-success">Lanjut ke Pengisian Data</a>

            <?php
                  
            } else if ($_GET['step']=='2') {
            ?>
            <br />
            <br />
            <h3>Pengisian Data Diri</h3>
            <form>
                Nama Lengkap Anda
                <input type="text" name="nama" class="form-control" style="width:300px" />
                Email
                <input type="text" name="nama" class="form-control" style="width:300px" />
                No Telepon / HP
                <input type="text" name="nama" class="form-control" style="width:300px" />
                alamat
                <input type="text" name="nama" class="form-control" style="width:300px" />
                Catatan
                <textarea name="catatan" class="form-control" style="width:450px" rows="5" ></textarea><br />
                <input type="submit" name="submitOrder" class="btn btn-success" value="Lanjut ke pembayaran" />
            </form>

            <?php
            }
        } else {
        ?>


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Reservasi</h3>
                    <h4 class="feature_sub">Berikut adalah Laman Reservasi pada kost putra barito. 
                    </h4>
                    <div class="divider"></div>
                </div>
            </div>  <!-- Col-md-12 End -->

            <div id="owl-demo" class="owl-carousel owl-theme team-items">

            <!-- BEGIN LOOP -->
            <?php 
                $showReservasi = mysqli_query($connecDB, "SELECT * FROM reservasi ORDER BY id_reservasi DESC");
                while($r = mysqli_fetch_array($showReservasi)) {
            ?>
                <div class="item text-center">
                    <div class="single-member">
                        <div class="overlay-hover">
                            <img src="<?php echo $baseUrl.$r['thumb']; ?>" alt="" class="img-responsive">
                            <div class="overlay-effect">
                                
                                <p><?php echo $r['description']; ?></p>
                                <p>Rp <?= $r['harga'] ?>,-</p>
                                <p><?= $r['stok'] ?></p>
                                <a href="<?= $baseUrl ?>tipekamar/order/<?= $r['id_reservasi']; ?>/1" class="btn btn-success">Pesan Sekarang</a>
                            </div>
                        </div>
                        <h3><?php echo $r['title']; ?></h3>
                        <p>Rp <?= $r['harga'] ?>,-</p>
                        <p>Stok : <strong><?= $r['stok'] ?></strong></p>
                        <a href="<?= $baseUrl ?>tipekamar/order/<?= $r['id_reservasi']; ?>/1" class="btn btn-success">Pesan Sekarang</a>
                    </div>
                </div>  <!-- item wrapper end -->
            <?php } ?>
            <!-- END LOOP -->

            </div>


            <?php } ?>


        </div>
    </div> <!-- Conatiner Team end -->
    <!-- </div> -->

</section>

<!-- Fasilitas Area End -->
<?php 
include('footer.php');
?>