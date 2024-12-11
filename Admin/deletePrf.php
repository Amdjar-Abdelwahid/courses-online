<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

//include connection file
include('../classes/connextion.php');

$connection = new Connection();
$connection->selectDatabase('materielmangement');

//include the professor file
include('../classes/professor.php');

Professor::deleteProfessor('professor',$connection->conn,$id);




}
?>
