<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../include/css/headerfooter.css">    
    <link rel="stylesheet" href="./css/user_timetable.css">
    <title>Timetable Details</title>
</head>
<body>
    <!-- header -->
    <?php 
    include('../include/user_header.php');
    include('../Database/database_connection.php');    
    ?>

        
    <h1>TARUC DANCING SOCIETY CLASS SCHEDULE</h1>
    <!-- image slider -->
    <div class="image" style="max-width:500px">
        <img class="dancepic" src="../img/timetable/kpop-pic.jpg" alt="kpop" style="width:100%">
        <img class="dancepic" src="../img/timetable/cheerleading-pic.jpg" alt="cheerleading" style="width:100%">
        <img class="dancepic" src="../img/timetable/breaking-pic.jpg" alt="breaking" style="width:100%">
        <img class="dancepic" src="../img/timetable/girlschoreo-pic.jpg" alt="girlschoreo" style="width:100%">
        <img class="dancepic" src="../img/timetable/hiphop-pic.jpg" alt="hiphop" style="width:100%">
        <img class="dancepic" src="../img/timetable/latin-pic.jpg" alt="latin" style="width:100%">
        <img class="dancepic" src="../img/timetable/popping-pic.jpg" alt="popping" style="width:100%">
        <img class="dancepic" src="../img/timetable/traditionaldance-pic.jpg" alt="traditionaldance" style="width:100%">
    </div>
                                            
        <!-- loop image -->
        <script>
        var myIndex = 0;
        carousel();

        function carousel() {
        var i;
        var x = document.getElementsByClassName("dancepic");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2500);    
        }
        </script>
        </br></br>

    <!-- timetable -->
    <table style="width:100%" class="timetable">
            <tr>
                <th>CATEGORY</th>
                <th>TIME</th>
                <th>PRICE</th>
                <th>VENUE</th>
                <th>CONTACT</th>
            </tr>
        <?php

        // connection to db
        $sql = "SELECT * FROM admin_timetable";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            //output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                
                <tr>
                    <td>
                        <?php 
                        echo $row["category"];
                        ?>

                    </td>
                    <td>
                        <?php 
                            echo $row["days"]
                        ?>
                        </br>
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
                </tr>
            <?php } 
            
        }

        ?>

    </table> 
        <!-- button link to registration form -->
        <button class="register" onclick="document.location = 'paymentform_user.php'">Register now!!</button>

    <!-- footer -->
    <?php 
    require_once('../include/user_footer.php');
    ?>
</body>
</html>