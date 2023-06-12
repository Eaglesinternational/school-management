<?php
 
 require_once 'header.php';
 ?>


   <center>
    <div class="form_deg">
        <center class="title_deg">
            Login form

            <h4 class="error">
                <?php

                error_reporting(0);

                session_start();
                session_destroy();
                
                echo $_SESSION['loginMessage'];

                ?>

            </h4>
        </center>
        <form action="login_check.php" method="POST" class="login_form">
            <div>
                <label class="label_deg">Username</label>
                <input type="text" name="username" required>
            </div>
            <div>
                <label class="label_deg">Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Login">
            </div>


        </form>
    </div>
   </center> 



<?php

   require_once 'footer.php'

   ?>