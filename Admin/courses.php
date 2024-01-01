<?php

    //include connection file
    include('../classes/connextion.php');

    //create in instance of class Connection
    $connection = new Connection();

    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');
    
     //include the client file
    include('../classes/courses.php');

    //call the static selectAllCourses method and store the result of the method in $clients
    $courses = Cours::selectAllCourses('course',$connection->conn);

    if(isset($_POST['search'])){
        $id=$_POST['names'];
        header("Location:crsEtd.php?id=$id");
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
                <h6 class="mb-4">List of Courses</h6> 
                <form class="d-none d-md-flex ms-4" method="post">
                    <!-- <input class="form-control bg-dark border-0" type="search" placeholder="Search"> -->
                    <button class="btn btn-outline-success" type="submit" name="search">search</button>
                    <select name='names' class="form-control bg-dark border-0">
                        <option selected>Select a cours</option>
                        <?php
                                
                                foreach($courses as $row){
                                        echo "<option value='$row[id]' >$row[courseName]</option>";

                                }
                        ?>
                    </select>
                </form>
                
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">N°</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Price</th>
                        <th scope="col">Url</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach($courses as $row){
                                echo " <tr>
                                <td>".$i++."</td>
                                <td>$row[courseCode]</td>
                                <td>$row[courseName]</td>
                                <td>$row[courseTitle]</td>
                                <td>$row[courseAuthor]</td>
                                <td>$row[coursePrice]</td>
                                <td>$row[courseUrl]</td>
                                <td>  
                                <a class ='btn btn-success btn-sm' href='updateCrs.php?id=$row[id]'>edit</a>
                                <a class ='btn btn-danger btn-sm' href='deleteCrs.php?id=$row[id]'>delete</a>
                                </td>
                            </tr>"; 
                            }
                        ?>
                    
                    </tbody>
                    
                </table>
            </div>
            <!-- Button End -->


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