
    <?php include('navbar.php');
    $req = $db->query('SELECT * FROM student WHERE type ="Tuteur" ORDER BY name ASC');

    $tutors = $req->fetchAll();
    ?>

    <div class="d-flex justify-content-center m-5">
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn bg-custom-1 text-white my-2 my-sm-0" type="submit">Trouver ton prof !</button>
      </form>
    </div>
      <div class="d-flex justify-content-center flex-wrap mb-5">
        <?php foreach ($tutors as $tutor):  ?>
          <?php if($tutor['admin'] != 1): ?>
            <div class="card m-3" style="width: 18rem;">
              <?php if($tutor['image']){
                echo '<img src="uploads/'. $tutor['image'] .'" class="card-img-top" alt="Photo du tuteur">';
              }else{
                echo '<img src="img/avatar.png" class="card-img-top" alt="Photo du tuteur">';
              };?>
              <div class="card-body">
                <h5 class="card-title"><?= $tutor['name'].' '.$tutor['firstname'] ?></h5>
                <p class="card-text"><?= $tutor['address'].' '.$tutor['postal'].' '.$tutor['city'] ?></p>
                <a href="profil_prof.php?id=<?=$tutor['id']?>" class="btn bg-custom-1 text-white">Voir profil</a>
              </div>
            </div>
          <?php endif ?>
        <?php endforeach ?>
      </div>


      <?php include('footer.php') ?>
  </body>
</html>
