<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
      include_once "config.php";
      $sortant_id = htmlspecialchars($_POST['sortant_id']);
      $entrant_id = htmlspecialchars($_POST['entrant_id']);
      $message = htmlspecialchars($_POST['message']);

      if(!empty($message)){
          $sql = $bd->prepare("INSERT INTO messages (msg_entrant_id,msg_sortant_id,msg)	
                               VALUES(?,?,?)");
          $sql->execute(array($entrant_id,$sortant_id,$message)) or die;
      }

  }else{
      header("location:../index.php");
  } 

?>