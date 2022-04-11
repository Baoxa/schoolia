

    <?php
      require_once 'function.php';
      include("navbar.php");
      require_once 'database.php';
      if(isset($_SESSION['mail']) && !empty($_SESSION['mail'])){
      $req = $db->query('SELECT id FROM student WHERE mail="'.$_SESSION['mail'].'"');
      $profil = $req->fetch();
      }
      $day = $_GET['day'];
    ?>

      <div class="bg-dark text-white">

        <h1 class="ml-4 pt-3">Contacte un étudiant post Bac pour des séances de tutorat.</h1>
        <h4 class="ml-5 mb-0 pb-3">Des cours moins cher pour les élèves et qui rémunère a 100% les étudiants !</p>

      </div>

    <div class="container-fluid bg-custom-1">
            <div class="container pt-2">

                    <div class="rounded-top mx-auto bg-light form mb-5">
                        <div class="container">
                        <h4 class="pt-1"><?= $day ?></h4>
                          <div class="row justify-content-md-center">
                            <?php
                              switch ($day) {
                                case 'Lundi':
                                  $req = $db->query('SELECT heure_debut_lundi, heure_fin_lundi, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                  foreach ($hour as $hours){
                                    if($hours['heure_debut_lundi'] != null){
                                      echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                              <p class="pt-2 text-center">De '.$hours['heure_debut_lundi'].'h à '.$hours['heure_fin_lundi'].'h</p>
                                              <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                            </div>';
                                      }
                                    }
                                  break;
                                case 'Mardi':
                                  $req = $db->query('SELECT heure_debut_mardi, heure_fin_mardi, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                    foreach ($hour as $hours){
                                      if($hours['heure_debut_mardi'] != null){
                                        echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                                <p class="pt-2 text-center">De '.$hours['heure_debut_mardi'].'h à '.$hours['heure_fin_mardi'].'h</p>
                                                <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                              </div>';
                                        }
                                    }
                                  break;
                                case 'Mercredi':
                                  $req = $db->query('SELECT heure_debut_mercredi, heure_fin_mercredi, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                  foreach ($hour as $hours){
                                    if($hours['heure_debut_mercredi'] != null){
                                      echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                              <p class="pt-2 text-center">De '.$hours['heure_debut_mercredi'].'h à '.$hours['heure_fin_mercredi'].'h</p>
                                              <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                            </div>';
                                      }
                                    }
                                  break;
                                case 'Jeudi':
                                  $req = $db->query('SELECT heure_debut_jeudi, heure_fin_jeudi, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                  foreach ($hour as $hours){
                                    if($hours['heure_debut_jeudi'] != null){
                                      echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                              <p class="pt-2 text-center">De '.$hours['heure_debut_jeudi'].'h à '.$hours['heure_fin_jeudi'].'h</p>
                                              <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                            </div>';
                                      }
                                    }
                                  break;
                                case 'Vendredi':
                                  $req = $db->query('SELECT heure_debut_vendredi, heure_fin_vendredi, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                  foreach ($hour as $hours){
                                    if($hours['heure_debut_vendredi'] != null){
                                      echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                              <p class="pt-2 text-center">De '.$hours['heure_debut_vendredi'].'h à '.$hours['heure_fin_vendredi'].'h</p>
                                              <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                            </div>';
                                      }
                                    }
                                  break;
                                case 'Samedi':
                                  $req = $db->query('SELECT heure_debut_samedi, heure_fin_samedi, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                  foreach ($hour as $hours){
                                    if($hours['heure_debut_samedi'] != null){
                                      echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                              <p class="pt-2 text-center">De '.$hours['heure_debut_samedi'].'h à '.$hours['heure_fin_samedi'].'h</p>
                                              <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                            </div>';
                                      }
                                    }
                                  break;
                                case 'Dimanche':
                                  $req = $db->query('SELECT heure_debut_dimanche, heure_fin_dimanche, commentaire FROM reservation WHERE id_etudiant='.$profil['id']);
                                  $hour = $req->fetchAll();
                                  foreach ($hour as $hours){
                                    if($hours['heure_debut_dimanche'] != null){
                                      echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                                              <p class="pt-2 text-center">De '.$hours['heure_debut_dimanche'].'h à '.$hours['heure_fin_dimanche'].'h</p>
                                              <button type="button" class="btn btn-outline-info" disabled>'.$hours['commentaire'].'</button>
                                            </div>';
                                      }
                                    }
                                  break;
                              }
                            ?>


                          </div>


                          </div>




                        </div>



                    </div>


            </div>
        </div>


</body>
<?php include("footer.php"); ?>
</html>
