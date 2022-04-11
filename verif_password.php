<?php require_once 'database.php';

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
	header('location: change_password.php?message=Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.&type=danger');
	exit;
}

if(strlen($_POST['password']) < 8){
	header('location: change_password.php?message=Le mot de passe doit contenir au moins 8 caractères.&type=danger');
	exit;
}

if(!isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['validate_password']) || empty($_POST['validate_password'])){
	header('location: change_password.php?message=Il faut remplir tous les champs');
}

if($_POST['password'] != $_POST['validate_password']){
	header('location: change_password.php?message=Les mot de passe doient correspondre');
}

$req = $db->prepare('UPDATE student SET password=:password WHERE id=:id');
$reponse = $req->execute([
	'password' => htmlspecialchars(hash('sha256', $_POST['password'])),
	'id' => $_GET['id']
]);

if($reponse){
    header('location: gestion.php?id='.$_GET['id'].'message=Mot de passe modifié');
		exit;
  }else{
    header('location: change_password.php?id='.$_GET['id']);
		exit;
  }

?>
