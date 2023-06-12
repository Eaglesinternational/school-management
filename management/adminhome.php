
<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}

elseif($_SESSION['usertype']=='student'){
    header('location:login.php');
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
        
.ret{
    width: 340px;
    height: 340px;
    background-color: aquamarine;
    padding:5px;
    margin:10px;
}
.re{
    width: 340px;
    height: 340px;
    background-color: green;
    padding:5px;
    margin:10px;
}

.rem{
    width: 340px;
    height: 340px;
    background-color: aquamarine;
    padding:5px;
    margin:10px;
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

   <h1>Admin Dashboard</h1>

   <div class="container">
    <div class="row">

        <div class="col-md-3">
    <div class="ret">
        <p>My dashboard</p>
    </div>
    </div>
        <div class="col-md-3">
    <div class="re">
        <p>My dashboard</p>
    </div>
    </div>
        <div class="col-md-3">
    <div class="rem">
        <p>My dashboard</p>
    </div>
    </div>
   

</div>

   </div>



</div>
  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>