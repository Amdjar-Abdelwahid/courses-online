<?php

class Cours{

public $id;
public $courseCode;
public $courseName;
public $courseTitle;
public $courseAuthor;
public $coursePrice; 
public $courseUrl; 



public static $errorMsg = "";

public static $successMsg="";


public function __construct($courseCode,$courseName,$courseTitle,$courseAuthor,$coursePrice,$courseUrl){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->courseCode = $courseCode;
    $this->courseName = $courseName;
    $this->courseTitle = $courseTitle;
    $this->courseAuthor = $courseAuthor;
    $this->coursePrice = $coursePrice;
    $this->courseUrl = $courseUrl;

}

public function insertCours($tableName,$conn){

//insert a Cours in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (courseCode, courseName, courseTitle, courseAuthor, coursePrice, courseUrl)
VALUES ('$this->courseCode', '$this->courseName', '$this->courseTitle','$this->courseAuthor','$this->coursePrice','$this->courseUrl')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

public static function  selectAllCourses($tableName,$conn){

//select all the Cours from database, and inset the rows results in an array $data[]
$sql = "SELECT id, courseCode, courseName, courseTitle,courseAuthor, coursePrice, courseUrl FROM $tableName ";
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

public static function  selectCourses($tableName,$conn){

    //select all the Cours from database, and inset the rows results in an array $data[]
    $sql = "SELECT id, courseCode, courseName, courseTitle,courseAuthor, coursePrice, courseUrl FROM $tableName where coursePrice < 51";
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



static function selectCoursById($tableName,$conn,$id){
    //select a Cours by id, and return the row result
    $sql = "SELECT courseCode, courseName,courseTitle, courseAuthor, coursePrice, courseUrl FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}

static function updateCours($cours,$tableName,$conn,$id){
    //update a Cours of $id, with the values of $cours in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET courseCode='$cours->courseCode',courseName='$cours->courseName',courseTitle='$cours->courseTitle',courseAuthor='$cours->courseAuthor',coursePrice='$cours->coursePrice',courseUrl='$cours->courseUrl' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
header("Location:courses.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}

static function deleteCours($tableName,$conn,$id){
    //delet a Cours by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:courses.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }

public static function selectEtudiantsByCours( $conn ,$coursId)
{
    // Sélectionner les étudiants inscrits à un cours spécifique
    $sql = "SELECT etudiant.firstname, etudiant.lastname, etudiant.email,etudiant.address, inscription.dateInscription
            FROM etudiant
            JOIN inscription ON etudiant.id = inscription.idEtudiant
            WHERE inscription.idCourses = $coursId";

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
        // Aucun étudiant trouvé pour ce cours
        return [];
    }
}


}

?>
