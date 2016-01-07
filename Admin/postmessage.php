<?php include('header.php'); ?>
<?php include('bar.php'); ?>

       

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Post Message <small>Pesan untuk anggota kos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-mail-reply-all"></i> Post Message
                            </li>
                        </ol>

                        <?php 
                            $showMessage = mysqli_query($connecDB, "SELECT u.*, m.* FROM user_message u JOIN member m ON u.email=m.email ORDER BY u.id_user_message DESC LIMIT 20");
                            while($m = mysqli_fetch_array($showMessage)) {
                        ?>

                        <div class="media morestyle">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object img-circle" src="<?php echo $baseUrl.$m['foto']; ?>" width="50" height="50" alt="user message">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><?php echo $m['nama']; ?></h4>
                            <?php echo $m['message']; ?>
                          </div>
                        </div>
                        <?php } ?>
                        <br />
                        <div class="celah"></div>
                        <form class="navbar navbar-fixed-bottom chatbox" action="<?php echo $baseUrl; ?>Machine/record" method="POST">
                            <div class="chat-text">
                                <textarea class="form-control" name="message" placeholder="Your Message Here" rows="5"></textarea><br />
                                <button type="submit" name="sendMessageAdmin" class="btn btn-primary btn-chat"><i class="glyphicon glyphicon-send"></i> Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

               
            

<?php include('footer.php'); ?>
