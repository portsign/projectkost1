<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       
<?php 
$showMaps = mysqli_query($connecDB, "SELECT * FROM maps");
$m = mysqli_fetch_array($showMaps);
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Maps <small>Peta Lokasi Kos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-map-marker"></i> Maps
                            </li>
                        </ol>

                        <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                            <strong>Latitude and Longitude</strong><br />
                            <small>Latitude and Longitude is :: <span style="color:#dfdfdf">https://www.google.co.id/maps/place/STMIK+Amikom+Yogyakarta/@</span>-7.760982,110.4076677<span style="color:#dfdfdf;">,17z/data=!4m2!3m1!1s0x2e7a599bd2eabb2d:0x37702fe03207d46?hl=en</span></small>
                            <input type="text" class="form-control" name="latlong" value="<?php echo $m['latlong']; ?>" Placeholder="Longitude dan Latitude" /><br />
                            Map Marker <i class="fa fa-map-marker"></i>
                            <input type="text" class="form-control" name="mapMarker" style="color:red" value="<?php echo $m['mapmarker']; ?>" Placeholder="Map Marker" /><br />
                            <input type="submit" name="petakos" class="btn btn-primary" value="Save Change" />
                        </form>
                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
