<?php

    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');
    
     //include the client file
    include('../classes/etudiant.php');

    //call the static selectAllClients method and store the result of the method in $clients
    $etudiants = Etudiant::selectAllEtudiant('etudiant',$connection->conn);

    if(isset($_POST['search'])){
        $id=$_POST['names'];
        header("Location:etdCrs.php?id=$id");
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


            <!-- Etudiants Start -->
            <div class="table-responsive">
                <br>
                <h6 class="mb-4">List of Etudiants from database</h6>
                <form class="d-none d-md-flex ms-4" method="post">
                    <!-- <input class="form-control bg-dark border-0" type="search" placeholder="Search"> -->
                    <button class="btn btn-outline-success" type="submit" name="search">search</button>
                    <select name='names' class="form-control bg-dark border-0">
                        <option selected>Select a name</option>
                        <?php
                                
                                foreach($etudiants as $row){
                                        echo "<option value='$row[id]' >$row[firstname]</option>";

                                }
                        ?>
                    </select>
                </form>
                
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">N°</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">address</th>
                        <th scope="col">phone</th>
                        <th scope="col">promotion</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($etudiants as $row){
                                echo " <tr>
                                <td>".$i++."</td>
                                <td>$row[firstname]</td>
                                <td>$row[lastname]</td>
                                <td>$row[email]</td>
                                <td>$row[address]</td>
                                <td>$row[phone]</td>
                                <td>$row[promotion]</td>
                                <td>
                                <a class ='btn btn-outline-success' href='updateEtd.php?id=$row[id]'>edit</a>
                                <a class ='btn btn-outline-danger' href='deleteEtd.php?id=$row[id]'>delete</a>
                                </td>
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