<?php

require_once 'database.php';


if(isset($_GET['id'])){
  $db->query('UPDATE student SET admin = 1 WHERE id ='.$_GET['id']);
  header('location:sensei.php');
  exit;
}else{
  header('location:sensi.php?message=Pas ajouter');
  exit;
}



 ?>
