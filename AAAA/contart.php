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
    $connection->selectDatabase('materielmangement');

    $id = $_GET['id'];

    $sql = "select * from  materiel where id='$id'";
    $result = mysqli_query($connection->conn, $sql );

    $sql2 = "select * from  reservation where idprofessor='$userid' and idmateriels='$id'";
    $result2 = mysqli_query($connection->conn, $sql2 );

    $sql3 = "select * from  contrat where idprofessor='$userid' and idmateriels='$id'";
    $result3 = mysqli_query($connection->conn, $sql3 );
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Materiel Enrollment Print</title>
        
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
                    
                    <?php while ( $row = mysqli_fetch_array( $result ) ) {
                        $url =  $row['materielURL'];
                        ?>
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="../Abc/<?php echo $url; ?>" width="200" height="200">
                                </td>
                                <td>
                                <b> Reg id: </b> <?php echo "<span>$userid</span>";?><br>
                                <b> Professor Name: </b> <?php echo "<span>$userfname $userlname</span>";?><br>
                                <b> Professor Email:</b> <?php echo "<span>$useremail</span>";?><br>
                                <b> Professor Promotion:</b> <?php echo "<span>$userprm</span>";?><br>
                                <b> Professor materiel Enroll Date:</b><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                
                <tr class="heading">
                    <td> materiel Details </td>
                    <td>  </td>
                </tr>

                <tr class="details">
                    <td>  materiel Name</td>
                    <td><?php $name=$row['materielName'];
                                            echo "<span style='color:blue'>$name</span>";?></td>
                </tr>

                <tr class="details">
                    <td>  materiel title</td>
                    <td><?php $title=$row['materielTitle'];
                                            echo "<span style='color:blue'>$title</span>"; ?></td>
                </tr>

                <tr class="details">
                    <td>  materiel </td>
                    <td><?php  echo "<span style='color:blue'>EMSI</span>"; ?></td>
                </tr>
                <tr class="details">
                    <td>  materiel Quantity</td>
                    <td><?php $Quantity=$row['materielQte'];
                                            echo "<span style='color:blue'>$Quantity</span>"; }?></td>
                </tr>
                <tr class="heading">
                    <td>Other Details</td>
                    <td></td>
                </tr>
                <?php while ( $row = mysqli_fetch_array( $result3 ) ) {?>
                
                
                <tr class="item">
                    <td>Date Obtention</td>
                    <td><?php $dateOb=$row['dateObtention'];
                        echo $dateOb;
                    }?></td>
                </tr>
                <tr class="item">
                    <td>Date Reservation</td>
                    <td>
                    <?php while ( $row = mysqli_fetch_array( $result2 ) ) { 
                        $dateIns=$row['datereservation'];
                        echo $dateIns;
                    }?>
                    </td>
                </tr>


                <tr class="item">
                    <td>Professor address</td>
                    <td><?php echo "<span>$useradrs</span>";?></td>
                </tr>
                
                <tr class="item last">
                    <td>Professor phone </td>
                    <td><?php echo "<span>$userphn</span>";?></td>
                </tr>
                
            
            </table>
        </div>
    </body>
</html>
