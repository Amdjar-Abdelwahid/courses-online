<?php

class Etudiant{

public $id;
public $firstname;
public $lastname;
public $email;
public $password;
public $address; 
public $phone; 
public $promotion; 



public static $errorMsg = "";

public static $successMsg="";


public function __construct($firstname,$lastname,$email,$password,$address,$phone,$promotion){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->password = password_hash($password,PASSWORD_DEFAULT);
    $this->address=$address;
    $this->phone=$phone;
    $this->promotion=$promotion;

}

public function insertEtudiant($tableName,$conn){

//insert a etudiant in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (firstname, lastname, email, password, address, phone, promotion)
VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password','$this->address','$this->phone','$this->promotion')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

public static function  selectAllEtudiant($tableName,$conn){

//select all the etudiant from database, and inset the rows results in an array $data[]
$sql = "SELECT id, firstname, lastname,email, address, phone, promotion FROM $tableName ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    } else {
        // Aucun cours trouvé pour cet étudiant
        return [];
    }

}

static function selectEtudiantById($tableName,$conn,$id){
    //select a etudiant by id, and return the row result
    $sql = "SELECT firstname, lastname,email, address, phone, promotion FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}

static function loginetudiant($tableName, $conn, $email) {
    // Select a student by email and return the row result
    $sql = "SELECT id, firstname, lastname, email, password, address, phone, promotion FROM $tableName WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = null;
    // Check if there is a matching row
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

    }
    return $row;
}

static function updateEtudiant($etudiant,$tableName,$conn,$id){
    //update a etudiant of $id, with the values of $etudiant in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET firstname='$etudiant->firstname',lastname='$etudiant->lastname',email='$etudiant->email',address='$etudiant->address',phone='$etudiant->phone',promotion='$etudiant->promotion' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
header("Location:etudiants.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}

static function deleteEtudiant($tableName,$conn,$id){
    //delet a etudiant by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:etudiants.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }

public static function selectCoursByEtudiant($conn,$etudiantId)
{
    // Sélectionner tous les cours auxquels l'étudiant est inscrit
    $sql = "SELECT etudiant.firstname, etudiant.lastname, course.courseName, inscription.dateInscription 
            FROM course
            JOIN inscription ON course.id = inscription.idCourses
            JOIN etudiant ON etudiant.id = inscription.idEtudiant
            WHERE inscription.idEtudiant = $etudiantId";

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
        // Aucun cours trouvé pour cet étudiant
        return [];
    }
}


}

?>
