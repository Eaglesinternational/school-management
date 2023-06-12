<?php
/* error_reporting(0); */
session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

elseif($_SESSION['usertype']=='admin'){
    header('location:login.php');
}




$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);


$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username='$name'  ";

$result=mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);




if(isset($_POST['update_profile'])){
    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

$sql = "UPDATE user SET  email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name'   ";

$result=mysqli_query($data, $sql);

if($result){
    header('location:student_profile.php');
}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="admin.css">
    <style>

    label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .div_deg2{
        background-color: skyblue;
        width: 350px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
    .content2{
        padding-left: 25%;
        padding-top: 5%;
    }
</style>

</head>
<body>
   <header class="header">
    <a href="">Student Dashboard</a>
    <div class="logout">
        <a class="btn btn-primary" href="logout.php">Logout</a>
    </div>
   </header>

   <aside>
        <ul>
            <li><a href="student_profile.php">My Profile</a></li> 
            
            
            <li><a href="">My Courses</a></li>                                        
            <li><a href="">My Result</a></li>                                        
                                           
                                                    
        </ul>
   </aside>

   <div class="content2" >
    <center>
        <h1>Update Profile</h1>
        <br>
    <form action="#" method="POST">
        <div class="div_deg2">
      
        <div>
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo "{$info['email']}"?>">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="number" name="phone" value="<?php echo "{$info['phone']}"?>">
        </div>
        <div>
            <label>password</label>
            <input type="text" name="password" value="<?php echo "{$info['password']}"?>">
        </div>
        <div>
            
            <input class="btn btn-success" type="submit" name="update_profile" value="Update">
        </div>
        </div>
    </form>
    </center>
   </div>


  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>