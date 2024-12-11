<?php

class Reservation{

public $idreservation;
public $idprofessor;
public $idmateriels;
public $datereservation;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($idprofessor,$idmateriels,$datereservation){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->idprofessor = $idprofessor;
    $this->idmateriels = $idmateriels;
    $this->datereservation = $datereservation;

}

public function insertreservation($tableName,$conn){

//insert a inscr in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (idprofessor, idmateriels, datereservation)
VALUES ('$this->idprofessor', '$this->idmateriels', '$this->datereservation')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

static function deletereservation($tableName,$conn,$id){
    //delet a reservation by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE idmateriels=$id";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:pincode-verification.php?id=$id");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }



}

?>
