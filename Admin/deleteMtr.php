<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

//include connection file
include('../classes/connextion.php');

$connection = new Connection();
$connection->selectDatabase('materielmangement');

//include the etudiant file
include('../classes/materiel.php');

Materiel::deleteMateriel('materiel',$connection->conn,$id);




}
?>
