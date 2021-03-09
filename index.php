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
<div class="containerLog">
     <div class="containercon">
        <div class="headerT">
          <i class="fa fa-twitter"></i> Welcome
        </div> <br>
          <form class="formreg">
                <div class="message"> Erreur </div>
                <div class="field">
                    <label for="email">Email Address</label>
                    <input type="email" name="mail" id="email" class="form-control" placeholder="Enter your name" minlength="8" required>
                </div>
                <div class="field">
                    <label for="passwordid">Password</label>
                    <input type="password" name="password" id="passwordid" class="form-control" placeholder="Enter your password"  required>
                    <i class="fa fa-eye"></i>
                  </div>
                <div class="forget-link">
                  <a href="">mot de passe oublié? </a><br>
                </div>
              <div class="field logBtn">
                 <input type="submit" class="button" value="Continuer">
              </div>  
           </form>
      </div>
      <div class="link">
        Vous n'avez pas de compte ?<a href="register.php"> <b>  Demandez en un </b> </a> <br>
      </div>
</div>

<script src="javascript/hide-show.js"></script>
<script src="javascript/login.js"></script>


</body>
</html>