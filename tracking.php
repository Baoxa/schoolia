<?php

/* créer les logs de connexion + table tracking primary key=id / date_heure_connexion / page_visite / temps_passe / id_utilisateur :foreign key
   créer l'insertion BDD pour le temps passé et la page visité
   */





 ?>



 <?php
function logtimemsg($timemsg)
{
//write your own handling code here, store it in a file or store it in a DB, whatever
$logfilename = ‘timelog.txt’;
if (is_writable($logfilename))
{
if (!$handle = fopen($logfilename, ‘a’))
{
exit;
}
if (fwrite($handle, $timemsg.”\r\n”) === FALSE)
{
exit;
}
fclose($handle);
}
}

logtimemsg($_REQUEST[‘tmsg’]);
?>
