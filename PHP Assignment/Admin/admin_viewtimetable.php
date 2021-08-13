
<?php 
    
    include '../Database/database_connection.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="../Participants/img/logo.png" type="image/gif" sizes="16x16">
        <title>View Timetable</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/admintable.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <!--Upper Header-->
        
        <!--Header-->
        <?php include("../include/admin_header.php"); ?>
        
                    <!--Content-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: admin</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    
                    <div class="row">
                            <div class="admintable">
                                <h2>Admin Timetable</h2>
                                <button onclick="document.location = 'admin_addtimetable.php'">Add Timetable</button>
                                
                                <form action="" method="post">
                                    <br>
                                    <button>Filter</button>
                                </form>
                                </br></br>
                                <table class="admintable">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
                                        <th>Category</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>Price</th>
                                        <th>Venue</th>
                                        <th>Contact</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <!-- <tfoot>
                                        <tr>
                                            <td colspan="14">
                                                <div class="links">? records(s) found</div>
                                            </td>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM admin_timetable";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0)
                                            {
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    echo $row["timetableId"]
                                                ?>

                                            </td>
                                            <td>
                                                <?php 
                                                    echo $row["category"]
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $row["days"]
                                                ?>
                                            </td>
                                            <td>    
                                                <?php 
                                                    echo $row["timeStart"]
                                                ?>
                                                to
                                                <?php 
                                                    echo $row["timeEnd"]
                                                ?>
                                            </td>
                                        
                                            <td>
                                                RM
                                                <?php 
                                                    echo $row["price"]
                                                ?>

                                            </td>
                                            
                                            <td>
                                                <?php 
                                                    echo $row["venue"]
                                                ?>

                                            </td>

                                            <td>
                                                <?php 
                                                    echo $row["contactNumber"]
                                                ?>
                                                (
                                                <?php 
                                                    echo $row["contactPerson"]
                                                ?>
                                                )
                                            </td>
                                            <td><a href="./admin_addtimetable.php?id=<?php echo $row['timetableId']?>">Edit</a></td>
                                            <td><button type="button">Delete</button></td> 
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted" style="margin: auto">Copyright &copy; Dance Society</div>
                    <div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/admin.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  
    </body>
</html>
