<?php
require_once 'database.php';
session_start();
if(!isset($_GET['id']) || empty($_GET['id'])){
  header('location: index.php?Pas possible de faire une réservation.');
}

if(!isset($_GET['day']) || empty($_GET['day'])){
  header('location: index.php?Pas possible de faire une réservation.');
}

if(!isset($_GET['start']) || empty($_GET['start'])){
  header('location: index.php?Pas possible de faire une réservation.');
}

if(!isset($_GET['end']) || empty($_GET['end'])){
  header('location: index.php?Pas possible de faire une réservation.');
}

if(!isset($_POST['text']) || empty($_POST['text'])){
  header('location: index.php?il faut mettre un commentaire.');
}

$r = $db->query('SELECT id FROM student WHERE mail="'.$_SESSION['mail'].'"');
$e = $r->fetch();

switch ($_GET['day']) {
  case 'lundi':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_lundi, heure_fin_lundi, commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_lundi, :heure_fin_lundi, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_lundi' => $_GET['start'],
        'heure_fin_lundi' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
  case 'mardi':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_mardi, heure_fin_mardi, commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_mardi, :heure_fin_mardi, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_mardi' => $_GET['start'],
        'heure_fin_mardi' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
  case 'mercredi':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_mercredi, heure_fin_mercredi, commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_mercredi, :heure_fin_mercredi, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_mercredi' => $_GET['start'],
        'heure_fin_mercredi' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
  case 'jeudi':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_jeudi, heure_fin_jeudi, commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_jeudi, :heure_fin_jeudi, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_jeudi' => $_GET['start'],
        'heure_fin_jeudi' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
  case 'vendredi':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_vendredi, heure_fin_vendredi, commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_vendredi, :heure_fin_vendredi, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_vendredi' => $_GET['start'],
        'heure_fin_vendredi' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
  case 'samedi':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_samedi, heure_fin_samedi, :commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_samedi, :heure_fin_samedi, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_samedi' => $_GET['start'],
        'heure_fin_samedi' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
  case 'dimanche':
      $q = 'INSERT INTO reservation (id_tuteur, id_etudiant, today, day, heure_debut_dimanche, heure_fin_dimanche, commentaire) VALUES(:id_tuteur, :id_etudiant, NOW(), :day, :heure_debut_dimanche, :heure_fin_dimanche, :texte)';
      $req = $db->prepare($q);
      $reponse = $req->execute([
        'id_tuteur' => $_GET['id'],
        'id_etudiant' => $e['id'],
        'day' => $_GET['day'],
        'heure_debut_dimanche' => $_GET['start'],
        'heure_fin_dimanche' => $_GET['end'],
        'texte' => $_POST['text']
      ]);
    break;
}

if($reponse){
  header('location: index.php?reservation réussi.');
}else{
  header('location: index.php?Le reservation est annulé.');
}




 ?>
