<?php
  session_start();
  session_unset();
  session_destroy();
  setcookie("AdminUsernameKost", '', time()-999999);
  echo "<script>window.location = '../Admin'</script>";