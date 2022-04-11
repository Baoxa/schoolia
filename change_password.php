<?php
require_once 'function.php';
include('navbar.php');
require_once 'database.php';
?>

<div class="container-fluid bg-custom-1">
        <div class="container pt-2">

                <div class="form-group col-md-7 mx-auto bg-light form mt-5">

                        <form method="POST" action="verif_password.php?id=<?= $_GET['id'] ?>">
                            <h2 class="text-center">Nouveau mot de passe</h2>
                            <div class="form-group">
                                <label for="password" class="form-label pl-2">Mot de passe</label>
                                <input class="form-control" type="password" name="password" placeholder="8 caractères dont au moins 1 maj. et 1 chiffre" required>
                            </div>
                            <h2 class="text-center">Confirmez le nouveau mot de passe</h2>
                            <div class="form-group">
                                <label for="password" class="form-label pl-2">Mot de passe</label>
                                <input class="form-control" type="password" name="validate_password" placeholder="8 caractères dont au moins 1 maj. et 1 chiffre" required>
                            </div>
                            <div>
                                <input class="form-control button" type="submit" name="Confirmer" value="Confirmer">
                            </div>
                        </form>


                </div>


        </div>


</body>
<?php include("footer.php"); ?>
</html>
