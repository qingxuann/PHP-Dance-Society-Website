
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="../Participants/img/logo.png" type="image/gif" sizes="16x16">
        <title>Add Timetable</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="./css/styles.css">
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/admin_addtimetable.css">
        <title><?php echo isset($_REQUEST['id']) ? 'Edit Timetable' : 'Add Timetable'?></title>
        <?php   
            
            include '../Database/database_connection.php';
            // check if is edit or add data
            // if press edit then will pass the id to this url
            if(isset($_REQUEST['id']))
            {
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM admin_timetable where timetableId = '$id'";
            $result = mysqli_query($conn, $sql);
            // let the result become an array
            $data = mysqli_fetch_array($result);
            }
        ?>
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
                    <div class="container-fluid px-4" style="margin-bottom: 100px;">
                    <!-- if got id then is edit, if no id then is add timetable -->
                    <h1><?php echo isset($_REQUEST['id']) ? 'Edit Timetable' : 'Add Timetable'?></h1>
                        <div class="row">
                            <!-- if got id then will post to table -->
                            <form action="<?php echo isset($_REQUEST['id']) ? 'admin_edittimetable.php' : 'admin_inserttimetable.php'?>" method="post">
                                
                                <!-- for user to add enquiry data into database -->
                                <fieldset>
                                <p>
                                    Category: <input type="text" name="category" value="<?php echo isset($data['category']) ? $data['category'] : '';?>">
                                </p>
                                <p>
                                    Day: 
                                    <select name="days[]" id="days" multiple>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                    </select>
                        </br> <span>( Hold down the Ctrl (windows) or Command (Mac) button to select multiple options. )</span>
                                </p>
                                <p>
                                    Time start - Time end: 
                                    <input type="time" name="timestart" value="<?php echo isset($data['timeStart']) ? $data['timeStart'] : '';?>">
                                    - 
                                    <input type="time" name="timeend" value="<?php echo isset($data['timeEnd']) ? $data['timeEnd'] : '';?>">
                                </p>
                                <p>
                                    Price (RM): 
                                    <input type="text" name="price" value="<?php echo isset($data['price']) ? $data['price'] : '';?>">
                                </p>
                                <p>
                                    Venue: 
                                    <input type="text" name="venue" value="<?php echo isset($data['venue']) ? $data['venue'] : '';?>"> 
                                </p>
                                <p>
                                    Contact number: 
                                    <input type="text" name="contactnumber" placeholder="01234567890" value="<?php echo isset($data['contactNumber']) ? $data['contactNumber'] : '';?>">
                                </p>
                                <p>
                                    Contact person: 
                                    <input type="text" name="contactperson" value="<?php echo isset($data['contactPerson']) ? $data['contactPerson'] : '';?>">
                                </p>
                                <!-- when post need to update the id to the database -->
                                <input type="hidden" name="timetableId" value="<?php echo isset($data['timetableId']) ? $data['timetableId'] : '';?>">
                                <input type="submit" name="submit" id="Submit">
                                <input type="reset" name="reset" id="Reset">
                                </fieldset>
                            </form>
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
        <script src="./js/admin.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  
    </body>
</html>
