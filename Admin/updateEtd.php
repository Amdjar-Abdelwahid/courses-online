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
    $adressValue = "";
    $phoneValue = "";
    $promotionValue = "";
    $errorMesage = "";
    $successMesage = "";

    //include the etudiant file
    include('../classes/etudiant.php');

    if($_SERVER['REQUEST_METHOD']=='GET'){

        $id = $_GET['id'];
    
    //call the staticbselectClientById method and store the result of the method in $row
    $row=Etudiant::selectEtudiantById('etudiant',$connection->conn,$id);
    
    $fnameValue = $row["firstname"];
    $lnameValue = $row["lastname"];
    $emailValue = $row["email"];
    $adressValue = $row["address"];
    $phoneValue = $row["phone"];
    $promotionValue = $row["promotion"];
    
    }else if(isset($_POST["submit"])){

        $fnameValue = $_POST["fname"];
        $lnameValue = $_POST["lname"];
        $emailValue = $_POST["email"];
        $adressValue = $_POST["adrs"];
        $phoneValue = $_POST["phone"];
        $promotionValue = $_POST["promotion"];

        if(empty($fnameValue) || empty($lnameValue) || empty($emailValue) || empty($adressValue) || empty($phoneValue) ){
            $errorMesage = "all fileds must be filed out!";
        }else{
            $etudiant = new Etudiant($fnameValue,$lnameValue,$emailValue,'',$adressValue,$phoneValue,$promotionValue);
            
            Etudiant::updateEtudiant($etudiant,'etudiant',$connection->conn, $_GET['id']);
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
                            <h6 class="mb-4">Update Etudiant</h6>
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
                                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fnameValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="lname" class="form-label">last name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lnameValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $emailValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">address</label>
                                    <input type="text" class="form-control" id="address" name="adrs" value="<?php echo $adressValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phoneValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="promotion" class="form-label">promotion</label>
                                    <input type="number" class="form-control" id="promotion" name="promotion" value="<?php echo $promotionValue ?>">
                                </div> 
                                <button type="submit" class="btn btn-primary" name="submit"->Update</button>
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