<?php

require_once 'database.php';
if(isset($_GET['id'])){
  $db->query('UPDATE student SET admin = 0 WHERE id ='.$_GET['id']);
  header('location:sensei.php');
}



 ?>
