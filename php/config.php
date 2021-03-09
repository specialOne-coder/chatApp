<?php
   
   try {
        $bd = new PDO("mysql:host=localhost;dbname=chatApp;charset:UTF8",'root','');
        $bd->setAttribute(PDO::ATTR_CASE , PDO::CASE_LOWER);
        $bd->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   }catch (\Throwable $th) {
        echo'Erreur'.$th;
   }

   // mysqli

   

?>