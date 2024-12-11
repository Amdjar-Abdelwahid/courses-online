<?php
session_start();

$x = $_POST[ "email" ];
$y = $_POST[ "password" ];

//include connection file
include('../classes/connextion.php');

//create in instance of class Connection
$connection = new Connection();

//call the selectDatabase method
$connection->selectDatabase('materielmangement');

include('../classes/professor.php');

$row=Professor::loginProfessor('professor',$connection->conn,$x);

if ($row >0){
        $_SESSION[ "id" ] = $row[ "id" ];
		$_SESSION[ "email" ] = $row[ "email" ];
		$_SESSION[ "firstname" ] = $row[ "firstname" ];
		$_SESSION[ "lastname" ] = $row[ "lastname" ];
		$_SESSION[ "address" ] = $row[ "address" ];
        $_SESSION[ "phone" ] = $row[ "phone" ];
		$_SESSION[ "promotion" ] = $row[ "promotion" ];//redirecting to welcome student page
		header( 'Location:../Abc/index.php' );

} else {
	//error message if SQL query fails
	echo "<h3><span style='color:red; '>Invalid Student ID & Password. Page Will redirect to Login Page after 2 seconds </span></h3>";
	header( "refresh:5;url=../login.php" );
}
?>