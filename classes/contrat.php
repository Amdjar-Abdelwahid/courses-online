<?php

class Contrat{

public $idContrat;
public $idmateriels;
public $idprofessor;
public $dateObtention;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($idmateriels,$idprofessor,$dateObtention){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->idmateriels = $idmateriels;
    $this->idprofessor = $idprofessor;
    $this->dateObtention = $dateObtention;

}

public function insertContrat($tableName,$conn){

//insert a inscr in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (idmateriels, idprofessor, dateObtention)
VALUES ('$this->idmateriels', '$this->idprofessor', '$this->dateObtention')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

}

?>
