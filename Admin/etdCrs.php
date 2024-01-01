<?php

    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');
    
     //include the client file
    include('../classes/etudiant.php');
    $id = $_GET['id'];
    //call the static selectCoursByEtudiant method and store the result of the method in $clients
    $etudiants = Etudiant::selectCoursByEtudiant($connection->conn,$id);
    $etudiant = Etudiant::selectEtudiantById('etudiant',$connection->conn,$id);

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
                <a class="btn btn-outline-success" href="etudiants.php"><?php echo "$etudiant[firstname] $etudiant[lastname]" ?></a>
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">N°</th>
                        <th scope="col">Cours Name</th>
                        <th scope="col">date Inscription</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($etudiants as $row){
                                echo " <tr>
                                <td>".$i++."</td>
                                <td>$row[courseName]</td>
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