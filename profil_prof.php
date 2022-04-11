<?php include("navbar.php");
      include("bandeaunoir.php");
      require_once 'database.php';
      require_once 'function.php';
      setlocale(LC_TIME, 'fra_fra');
      $week = week(date('Y'), date('W'));
      $profil = getProfil($db, 1, $_GET['id']);
      $matter = getMatter($db,$profil->id);
      $birthday = $profil->birthday;
      $return = date("d-m-Y", strtotime($birthday));
      $age = Age($return);
    ?>


    <div class="container-fluid bg-custom-1 full-height">
            <div class="container pt-2">

                    <div class="rounded-top col-md-12 mx-auto bg-light form mb-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="uploads/<?=$profil->image ?>" width="90%">
                                </div>
                                <div class="col-md-9">
                                    <h1><?=$profil->name.' '.$profil->firstname ?></h1>
                                    <h4><?= $age ?> ans</h4>
                                    <h3>De <?= $profil->city ?></h3>
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
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="rounded-top mx-auto bg-light form mb-5">
                        <div class="container ">
                            <div class="row justify-content-md-center">
                                <button type="button" class="btn btn-lg btn-info col-md-2 col-sm-3 m-2">AGENDA</button>
                                <button type="button" class="btn btn-lg btn-success col-md-2 col-sm-3 m-2">BIOGRAPHIE</button>
                                <a href="MESSAGERIETEST.php?id=<?= $_GET['id'] ?>" class="btn btn-lg btn-danger col-md-2 col-sm-3 m-2">
                                  <button type="button" class="btn btn-lg btn-danger">MESSAGE PRIVÉ</button>
                                </a>
                                <button type="button" class="btn btn-lg btn-warning col-md-2 col-sm-3 m-2 text-white">AVIS</button>
                                <button type="button" class="btn btn-lg btn-primary col-md-2 col-sm-3 m-2">AGENDA</button>


                            </div>
                        </div>
                    </div>

                    <div class="rounded-top mx-auto bg-light form mb-5">
                        <div class="container ">
                          <div class="row justify-content-md-center">

                                <a class="ml-0 col-md-2" onclick="previousweek()" title="Précédent" style="font-size: 30px;font-weight: bold;">⇦</a>

                            <h2 class="text-center col-md-8">Semaine <?= $week ?></h2>

                                <a class="mr-0 col-md-2 text-right" href="#" title="Suivant" style="font-size: 30px;font-weight: bold;">⇨</a>

                          </div>

                          <div class="row justify-content-md-center">

                          <div class="col-lg-2 col-md-3  pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=lundi" role="button">Lundi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=mardi" role="button">Mardi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=mercredi" role="button">Mercredi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=jeudi" role="button">Jeudi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=vendredi" role="button">Vendredi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=samedi" role="button">Samedi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_prof.php?id=<?= $profil->id ?>&amp;day=dimanche" role="button">Dimanche</a>
                            </div>




                          </div>


                          </div>




                        </div>



                    </div>


            </div>
    </div>

<?php include("footer.php"); ?>
</html>
