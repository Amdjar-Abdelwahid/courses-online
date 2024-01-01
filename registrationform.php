<?php include('./includes/allhead.php'); ?>
<?php
    //include connection file
    include('./classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');

    $fnameValue = "";
    $lnameValue = "";
    $emailValue = "";
    $passwordValue = "";
    $adressValue = "";
    $phoneValue = "";
	
    $errorMesage = "";
    $successMesage = "";

    if(isset($_POST["submit"])){

        $fnameValue = $_POST["fname"];
        $lnameValue = $_POST["lname"];
        $emailValue = $_POST["email"];
        $passwordValue = $_POST["password"];
        $adressValue = $_POST["adrs"];
        $phoneValue = $_POST["phone"];

		$done = "<center>
					<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
						<strong><h3 style='margin-top: 10px;
						margin-bottom: 10px;'> Register Successfully Complete. Now You Can Login With Your Email & Password</h3>
						</strong>
					</div>
				</center>";

        if(empty($fnameValue) || empty($lnameValue) || empty($emailValue) || empty($passwordValue) || empty($adressValue) || empty($phoneValue) ){
            $errorMesage = "all fileds must be filed out!";
        }else if(strlen($passwordValue) < 8 ){
            $errorMesage = "Password should have at least 8 characters!";
        }else if(preg_match("/[A-Z]+/", $passwordValue)==0){
            $errorMesage = "Password should contain at least one uppercase letter!";
        }else {
            //include the etudiant file
            include('./classes/etudiant.php');

            //create new instance of client class with the values of the inputs
            $etudiant = new Etudiant($fnameValue,$lnameValue,$emailValue,$passwordValue,$adressValue,$phoneValue,0);

            //call the insertClient method
            $etudiant->insertEtudiant('etudiant',$connection->conn);
            //give the $successMesage the value of the static $successMsg of the class
            $successMesage = Etudiant::$successMsg;

            //give the $errorMesage the value of the static $errorMsg of the class
            $errorMesage = Etudiant::$errorMsg;


        }
    }

?>


<div class="container" style="max-width: 1200px;">
	<div class="row">
	<?php
		if(!empty($errorMesage)){
			echo "<center>
					<div class='alert alert-danger fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
						<strong><h3 style='margin-top: 10px;
						margin-bottom: 10px;'> $errorMesage</h3>
						</strong>
					</div>
				</center>";
		}else if(!empty($successMesage)){
				echo $done;
			}
	?>		

	</div>
	<div class="row">
		<div class="col-md-12">
			<form name="register" action="" method="POST" onsubmit="return validateForm()">
				<fieldset>
					<legend>
						<h3 style="padding-top: 25px;"> Registration Form </h3>
					</legend>
					<div class="control-group form-group">
						<div class="controls">
							<label>First Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="fname" id="fname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Last Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="lname" id="lname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Email <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="email" id="email" maxlength="50">
							<p class="help-block"></p>
						</div>
					</div>


					<div class="control-group form-group">
						<div class="controls">
							<label>Password: <span style="color: #ff0000;">*</span></label>
							<input type="password" class="form-control" name="password" id="password" maxlength="30"> <span style="color: #ff0000;">*Max 30</span>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Address: <span style="color: #ff0000;">*</span></label>
							<textarea class="form-control" name="adrs" id="adrs"></textarea>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>phone <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="phone" id="phone" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Register</button>
					<button type="reset" name="reset" class="btn btn-danger">Clear</button>


				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include('./includes/allfoot.php'); ?>