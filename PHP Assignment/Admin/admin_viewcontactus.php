<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="../Participants/img/logo.png" type="image/gif" sizes="16x16">
        <title>Contact Us</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        
        <link rel="stylesheet" href="css/admintable.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script>
            function filterFunction(selectedObject){
                var value = selectedObject.value;
                window.location.href = "https://localhost/PHP%20Assignment/Admin/admin_viewcontactus.php?filter="+value ;
            }
        </script>
    </head>
    <body class="sb-nav-fixed">
    <!--Upper Header-->
        
        <!--Header-->
        <?php include("../include/admin_header.php"); 
            include '../Database/database_connection.php';
           
        ?>
        <?php 
            if(isset($_REQUEST['filter']))
            {
                $i = 0;
               if($_REQUEST['filter'] == 'None')
               {
                   
                    $sql = "Select * from contact_us";
                    $result = mysqli_query($conn, $sql);
                    
               }
               else if($_REQUEST['filter'] == 'Pending')
               {
                  
                   $sql = "Select * from contact_us where status = 'Pending'";
                   $result =  mysqli_query($conn, $sql);
                     
                                                
               }
               else{

                   $sql = "Select * from contact_us where status = 'Done'";
                    mysqli_query($conn, $sql);
                    $result =  mysqli_query($conn, $sql);
                    
               }
            }

             if (isset($_POST['status']))
            {
                $id = $_POST['id'];
                $sql = "update contact_us set status = 'Done' where id = '$id'";
                mysqli_query($conn, $sql);
               		
                
                            
            }
            if (isset($_POST['delete']))
            {
                $id = $_POST['id'];
                $sql = "DELETE FROM contact_us where id = '$id'";
                mysqli_query($conn, $sql);
               		
                
                            
            }
        ?>
        
                    <!--Content-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: admin</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4" style="margin-bottom: 100px;">
                        
                        <div class="row">
                            <div class="admintable">
                                <h2>Contact Us</h2>
                              
                                    <select name="" id="" onchange = "filterFunction(this)">
                                        <option value="" selected disabled hidden>Choose Filter</option>
                                        <option value="None" >None</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Done">Done</option>
                                    </select>
                              
                                <table class="admintable">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <!-- <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
                                            </td>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                       
                                        <?php 
                                            
                                            if (mysqli_num_rows($result) > 0)
                                            {
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php 
                                                    
                                                    $i++;
                                                    echo $i;
                                                ?>

                                            </td>
                                            <td>
                                                <?php 
                                                    echo $row["name"]
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $row["phone"]
                                                ?>
                                            </td>
                                            <td>    
                                                <?php 
                                                    echo $row["email"]
                                                ?>
                                             
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                    echo $row["subject"]
                                                ?>
                                            </td>
                                            <td>
                                                
                                                <?php 
                                                    echo $row["message"]
                                                ?>

                                            </td>
                                            
                                            
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" value = "<?php echo $row['id']?>">
                                                    <input type = "submit" name = "status" value="<?php echo $row["status"]?>" >
                                                   
                                                </form>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" value = "<?php echo $row['id']?>">
                                                    <input type = "submit" name = "delete" value="Delete" >
                                                </form>
                                            </td> 
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
