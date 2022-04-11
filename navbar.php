<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='chrome'>
    <title>SCHOOLIA</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="puzzleco.js"></script>
    <script src="puzzleinsc.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <?php
  require_once 'database.php';
  require_once 'function.php';
  /*timePassed($db);*/
   ?>
<nav class="navbar navbar-expand-md navbar-light bg-custom-1">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
  <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" height="75" alt="Schoolia">
  </a>

  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
      <a class="nav-link text-white" href="index.php">Acceuil <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="research.php">Trouve ton prof <span class="sr-only">(current)</span></a>
    </li>
  <?php
     if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
      echo('<li class="nav-item">
          <a class="nav-link text-white" href="admin.php">Administration<span class="sr-only">(current)</span></a>
        </li>');
      }
      if(isset($_SESSION['mail']) && !empty($_SESSION['mail']) && $_SESSION['admin'] != 1){
       echo('<li class="nav-item">
               <a class="nav-link text-white" href="profil.php">Mon pannel<span class="sr-only">(current)</span></a>
             </li>');
     }
     if(isset($_SESSION['mail']) && !empty($_SESSION['mail']) && $_SESSION['admin'] !=1){
       echo('<li class="nav-item">
                <a class="nav-link text-white" href="gestion.php">Mon compte <span class="sr-only">(current)</span></a>
            </li>');
     }
    ?>
  </ul>
  <?php
  if(isset($_SESSION['mail']) && !empty($_SESSION['mail'])){
  echo('  <div class="navbar-nav ml-auto">
            <a href="deconnexion.php" class="nav-item nav-link text-white pr-3"><button hreftype="button" class="btn btn-outline-light">Deconnexion</button></a>
          </div> ');
  }else{
  echo('<div class="navbar-nav ml-auto">
          <a href="inscription.php" class="nav-item nav-link text-white pr-3"><button hreftype="button" class="btn btn-outline-light">Inscription / Connexion</button></a>
        </div> ');
  }
  ?>
</div>

</nav>
