<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
      include_once "config.php";
      $logout_id = htmlspecialchars($_GET['logout_id']);
      if(isset($logout_id)){
          $status = "Offline";
          $sql = $bd->prepare("UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
          $sql->execute();
          if($sql){
              session_unset();
              session_destroy();
              header("location:../index.php");
          }
      }else{
        header("location:../index.php");
      } 
  }else{
      header("location:../index.php");
  } 

?>