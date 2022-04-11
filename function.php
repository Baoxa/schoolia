<?php

function getProfil($db, $nb = null, $id = null){
  if ($nb AND !$id) {
      $req = $db->query('SELECT * FROM student LIMIT'.$nb);
      $user = $req->fetchAll();
    }elseif ($id) {
      $req = $db->query('SELECT * FROM student WHERE id ='.$id);
      $user = $req->fetchObject();
    }else{
      $req = $db->query('SELECT * FROM student');
      $user = $req->fetchAll();
    }
    return $user;
}

function getMatter($db, $id = null){
    if ($id) {
      $req = $db->query('SELECT francais,anglais,espagnol,philosophie,maths,histoire FROM cours WHERE id_tuteur ='.$id);
      $user = $req->fetchObject();
    }else{
      $req = $db->query('SELECT francais,anglais,espagnol,philosophie,maths,histoire FROM cours');
      $user = $req->fetchAll();
    }
    return $user;
}

function putAdmin($db, $id){
  if(isset($id)){
    $db->query('UPDATE student SET admin = 1 WHERE id ='.$id);
  }
}


function buttonPart($db,$start,$end,$id,$type,$day){
  $i;
  $heureDebut = $start;
  $heureFin = $end;
  $nombreHeure = $heureFin - $heureDebut;
  if($heureDebut>$heureFin){
    $cont = $heureFin+$heureDebut+(24-$heureDebut);
  }elseif($heureDebut==$heureFin) {
    $cont = 24+$heureDebut;
  }else{
    $cont = $heureFin;
  }

  switch ($day) {
    case 'lundi':
      $req = 'SELECT heure_debut_lundi, heure_fin_lundi FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_lundi';
      break;
    case 'mardi':
      $req = 'SELECT heure_debut_mardi, heure_fin_mardi FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_mardi';
      break;
    case 'mercredi':
      $req = 'SELECT heure_debut_mercredi, heure_fin_mercredi FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_mercredi';
      break;
    case 'jeudi':
      $req = 'SELECT heure_debut_jeudi, heure_fin_jeudi FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_jeudi';
      break;
    case 'vendredi':
      $req = 'SELECT heure_debut_vendredi, heure_fin_vendredi FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_vendredi';
      break;
    case 'samedi':
      $req = 'SELECT heure_debut_samedi, heure_fin_samedi FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_samedi';
      break;
    case 'dimanche':
      $req = 'SELECT heure_debut_dimanche, heure_fin_dimanche FROM reservation WHERE id_tuteur='.$id.' AND day="'.$day.'"';
      $data = 'heure_debut_dimanche';
      break;
  }
  $q = $db->query($req);
  $creneaux = $q->fetchAll();
  for($i = $heureDebut; $i<$cont; $i++){
    $j;
    $cre = 1;
    if($creneaux){
      for($j=0;$j<count($creneaux);$j++){
        if($creneaux[$j][$data] == $i){
          $cre = 0;
        }
      }
    }
      if($type == 'Etudiant'){
      if($cre == 1){
        if($heureDebut == 24){
          $heureDebut = 0;
        }
        $heureDif=($heureDebut+1==24?0:$heureDebut+1);
          echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                  <p class="pt-2 text-center">De '.$heureDebut.'h à '.$heureDif.'h</p>
                  <a  class="btn btn-outline-info" href="reservation.php?id='.$_GET['id'].'&amp;day='.$_GET['day'].'&amp;start='.$heureDebut.'&amp;end='.$heureDif.'">
                    <button type="button" class="btn">Choisir ce créneau</button>
                  </a>
                </div>';}
        if($cre == 0){
          if($heureDebut == 24){
            $heureDebut = 0;
          }
          $heureDif=($heureDebut+1==24?0:$heureDebut+1);
          echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                  <p class="pt-2 text-center" style="color: #ffb3b3">De '.$heureDebut.'h à '.($heureDebut+1==24?0:$heureDebut+1).'h</p>
                  <button type="button" class="btn btn-outline-danger" disabled>Créneau indisponible</button>
                </div>';}
              $heureDebut++;
            }elseif($type == 'Tuteur'){
              if($cre == 1){
                if($heureDebut == 24){
                  $heureDebut = 0;
                }
                $heureDif=($heureDebut+1==24?0:$heureDebut+1);
              echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                      <p class="pt-2 text-center">De '.$heureDebut.'h à '.($heureDebut+1==24?0:$heureDebut+1).'h</p>
                      <button type="button" class="btn" disabled>Libre</button>
                    </div>';}
            if($cre == 0){
              if($heureDebut == 24){
                $heureDebut = 0;
              }
              $heureDif=($heureDebut+1==24?0:$heureDebut+1);
              echo '<div class="col-lg-2 col-md-3 mr-3 text-center border rounded pb-2 mt-2">
                      <p class="pt-2 text-center" style="color: #ffb3b3">De '.$heureDebut.'h à '.($heureDebut+1==24?0:$heureDebut+1).'h</p>
                      <button type="button" class="btn btn-outline-danger" disabled>Cours</button>
                    </div>';}
                  $heureDebut++;
            }
    }
}


/*
* Retourne une semaine sous forme de chaine "du {lundi} au {dimanche}..." en gérant des cas particuliers :
*  - début et fin pas dans le même mois
*  - début et fin pas dans la même année
* !!! Penser à utiliser setlocale pour avoir la date (jour et mois) en Français !!!
*/
function week($annee, $no_semaine){
   // Récup jour début et fin de la semaine
   $timeStart = strtotime("First Monday January {$annee} + ".($no_semaine - 1)." Week");
   $timeEnd   = strtotime("First Monday January {$annee} + {$no_semaine} Week -1 day");

   // Récup année et mois début
   $anneeStart = date("Y", $timeStart);
   $anneeEnd   = date("Y", $timeEnd);
   $moisStart  = date("m", $timeStart);
   $moisEnd    = date("m", $timeEnd);

   // Gestion des différents cas de figure
   if($anneeStart != $anneeEnd){
       // à cheval entre 2 années
       $retour = "du ".strftime("%d %B %Y", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
   } elseif($moisStart != $moisEnd){
       // à cheval entre 2 mois
       $retour = "du ".strftime("%d %B", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
   }else{
       // même mois
       $retour = "du ".strftime("%d", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
   }
   return $retour;
}
/*
function nextweek(){
  $date = week($annee,$no_semaine);
  $return = date('d-m-Y',strtotime('+7 days', $date));
  return $return;
}

function previousweek(){
  $date = week($annee,$no_semaine);
  date('d-m-Y'strtotime($date'-7 days'));
  return $return;
}
*/

function Age($date_naissance){
$am = explode('-', $date_naissance);
$an = explode('/', date('d/m/Y'));
if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0]))) return $an[2] - $am[2];
return $an[2] - $am[2] - 1;
}


function getMesssage($db, $id_d, $mail){
  $q = $db->query('SELECT type, id FROM student WHERE mail="'.$mail.'"');
  $user = $q->fetch();
  $req = $db->query('SELECT texte, id_envoyeur FROM message WHERE (id_envoyeur='.$user['id'].' AND id_destinataire='.$id_d.') OR (id_envoyeur='.$id_d.' AND id_destinataire='.$user['id'].')');
  $mess = $req->fetchAll();
  foreach ($mess as $message) {
    if($user['id'] == $message['id_envoyeur']): ?>
      <div class="col-md-8 m-2 p-2 border border-secondary rounded ml-auto" style="background-color:#b3d1ff;" name="MESSAGE">
          <p class="float-right"><?= $message['texte'] ?></p>
      </div>
    <?php else: ?>
      <div class="col-md-8 m-2 p-2 border border-secondary rounded bg-light">
          <p><?= $message['texte'] ?></p>
      </div>
  <?php endif;
  }
}

function getContact($db,$mail){
  $q = $db->query('SELECT id FROM student WHERE mail="'.$mail.'"');
  $user = $q->fetch();
  $request = $db->query('SELECT id_destinataire, id_envoyeur FROM message WHERE id_envoyeur='.$user['id'].' OR id_destinataire='.$user['id']);
  $dest = $request->fetchAll(PDO::FETCH_ASSOC);
  $i;
  $j;
  for ($i=0; $i<count($dest) ; $i++){
    for ($j=$i+1; $j<count($dest) ; $j++){
      if($dest[$i]['id_destinataire'] == $dest[$j]['id_destinataire']){
        array_splice($dest, $j, 1);
      }
    }
  }

  $check = array( '0' => array(
                                'id' => 0,
                                'name' => ' ',
                                'firstname' => ' ',
                              ),

                            );
  foreach ($dest as $dests): ?>
  <?php
  if($dests['id_envoyeur'] == $user['id']){
  $req = $db->query('SELECT id, name, firstname FROM student WHERE id='.$dests['id_destinataire']);
  $contact = $req->fetch(PDO::FETCH_ASSOC);
  }
  if($dests['id_envoyeur'] != $user['id']){
  $req = $db->query('SELECT id, name, firstname FROM student WHERE id='.$dests['id_envoyeur']);
  $contact = $req->fetch(PDO::FETCH_ASSOC);
  }
  $h;
  $idk = 0;

  for($h = 0; $h<count($check); $h++){
    if($check[$h]['id'] == $contact['id']){
      $idk = 1;
    }
  }
  if($idk != 1){
    $check[$h] = array(
      'id' => $contact['id'],
      'name' => $contact['name'],
      'firstname' => $contact['firstname'],
    );
  }
endforeach;
for($h = 1; $h<count($check); $h++):
  ?>
    <div class="col-md-4" name="PHOTO">
        <img src="img/profilpic.png" height="40em">
    </div>
    <div class="col-md-8 text-center" name="NOMPRENOM">
        <h6><?=$check[$h]['firstname'].' '.$check[$h]['name'] ?></h6>
        <a href="MESSAGERIETEST.php?id=<?= $check[$h]['id'] ?>">Voir les messages</a>
    </div>
  <?php endfor;
}

function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();

    $tmp = $diff;
    $retour['second'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;

    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;

    return $retour;
}

function timePassed($db){

  if(!isset($_SESSION['time_passed']) || empty($_SESSION['time_passed'])){
    $_SESSION['time_passed'] = time();
  }elseif(isset($_SESSION['time_passed']) && !empty($_SESSION['time_passed'])){
    $diff = dateDiff(time(), $_SESSION['time_passed']);
    $_SESSION['time_passed'] = time();
    $dif = $diff['hour']. ':' . $diff['minute'] . ':' . $diff['second'];
    if(isset($diff) && !empty($diff)){
      $req = $db->prepare('INSERT INTO tracking (temps_passe) VALUES (temps_passe=:temps_passe)');
      $req->execute([
        'temps_passe' => $dif
      ]);
    }
  }
}
?>
