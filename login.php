<?php
require_once('common.php');
//verification de la présence des variables
if(!isset($_POST['lastname']) || !isset($_POST['pwd'])){
 echo "";
 header('http/1.1 403 Forbiden');
 return;
}
$lastname = $_POST['lastname'];
$pwd= $_POST['pwd'];
$requete = $db->prepare("SELECT * FROM employees WHERE lastname = :lastname and pwd = :pwd");
$requete->execute([':lastname'=>$lastname, ':pwd'=>$pwd]);
$count = count($requete->fetchAll());
if ($count > 0){
  echo "ok";
}
else{
  echo "ko";
  header('http/1.1 401 Unauthorized');
}
?>