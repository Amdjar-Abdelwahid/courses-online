<?php
  session_start();

  if ( $_SESSION[ "email" ] == "" || $_SESSION[ "email" ] == NULL ) {
    header( 'Location:../login.php' );
  }

  $userid = $_SESSION[ "id" ];
  $userfname = $_SESSION[ "firstname" ];
  $userlname = $_SESSION[ "lastname" ];
  $useradrs = $_SESSION[ "address" ];
  $userphn = $_SESSION[ "phone" ];
  $userprm = $_SESSION[ "promotion" ];

    //include connection file
    include('../classes/connextion.php');
    include('../classes/contrat.php');
    //create in instance of class Connection
    $connection = new Connection();
  
    //call the selectDatabase method
    $connection->selectDatabase('materielmangement');

    // $id = $_GET['id'];

    // $sql = "select * from  materiel where id='$id'";
    // $result = mysqli_query($connection->conn, $sql );



    // if(isset($_POST["done"])){
    //     $contrat = new Contrat($id,$userid,date('Y-m-d H:i:s'));
    //     $contrat->insertContrat('contrat',$connection->conn);
    //     header( "Location:contart.php?id=$id" );
    // }

?>

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/modern-business.css" rel="stylesheet">

    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../Abc/index.php">Home</a>
                    </li>
					 <li>
                       <a href="../index.php" style="font-size: x-large;"><span class="glyphicon glyphicon-off title=" title="logout"></span> </a>
                     </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>$userfname $userlname</span>";?></a></h3>
			
			<!--exam question with student detalis-->
			<fieldset>
				<legend>Assessment Details</legend>
				<form action="" method="POST" name="update">
					<div class="col-md-4">
						<table>
							<tr>
								<th> <strong>Phone :</strong> </th>
								<td> <?php echo "<span style='color:blue'>$userphn</span>";?> </td>
							</tr>
							<tr>
								<th> <strong>Name :</strong> </th>
								<td> <?php echo "<span style='color:blue'>$userfname $userlname</span>";?> </td>
							</tr>
						</table>
					</div>
					<div class="col-md-4">
						<table>
							<!-- <tr>
								<th><strong>Materiel :</strong></th>
								<td>
                                
								</td>
							</tr> -->
							<tr>
								<th> <strong>Code Promotion :</strong> </th>
								<td> <?php echo "<span style='color:blue'>$userprm</span>";?> </td>
							</tr>
						</table>
					</div>
					<br>
					<br>
					<hr>
					<div class="col-md-12">
						<span style="color: red;"><h3>Answer The Following Questions..</h3></span>

						<br>
						<div>
							<h4> <strong>Q1. What material do you want? </strong></h4>
							<div><textarea name="Q1" rows="5" cols="150" required placeholder="la forme de la date : DD/MM/YYYY"></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q2. What date would you like to pick up the material?</strong></h4>
							<div><textarea name="Q2" rows="5" cols="150" required placeholder="la forme de la date : DD/MM/YYYY"></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q3. How long do you plan to use it for?</strong></h4>
							<div><textarea name="Q3" rows="5" cols="150" required placeholder="par exemple 10 jours "></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q4. Do you have a preferred return date? </strong></h4>
							<div><textarea name="Q4" rows="5" cols="150" required placeholder="la forme de la date : DD/MM/YYYY"></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q5. any commentaire</strong></h4>
							<div><textarea name="Q5" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
							
						<br><br>
						<a type="submit" href="doneSucc.php" class="btn btn-success">I am Done!</a>
						<a class="btn btn-danger" href="index.php" >Back</a>
					</div>
					
				</form>
			</fieldset>
			
		</div>
	</div>
