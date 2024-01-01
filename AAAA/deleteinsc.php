<?php
if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];
//include connection file
include('../classes/connextion.php');

//create in instance of class Connection
$connection = new Connection();

//call the selectDatabase method
$connection->selectDatabase('emsipoo');


include('../classes/inscription.php');
Inscription::deleteInscription('inscription',$connection->conn,$id);
echo Inscription::$successMsg;
echo Inscription::$errorMsg;

}
?>