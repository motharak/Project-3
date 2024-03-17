<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: /newsandeven/admin/login.php");
   }
?>