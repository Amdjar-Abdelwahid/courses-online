<?php

class Materiel{

public $id;
public $materielCode;
public $materielName;
public $materielTitle;
public $materielQte; 
public $materielUrl; 



public static $errorMsg = "";

public static $successMsg="";


public function __construct($materielCode,$materielName,$materielTitle,$materielQte,$materielUrl){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->materielCode = $materielCode;
    $this->materielName = $materielName;
    $this->materielTitle = $materielTitle;
    $this->materielQte = $materielQte;
    $this->materielUrl = $materielUrl;

}

public function insertMateriel($tableName,$conn){

//insert a Materiel in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (materielCode, materielName, materielTitle, materielQte, materielUrl)
VALUES ('$this->materielCode', '$this->materielName', '$this->materielTitle','$this->materielQte','$this->materielUrl')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

public static function  selectAllmateriels($tableName,$conn){

//select all the Materiel from database, and inset the rows results in an array $data[]
$sql = "SELECT id, materielCode, materielName, materielTitle,materielQte, materielUrl FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    } else {
        // Aucun Materiel trouvé pour cet étudiant
        return [];
    }

}

public static function  selectmateriels($tableName,$conn){

    //select all the Materiel from database, and inset the rows results in an array $data[]
    $sql = "SELECT id, materielCode, materielName, materielTitle,materielQte, materielUrl FROM $tableName where materielQte < 5";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $data=[];
            while($row = mysqli_fetch_assoc($result)) {
            
                $data[]=$row;
            }
            return $data;
        }
    
    }



static function selectMaterielById($tableName,$conn,$id){
    //select a Materiel by id, and return the row result
    $sql = "SELECT materielCode, materielName,materielTitle, materielQte, materielUrl FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}

static function updateMateriel($Materiel,$tableName,$conn,$id){
    //update a Materiel of $id, with the values of $Materiel in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET materielCode='$Materiel->materielCode',materielName='$Materiel->materielName',materielTitle='$Materiel->materielTitle',materielQte='$Materiel->materielQte',materielUrl='$Materiel->materielUrl' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
header("Location:materiels.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}

static function deleteMateriel($tableName,$conn,$id){
    //delet a Materiel by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:materiels.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }

public static function selectProfByMateriels( $conn ,$MaterielId)
{
    // Sélectionner les étudiants inscrits à un Materiel spécifique
    $sql = "SELECT DISTINCT professor.firstname, professor.lastname, professor.email,professor.address, reservation.datereservation
            FROM professor
            JOIN reservation ON professor.id = reservation.idprofessor
            WHERE reservation.idmateriels = $MaterielId";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Initialiser un tableau pour stocker les résultats
        $data = [];

        // Boucler à travers les résultats et les ajouter au tableau
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Retourner le tableau de données
        return $data;
    } else {
        // Aucun étudiant trouvé pour ce Materiel
        return [];
    }
}



}

?>
