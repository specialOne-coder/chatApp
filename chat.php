<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location:index.php");
  }
?>

<?php
  include_once "header.php";
  include_once "php/config.php";
?>
<body>

    <div class="containerC">
        <section class="chat-area">
            <div class="headerT">
                <i class="fa fa-twitter"></i>
              </div> <br>
            <header>
                <?php
                    $user_id = htmlspecialchars($_GET['user_id']);
                    $sql = $bd->prepare("SELECT * FROM users WHERE unique_id = '{$user_id}'");
                    $sql->execute();
                    $row = $sql->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="content">
                    <a class="back-icon" href="users.php"><i class="fa fa-arrow-left"></i></a>
                    <img src="images/<?php echo $row['image'];?>" alt="">
                    <div class="details">
                      <span><?php echo $row['nom']." ".$row['prenom'];?></span>
                      <p><?php echo $row['status'];?></p>
                    </div>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="#"  class="typing" autocomplete="off">
                <input type="text" name="sortant_id" value="<?php echo $_SESSION['unique_id'] ?>" placeholder="Enrer votre message..." hidden>
                <input type="text" name="entrant_id" value="<?php echo $user_id ?>" placeholder="Enrer votre message..." hidden>
                <input type="text" name="message" class="input-message" placeholder="Enrer votre message...">
                <button><i class="fa fa-telegram"></i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>
</html> 