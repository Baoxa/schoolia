

    <?php include("navbar.php");
      require_once 'database.php';
      require_once '../function.php';
      setlocale(LC_TIME, 'fra_fra');
      $week = week(date('Y'), date('W'));
    ?>

      <div class="bg-dark text-white">

        <h1 class="ml-4 pt-3">Contacte un étudiant post Bac pour des séances de tutorat.</h1>
        <h4 class="ml-5 mb-0 pb-3">Des cours moins cher pour les élèves et qui rémunère a 100% les étudiants !</p>

      </div>

    <div class="container-fluid bg-custom-1">
            <div class="container pt-2">

                    <div class="rounded-top mx-auto bg-light form mb-5">
                        <div class="container ">
                          <div class="row justify-content-md-center">

                                <a class="ml-0 col-md-2" href="#" title="Précédent" style="font-size: 30px;font-weight: bold;">⇦</a>

                            <h2 class="text-center col-md-8">Semaine <?= $week ?></h2>

                                <a class="mr-0 col-md-2 text-right" href="#" title="Suivant" style="font-size: 30px;font-weight: bold;">⇨</a>

                          </div>

                          <div class="row justify-content-md-center">

                          <div class="col-lg-2 col-md-3  pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Lundi</button>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Mardi</button>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Mercredi</button>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Jeudi</button>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Vendredi</button>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Samedi</button>
                            </div>
                            <div class="col-lg-2 col-md-3 pr-1 text-center rounded pb-4 pt-4 mt-2">

                              <button type="button" class="btn btn-lg btn-outline-info pt-5 pb-5 pr-4 pl-4" >Dimanche</button>
                            </div>




                          </div>


                          </div>




                        </div>



                    </div>


            </div>
        </div>


</body>
<?php include("footer.php"); ?>
</html>
