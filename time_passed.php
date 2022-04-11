<?php

function timePassed(){
  if(!isset($_SESSION['time_passed']) || empty($_SESSION['time_passed']){
    $_SESSION['time_passed'] = date('H:i:s');
  }elseif(isset($_SESSION['time_passed']) && !empty($_SESSION['time_passed'])){
    $sub = date('H:i:s') - $_SESSION['time_passed'];
    var_dump($sub);
    exit;
  }
}

 ?>
