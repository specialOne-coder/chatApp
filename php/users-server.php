<?php
  session_start();
  include_once "config.php";
  $sortant_id = $_SESSION['unique_id'];
  $sql = $bd->prepare("SELECT * FROM users 
                       WHERE NOT unique_id = {$sortant_id} 
                     "); 
  $sql->execute();
  $reponse = "";
  $rowC = $sql->rowCount();
  if($rowC == 0){
     $reponse .= "Aucun utilisateur ";
  }elseif($rowC > 0){
     include_once "data.php";
  }
   echo $reponse;

?>