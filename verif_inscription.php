<?php
require_once 'database.php';
if(isset($_POST['mail']) && !empty($_POST['mail'])){
	setcookie('mail', $_POST['mail'], time() + 3600 );
}


if(!isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['firstname']) || empty($_POST['firstname']) || !isset($_POST['mail']) || empty($_POST['mail']) || !isset($_POST['password']) || empty($_POST['password']) ){
	header('location: inscription.php?message=Vous devez remplir les champs.&type=danger');
	exit;
}

if(!isset($_POST['birthday']) || empty($_POST['birthday'])){
	header('location: inscription.php?message=Vous devez remplir les champs.&type=danger');
	exit;
}

if(!isset($_POST['type']) || empty($_POST['type'])){
	header('location: inscription.php?message=Vous devez remplir les champs.&type=danger');
	exit;
}
if(!isset($_POST['address']) || empty($_POST['address'])){
	header('location: inscription.php?message=Vous devez remplir les champs.&type=danger');
	exit;
}
if(!isset($_POST['postal']) || empty($_POST['postal'])){
	header('location: inscription.php?message=Vous devez remplir les champs.&type=danger');
	exit;
}
if(!isset($_POST['city']) || empty($_POST['city'])){
	header('location: inscription.php?message=Vous devez remplir les champs.&type=danger');
	exit;
}

if( !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) ){
	header('location: inscription.php?message=Email invalide&type=danger');
	exit;
}

function check_mdp_format($mdp){
	$majuscule = preg_match('/[A-Z]/', $mdp);
	$minuscule = preg_match('/[a-z]/', $mdp);
	$chiffre = preg_match('/[0-9]/', $mdp);

	if(!$majuscule || !$minuscule || !$chiffre)
	{
		return false;
	}
	else
		return true;
}

$true = check_mdp_format($_POST['password']);

if($true != true){
	header('location: inscription.php?message=Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.&type=danger');
	exit;
}

if(strlen($_POST['password']) < 8){
	header('location: inscription.php?message=Le mot de passe doit contenir au moins 8 caractères.&type=danger');
	exit;
}


if(isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
	$acceptable = [
		'image/jpeg',
		'image/png',
	];

	if(!in_array($_FILES['image']['type'], $acceptable)){
		header('location: inscription.php?message=Format de fichier incorrect.&type=danger');
		exit;
	}

	$maxSize = 2 * 1024 * 1024;

	if($_FILES['image']['size'] > $maxSize){
		header('location: inscription.php?message=Ce fichier est trop lourd !&type=danger');
		exit;
	}

	$path = 'uploads';

	if(!file_exists($path)){
		mkdir($path, 0777);
	}


	$filename = $_FILES['image']['name'];


	$array = explode('.', $filename);
	$ext = end($array);

	$filename = 'image-' . time() . '.' . $ext;

	$destination = $path . '/' . $filename;
	$tempName = $_FILES['image']['tmp_name'];
	move_uploaded_file($tempName, $destination);

}

$q = "SELECT id FROM student WHERE mail = :mail";
$req = $db->prepare($q);
$req->execute([
	'mail' => $_POST['mail']
]);
$resultat = $req->fetch();
if($resultat){
	header('location: inscription.php?message=Cet email est déjà utilisé.&type=danger');
	exit;
}



		$q = "INSERT INTO student (name, firstname, mail, password, address, postal, city, birthday, type, image, admin) VALUES (:name, :firstname, :mail, :password, :address, :postal, :city, :birthday, :type, :image, :admin)";
		$req = $db->prepare($q);
		$reponse = $req->execute([
		  'name' => htmlspecialchars($_POST['name']),
			'firstname' => htmlspecialchars($_POST['firstname']),
			'mail' => htmlspecialchars($_POST['mail']),
			'password' => htmlspecialchars(hash('sha256', $_POST['password'])/* + 'Ck_!!<<#7LLlo:'*/),
			'address' => htmlspecialchars($_POST['address']),
			'postal' => htmlspecialchars($_POST['postal']),
			'city' => htmlspecialchars($_POST['city']),
			'birthday' => htmlspecialchars($_POST['birthday']),
			'type' => htmlspecialchars($_POST['type']),
			'image' =>  isset($filename) ? $filename : '',
			'admin' => 0
		]);

if($reponse){
	$req = $db->query('SELECT id FROM student WHERE mail="'.$_POST['mail'].'"');
	$i = $req->fetch();
}

if($reponse){
	$req = $db->prepare('INSERT INTO cours (id_tuteur) VALUES (:id_tuteur)');
	$req->execute([
		'id_tuteur' => $i['id']
	]);
}

if($reponse){
	header('location: index.php?message=Compte créé.&type=success');
	exit;
}else{
	header('location: inscription.php?message=Erreur lors de la création du compte.&type=danger');
	exit;
}

?>
