<?php

class Inscription{

public $idInscription;
public $idEtudiant;
public $idCourses;
public $dateInscription;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($idEtudiant,$idCourses,$dateInscription){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->idEtudiant = $idEtudiant;
    $this->idCourses = $idCourses;
    $this->dateInscription = $dateInscription;

}

public function insertInscription($tableName,$conn){

//insert a inscr in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (idEtudiant, idCourses, dateInscription)
VALUES ('$this->idEtudiant', '$this->idCourses', '$this->dateInscription')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

static function deleteInscription($tableName,$conn,$id){
    //delet a Inscription by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE idCourses=$id";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:pincode-verification.php?id=$id");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }



}

?>
