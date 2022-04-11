<?php include("navbar.php");
    include("bandeaunoir.php");
    require_once 'database.php';
    if(!isset($_SESSION['mail']) || empty($_SESSION['mail'])){
      header('location: inscription.php?message=il faut vous connecter');
      exit;
    }
    ?>





<div class="container-fluid bg-custom-1 full-height">
    <div class="container pt-2">
        <div class="rounded-top col-md-12 mx-auto bg-light form mb-5">
            <h1 class="text-center">MESSAGERIE</h1>
            <div class="container">
                <div class="row border border-secondary rounded">
                    <div class="col-md-3 border-dark border-right">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row p-2 border-bottom border-dark">
                                    <?php getContact($db,$_SESSION['mail']); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row p-2">
                                    <?php
                                    if(isset($_GET['id']) && !empty($_GET['id'])){
                                    getMesssage($db,$_GET['id'], $_SESSION['mail']);
                                  }else{
                                    echo "<p>Veuillez selectionner un contact</p>";
                                  }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($_GET['id']) && !empty($_GET['id'])): ?>
              <div>
                <form action="send_message.php?id=<?= $_GET['id'] ?>" method="POST">
                  <textarea type="text" name="message" rows="8" cols="80"></textarea>
                  <input type="submit" name="send" value="Envoyer">
                </form>
              </div>
          <?php endif; ?>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
