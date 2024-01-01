<?php
    //include connection file
    include('../classes/connextion.php');

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
    $promotionValue = "";
    $errorMesage = "";
    $successMesage = "";

    if(isset($_POST["submit"])){

        $fnameValue = $_POST["fname"];
        $lnameValue = $_POST["lname"];
        $emailValue = $_POST["email"];
        $passwordValue = $_POST["password"];
        $adressValue = $_POST["adrs"];
        $phoneValue = $_POST["phone"];
        $promotionValue = $_POST["promotion"];

        if(empty($fnameValue) || empty($lnameValue) || empty($emailValue) || empty($passwordValue) || empty($adressValue) || empty($phoneValue) ){
            $errorMesage = "all fileds must be filed out!";
        }else if(strlen($passwordValue) < 8 ){
            $errorMesage = "Password should have at least 8 characters!";
        }else if(preg_match("/[A-Z]+/", $passwordValue)==0){
            $errorMesage = "Password should contain at least one uppercase letter!";
        }else {
            //include the etudiant file
            include('../classes/etudiant.php');

            //create new instance of client class with the values of the inputs
            $etudiant = new Etudiant($fnameValue,$lnameValue,$emailValue,$passwordValue,$adressValue,$phoneValue,$promotionValue);

            //call the insertClient method
            $etudiant->insertEtudiant('etudiant',$connection->conn);

            //give the $successMesage the value of the static $successMsg of the class
            $successMesage = Etudiant::$successMsg;

            //give the $errorMesage the value of the static $errorMsg of the class
            $errorMesage = Etudiant::$errorMsg;


        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<?php
    include('includes/head.php')
?>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php
            include('includes/spinner.php')
        ?>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            include('includes/sidebar.php')
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
                include('includes/navbar.php')
            ?>
            <!-- Navbar End -->


            <!-- Create Etudiant Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Ajouter Etudiant</h6>
                            <?php

                            if(!empty($errorMesage)){
                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMesage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                </button>
                                </div>";
                            }

                            ?>
                            
                                <?php
                                        if(!empty($successMesage)){
                                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                <strong>$successMesage</strong>
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
                                                </button>
                                                </div>";
                                            }
                                    ?> 

                            <br>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="fname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label">last name</label>
                                    <input type="text" class="form-control" id="lname" name="lname">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">address</label>
                                    <input type="text" class="form-control" id="address" name="adrs">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="promotion" class="form-label">promotion</label>
                                    <input type="number" class="form-control" id="promotion" name="promotion">
                                </div> 
                                <button type="submit" class="btn btn-primary" name="submit"->Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Create Etudiant End -->


            <!-- Footer Start -->
            <?php
                include('includes/footer.php')
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php
                include('includes/script.php')
            ?>
</body>

</html>