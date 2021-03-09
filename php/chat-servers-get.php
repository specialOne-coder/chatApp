<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
      include_once "config.php";
      $sortant_id = htmlspecialchars($_POST['sortant_id']);
      $entrant_id = htmlspecialchars($_POST['entrant_id']);
      $reponse = "";

        $sql = $bd->prepare("SELECT * FROM messages 
                             LEFT JOIN users ON users.unique_id = messages.msg_sortant_id
                             WHERE (msg_sortant_id={$sortant_id} AND msg_entrant_id={$entrant_id})
                             OR (msg_sortant_id={$entrant_id} AND msg_entrant_id={$sortant_id}) ORDER BY msg_id ASC");
        $sql->execute();
        $rowC = $sql->rowCount();
        if($rowC > 0){
            while($row = $sql->fetch()){
                if($row['msg_sortant_id'] === $sortant_id){
                    $reponse .= '<div class="chat sortant">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }else{
                    $reponse .= ' <div class="chat entrant">
                                    <img src="images/'.$row['image'].'" alt="">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                  </div>';
                }   
            }
            echo $reponse;
        }
  }else{
      header("location:../index.php");
  } 

?>