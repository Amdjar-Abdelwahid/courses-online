<?php
session_start();
session_destroy();
?>

<?php include('./includes/allhead.php'); ?>

<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		
		<div class="item active">
			<div class="fill" style="background-image:url('images/study.jpg');"></div>
			<div class="carousel-caption">
				<a href="registrationform"><h2 style="color: white;">Register Today</h2></a>
			</div>
		</div>
		<div class="item">
			<div class="fill" style="background-image:url('images/download.jpg');"></div>
			<div class="carousel-caption">
				<a href="taketime"><h2 style="color: white; ">Take time</h2>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
	</div>
			
</header>

<!-- Page Content -->

<!-- Features Section -->
<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">EMSI MMATERIELS</h2>
		</div>
		<div class="col-md-6">
			<p>The EMSI MATERIELS by <strong>student of emsi</strong> includes:</p>
			<ul>
				<li><strong>Laptop or tablet</strong>
				</li>
				<li>Pens, pencils, and markers</li>
				<li>Notebooks and notepads</li>
				<li>Folders and binders</li>
				<li>Planner or calendar</li>
				<li>Books and textbooks</li>
			</ul>
			
		</div>
		<div class="col-md-6">
			<img class="img-responsive" src="images/7fb1f193435815a86c8484f82b9589e1.jpg" alt="">
		</div>
	</div>

	<?php include('./includes/allfoot.php'); ?>