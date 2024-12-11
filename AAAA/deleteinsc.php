<?php
if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];
//include connection file
include('../classes/connextion.php');

//create in instance of class Connection
$connection = new Connection();

//call the selectDatabase method
$connection->selectDatabase('materielmangement');


include('../classes/reservation.php');
Reservation::deletereservation('reservation',$connection->conn,$id);
echo Reservation::$successMsg;
echo Reservation::$errorMsg;

}
?>