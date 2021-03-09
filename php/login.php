<?php
   session_start();
   include_once "config.php";
   $email = htmlspecialchars($_POST['mail']);
   $pass = htmlspecialchars($_POST['password']);

   // Verification
   if(!empty($email) && !empty($pass)){
         $sql = $bd->prepare("SELECT * FROM users WHERE email = '{$email}' AND password = '{$pass}' ");
         $sql->execute();
         $row = $sql->fetch(PDO::FETCH_ASSOC);
         if($row > 0){
            $status = "En ligne";
            $sql = $bd->prepare("UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            $sql->execute();
            if($sql){
               $_SESSION['unique_id'] = $row['unique_id'];
               echo 'success';
            } 
         }else{
            echo "Identifiant ou mot de passe incorrect";
         }
   }else{
       echo "Remplisser tous les champs";
   }

?>