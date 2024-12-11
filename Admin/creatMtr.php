<?php
    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('materielmangement');

    $codeValue = "";
    $nameValue = "";
    $titleValue = "";
    $quantityValue = "";
    $urlValue = "";

    $errorMesage = "";
    $successMesage = ""; 

    if(isset($_POST["submit"])){

        $codeValue = $_POST["code"];
        $nameValue = $_POST["Cname"];
        $titleValue = $_POST["title"];
        $quantityValue = $_POST["quantity"];
        $urlValue = $_POST["url"];

        if( empty($nameValue)){
            $errorMesage = "all fileds must be filed out!";
        }else {
            //include the etudiant file
            include('../classes/materiel.php');

            //create new instance of client class with the values of the inputs
            $materiel = new Materiel($codeValue,$nameValue,$titleValue,$quantityValue,$urlValue);

            //call the insertClient method
            $materiel->insertMateriel('materiel',$connection->conn);

            //give the $successMesage the value of the static $successMsg of the class
            $successMesage = Materiel::$successMsg;

            //give the $errorMesage the value of the static $errorMsg of the class
            $errorMesage = Materiel::$errorMsg;


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
                            <h6 class="mb-4">Ajouter Materiel</h6>
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
                                    <label for="code" class="form-label">materiel Code</label>
                                    <input type="text" class="form-control" id="code" name="code">
                                </div>
                                <div class="mb-3">
                                    <label for="Cname" class="form-label">materiel name</label>
                                    <input type="text" class="form-control" id="Cname" name="Cname">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">materiel Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">materiel Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">materiel url</label>
                                    <input type="text" class="form-control" id="url" name="url">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit"->Ajouter materiel</button>
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