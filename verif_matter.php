<?php require_once 'database.php';


if(isset($_POST)){
  $req = $db->prepare('UPDATE cours SET francais=:francais, maths=:maths, anglais=:anglais, espagnol=:espagnol, philosophie=:philosophie, histoire=:histoire WHERE id_tuteur=:id_tuteur');
  $reponse = $req->execute([
    'francais' => $_POST['francais'],
    'maths' => $_POST['maths'],
    'anglais' => $_POST['anglais'],
    'espagnol' => $_POST['espagnol'],
    'philosophie' => $_POST['philosophie'],
    'histoire' => $_POST['histoire'],
    'id_tuteur' => $_GET['id']
  ]);
}
if($reponse){
  header('location: gestion.php?message=Matières validées');
  exit;
}else{
  header('location: gestion.php?message=Matières pas validées');
  exit;
}

 ?>
