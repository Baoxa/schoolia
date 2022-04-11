

    <?php include("navbar.php");
      require_once 'database.php';
      require_once 'function.php';
      $id = $_GET['id'];
      $day = $_GET['day'];
      $start = $_GET['start'];
      $end = $_GET['end'];
    ?>

      <div class="bg-dark text-white">

        <h1 class="ml-4 pt-3">Contacte un étudiant post Bac pour des séances de tutorat.</h1>
        <h4 class="ml-5 mb-0 pb-3">Des cours moins cher pour les élèves et qui rémunère a 100% les étudiants !</p>

      </div>

    <div class="container-fluid bg-custom-1">
            <div class="container pt-2">

                    <div class="form-group col-md-7 mx-auto bg-light form mt-5">

                            <form action="verif_reservation.php?id=<?= $id ?>&amp;day=<?= $day ?>&amp;start=<?= $start ?>&amp;end=<?= $end ?>" method="POST" >
                                <h2 class="text-center">Réservation</h2>

                                <div class="form-group">
                                    <label for="mail" class="form-label pl-2">Commentaire</label>
                                    <textarea class="form-control" name="text" placeholder="1000 caractère max." ></textarea>
                                </div>
                                    <input class="form-control button" type="submit" name="reservation" value="Réserver">
                                </div>
                            </form>


                    </div>


            </div>


</body>
<?php include("footer.php"); ?>
</html>
