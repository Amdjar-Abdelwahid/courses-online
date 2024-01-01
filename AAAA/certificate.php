<?php
  session_start();

  if ( $_SESSION[ "email" ] == "" || $_SESSION[ "email" ] == NULL ) {
    header( 'Location:../login.php' );
  }
  $useremail = $_SESSION[ "email" ];
  $userid = $_SESSION[ "id" ];
  $userfname = $_SESSION[ "firstname" ];
  $userlname = $_SESSION[ "lastname" ];
  $useradrs = $_SESSION[ "address" ];
  $userphn = $_SESSION[ "phone" ];
  $userprm = $_SESSION[ "promotion" ];

    //include connection file
    include('../classes/connextion.php');
    //create in instance of class Connection
    $connection = new Connection();
  
    //call the selectDatabase method
    $connection->selectDatabase('emsipoo');

    $id = $_GET['id'];

    $sql = "select * from  course where id='$id'";
    $result = mysqli_query($connection->conn, $sql );

    $sql2 = "select * from  inscription where idEtudiant='$userid' and idCourses='$id'";
    $result2 = mysqli_query($connection->conn, $sql2 );

    $sql3 = "select * from  certificat where idEtudiant='$userid' and idCourses='$id'";
    $result3 = mysqli_query($connection->conn, $sql3 );
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course Enrollment Print</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:20px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:18px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:10px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:30px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">



        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../images/Harvard1.jpg" width="200" height="200">
                            </td>
                            <td>
                               <b> Reg id: </b> <?php echo "<span>$userid</span>";?><br>
                               <b> Student Name: </b> <?php echo "<span>$userfname $userlname</span>";?><br>
                               <b> Student Email:</b> <?php echo "<span>$useremail</span>";?><br>
                               <b> Student Promotion:</b> <?php echo "<span>$userprm</span>";?><br>
                               <b> Student Course Enroll Date:</b><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php while ( $row = mysqli_fetch_array( $result ) ) { ?>
            <tr class="heading">
                <td> Course Details </td>
                <td>  </td>
            </tr>

            <tr class="details">
                <td>  Course Name</td>
                <td><?php $name=$row['courseName'];
						                echo "<span style='color:blue'>$name</span>";?></td>
            </tr>

            <tr class="details">
                <td>  Course title</td>
                <td><?php $title=$row['courseTitle'];
						                echo "<span style='color:blue'>$title</span>"; ?></td>
            </tr>

            <tr class="details">
                <td>  Course Author</td>
                <td><?php $author=$row['courseAuthor'];
						                echo "<span style='color:blue'>$author</span>"; ?></td>
            </tr>
            <tr class="details">
                <td>  Course Price</td>
                <td><?php $price=$row['coursePrice'];
						                echo "<span style='color:blue'>$price $</span>"; }?></td>
            </tr>
            
            <tr class="heading">
                <td>Other Details</td>
                <td></td>
            </tr>
            <?php while ( $row = mysqli_fetch_array( $result3 ) ) {?>
            <tr class="item">
                <td>Note</td>
                <td><?php $note=$row['note'];
                    echo $note;
                ?>/20</td>
            </tr>
            
            <tr class="item">
                <td>Date Obtention</td>
                <td><?php $dateOb=$row['dateObtention'];
                    echo $dateOb;
                }?></td>
            </tr>
            <tr class="item">
                <td>Date Inscriotion</td>
                <td>
                <?php while ( $row = mysqli_fetch_array( $result2 ) ) { 
                    $dateIns=$row['dateInscription'];
                    echo $dateIns;
                }?>
                </td>
            </tr>


             <tr class="item">
                <td>Student address</td>
                <td><?php echo "<span>$useradrs</span>";?></td>
            </tr>
            
            <tr class="item last">
                <td>Student phone </td>
                <td><?php echo "<span>$userphn</span>";?></td>
            </tr>
            
         
        </table>
    </div>
</body>
</html>