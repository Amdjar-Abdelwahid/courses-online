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

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('materielmangement');
    
     //include the client file
	 include('../classes/materiel.php');

    //call the static selectAllmateriel method and store the result of the method in $clients
    $materiel = Materiel::selectAllmateriels('materiel',$connection->conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>materiel - materiels</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
<link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
<style>
	.logo img{
		width: 40px;
		height: 40px;
	}
</style>
</head>
<body>

<div class="super_container">

	<!-- Header -->
	<?php
    include('./includes/header.php');
    ?>
	
	<!-- Menu -->
	<?php
    include('./includes/menu.php');
    ?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/download.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Materiels</h1>
		</div>
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Popular Materiels</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">

				<!-- Popular materiel Item -->
				<?php
                        foreach($materiel as $row){
							echo "
							<div class='col-lg-4 course_box'>
								<div class='card'>
									<img class='card-img-top' src='$row[materielUrl]' alt=''>
									<div class='card-body text-center'>
										<div class='card-title'><a href='../AAAA/pincode-verification.php?id=$row[id]'>$row[materielName]</a></div>
										<div class='card-text'>$row[materielTitle]</div>
									</div>
									<div class='price_box d-flex flex-row align-items-center'>l
										<div class='course_author_image'>
											<img src='images/author.jpg' alt=''>
										</div>
										<div class='course_author_name'>EMSI <span>Quantity disponible	</span></div>
										<div class='course_price d-flex flex-column align-items-center justify-content-center'><span>$row[materielQte]</span></div>
									</div>
								</div>
							</div>";
                            }
                    ?>
			</div>		
		</div>
	</div>

	<!-- Footer -->
    <?php
    include('./includes/footer.php');
    ?>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/courses_custom.js"></script>

</body>
</html>