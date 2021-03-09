<?php
   session_start();
   include_once "config.php";
   $fname = htmlspecialchars($_POST['nom']);
   $lname = htmlspecialchars($_POST['prenom']);
   $email = htmlspecialchars($_POST['mail']);
   $pass = htmlspecialchars($_POST['password']);

   // Verification
   if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pass)){
      
      // email verification
      if(filter_var($email,FILTER_VALIDATE_EMAIL)){
         $sql = $bd->prepare("SELECT email FROM users WHERE email = '{$email}'");
         $sql->execute();
         // echo 'Ok ça passe';
         if($sql->rowCount() > 0 ){
             echo 'l\'email '.$email.' existe déja !';
         }else{
            // telechargement du fichier
            if(isset($_FILES['image'])){
              $img_name = $_FILES['image']['name'];
              $tmp_name = $_FILES['image']['tmp_name'];

              $img_explode = explode('.',$img_name);
              $img_ext = end($img_explode);

              $extensions = ['png','jpeg','jpg'];
              if(in_array($img_ext,$extensions) === true){
                 $time = time();
                 $new_img_name = $time.$img_name;
                 if(move_uploaded_file($tmp_name,'../images/'.$new_img_name)){
                    $status = "En ligne";
                    $random_id = rand(time(),10000000);
                    // Insertion des données utilisateurs
                    $sqlInsert = $bd->prepare("INSERT INTO users(unique_id,nom,prenom,email,password,image,status) 
                                              VALUES(?,?,?,?,?,?,?)");
                    $sqlInsert->execute(array(
                       $random_id,$fname,$lname,$email,$pass,$new_img_name,$status
                    ));
                    if($sqlInsert){
                      $sql3 = $bd->prepare("SELECT * FROM users WHERE email = '{$email}'");
                      $sql3->execute();
                      $row = $sql3->fetch(PDO::FETCH_ASSOC);
                      $_SESSION['unique_id'] = $row['unique_id'];
                      echo 'success';
                    }else{
                      echo ' Erreur de création du compte';
                    }
                 }

              }else{
                 echo 'Svp choisisser une image -jpeg ,jpg ,png !';
              }
            }else{
               echo 'Aucun fichier';
            }
 
         }
          
      }else{
          echo 'l\'email '.$email.'n\'est pas valide !';
      }
   }else{
      echo 'Tous les champs sont requis !';
   }




   // $image = htmlspecialchars($_POST['image']);
?>