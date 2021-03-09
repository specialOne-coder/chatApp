<?php
   session_start();
   if(isset($_SESSION['unique_id'])){
     header("location:users.php");
   }
?>
<?php
  include_once "header.php";
?>
<body>
    
 <div class="container">
     <div class="containercon">
        <div class="headerT">
          <i class="fa fa-twitter"></i> Register 
        </div> <br>
      <form class="formreg" enctype="multipart/form-data">
          <div class="message"></div>
          <div class="names">
            <div class="field">
                <label for="first">First Name</label>
                <input type="text" name="nom" id="first" class="form-control" placeholder="Nom "  required> 
            </div>
            <div class="field">
                <label for="last">Last Name</label>
                <input type="text" name="prenom" id="last" class="form-control" placeholder="Prénom"  required> 
            </div>
          </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" name="mail" id="email" class="form-control" placeholder="Enter your email"  required>
            </div>
            <div class="field">
                <label for="passwordid">Password</label>
                <input type="password" name="password" id="passwordid" class="form-control" placeholder="Enter new password" required>
                <i class="fa fa-eye"></i>
            </div>
            <div class="field image">
                <label for="imageid">Profil</label>
                <input type="file" name="image" id="imageid" class="" placeholder="Enter new password"  required>
            </div>
            <div class="field regBtn">
               <input type="submit" class="button" value="Continuer ">
            </div> 
     </form> 
     <div class="link">
        Vous avez deja un compte ? <a href="index.php"> <b> Connectez-vous </b> </a> <br>
     </div>
    </div>
</div>

<script src="javascript/hide-show.js"></script>
<script src="javascript/register.js"></script>

</body>
</html>