<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../include/css/headerfooter.css">
    <link rel="stylesheet" href="./css/paymentform_user.css">
    <title>Payment Form</title>
</head>
<body>
<?php
    include('../Database/database_connection.php');
    $method = true;
    if(isset($_POST['online']))
    {
        $method = true;
    }
    else if (isset($_POST['cash'])){
        $method = false;
    }
    
    
    if($method)
    {
        $pay = 'online payment';
    }
    else{
        $pay = 'cash';
    }
    
    
    if (isset($_POST['submit'])) // POST with submit button pressed.
    {   
        $class = [];
        foreach ($_POST['class'] as $className) 
            $class[] = $className;
        $classes =  implode(" ",$class);
        // to check if user is online banking or cash
        if(isset($_POST['paymentMethod']))
        {
            $payment_method = $pay;
            $sql = "INSERT INTO payment_details 
            (method , class) 
            VALUES
            ('$payment_method' , '$classes')";

            if(mysqli_query($conn, $sql)){
                
                echo "<script>
                alert('Payment Successfully');
                window.location.href='https://localhost/PHP%20Assignment/homepage_user.php';
                </script>";
            } else{
	        echo "ERROR: Hush! Sorry $sql. "
		    . mysqli_error($conn);
            }
        }
        else{
            // Trim unwanted whitespaces.
             $payee_name   = trim($_POST['name']);
             $payee_email  = trim($_POST['email']);
             $card_number = trim($_POST['cardNumber']);
             $card_cvv = trim($_POST['cvv']);
             $expiry_month = trim($_POST['month']);
             $expiry_year = trim($_POST['year']);
             $payment_method = 'online payment';
             $error = detectInputError();
        }  
    }

    function detectInputError()
    {
        // Use the global variables.
        global $payee_name, $payee_email , $card_number , $card_cvv , $expiry_month , $expiry_year , $payment_method,
        $conn , $classes;
        
        // name
        if ($payee_name == null)
        {
            $error['name'] = 'Please enter your <strong>name</strong>.';
        }
        // EXTRA: To prevent hacks.
        else if (strlen($payee_name) > 30)
        {
            $error['name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
        else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $payee_name))
        {
            $error['name'] = 'There are invalid characters in your <strong>name</strong>.';
        }

        // email
        if ($payee_email == null)
        {
            $error['email'] = 'Please enter your email.';
        }
        if(!filter_var($payee_email, FILTER_VALIDATE_EMAIL))
        {
            $error['email'] = "Your email format is wrong";
        }
        //  card number
        if ($card_number == null)
        {
            $error['card_number'] = 'Please enter your card number.';
        }
        $num_card_number = strlen((string)$card_number);
        if($num_card_number != 16)
        {
            $error['card_number'] = 'your card number must be 16 digits';
        }
        if (!is_numeric($card_number))
        {
            $error['card_number'] = 'Please enter number only';
        }
        //  card cvv
        if ($card_cvv == null)
        {
            $error['card_cvv'] = 'Please enter your card cvv.';
        }
        $num_cvv_number = strlen((string)$card_cvv);
        if($num_cvv_number != 3)
        {
            $error['card_cvv'] = 'your card cvv must be 3 digits';
        }
        if (!is_numeric($card_cvv))
        {
            $error['card_cvv'] = 'Please enter number only';
        }
        //  mm expiry
        if ($expiry_month == null)
        {
            $error['expiry_month'] = 'Please enter your card expiry month.';
        }
        if (!is_numeric($card_cvv))
        {
            $error['expiry_month'] = 'Please enter number only';
        }
        if ($expiry_month <1 || $expiry_month > 12)
        {
            $error['expiry_month'] = 'Please enter your  expiry month between 1 and 12.';
        }
        
        //  yy expiry
        if ($expiry_year == null)
        {
            $error['expiry_year'] = 'Please enter your card expiry year.';
        }
        if (!is_numeric($expiry_year))
        {
            $error['expiry_year'] = 'Please enter number only';
        }
        if ($expiry_year < date("Y"))
        {
            $error['expiry_year'] = 'Please enter correct expiry year';
        }
        if(empty($error))
        {
            $sql = "INSERT INTO payment_details 
            (method , payee_name , payee_email , payee_card_num , payee_card_cvv , payee_card_month , payee_card_year , class)
            VALUES
            ('$payment_method', '$payee_name', '$payee_email', 
            '$card_number', '$card_cvv', '$expiry_month', 
            '$expiry_year' , '$classes')";

            if(mysqli_query($conn, $sql)){
                echo "<script>
                alert('Payment Successfully');
                window.location.href='https://localhost/Assignment/homepage_user.php';
                </script>";
            } else{
	        echo "ERROR: OOPS! Sorry $sql. "
		    . mysqli_error($conn);
            }
        }
        else{
            return $error;
        }
        

    }
