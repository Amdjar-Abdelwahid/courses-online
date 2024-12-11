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
    $qauntityValue = "";
    $urlValue = "";

    //include the materiel file
    include('../classes/materiel.php');

    if($_SERVER['REQUEST_METHOD']=='GET'){

        $id = $_GET['id'];
    
    //call the staticbselectClientById method and store the result of the method in $row
    $row=Materiel::selectMaterielById('materiel',$connection->conn,$id);
    
    $codeValue = $row["materielCode"];
    $nameValue = $row["materielName"];
    $titleValue = $row["materielTitle"];
    $qauntityValue = $row["materielQte"];
    $urlValue = $row["materielUrl"];
    
    }else if(isset($_POST["submit"])){

        $codeValue = $_POST["code"];
        $nameValue = $_POST["Cname"];
        $titleValue = $_POST["title"];
        $qauntityValue = $_POST["price"];
        $urlValue = $_POST["url"];

        if(empty($codeValue) || empty($nameValue) || empty($titleValue)  || empty($qauntityValue) || empty($urlValue)){
            $errorMesage = "all fileds must be filed out!";
        }else{
            $materiel = new Materiel($codeValue,$nameValue,$titleValue,$qauntityValue,$urlValue);
            
            Materiel::updateMateriel($materiel,'materiel',$connection->conn, $_GET['id']);
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


            <!-- Create materiel Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Materiels</h6>
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
                                    <label for="code" class="form-label">materiels Code</label>
                                    <input type="text" class="form-control" id="code" name="code" value="<?php echo $codeValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Cname" class="form-label">materiels name</label>
                                    <input type="text" class="form-control" id="Cname" name="Cname" value="<?php echo $nameValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">materiels Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $titleValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">materiels Quantity</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $qauntityValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">materiels url</label>
                                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $urlValue ?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit"->Update materiel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Create materiel End -->


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