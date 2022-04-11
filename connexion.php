

    <?php include("navbar.php");
      require_once 'database.php';
      if(isset($_SESSION['mail']) && !empty($_SESSION['mail'])){
        header('location:index.php?message=Vous êtes déjà connecté.');
      }
    ?>

      <div class="bg-dark text-white">

        <h1 class="ml-4 pt-3">Contacte un étudiant post Bac pour des séances de tutorat.</h1>
        <h4 class="ml-5 mb-0 pb-3">Des cours moins cher pour les élèves et qui rémunère a 100% les étudiants !</p>

      </div>

    <div class="container-fluid bg-custom-1">
            <div class="container pt-2">

                    <div class="form-group col-md-7 mx-auto bg-light form mt-5">

                            <form action="verif_connexion.php" method="POST" >
                                <h2 class="text-center">Connexion</h2>
                                <p class="text-center">Veuillez remplir les données suivantes.</p>

                                <div class="form-group">
                                    <label for="mail" class="form-label pl-2">Mail</label>
                                    <input class="form-control" type="email" name="mail" placeholder="dupont.serge@gmail.com" >
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label pl-2">Mot de passe</label>
                                    <input class="form-control" type="password" name="password" placeholder="8 caractères dont au moins 1 maj. et 1 chiffre" required>
                                </div>
                                <!--  <div id="main" class="class">
                                      <canvas id="puzzle" width="480px" height="480px"></canvas>
                                  </div>
                                <div class="form-group pt-3">
                                    <input class="form-control button" type="submit" id="submit" name="connexion" value="Se connecter" onesubmit="return check();">-->
                                    <input class="form-control button" type="submit" name="connexion" value="Se connecter">
                                </div>
                            </form>


                    </div>


            </div>


</body>
<?php include("footer.php"); ?>
</html>
