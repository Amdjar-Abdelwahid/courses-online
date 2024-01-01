<?php

    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');
    
     //include the client file
    include('../classes/courses.php');
    $id = $_GET['id'];
    //call the static selectCoursByEtudiant method and store the result of the method in $clients
    

    //call the static selectAllCourses method and store the result of the method in $clients
    $courses = Cours::selectEtudiantsByCours($connection->conn,$id);
    $cours = Cours::selectCoursById('course',$connection->conn,$id);

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


            <!-- Etudiants Start -->
            <div class="table-responsive">
                <br>
                <a class="btn btn-outline-success" href="courses.php"><?php echo "$cours[courseName]" ?></a>
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">N°</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">address</th>
                        <th scope="col">date Inscription</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($courses as $row){
                                echo " <tr>
                                <td>".$i++."</td>
                                <td>$row[firstname]</td>
                                <td>$row[lastname]</td>
                                <td>$row[email]</td>
                                <td>$row[address]</td>
                                <td>$row[dateInscription]</td>
                            </tr>"; 
                            }
                        ?>
                    
                    </tbody>
                    
                </table>
            </div>
            <!-- Etudiant End -->


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