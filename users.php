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
    <div class="container">
        <section class="users">
            <div class="headerT">
                <i class="fa fa-twitter"></i>
              </div> <br>
            <header>
              <?php
                $sql = $bd->prepare("SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
                $sql->execute();
                $row = $sql->fetch(PDO::FETCH_ASSOC);
              ?>
                <div class="content">
                    <img src="images/<?php echo $row['image'];?>" alt="">
                    <div class="details">
                      <span><?php echo $row['nom']." ".$row['prenom'];?></span>
                      <p><?php echo $row['status'];?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">logout</a>
            </header>
            <div class="search">
                <span class="text">Selectionner un ami pour commencer </span>
                <input type="text" name="" id="myInput" placeholder="Entrer un nom à rechercher" id="">
                <button><i class="fa fa-search"></i></button>
            </div>
            <div class="users-list" id="list">
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#list a").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
</body>
</html>