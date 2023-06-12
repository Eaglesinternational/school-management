
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

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

        $check ="SELECT * FROM user WHERE username = '$username'";

        $check_user = mysqli_query($data, $check);

        $row_count = mysqli_num_rows($check_user);

        if ($row_count ==1) {
            echo "<script type='text/javascript'>
            alert ('Username already exists. Try another one');
            </script>";
        }
        else {

       


    $sql = "INSERT INTO user (username, email, phone, usertype, password) VALUES ('$username', '$user_email', '$user_phone', '$usertype', '$user_password' )";

    $result = mysqli_query($data, $sql);

    if ($result){
        echo "<script type='text/javascript'>
        alert ('Data uploaded successfully');
        </script>";
    }
    else {
        echo "<script type='text/javascript'>
        alert ('Data upload failed');
        </script>";
    }
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
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width:100px;
            padding-top: 10px;
            padding-bottom: 10px;

        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
            margin-bottom:70px;
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
    
<h1>Add Student</h1>

   <div  class="div_deg">
    <form action="#" method="POST">
         <div>
            <label for="">Username</label>
            <input type="text" name="name" required autofocus>
         </div>
         <div>
            <label for="">Email</label>
            <input type="text" name="email" required>
         </div>
         <div>
            <label for="">Phone</label>
            <input type="number" name="phone" required>
         </div>
         <div>
            <label for="">Password</label>
            <input type="text" name="password" required>
         </div>
         <div>
           
            <input class="btn btn-primary" type="submit" name="add_student" value="Add Student">
         </div>
    </form>
   </div>
   </center>

   </div>

  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>