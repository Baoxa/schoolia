<?php
require_once 'database.php';

if(!isset($_POST['timetablestart']) || empty($_POST['timetablestart'])){
  header('location: profil.php?message=Veuillez selectionner des horaires');
  exit;
}

if(!isset($_POST['timetableend']) || empty($_POST['timetableend'])){
  header('location: profil.php?message=Veuillez selectionner des horaires');
  exit;
}
if(isset($_POST['day']) && !empty($_POST['day'])){
  $day = $_POST['day'];
}

switch ($day) {
  case 'lundi':
    $req = $db->prepare('UPDATE cours SET heure_debut_lundi=:heure_debut_lundi, heure_fin_lundi=:heure_fin_lundi WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_lundi' => $_POST['timetablestart'],
      'heure_fin_lundi' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  case 'mardi':
    $req = $db->prepare('UPDATE cours SET heure_debut_mardi=:heure_debut_mardi, heure_fin_mardi=:heure_fin_mardi WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_mardi' => $_POST['timetablestart'],
      'heure_fin_mardi' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  case 'mercredi':
    $req = $db->prepare('UPDATE cours SET heure_debut_mercredi=:heure_debut_mercredi, heure_fin_mercredi=:heure_fin_mercredi WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_mercredi' => $_POST['timetablestart'],
      'heure_fin_mercredi' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  case 'jeudi':
    $req = $db->prepare('UPDATE cours SET heure_debut_jeudi=:heure_debut_jeudi, heure_fin_jeudi=:heure_fin_jeudi WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_jeudi' => $_POST['timetablestart'],
      'heure_fin_jeudi' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  case 'vendredi':
    $req = $db->prepare('UPDATE cours SET heure_debut_vendredi=:heure_debut_vendredi, heure_fin_vendredi=:heure_fin_vendredi WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_vendredi' => $_POST['timetablestart'],
      'heure_fin_vendredi' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  case 'samedi':
    $req = $db->prepare('UPDATE cours SET heure_debut_samedi=:heure_debut_samedi, heure_fin_samedi=:heure_fin_samedi WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_samedi' => $_POST['timetablestart'],
      'heure_fin_samedi' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  case 'dimanche':
    $req = $db->prepare('UPDATE cours SET heure_debut_dimanche=:heure_debut_dimanche, heure_fin_dimanche=:heure_fin_dimanche WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_dimanche' => $_POST['timetablestart'],
      'heure_fin_dimanche' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
    break;
  default:
    $req = $db->prepare('UPDATE cours SET heure_debut_lundi=:heure_debut_lundi, heure_fin_lundi=:heure_fin_lundi, heure_debut_mardi=:heure_debut_mardi, heure_fin_mardi=:heure_fin_mardi, heure_debut_mercredi=:heure_debut_mercredi, heure_fin_mercredi=:heure_fin_mercredi, heure_debut_jeudi=:heure_debut_jeudi, heure_fin_jeudi=:heure_fin_jeudi, heure_debut_vendredi=:heure_debut_vendredi, heure_fin_vendredi=:heure_fin_vendredi, heure_debut_samedi=:heure_debut_samedi, heure_fin_samedi=:heure_fin_samedi, heure_debut_dimanche=:heure_debut_dimanche, heure_fin_dimanche=:heure_fin_dimanche WHERE id_tuteur=:id_tuteur');
    $reponse = $req->execute([
      'heure_debut_lundi' => $_POST['timetablestart'],
      'heure_fin_lundi' => $_POST['timetableend'],
      'heure_debut_mardi' => $_POST['timetablestart'],
      'heure_fin_mardi' => $_POST['timetableend'],
      'heure_debut_mercredi' => $_POST['timetablestart'],
      'heure_fin_mercredi' => $_POST['timetableend'],
      'heure_debut_jeudi' => $_POST['timetablestart'],
      'heure_fin_jeudi' => $_POST['timetableend'],
      'heure_debut_vendredi' => $_POST['timetablestart'],
      'heure_fin_vendredi' => $_POST['timetableend'],
      'heure_debut_samedi' => $_POST['timetablestart'],
      'heure_fin_samedi' => $_POST['timetableend'],
      'heure_debut_dimanche' => $_POST['timetablestart'],
      'heure_fin_dimanche' => $_POST['timetableend'],
      'id_tuteur' => $_GET['id']
    ]);
  break;
}

if($reponse){
	header('location: gestion.php?message=Horaire ajouté');
	exit;
}else{
	header('location: gestion.php?message=Horaire pas ajouté');
	exit;
}
 ?>
