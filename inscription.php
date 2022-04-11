

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

                    <div class="form-group col-md-7 mx-auto bg-light form mt-3">

                            <form method="POST" action="verif_inscription.php" enctype="multipart/form-data">
                                <h2 class="text-center">Inscription</h2>
                                <p class="text-center">Veuillez remplir les données suivantes.</p>
				                <p class="text-center">Déjà inscrit ? <a href="connexion.php">Connecte toi</a></p>

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                    <label for="name" class="form-label pl-2">Nom</label>
                                        <input class="form-control" type="text" name="name" placeholder="Dupont" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="dateDeNaissance" class="form-label pl-2">Date de naissance</label>
                                        <input class="form-control" type="date" name="birthday" required>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    <label for="name" class="form-label pl-2">Prénom</label>
                                        <input class="form-control" type="text" name="firstname" placeholder="Serge" required>
                                    </div>
                                   <!-- <div class="form-group col-md-5">
                                    <label for="studentLevel" class="form-label pl-2">Classe</label>
                                    <select class="custom-select is-invalid" name ="studentLevel" id="studentLevel" required>
                                        <option selected disabled value="">Choisir..</option>
                                        <option>6ème</option>
                                        <option>5ème</option>
                                        <option>4ème</option>
                                        <option>3ème</option>
                                        <option>2nde</option>
                                        <option>1ère</option>
                                        <option>Term.</option>
                                    </select>
                                    </div> -->
                                </div>

                                <div class="form-group">
                                    <label for="image" class="form-label pl-2">Image de profil</label>
                                    <input class="form-control" type="file" name="image" accept="image/jpeg,image/png">
                                </div>
                                <div class="form-group">
                                    <label for="mail" class="form-label pl-2">Mail</label>
                                    <input class="form-control" type="email" name="mail" placeholder="dupont.serge@gmail.com" >
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label pl-2">Mot de passe</label>
                                    <input class="form-control" type="password" name="password" placeholder="8 caractères dont au moins 1 maj. et 1 chiffre" required>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                    <label for="address" class="form-label pl-2">Adresse</label>
                                        <input class="form-control" type="text" name="address" placeholder="2 Rue du Lac" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="postal" class="form-label pl-2">Code postal</label>
                                        <input class="form-control" type="number" name="postal" placeholder="75017">

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="dateDeNaissance" class="form-label pl-2">Ville</label>
                                    <input class="form-control" type="text" name="city" placeholder="Paris">
                                </div>
                                <div class="text-center pt-1">
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="Etudiant">
                                    <label class="form-check-label" for="inlineRadio1"><h5>Étudiant</h5></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="Tuteur">
                                    <label class="form-check-label" for="inlineRadio2"><h5>Tuteur</h5></label>
                                    </div>
                                </div>
                                <div class="form-group pt-3">
                                    <input class="form-control button" type="submit" name="register" value="S'inscrire">
                                </div>

                            </form>


                    </div>


            </div>
        </div>


</body>
<?php include("footer.php"); ?>
</html>
