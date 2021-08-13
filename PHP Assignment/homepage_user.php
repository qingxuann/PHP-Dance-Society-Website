<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="./include/css/headerfooter.css">
  <link rel="stylesheet" href="homepage_user.css">
  
  <title>Home Page</title>
</head>

<body>
  <!-- header -->
  <?php 
    include('./include/user_header.php')
    ?>

  <!-- banner -->
  <div class="hero-image">
    <div class="hero-text">
      <h1 style="font-size:50px">TARUC Dancing Society</h1>
      <button class="contactus" onclick="document.location = './User/contactus_user.php'">Contact Us</button>
    </div>
  </div>
  <!-- end of banner -->

  <!-- dance type introduction -->
  <h2>Dance Types in our society</h2>
  <div class="grid-container" >
    <div class="grid-item">
      <img class="dancetype" src="img/homepage/dancetype-latin.png" alt="Latin" >
    </div>
    
    <div class="grid-item">
      <h3>Latin</h3>
      <p>Cha-Cha, Jive, Paso, Rumba and Samba are 
        known as the dances under Latin category. 
        Latin is listed in the Dancesport of Sea Games. 💃🕺🏽</p>
    </div> 
  

    <div class="grid-item">
      <img class="dancetype" src="img/homepage/dancetype-kpop.png" alt="KPOP" >
    </div>

    <div class="grid-item">
      <h3>KPOP</h3>
      <p>The most well known category in the decades, KPOP.
         If you like dance and Korean songs and dancers join them!</p>
    </div> 
 
    <div class="grid-item">
      <img class="dancetype" src="img/homepage/dancetype-cheerleading.png" alt="Cheerleading">
    </div>

    <div class="grid-item">
      <h3>Cheerleading</h3>
      <p>One of the most well known category, Cheerleading. 
        It is a team activity which consist of both dance and acrobatics element.</p>
    </div> 
  </div>

  <!-- end of dance type introduction -->

  <!-- instructor details -->
  <h2>Instructor Details</h2>
  <br>

  <div class="row">
    <div class="column">
      <div class="card">
        <img class="instuctor" src="img/homepage/latin-instructor.jpg" alt="Lam Hong Woh">
          <div class="container">
            <h2>Latin Instructor</h2>
            <p class="title">Lam Hong Woh</p>
            <p><b>4th Ck Open Dancesport Championship </b></br>
              ⭐ Champion in Open Cha cha Single Dance. </br>
              ⭐ Champion in Open Samba Single Dance. </br>
              ⭐ Champion in Open Paso Doble Single Dance. </br>
            </p>
          </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img class="instuctor" src="img/homepage/girlskpop-instructor.jpg" alt="Yenni" >
          <div class="container">
            <h2>Girls KPOP Instructor</h2>
            <p class="title">Yenni</p>
            <p>⭐ 1st Runner Up in 1119DH Internal Competition 2019. </br>
              ⭐ 1st Runner Up in K-Motion 5.0 Competition. </br>
            </p>
          </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img class="instuctor" src="img/homepage/cheerleading-coach.jpeg" alt="Lim Chin Hau" >
          <div class="container">
            <h2>Cheerleading Coach</h2>
            <p class="title">Lim Chin Hau</p>
            <p>10 years+ experience in cheerleading.
              He is the founder of Cheer Hero All Stars,
              they have received impressive achievement in local and international competitions.
              He is also the coach of Team Malaysia cheerleading team, competed in Singapore, Japan, US, etc!
          </div>
      </div>
    </div>

  </div>
  <!-- end of instructor details -->

<!-- footer -->
<?php 
require_once('./include/user_footer.php');
?>
</body>

</html>