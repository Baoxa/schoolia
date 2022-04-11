<?php include('navbar.php');
    if(isset($_SESSION['mail']) && $_SESSION['mail']){
    $req = $db->query('SELECT * FROM student WHERE mail="'.$_SESSION['mail'].'"');
    $profil = $req->fetch();
    $matter = getMatter($db, $profil['id']);
    $birthday = $profil['birthday'];
    $return = date("d-m-Y", strtotime($birthday));
    $age = Age($return);

  }?>
  <div class="container-fluid bg-custom-1 full-height">
          <div class="container pt-2">

                  <div class="rounded-top col-md-12 mx-auto bg-light form mb-5">
                      <div class="container">
                          <div class="row">
                              <div class="col-md-3">
                                  <img src="img/profilpic.png" width="90%">
                              </div>
                              <div class="col-md-9">
                                  <h1><?=$profil['name'].' '.$profil['firstname'] ?></h1>
                                  <h4><?= $age ?> ans</h4>
                                  <h3>De <?= $profil['city'] ?></h3>
                                  <?php if($profil['type'] == 'Tuteur'): ?>
                                  <h2 class="pb-2">Ce professeur enseigne : </h2>
                                  <div class="row justify-content-md-center">
                                    <?php if($matter): ?>
                                      <?php if($matter->maths == true): ?>
                                        <div class="col-md-3 col-sm-4 pb-2" style="pointer-events: none;">
                                            <img src="img/mathematiques.png" width="95%">
                                        </div>
                                        <?php endif ?>
                                        <?php if($matter->francais == true): ?>
                                        <div class="col-md-3 col-sm-4 pb-2">
                                            <img src="img/francais.png" width="95%">
                                        </div>
                                        <?php endif ?>
                                        <?php if($matter->anglais == true): ?>
                                        <div class="col-md-3 col-sm-4 pb-2">
                                            <img src="img/anglais.png" width="95%">
                                        </div>
                                        <?php endif ?>
                                        <?php if($matter->espagnol == true): ?>
                                        <div class="col-md-3 col-sm-4 pb-2">
                                            <img src="img/espagnol.png" width="95%">
                                        </div>
                                        <?php endif ?>
                                        <?php if($matter->philosophie == true): ?>
                                        <div class="col-md-3 col-sm-4 pb-2">
                                            <img src="img/philosophie.png" width="95%">
                                        </div>
                                        <?php endif ?>
                                        <?php if($matter->histoire == true): ?>
                                        <div class="col-md-3 col-sm-4 pb-2">
                                            <img src="img/histoire-geo.png" width="95%">
                                        </div>
                                        <?php endif ?>
                                      <?php endif ?>



                                  </div>
                                  <?php endif ?>
                              </div>
                          </div>
                      </div>


                  </div>

<div class="rounded-top mx-auto bg-light form mb-5">
    <a class="btn btn-outline-dark" href="security_password.php?id=<?= $profil['id'] ?>" role="button">Changer le mot de passe</a>
    <a class="btn btn-outline-dark" href="change_profil.php?id=<?= $profil['id'] ?>" role="button">Modifier mon profil</a>
    <a class="btn btn-outline-dark" href="MESSAGERIETEST.php" role="button">Mes messages</a>
    <?php if($profil['type'] == 'Tuteur'): ?>
      <a class="btn btn-outline-dark" href="change_matter.php?id=<?= $profil['id'] ?>" role="button">Changer mes matières</a>
    <?php endif ?>
</div>
</div>
</div>


</html>