?>

    <!-- header -->
    <?php 
    include('../include/user_header.php')
    ?>
    <div class="wrapper">
        <h2>Payment Form</h2> 
        <form action="" method="post">
        <button class="button online <?php if($method){ ?> active <?php } ?>" id="method" name="online" >Online Payment</button>
        <button class="button cash <?php if(!$method){ ?> active <?php } ?>" id="method" name="cash" >Cash Payment</button>
        
        </form>
        <form class="contact" method="post" action = "<?php 
            echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                 <!-- class category -->
                 <h3>Choose the class category</h3>  
                    <select name="class[]" id="class" multiple required>
                        <option value="Latin">Latin</option>
                        <option value="KPOP">KPOP</option>
                        <option value="Cheerleading">Cheerleading</option>
                        <!-- <option value="Breaking">Breaking</option>
                        <option value="Hiphop">Hiphop</option>
                        <option value="Kpop">Kpop</option>
                        <option value="Traditional Dance">Traditional Dance</option> -->
                    </select>
                    </br>
                    <span class="hold">( Hold down the Ctrl (windows) or Command (Mac) button to select multiple options. )</span>
                    </br>
                <?php if($method) {?>
                    <h3>Credit / Debit Card Payment Details</h3>
                    
                <div class="input-group">
                    <div class="input-box">
                        <!-- name -->
                        <input type="text" name="name" id="name" class="name" placeholder="Full Name" value="<?php 
                            echo isset($_POST['name']) ? $_POST['name'] : ''
                        ?>">
                        <span class="error"><?php echo $error['name'] ?? ''?></span>	
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <!-- email -->
                        <input type="text" name="email" id="email" class="name" placeholder="Email Address" value="<?php 
                        echo isset($_POST['email']) ? $_POST['email'] : ''
                        ?>">
                        <span class="error"><?php echo $error['email'] ?? ''?></span>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <!-- card number -->
                        <input type="text" placeholder="Card Number" class="name" name="cardNumber" value="<?php 
                        echo isset($_POST['cardNumber']) ? $_POST['cardNumber'] : ''
                        ?>">
                        <span class="error"><?php echo $error['card_number'] ?? ''?></span>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <!-- card cvv -->
                        <input type="text" placeholder="Card CVV"  class="name" name="cvv" value="<?php 
                        echo isset($_POST['cvv']) ? $_POST['cvv'] : ''
                        ?>">
                        <span class="error"><?php echo $error['card_cvv'] ?? ''?></span>
                    </div>
                
                    <div class="input-box">
                        <!-- mm expiry -->
                        <input type="text" placeholder="MM" class="expiry" name="month" value="<?php 
                            echo isset($_POST['month']) ? $_POST['month'] : ''
                            ?>">
                        <span class="error"><?php echo $error['expiry_month'] ?? ''?></span>
                        <!-- yy expiry -->
                        <input type="text" placeholder="YYYY" class="expiry" name = "year" value="<?php 
                            echo isset($_POST['year']) ? $_POST['year'] : ''
                            ?>">
                        <span class="error"><?php echo $error['expiry_year'] ?? ''?></span>
                    </div>
                </div>
                
                <?php }else{ ?>
                    <!-- cash payment -->
                    <h3>Cash Payment</h3>   
                    <input type="hidden" name="paymentMethod" value = "cash">
                <p>For cash payment, please submit to respective dance leader before the dateline stated during class! </p>
                <?php } ?>
                <div class="input-group">
                    <div class="input-box">
                        <button type="submit" class="submit" name="submit">SUBMIT</button>
                        <button type="reset" class="reset">RESET</button>

                    </div>
                </div>
        </form>
    </div>
    <!-- footer -->
    <?php 
    require_once('../include/user_footer.php');
    ?>
</body>
</html>