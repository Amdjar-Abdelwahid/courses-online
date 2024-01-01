<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

//include connection file
include('../classes/connextion.php');

$connection = new Connection();
$connection->selectDatabase('emsipoo');

//include the etudiant file
include('../classes/courses.php');

Cours::deleteCours('course',$connection->conn,$id);




}
?>
