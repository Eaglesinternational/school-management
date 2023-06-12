
<?php
error_reporting(0);
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


$sql = "SELECT * from user WHERE usertype='student'";

$result = mysqli_query($data, $sql);




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
        table{
             width: 1000px;
             border-spacing: 5px;
             }

             table, th, td{
                border: 1px solid black;
                border-collapse: collapse;
             }
             th, td {
                padding: 20px;
                font-size: 15px
                
             }
             td{
                background-color: skyblue;
             }



    </style>
</head>
<body>
   <header class="header">
    <a href="">Student Data</a>
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
   <h1>Student Data</h1>

   <?php
   
   if($_SESSION['message']){
    echo $_SESSION['message'];
   }

   unset($_SESSION['message']);

   ?>
      <br>
   <table border="1px">
        <tr>
            <th class="table_th">Username</th>
            <th class="table_th">Email</th>
            <th class="table_th">Phone</th>
            <th class="table_th">Password</th>
            <th class="table_th">Delete</th>
            <th class="table_th">Update</th>
        </tr>


        <?php
        while($info=$result->fetch_assoc()){

        
        
        ?>



        <tr>
            <td> <?php echo  "{$info['username']}";?> </td>
            <td><?php echo  "{$info['email']}";?></td>
            <td><?php echo  "{$info['phone']}";?></td>
            <td><?php echo  "{$info['password']}";?></td>
            <td>
                <?php
                
                echo  "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are you sure to Delete this?');\" href='delete.php?student_id={$info['id']}'> Delete </a>";
                
                ?>
        </td>
        <td><?php echo  "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'> Update </a>";?></td>
        </tr>

    <?php
    
    }

    ?>
   </table>
   </center>
   </div>

  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>