<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../include/css/headerfooter.css">
    <link rel="stylesheet" href="./css/contactus_user.css">
    <title>Contact Us</title>
</head>
<body>
    
<?php
    
    $error = empty(array());
    if (isset($_POST['submit'])) // POST with submit button pressed.
    {   
   
        // Trim unwanted whitespaces.
        $name   = trim($_POST['name']);
        $phone  = trim($_POST['phone']);
        $email  = trim($_POST['email']);
        $subject = trim($_POST['subject']);
        $message = $_POST['message'];
        $error = detectInputError();
    }

    function detectInputError()
    {
        // Use the global variables.
        global $name, $phone, $email , $subject , $message;
        

        // name
        if ($name == null)
        {
            $error['name'] = 'Please enter your <strong>name</strong>.';
        }
        // EXTRA: To prevent hacks.
        else if (strlen($name) > 30)
        {
            $error['name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
        else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name))
        {
            $error['name'] = 'There are invalid characters in your <strong>name</strong>.';
        }

        // phone
        if ($phone == null)
        {
            $error['phone'] = 'Please enter your <strong>phone number</strong>.';
        }
        // EXTRA: To prevent hacks.
        else if (!preg_match('/^01\d-\d{7}$/', $phone))
        {
            $error['phone'] = 'Invalid ! format: 012-34567892, with (-)';
        }

        // email
        if ($email == null)
        {
            $error['email'] = 'Please enter your email.';
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error['email'] = "Your email format is wrong";
        }

        if(empty($error))
        {
            include '../Database/database_connection.php';
            $sql = "INSERT INTO contact_us 
            (name , phone , email , subject , message , status) 
            VALUES
            ('$name' , '$phone' , '$email' , '$subject' , '$message' , 'Pending')";

            if(mysqli_query($conn, $sql)){
                
                echo "<script>
                alert('Save Successfully');
                window.location.href='https://localhost/PHP%20Assignment/homepage_user.php';
                </script>";
            } else{
	        echo "ERROR: Hush! Sorry $sql. "
		    . mysqli_error($conn);
            }
        }
        return $error;

    }
?>

    <!-- header -->
    <?php 
    include('../include/user_header.php')
    ?>
    
    <div class="container">
        <h1>Contact Us</h1>
        <h2>Please complete the form as detailed as possible 
            in order for us to assist your enquiries with best experience.</h2>
        <!-- send your enquiry -->
        <div class="contact-box">
            <div class="contact-left">
                <h3>Send Your Enquiry</h3>    
                <form class="contact" method="post" action = "<?php 
                    echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div class= "input-row">   
                        <div class = "input-group">
                            <label>Name*: </label>
                            <input type="text" name="name" id="name" value="<?php 
                                echo isset($_POST['name']) ? $_POST['name'] : ''
                            ?>">
                            <span class="error"><?php echo $error['name'] ?? ''?></span>	
                        </div>

                        <div class = "input-group">
                            <label>Phone*: </label>
                            <input type="phone" name="phone" id="phone" value="<?php 
                                echo isset($_POST['phone']) ? $_POST['phone'] : ''
                            ?>">
                            <span class="error"><?php echo $error['phone'] ?? ''?></span>
                        </div>
                    </div>

                    <div class= "input-row">  
                        <div class = "input-group">
                            <label>Email*: </label>
                            <input type="text" name="email" id="email" value="<?php 
                                echo isset($_POST['email']) ? $_POST['email'] : ''
                            ?>">
                            <span class="error"><?php echo $error['email'] ?? ''?></span>
                        </div>

                        <div class = "input-group">
                            <label>Subject*: </label>
                            <input type="text" name="subject" id="subject" value="<?php 
                                echo isset($_POST['subject']) ? $_POST['subject'] : ''
                            ?>" required>
                        </div>
                    </div>

                    <label>Message</label>
                    <textarea rows="10" name="message" id="message" placeholder="Type your message here" required >
                        <?php 
                            echo isset($_POST['message']) ? $_POST['message'] : '';
                            ?>
                    </textarea>
                    </br>
                    </br>
                    <button type="submit" name="submit" class="submitbutton" >Submit</button>    
                </form>
            </div>

            <!-- reach us -->
            <div class="contact-right">
                <h3>Reach Us</h3>
                <table>
                    <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@tarc.edu.my" style="text-decoration: none" >info@tarc.edu.my</a></td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td><a href="tel:(6)03-41450123" style="text-decoration: none">(6)03-41450123 </a></td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>
                        <b><i>Kuala Lumpur Main Campus </i></b></br>
                        Jalan Genting Kelang,  </br>
                        Setapak, 53300 Kuala Lumpur, </br>
                        P.O. Box 10979, 50932 </br>
                        Kuala Lumpur, Malaysia.
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php 
    require_once('../include/user_footer.php');
    ?>
</body>
</html>