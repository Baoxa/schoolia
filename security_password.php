<?php
require_once 'function.php';
include('navbar.php');
$profil = getProfil($db,1,$_GET['id']);

if(isset($_POST['password']) && !empty($_POST['password'])){
  if(hash('sha256', $_POST['password']) == $profil->password){
    header('location: change_password.php?id='.$profil->id);
  }else{
    header('location: security_password.php?id='.$profil->id);
  }
}


?>

<div class="container-fluid bg-custom-1">
        <div class="container pt-2">

                <div class="form-group col-md-7 mx-auto bg-light form mt-5">

                        <form method="POST" >
                            <h2 class="text-center">Confirmez l'ancien mot de passe</h2>
                            <div class="form-group">
                                <label for="password" class="form-label pl-2">Mot de passe</label>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                                <input class="form-control button" type="submit" name="Confirmer" value="Confirmer">
                            </div>
                        </form>


                </div>


        </div>

      </body>
      <?php include("footer.php"); ?>
      </html>
