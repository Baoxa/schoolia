<?php

$data = "k";

if (isset($_GET['q'])) {
    $data = $_GET['q'];
}

include("database.php");

  try{
    $rep = $db->prepare("SELECT name, firstname, birthday, city, mail, id FROM student WHERE name LIKE ? OR firstname LIKE ?");
    $rep->execute(array($data.'%',$data.'%'));
    $result = $rep->fetchAll(\PDO::FETCH_ASSOC);
    if (empty($result)){
      echo "<h1>rien dans db</h1>";
    }else{
      foreach($result as $key => $value) {
        echo'<div class="row justify-content-center rounded-top border mt-3 pt-2 pb-2">';
        echo'<div class="col-md-4">';
        echo'<img src="/img/profilpic.png" width="200px">';
        echo"</div>";
        echo'<div class="col-md-8">';
          echo'<div class="row">';
            echo'<div class="col-md-12">';
            echo"<p>".$value['name']." ".$value['firstname']."</p>";
            echo"</div>";
            echo'<div class="col-md-12">';
            echo"<p>".$value['city']."</p>";
            echo"</div>";

            echo'<div class="col-md-12">';
            echo"<p>".$value['mail']."</p>";
            echo"</div>";
            echo'<div class="col-md-12">';
            echo'<a href="profil_prof.php?id='.$value['id'].'" class="btn bg-custom-1 text-white">Profil</a>';
            echo"</div>";
          echo"</div>";
        echo"</div>";
        echo"</div>";

        echo "<br>";
        #print_r($value);
    }
    }
    
    $db = null;
  }catch (PDOexception $e) {
    echo "Error is: " . $e;
  }
  
  #$x = "select * from student where name like '$data%'";
  #$y = $db->query($x);
  #if ($y) {
  #    $row = $y->fetchAll();
  #    foreach($z as $row){
  #      var_dump($row);
  #    }
  #    
  #    echo"<h1>".$z['name']."</h1>";
	#echo"<h1>".$z['firstname']."</h1>";
	#echo "<h2>".$y."</h2>";
  #}
?>