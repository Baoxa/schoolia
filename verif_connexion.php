<?php

if(isset($_POST['mail']) && !empty($_POST['mail'])){
	setcookie('mail', $_POST['mail'], time() + 3600 );
}


if( !isset($_POST['mail']) || empty($_POST['mail']) || !isset($_POST['password']) || empty($_POST['password']) ){
	header('location: connexion.php?message=Vous devez remplir les 2 champs.&type=danger');
	exit;
}

require_once 'database.php';

if(isset($_POST) AND !empty($_POST)){
	if(!empty(htmlspecialchars($_POST['mail'])) AND !empty(htmlspecialchars($_POST['password']))){
		$req = $db->prepare('SELECT * FROM student WHERE mail = :mail AND password = :password');
		$user = $req->execute([
			'mail' => $_POST['mail'],
			'password' => hash('sha256', $_POST['password'])
		]);}
}
$user = $req->fetch();
if($user){
	session_start();
	$_SESSION['id'] = $user['id'];
	$_SESSION['mail'] = $_POST['mail'];
	$_SESSION['type'] = $user['type'];
	$_SESSION['admin'] = $user['admin'];
	$req = $db->prepare('INSERT INTO tracking (date_heure_connexion, id_utilisateur) VALUES (NOW(), :id_utilisateur)');
	$req->execute([
		'id_utilisateur' => $_SESSION['id']
	]);
	header('location: index.php');
	exit;
}else{
	header('location: connexion.php?message=Identifiants invalides&type=danger');
	exit;
}

?>
