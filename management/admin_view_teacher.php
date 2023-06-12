
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

$sql ="SELECT * FROM teacher";

$result =mysqli_query($data, $sql);

if($_GET['teacher_id'])
{
    $t_id = $_GET['teacher_id'];

    $sql2 = "DELETE FROM teacher WHERE id='$t_id' ";

    $result2=mysqli_query($data, $sql2);

    if($result2){
        echo "<script type=text/javascript> alert('Delete teacher Successful') </script>";
        header('location:admin_view_teacher.php');
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
                background-color:skyblue;
             }
             .image2{
                height: 100px;
                width:100px;
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
   <h1>View All Teachers Data</h1>

   <table>
    <tr>
        <th>Teacher Name</th>
        <th>About Teacher</th>
        <th>Teacher Image</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>

<?php

while($info=$result->fetch_assoc()){



?>

    <tr>
        <td><?php echo "{$info['name']}"?></td>
        <td><?php echo "{$info['description']}"?></td>
        <td><img class="image2" src="<?php echo "{$info['image']}"?>"></td>
        
        <?php
        echo "
        <td><a onClick=\"javascript:return confirm('Are You Sure To Delete');\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>;"
           
        ?>
        </td>
        <td>
            <?php
        echo "
        <a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>";
                
    ?>
    </td>
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