
<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

elseif($_SESSION['usertype']=='student'){
    header('location:login.php');
}



$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";


$data = mysqli_connect($host, $user, $password, $db);

$id=$_GET['student_id'];

$sql ="SELECT * FROM user WHERE id = '$id' ";

$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    $query = "UPDATE user SET username='$name' , email='$email', phone='$phone', password='$password' WHERE id='$id'   ";

    $result2 =mysqli_query($data, $query);

    if($result2){

        header("location:view_student.php");

       /*  echo "<script type=text/javascript> alert('Update Successful') </script>"; */

           }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashbord</title>
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

    .div_deg{
        background-color: skyblue;
        width: 400px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>


</head>
<body>
   <header class="header">
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a class="btn btn-primary" href="logout.php">Logout</a>
    </div>
   </header>

   <aside>
        <ul>
            <li><a href="admission.php">Admission</a></li>                                        
            <li><a href="add_student.php">Add Student</a></li>                                        
            <li><a href="view_student.php">View student</a></li>                                        
            <li><a href="">Add Teacher</a></li>                                        
            <li><a href="">View Teacher</a></li>                                        
            <li><a href="">Add Courses</a></li>                                        
            <li><a href="">View Courses</a></li>                                        
                                                    
        </ul>
   </aside>


   <div class="content">
<center>
   <h1>Update Student</h1>

   <div class="div_deg">
    <form action="#" method="POST">
        <div>
            <label for="">Username</label>
            <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
        </div>
        <div>
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo "{$info['email']}"; ?>">
        </div>
        <div>
            <label for="">Phone</label>
            <input type="numbert" name="phone" value="<?php echo "{$info['phone']}"; ?>">
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
        </div>
        <div>
            
            <input class="btn btn-success" type="submit" name="update" value="Update">
        </div>
    </form>
   </div>
   </center>
   </div>

  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>