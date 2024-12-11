<?php
session_start();

// // include connection file
// include('./classes/connextion.php');

// // create an instance of the class Connection
// $connection = new Connection();

// // call the selectDatabase method
// $connection->selectDatabase('emsipoo');
// if(isset($_POST['login'])){
// 	$email = $_POST["email"];
// 	$password = $_POST["password"];

// 	include('../classes/etudiant.php');

// 	$row=Etudiant::loginetudiant('etudiant',$connection->conn,$email);

// 	if($row>0){
// 		$_SESSION["id"]=$row["id"];
// 		$_SESSION["firstname"]=$row["firstname"];
// 		$_SESSION["lastname"]=$row["lastname"];
// 		$_SESSION["email"]=$row["email"];
// 		$_SESSION["address"]=$row["address"];
// 		$_SESSION["phone"]=$row["phone"];
// 		$_SESSION["promotion"]=$row["promotion"];
// 		header("Location: ./Abc/index.php");   //redirect to dashboard if login is successful
	
// 	} else {
// 		//error message if SQL query fails
// 		echo "<h3><span style='color:red; '>Invalid Student ID & Password. Page Will redirect to Login Page after 2 seconds </span></h3>";
// 		header( "refresh:3;url=studentlogin.php" );
// 	};

// }

// include('./classes/etudiant.php');

// if (isset($_POST["login"])) {
//     $email = $_POST["email"];
//     $password = $_POST["password"];

//     // Call the loginetudiant method
//     $user = Etudiant::loginetudiant('etudiant', $connection->conn, $email, $password);

//     if ($user) {
//         // Save user information in session if needed
//         $_SESSION['user_id'] = $user['id'];
//         $_SESSION['user_email'] = $user['email'];

//         // Redirect to another page after successful login
//         header("Location: index.php"); // Replace 'welcome.php' with the desired page
//         exit();
//     } else {
//         echo "Invalid email or password"; // You might want to handle this more gracefully
//     }
// }
?>
<?php include('./includes/allhead.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<!-- Stdeunt login page -->
			<fieldset>
				<legend>
					<h3 style="padding-top: 25px;"><span class="glyphicon glyphicon-lock"></span>&nbsp;  Professor Login</h3>
				</legend>
				<form name="studentlogin" action="./test/loginstudent.php" method="POST">
					<div class="control-group form-group">
						<div class="controls">
							<label>Email Id:</label>
							<input type="text" class="form-control" name="email" required>
							<p class="help-block"></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Passsword:</label>
							<input type="password" class="form-control" name="password" required>
							<p class="help-block"></p>
						</div>
					</div>
					<center>
						<button type="submit" name="login" class="btn btn-primary">Login</button>
						<button type="reset" class="btn btn-primary" style="
                            background-color: #E52727;
                            border-color: #D21B1B;">Reset</button>
					</center>
			</fieldset>
			</form>
		</div>
	</div>
	<?php include('./includes/allfoot.php'); ?>