<?php
   
   while($rows = $sql->fetch()){
       $sql2 = $bd->prepare("SELECT * FROM messages 
                             WHERE (msg_entrant_id = {$rows['unique_id']}
                             OR msg_sortant_id = {$rows['unique_id']}) AND (msg_sortant_id = {$sortant_id}
                             OR msg_entrant_id = {$sortant_id}) ORDER BY msg_id DESC LIMIT 1");
        $sql2->execute();
        $row2 = $sql2->fetch();
        $rowC2 = $sql2->rowCount();
        if($rowC2 > 0){
           $result = $row2['msg'];
        }else{
            $result = "Aucun message";
        }
        // Couper si la taille du message est superieur à 28 
        (strlen($result) > 28) ? $msg = substr($result,0,28).'...' : $msg = $result;
        $you = "";
        if(isset($row2['msg_sortant_id'])){
           ($sortant_id === $row2['msg_sortant_id']) ? $you = "vous: " : $you = $you;
        }
        ($rows['status'] == "Offline") ? $offline = "offline" : $offline = "";
        $reponse .= ' <a href="chat.php?user_id='.$rows['unique_id'].'">
                <div class="content">
                    <img src="images/'.$rows['image'].'" alt="">
                    <div class="details">
                        <span>'.$rows['nom']." ".$rows['prenom'].'</span>
                        <p>'.$you.$msg.'</p>
                    </div>
                </div> 
                <div class="status '.$offline.'"><i class="fa fa-circle"></i></div>
                </a>';
    }


?>