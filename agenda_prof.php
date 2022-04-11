

    <?php
      require_once 'function.php';
      include("navbar.php");
      require_once 'database.php';
      if(isset($_GET['id']) && $_GET['id']){
      $req = $db->query('SELECT * FROM student WHERE id='.$_GET['id']);
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
                                case 'lundi':
                                  $req = $db->query('SELECT heure_debut_lundi, heure_fin_lundi FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_lundi'],$hour['heure_fin_lundi'],$profil['id'],'Etudiant',$day);
                                  break;
                                case 'mardi':
                                  $req = $db->query('SELECT heure_debut_mardi, heure_fin_mardi FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_mardi'],$hour['heure_fin_mardi'],$profil['id'],'Etudiant',$day);
                                  break;
                                case 'mercredi':
                                  $req = $db->query('SELECT heure_debut_mercredi, heure_fin_mercredi FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_mercredi'],$hour['heure_fin_mercredi'],$profil['id'],'Etudiant',$day);
                                  break;
                                case 'jeudi':
                                  $req = $db->query('SELECT heure_debut_jeudi, heure_fin_jeudi FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_jeudi'],$hour['heure_fin_jeudi'],$profil['id'],'Etudiant',$day);
                                  break;
                                case 'vendredi':
                                  $req = $db->query('SELECT heure_debut_vendredi, heure_fin_vendredi FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_vendredi'],$hour['heure_fin_vendredi'],$profil['id'],'Etudiant',$day);
                                  break;
                                case 'samedi':
                                  $req = $db->query('SELECT heure_debut_samedi, heure_fin_samedi FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_samedi'],$hour['heure_fin_samedi'],$profil['id'],'Etudiant',$day);
                                  break;
                                case 'dimanche':
                                  $req = $db->query('SELECT heure_debut_dimanche, heure_fin_dimanche FROM cours WHERE id_tuteur='.$profil['id']);
                                  $hour = $req->fetch();
                                  buttonPart($db,$hour['heure_debut_dimanche'],$hour['heure_fin_dimanche'],$profil['id'],'Etudiant',$day);
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
