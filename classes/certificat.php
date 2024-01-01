<?php

class Certificat{

public $idCertificat;
public $idCourses;
public $idEtudiant;
public $dateObtention;
public $note;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($idCourses,$idEtudiant,$dateObtention,$note){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->idCourses = $idCourses;
    $this->idEtudiant = $idEtudiant;
    $this->dateObtention = $dateObtention;
    $this->note = $note;

}

public function insertCertificat($tableName,$conn){

//insert a inscr in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (idCourses, idEtudiant, dateObtention ,note)
VALUES ('$this->idCourses', '$this->idEtudiant', '$this->dateObtention', '$this->note')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

}

?>
