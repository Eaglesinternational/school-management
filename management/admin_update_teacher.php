
<?php

session_start();
error_reporting(0);

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





if($_GET['teacher_id']){

    $t_id=$_GET['teacher_id'];
    $sql ="SELECT * FROM teacher WHERE id='$t_id' ";
    $result =mysqli_query($data, $sql);

    $info=$result->fetch_assoc();


}

if(isset($_POST['update_teacher'])){
    $t_name = $_POST['name'];
    $t_id = $_POST['id'];
    $t_des = $_POST['description'];
    $file = $_FILES['image']['name'];

    $dst = "./image/".$file;

    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql2 = "UPDATE teacher SET name='$t_name' , description='$t_des', image='$dst_db' WHERE id='$t_id'  " ;

    $result2 =mysqli_query($data, $sql2);

    if($result2){

         header("location:admin_view_teacher.php");

        echo "<script type=text/javascript> alert('Update Successful') </script>"; 

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
            width: 150px;
            text-align: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .form_deg{
            background-color: skyblue;
            width: 600px;
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
            <li><a href="admin_add_teacher.php">Add Teacher</a></li>                                        
            <li><a href="admin_view_teacher.php">View Teacher</a></li>                                        
            <li><a href="">Add Courses</a></li>                                        
            <li><a href="">View Courses</a></li>                                        
                                                    
        </ul>
   </aside>


   <div class="content">
<center>
   <h1>Update Teacher Data</h1>
<form class="form_deg" action="#" method="POST" enctype="multipart/form-data">

<input type="text" name="id" value="<?php
        echo "{$info['id']} " 
        ?>"hidden>


    <div>
        <label for="">Teacher Name</label>
        <input type="text" name="name" value="<?php
        echo "{$info['name']}"
        ?>">
    </div>
    <div>
        <label for="">About Teacher</label>
        <textarea name="description" rows="4" ><?php
        echo "{$info['description']}"
        ?></textarea>
    </div>
    <div>
        <label for="">Teacher Old Image</label>
        <img width="100px"  height="100px" src="<?php
        echo "{$info['image']}"
        ?>" alt="">
    </div>
    <div>
        <label for="">Choose Teacher New Image</label>
       <input type="file" name="image">
    </div>
    <div>
       
       <input class="btn btn-success" type="submit" name="update_teacher" value="Submit">
    </div>



</form>




   </center>
   </div>

  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>