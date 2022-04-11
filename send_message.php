<?php
session_start();
require_once 'database.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
  header('location: MESSAGERIETEST.php?message=Selectionnez un utilisateur');
  exit;
}
if(!isset($_SESSION['mail']) || empty($_SESSION['mail'])){
  header('location: inscription.php?message=Vous n etes pas connecter');
  exit;
}else{
 $r = $db->query('SELECT id FROM student WHERE mail="'.$_SESSION['mail'].'"');
 $id = $r->fetch();
}



if(isset($_POST['message']) && !empty($_POST['message'])){
  $req = $db->prepare('INSERT INTO message (id_envoyeur, id_destinataire, day, texte) VALUES (:id_envoyeur, :id_destinataire, NOW(), :texte)');
  $reponse = $req->execute([
    'id_envoyeur' => $id['id'],
    'id_destinataire' => $_GET['id'],
    'texte' => htmlspecialchars($_POST['message'])
  ]);
}


if($reponse){
  header('location: MESSAGERIETEST.php?id='.$_GET['id']);
}else{
  header('location: MESSAGERIETEST.php?id='.$_GET['id'].'$amp;message=Echec lors de l envoie du message');
}

 ?>
