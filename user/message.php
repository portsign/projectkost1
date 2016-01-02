<?php 
include('header.php'); 
include('navbar_admin.php'); ?>
    
<!-- DASHBOARD -->
<div class="container">
<div class="clearbr"></div>
    <div class="col-sm-12">
    <form action="<?php echo $baseUrl; ?>Machine/record" method="POST">
    	<div class="panel panel-white post panel-shadow">
            <div class="post-description">
            		<p>Kirim Pesan Kepada Seluruh Anggota Kos</p>
            	</div>
            <div class="post-heading nomargin">
            		<input type="hidden" name="email" value="<?php echo $getEmail; ?>" />
            		<input type="hidden" name="getLink" value="<?php echo $baseUrl."user/message"; ?>" />
                	<textarea class="form-control" name="message" placeholder="Your Message Here"></textarea>
             	
            </div> 
            <div class="post-heading nomargin">
            	<button type="submit" name="message_to_all" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Send</button>
            </div>
        </div>
        </form>

        <?php 
        	$showAllMessage = mysqli_query($connecDB, "SELECT * FROM user_message ORDER BY id_user_message DESC LIMIT 30")or die(mysql_error());
        	while($d = mysqli_fetch_array($showAllMessage)) {
        		$getDataEmail = $d['email'];
        		$showProfile = mysqli_query($connecDB, "SELECT * FROM member WHERE email = '$getDataEmail'");
        		$e = mysqli_fetch_array($showProfile);
        ?>

        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="<?php echo $baseUrl.$e['foto']; ?>" class="img-circle avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#"><b><?php echo $e['nama']; ?></b></a>
                        made a post.
                    </div>
                    <h6 class="text-muted time"><?php echo $d['time_post']; ?></h6>
                </div>
            </div> 
            <div class="post-description"> 
                <p><?php echo $d['message']; ?></p>
            </div>
        </div> 

        <?php } ?>
        
    </div>
</div>
<style type="text/css">
	
	.panel-shadow {
	    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
	}
	.panel-white {
	  border: 1px solid #dddddd;
	}
	.panel-white  .panel-heading {
	  color: #333;
	  background-color: #fff;
	  border-color: #ddd;
	}
	.panel-white  .panel-footer {
	  background-color: #fff;
	  border-color: #ddd;
	}

	.post .post-heading {
	  height: 95px;
	  padding: 20px 15px;
	}
	.post .post-heading .avatar {
	  width: 60px;
	  height: 60px;
	  display: block;
	  margin-right: 15px;
	}
	.post .post-heading .meta .title {
	  margin-bottom: 0;
	}
	.post .post-heading .meta .title a {
	  color: black;
	}
	.post .post-heading .meta .title a:hover {
	  color: #aaaaaa;
	}
	.post .post-heading .meta .time {
	  margin-top: 8px;
	  color: #999;
	}
	.post .post-image .image {
	  width: 100%;
	  height: auto;
	}
	.post .post-description {
	  padding: 15px;
	}
	.post .post-description p {
	  font-size: 14px;
	}
	.post .post-description .stats {
	  margin-top: 20px;
	}
	.post .post-description .stats .stat-item {
	  display: inline-block;
	  margin-right: 15px;
	}
	.post .post-description .stats .stat-item .icon {
	  margin-right: 8px;
	}
	.post .post-footer {
	  border-top: 1px solid #ddd;
	  padding: 15px;
	}
	.post .post-footer .input-group-addon a {
	  color: #454545;
	}
	.post .post-footer .comments-list {
	  padding: 0;
	  margin-top: 20px;
	  list-style-type: none;
	}
	.post .post-footer .comments-list .comment {
	  display: block;
	  width: 100%;
	  margin: 20px 0;
	}
	.post .post-footer .comments-list .comment .avatar {
	  width: 35px;
	  height: 35px;
	}
	.post .post-footer .comments-list .comment .comment-heading {
	  display: block;
	  width: 100%;
	}
	.post .post-footer .comments-list .comment .comment-heading .user {
	  font-size: 14px;
	  font-weight: bold;
	  display: inline;
	  margin-top: 0;
	  margin-right: 10px;
	}
	.post .post-footer .comments-list .comment .comment-heading .time {
	  font-size: 12px;
	  color: #aaa;
	  margin-top: 0;
	  display: inline;
	}
	.post .post-footer .comments-list .comment .comment-body {
	  margin-left: 50px;
	}
	.post .post-footer .comments-list .comment > .comments-list {
	  margin-left: 50px;
	}

</style>
<!-- DASHBOARD END -->

<?php include('footer.php'); ?>