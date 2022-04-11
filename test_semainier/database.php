<?php

try{
  $db = new PDO('mysql:host=localhost:8889;dbname=test_projetannuel', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
  die('Erreur : ' . $e->getMessage());
}


?>
