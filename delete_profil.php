<?php
require_once 'database.php';

    if(isset($_GET['id'])){
      $req = $db->query('SELECT * FROM student WHERE id ='.$_GET['id']);
      $user = $req->fetch();
      if($user){
        $req = $db->query('DELETE FROM student WHERE id ='.$_GET['id']);
        header('location:sensei.php');
      }else {
        header('location:admin.php');
      }
    }
 ?>
