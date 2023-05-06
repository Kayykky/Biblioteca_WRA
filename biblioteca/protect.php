<?php
    if(!isset($_SESSION)) {
        session_start();
     }

    if(!isset($_SESSION['id'])) {
      echo '<script>alert("Você não está logado");history.go(-1);</script>';
      exit;
     }
?>
