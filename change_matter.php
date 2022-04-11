<?php include('navbar.php');
    if(isset($_SESSION['mail']) && $_SESSION['mail']){
    $req = $db->query('SELECT * FROM student WHERE mail="'.$_SESSION['mail'].'"');
    $profil = $req->fetch();
    $matter = getMatter($db, $profil['id']);

  }?>
  <form class="mb-5" action="verif_matter.php?id=<?= $profil['id'] ?>" method="POST">
    <?php if($matter->francais == 1): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="francais" id="inlineCheckbox1" value="1" checked>
        <label class="form-check-label" for="inlineCheckbox1">Français</label>
      </div>
    <?php else: ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="francais" id="inlineCheckbox1" value="1">
        <label class="form-check-label" for="inlineCheckbox1">Français</label>
      </div>
    <?php endif ?>
    <?php if($matter->anglais == 1): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="anglais" id="inlineCheckbox2" value="1" checked>
        <label class="form-check-label" for="inlineCheckbox2">Anglais</label>
      </div>
    <?php else: ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="anglais" id="inlineCheckbox2" value="1">
        <label class="form-check-label" for="inlineCheckbox2">Anglais</label>
      </div>
    <?php endif ?>
    <?php if($matter->espagnol == 1): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="espagnol" id="inlineCheckbox3" value="1" checked>
        <label class="form-check-label" for="inlineCheckbox3">Espagnol</label>
      </div>
    <?php else: ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="espagnol" id="inlineCheckbox3" value="1">
        <label class="form-check-label" for="inlineCheckbox3">Espagnol</label>
      </div>
    <?php endif ?>
    <?php if($matter->maths == 1): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="maths" id="inlineCheckbox4" value="1" checked>
        <label class="form-check-label" for="inlineCheckbox4">Mathématiques</label>
      </div>
    <?php else: ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="maths" id="inlineCheckbox4" value="1">
        <label class="form-check-label" for="inlineCheckbox4">Mathématiques</label>
      </div>
    <?php endif ?>
    <?php if($matter->philosophie == 1): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="philosophie" id="inlineCheckbox5" value="1" checked>
        <label class="form-check-label" for="inlineCheckbox5">Philosophie</label>
      </div>
    <?php else: ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="philosophie" id="inlineCheckbox5" value="1">
        <label class="form-check-label" for="inlineCheckbox5">Philosophie</label>
      </div>
    <?php endif ?>
    <?php if($matter->histoire == 1): ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="histoire" id="inlineCheckbox6" value="1" checked>
        <label class="form-check-label" for="inlineCheckbox6">Hisotire-Géo</label>
      </div>
    <?php else: ?>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="histoire" id="inlineCheckbox6" value="1">
        <label class="form-check-label" for="inlineCheckbox6">Hisotire-Géo</label>
      </div>
    <?php endif ?>
    <div class="form-group pt-3">
        <input class="form-control button" type="submit" name="register" value="Valider ces matières">
    </div>
  </form>


  <?php include('footer.php') ?>
</body>
</html>
