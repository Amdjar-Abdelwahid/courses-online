<?php

//include the connection file
include('../classes/connextion.php');

//create an instance of Connection class
$connection = new Connection();

//call the createDatabase methods to create database "chap4Db"
// $connection->createDatabase('emsipoo');

// $query = "
// CREATE TABLE course (
//     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     courseCode varchar(255) DEFAULT NULL,
//     courseName varchar(255) DEFAULT NULL,
//     courseTitle varchar(255) DEFAULT NULL,
//     courseAuthor varchar(255) DEFAULT NULL,
//     coursePrice int DEFAULT NULL
// )
// ";


// $query0 = "
// CREATE TABLE etudiant (
//     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(100) DEFAULT NULL,
//     lastname VARCHAR(100) DEFAULT NULL,
//     email VARCHAR(100),
//     password CHAR(32),
//     address VARCHAR(255) DEFAULT NULL,
//     phone VARCHAR(100) DEFAULT NULL,
//     promotion int DEFAULT NULL
// )
// ";

// $query1 = "
// CREATE TABLE inscription (
//     idInscription INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     idEtudiant int NOT NULL ,
//     idCourses int NOT NULL ,
//     dateInscription date ,
//     FOREIGN KEY (idEtudiant) REFERENCES etudiant(id),
//     FOREIGN KEY (idCourses) REFERENCES course(id)
//     );
// ";

// $query2 = "
// CREATE TABLE Certificat (
//     idCertificat INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     idCourses int NOT NULL ,
//     idEtudiant int NOT NULL ,
//     dateObtention date,
//     note int ,
//     FOREIGN KEY (idCourses) REFERENCES course(id),
//     FOREIGN KEY (idEtudiant) REFERENCES etudiant(id)
//     );
// ";

$query = "
CREATE TABLE Examen (
    ExamenID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CoursID INT,
    ExamName varchar(50) NOT NULL,
    Q1 varchar(65535) NOT NULL,
    Q2 varchar(65535) NOT NULL,
    Q3 varchar(65535) NOT NULL,
    Q4 varchar(65535) NOT NULL,
    Q5 varchar(65535) NOT NULL,
    FOREIGN KEY (CoursID) REFERENCES course(id)
)
";

//call the selectDatabase method to select the chap4Db
$connection->selectDatabase('emsipoo');

//call the createTable method to create table with the $query
$connection->createTable($query);
// $connection->createTable($query0);
// $connection->createTable($query1);
// $connection->createTable($query2);

?>