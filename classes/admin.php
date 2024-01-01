<?php

class Admin{

public $id;
public $firstname;
public $lastname;
public $email;
public $password;



public static $errorMsg = "";

public static $successMsg="";


public function __construct($firstname,$lastname,$email,$password){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->password = password_hash($password,PASSWORD_DEFAULT);

}

public function insertAdmin($tableName,$conn){

//insert a client in the database, and give a message to $successMsg and $errorMsg
$sql = "INSERT INTO $tableName (firstname, lastname, email, password)
VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";

} else {
    self::$errorMsg ="Error: " . $sql . "<br>" . mysqli_error($conn);
}



}

public static function  selectAllAdmin($tableName,$conn){

//select all the Admin from database, and inset the rows results in an array $data[]
$sql = "SELECT id, firstname, lastname,email FROM $tableName ";
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

static function selectAdminById($tableName,$conn,$id){
    //select a Admin by id, and return the row result
    $sql = "SELECT firstname, lastname,email FROM $tableName  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result);
    
    }
    return $row;
}

static function updateAdmin($etudiant,$tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET firstname='$etudiant->firstname',lastname='$etudiant->lastname',email='$etudiant->email' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
        self::$successMsg= "New record updated successfully";
header("Location:read.php");
        } else {
            self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}

static function deleteAdmin($tableName,$conn,$id){
    //delet a client by his id, and send the user to read.php
    $sql = "DELETE FROM $tableName WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    self::$successMsg= "Record deleted successfully";
    header("Location:read.php");
} else {
    self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
}

  
    }




}

?>
