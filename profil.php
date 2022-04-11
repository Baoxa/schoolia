<?php include("navbar.php");
      include("bandeaunoir.php");
      require_once 'database.php';
      require_once 'function.php';
      setlocale(LC_TIME, 'fra_fra');
      $week = week(date('Y'), date('W'));
      if(isset($_SESSION['mail']) && $_SESSION['mail']){
      $req = $db->query('SELECT * FROM student WHERE mail="'.$_SESSION['mail'].'"');
      $profil = $req->fetch();
      }
      $matter = getMatter($db,$profil['id']);
    ?>

                    <div class="rounded-top mx-auto bg-light form mb-5">
                        <div class="container ">
                          <div class="row justify-content-md-center">

                                <a class="ml-0 col-md-2" href="#" title="Précédent" style="font-size: 30px;font-weight: bold;">⇦</a>

                            <h2 class="text-center col-md-8">Semaine <?= $week ?></h2>

                                <a class="mr-0 col-md-2 text-right" href="#" title="Suivant" style="font-size: 30px;font-weight: bold;">⇨</a>

                          </div>
                          <?php if($profil['type'] == 'Tuteur'): ?>
                          <div class="row justify-content-md-center">

                          <div class="col-lg-2 col-md-3  pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=lundi" role="button">Lundi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=mardi" role="button">Mardi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=mercredi" role="button">Mercredi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=jeudi" role="button">Jeudi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=vendredi" role="button">Vendredi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=samedi" role="button">Samedi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda.php?day=dimanche" role="button">Dimanche</a>
                            </div>
                          </div>
                        <?php elseif($profil['type'] == 'Etudiant'): ?>
                          <div class="row justify-content-md-center">

                          <div class="col-lg-2 col-md-3  pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Lundi" role="button">Lundi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Mardi" role="button">Mardi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Mercredi" role="button">Mercredi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Jeudi" role="button">Jeudi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Vendredi" role="button">Vendredi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Samedi" role="button">Samedi</a>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <a class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" href="agenda_etudiant.php?day=Dimanche" role="button">Dimanche</a>
                            </div>
                          </div>
                        <?php endif; ?>
                          </div>
                        </div>
                  <?php if($profil['type'] == 'Tuteur'): ?>
                    <form class="mb-5" action="verif_horaire.php?id=<?= $profil['id'] ?>" id="form_timetable" method="POST">
                        <select class="form-select form-select-lg mb-3" form"form_timetable" name="day" aria-label=".form-select-lg example">
                          <option selected>Tous les jours</option>
                          <option value="lundi">Lundi</option>
                          <option value="mardi">Mardi</option>
                          <option value="mercredi">Mercredi</option>
                          <option value="jeudi">jeudi</option>
                          <option value="vendredi">Vendredi</option>
                          <option value="samedi">Samedi</option>
                          <option value="dimanche">Dimanche</option>
                        </select>
                        <select class="form-select form-select-lg mb-3" form"form_timetable" name="timetablestart" aria-label=".form-select-lg example">
                          <option selected>Horaire de départ</option>
                          <option value="1">1h</option>
                          <option value="2">2h</option>
                          <option value="3">3h</option>
                          <option value="4">4h</option>
                          <option value="5">5h</option>
                          <option value="6">6h</option>
                          <option value="7">7h</option>
                          <option value="8">8h</option>
                          <option value="9">9h</option>
                          <option value="10">10h</option>
                          <option value="11">11h</option>
                          <option value="12">12h</option>
                          <option value="13">13h</option>
                          <option value="14">14h</option>
                          <option value="15">15h</option>
                          <option value="16">16h</option>
                          <option value="17">17h</option>
                          <option value="18">18h</option>
                          <option value="19">19h</option>
                          <option value="20">20h</option>
                          <option value="21">21h</option>
                          <option value="22">22h</option>
                          <option value="23">23h</option>
                          <option value="24">24h</option>
                        </select>
                        <select class="form-select form-select-lg mb-3" form"form_timetable" name="timetableend" aria-label=".form-select-lg example">
                          <option selected>Horaire de fin</option>
                          <option value="1">1h</option>
                          <option value="2">2h</option>
                          <option value="3">3h</option>
                          <option value="4">4h</option>
                          <option value="5">5h</option>
                          <option value="6">6h</option>
                          <option value="7">7h</option>
                          <option value="8">8h</option>
                          <option value="9">9h</option>
                          <option value="10">10h</option>
                          <option value="11">11h</option>
                          <option value="12">12h</option>
                          <option value="13">13h</option>
                          <option value="14">14h</option>
                          <option value="15">15h</option>
                          <option value="16">16h</option>
                          <option value="17">17h</option>
                          <option value="18">18h</option>
                          <option value="19">19h</option>
                          <option value="20">20h</option>
                          <option value="21">21h</option>
                          <option value="22">22h</option>
                          <option value="23">23h</option>
                          <option value="24">24h</option>
                        </select>
                        <div class="form-group pt-3">
                            <input class="form-control button" type="submit" name="register" value="Valider ces horaires">
                        </div>
                      </form>
                    <?php endif; ?>

</html>
