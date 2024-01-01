<?php
    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');

    $codeValue = "";
    $nameValue = "";
    $titleValue = "";
    $authorValue = "";
    $priceValue = "";
    $urlValue = "";

    //include the Cours file
    include('../classes/courses.php');

    if($_SERVER['REQUEST_METHOD']=='GET'){

        $id = $_GET['id'];
    
    //call the staticbselectClientById method and store the result of the method in $row
    $row=Cours::selectCoursById('course',$connection->conn,$id);
    
    $codeValue = $row["courseCode"];
    $nameValue = $row["courseName"];
    $titleValue = $row["courseTitle"];
    $authorValue = $row["courseAuthor"];
    $priceValue = $row["coursePrice"];
    $urlValue = $row["courseUrl"];
    
    }else if(isset($_POST["submit"])){

        $codeValue = $_POST["code"];
        $nameValue = $_POST["Cname"];
        $titleValue = $_POST["title"];
        $authorValue = $_POST["Author"];
        $priceValue = $_POST["price"];
        $urlValue = $_POST["url"];

        if(empty($codeValue) || empty($nameValue) || empty($titleValue) || empty($authorValue) || empty($priceValue) || empty($urlValue)){
            $errorMesage = "all fileds must be filed out!";
        }else{
            $cours = new Cours($codeValue,$nameValue,$titleValue,$authorValue,$priceValue,$urlValue);
            
            Cours::updateCours($cours,'course',$connection->conn, $_GET['id']);
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


            <!-- Create Cours Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Cours</h6>
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
                                    <label for="code" class="form-label">course Code</label>
                                    <input type="number" class="form-control" id="code" name="code" value="<?php echo $codeValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Cname" class="form-label">Course name</label>
                                    <input type="text" class="form-control" id="Cname" name="Cname" value="<?php echo $nameValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Course Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $titleValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Author" class="form-label">Course Author</label>
                                    <input type="text" class="form-control" id="Author" name="Author" value="<?php echo $authorValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Course price</label>
                                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $priceValue ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">Course url</label>
                                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $urlValue ?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit"->Update Cours</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Create Cours End -->


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