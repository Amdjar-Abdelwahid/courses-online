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
    include('../classes/certificat.php');
    //create in instance of class Connection
    $connection = new Connection();
  
    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');

    $id = $_GET['id'];

    $sql = "select * from  course where id='$id'";
    $result = mysqli_query($connection->conn, $sql );

    $sql2 = "select * from  examen where coursID='$id'";
    $result2 = mysqli_query($connection->conn, $sql2 );

    if(isset($_POST["done"])){
        $certificat = new Certificat($id,$userid,date('Y-m-d H:i:s'),17);
        $certificat->insertCertificat('certificat',$connection->conn);
        header( "Location:certificate.php?id=$id" );
    }

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
                    <?php while ( $row = mysqli_fetch_array( $result ) ) { ?>
					<div class="col-md-4">
						<table>
							<tr>
								<th><strong>Course :</strong></th>
								<td>
                                <?php $name=$row['courseName'];
						                echo "<span style='color:blue'>$name</span>"; }?>
								</td>
							</tr>
							<tr>
								<th> <strong>Code Promotion :</strong> </th>
								<td> <?php echo "<span style='color:blue'>$userprm</span>";?> </td>
							</tr>
						</table>
					</div>
					<br>
					<br>
					<hr>
                    <?php while ( $row = mysqli_fetch_array( $result2 ) ) {
				?>
					<div class="col-md-12">
						<span style="color: red;"><h3>Answer The Following Questions..</h3></span>

						<br>
						<div>
							<h4> <strong>Q1. <?php $Q_1=$row['Q1']; echo $Q_1; ?></strong></h4>
							<div><textarea name="Q1" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q2. <?php $Q_2=$row['Q2']; echo $Q_2; ?></strong></h4>
							<div><textarea name="Q2" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q3. <?php $Q_3=$row['Q3']; echo $Q_3; ?></strong></h4>
							<div><textarea name="Q3" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q4. <?php $Q_4=$row['Q4']; echo $Q_4; ?></strong></h4>
							<div><textarea name="Q4" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						<div>
							<h4> <strong>Q5. <?php $Q_5=$row['Q5']; echo $Q_5; ?></strong></h4>
							<div><textarea name="Q5" rows="5" cols="150" required ></textarea></div>
						</div>
						<br>
						
						<?php } ?>
							
						<br><br>
						<button type="submit" name="done" class="btn btn-primary">I am Done!</button>
						<a class="btn btn-danger" href="deleteinsc.php?id=<?php echo $id; ?>" >Back</a>
					</div>
					
				</form>
			</fieldset>
			
		</div>
	</div>
