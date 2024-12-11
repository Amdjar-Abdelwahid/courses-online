<?php

    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('materielmangement');
    
     //include the client file
    include('../classes/materiel.php');
    $id = $_GET['id'];
    //call the static selectCoursByEtudiant method and store the result of the method in $clients
    

    //call the static selectProfByMateriels method and store the result of the method in $clients
    $professors = Materiel::selectProfByMateriels($connection->conn,$id);
    $materiel = Materiel::selectmaterielById('materiel',$connection->conn,$id);

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
                <a class="btn btn-outline-success" href="materiels.php"><?php echo "$materiel[materielName]" ?></a>
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">N°</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">address</th>
                        <th scope="col">date reservation</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($professors as $row){
                                echo " <tr>
                                <td>".$i++."</td>
                                <td>$row[firstname]</td>
                                <td>$row[lastname]</td>
                                <td>$row[email]</td>
                                <td>$row[address]</td>
                                <td>$row[datereservation]</td>
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