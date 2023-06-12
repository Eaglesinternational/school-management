
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

$sql = "SELECT * from admission";

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
</head>
<body>

    <?php
    
    include 'admin_sidebar.php';
    
    ?>

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
    </style>




<center>
   <div class="content">

   <h1>Applied for Admission </h1>
      <br>
   <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
        </tr>

        <?php
        
        while($info=$result ->fetch_assoc()) {


        
        
        ?>
            <tr>
                <td><?php echo  "{$info['name']}";?></td>
                <td><?php echo  "{$info['email']}";?></td>
                <td><?php echo  "{$info['phone']}";?></td>
                <td><?php echo  "{$info['message']}";?></td>
               
            </tr>

            <?php


            }

            ?>
            










   </table>

   </div>
   </center>
  




   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>