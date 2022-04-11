<?php
require_once 'database.php';

 if(isset($_SESSION['mail']) && !empty($_SESSION['mail'])){
  $statement = $db->query('SELECT admin FROM student WHERE mail ="'.$_SESSION['mail'].'"');
  $reponse = $statement->fetch(PDO::FETCH_ASSOC);
}

if($reponse['admin'] == 0){
  header('location:index.php');
  exit;
}
?>
