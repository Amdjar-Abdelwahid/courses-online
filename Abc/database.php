<?php

//include the connection file
include('../classes/connextion.php');

//create an instance of Connection class
$connection = new Connection();

// call the createDatabase methods to create database "materielmangement"
// $connection->createDatabase('materielMangement');

// $query = "
// CREATE TABLE materiel (
//     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     materielCode varchar(255) DEFAULT NULL,
//     materielName varchar(255) DEFAULT NULL,
//     materielTitle varchar(255) DEFAULT NULL,
//     materielQte int DEFAULT NULL,
//     materielURL varchar(255) DEFAULT NULL
// )
// ";


// $query0 = "
// CREATE TABLE professor (
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
// CREATE TABLE reservation (
//     idreservation INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     idprofessor int NOT NULL ,
//     idmateriels int NOT NULL ,
//     datereservation date ,
//     FOREIGN KEY (idprofessor) REFERENCES professor(id),
//     FOREIGN KEY (idmateriels) REFERENCES materiel(id)
//     );
// ";

// $query2 = "
// CREATE TABLE Contrat (
//     idContrat INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     idmateriels int NOT NULL ,
//     idprofessor int NOT NULL ,
//     dateObtention date,
//     FOREIGN KEY (idmateriels) REFERENCES materiel(id),
//     FOREIGN KEY (idprofessor) REFERENCES professor(id)
//     );
// ";

// $query = "
// CREATE TABLE Admin (
//     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(100) DEFAULT NULL,
//     lastname VARCHAR(100) DEFAULT NULL,
//     email VARCHAR(100),
//     password CHAR(32)
// )
// ";


$query2 = "CREATE PROCEDURE CreateTables
AS
BEGIN
    SET NOCOUNT ON;

    DECLARE @SQL NVARCHAR(MAX);

    -- Table creation script for materiel
    SET @SQL = '
    CREATE TABLE materiel (
        id INT IDENTITY(1,1) PRIMARY KEY,
        materielCode VARCHAR(255) NULL,
        materielName VARCHAR(255) NULL,
        materielTitle VARCHAR(255) NULL,
        materielQte INT NULL,
        materielURL VARCHAR(255) NULL
    );';
    EXEC sp_executesql @SQL;

    -- Table creation script for professor
    SET @SQL = '
    CREATE TABLE professor (
        id INT IDENTITY(1,1) PRIMARY KEY,
        firstname VARCHAR(100) NULL,
        lastname VARCHAR(100) NULL,
        email VARCHAR(100) NULL,
        password CHAR(32) NULL,
        address VARCHAR(255) NULL,
        phone VARCHAR(100) NULL,
        promotion INT NULL
    );';
    EXEC sp_executesql @SQL;

    -- Table creation script for reservation
    SET @SQL = '
    CREATE TABLE reservation (
        idreservation INT IDENTITY(1,1) PRIMARY KEY,
        idprofessor INT NOT NULL,
        idmateriels INT NOT NULL,
        datereservation DATE,
        FOREIGN KEY (idprofessor) REFERENCES professor(id),
        FOREIGN KEY (idmateriels) REFERENCES materiel(id)
    );';
    EXEC sp_executesql @SQL;

    -- Table creation script for Contrat
    SET @SQL = '
    CREATE TABLE Contrat (
        idContrat INT IDENTITY(1,1) PRIMARY KEY,
        idmateriels INT NOT NULL,
        idprofessor INT NOT NULL,
        dateObtention DATE,
        FOREIGN KEY (idmateriels) REFERENCES materiel(id),
        FOREIGN KEY (idprofessor) REFERENCES professor(id)
    );';
    EXEC sp_executesql @SQL;

    -- Table creation script for Admin
    SET @SQL = '
    CREATE TABLE Admin (
        id INT IDENTITY(1,1) PRIMARY KEY,
        firstname VARCHAR(100) NULL,
        lastname VARCHAR(100) NULL,
        email VARCHAR(100) NULL,
        password CHAR(32) NULL
    );';
    EXEC sp_executesql @SQL;

END;
";

//call the selectDatabase method to select the materielmangement
$connection->selectDatabase('materielmangement');

//call the createTable method to create table with the $query
$connection->createTable($query2);
// $connection->createTable($query0);
// $connection->createTable($query1);
// $connection->createTable($query2);

?>