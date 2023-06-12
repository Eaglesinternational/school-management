<!-- 

<?php

error_reporting(0);
session_start();
 session_destroy(); 

if ($_SESSION['message']){
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>  
    
    alert('$message');
    
    </script>"; }  


    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";
    
    
    $data = mysqli_connect($host, $user, $password, $db);

    $sql = "SELECT * FROM teacher ";

    $result=mysqli_query($data, $sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body> -->
    
<?php

error_reporting(0);
session_start();
 session_destroy(); 

if ($_SESSION['message']){
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>  
    
    alert('$message');
    
    </script>"; }  


    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";
    
    
    $data = mysqli_connect($host, $user, $password, $db);

    $sql = "SELECT * FROM teacher ";

    $result=mysqli_query($data, $sql);

?>


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
.mast{
  max-height: 600px;
}

</style>


    <?php
 
 require_once 'header.php';
 ?>
</head>
<body>

    <!-- <nav> -->
        <!-- <label class="logo">SBIA</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="" class="btn btn-success">Login</a></li>
        </ul>
 --> 

<!-- 
<div class="section1">

<label class="img_text" >We teach students with care</label>
<img class=" img-fluid  main_img" src="img/lab.jpeg" width="100%" alt="">

</div>
 -->

 <div class="container">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/yes.jpg" class="d-block w-100 mast" alt="..." width= "50%""; height="45%";>
        <div class="carousel-caption">
          <p class=" fw-20px test"> Hey! We are the champion </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img2/gist.jpeg" class="d-block w-100 mast" alt="...">
        <div class="carousel-caption">
          <p class="test">We are computer savvy</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img2/sch.jpeg" class="d-block w-100 mast" alt="...">
        <div class="carousel-caption">
          <p class="tett">Try us today!</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<!-----------------------------end of carrusel------------------------>





<div class="container" style="padding-top: 20px";>
    <div class="row">
        <div class="col-md-4">
            <img class="image" src="img/me.jpg" alt="">
        </div>
        <div class="col-md-8">
            <h1>WELCOME TO SBIA</h1>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, rem expedita tempore praesentium ipsa sed delectus accusantium molestiae quam id.</p>
       <p>Suscipit quae dignissimos eveniet sed accusamus perspiciatis, quas molestiae quos, praesentium accusantium deserunt maiores soluta dolore! Magnam nobis iure placeat?</p>
       <p>Adipisci odit officiis repellendus corrupti omnis libero architecto amet quos, nisi facere qui. Ducimus officiis voluptatibus harum id laborum accusamus.</p>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="hed">Our Teachers</h2>
    <div class="row">
        
       <?php


            while($info=$result->fetch_assoc()){

            
       ?>
        <div class="col-md-4">
        <img class="teacher" src="<?php echo "{$info['image']}"?>" alt="" >
        
            <h3><?php echo "{$info['name']}"?></h3>
            <h5><?php echo "{$info['description']}"?></h5>
    
    </div>
       
       <?php
}
       ?>
       

    </div>
</div>


<div class="container">
<h2 class="hed">Our Courses</h2>
    <div class="row">

  
    <div class="col-md-4">
        <img class="teacher" src="img/me.jpg" alt="" >
        <h3>Graphics Designing</h3>
       </div>
       <div class="col-md-4">
        <img class="teacher img-fluid" src="img/me.jpg" alt="" >
        <h3>Marketing</h3>
       </div><div class="col-md-4">
        <img class="teacher" src="img/lab.jpeg" alt="" >
        <h3>Web designing</h3>
       </div>




    </div>
</div>
      






<div class="container"> 
    

<div class="content">
<h2 class="add" id="admission">Admission Form</h2>


    <form action="data_check.php" method="POST">

    <div class="adm_int">
        <label class="label_text">Name</label>
        <input class="input_deg" type="text" name="name">
    </div>
    <div  class="adm_int">
        <label class="label_text">Email</label>
        <input class="input_deg" type="text" name="email">
    </div>
    <div  class="adm_int">
        <label class="label_text">Phone</label>
        <input class="input_deg" type="text" name="phone">
    </div>
    <div  class="adm_int">
        <label class="label_text">Message</label>
        <textarea class="input_txt" name="message"></textarea>
    </div>
   <center> <div  class="adm_int">
        <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
    </div>
    </center>
    </form>
    </div>
</div>





<!-- 

<footer class="down">
    <h3 class="footer_text">All @copyright reserved by Dan tech knowlwdge</h3>
</footer> -->


<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
</body>
</html> -->

<footer>
    <h3 class="footer_text">All @copyright reserved by Dan tech knowledge</h3>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>