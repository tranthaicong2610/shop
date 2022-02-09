<?php

include '../classes/adminlogin.php';

?>
<?php
// goi class adminlogin
$admin_log=new adminlogin();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $login_check=$admin_log->login_admin($user,$pass);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/adminlogin.css">
</head>

<body>

    <h2>Login Form</h2>

    <form action="login.php" method="post">
        <div class="login">
        <span><?php 
				if(isset($login_check)){
					echo $login_check;
				}
			 ?>  </span>
            <div class="imgcontainer">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFqZMMWnIwg5s5uicldr-MVKpmu_2e1KWaIm2wNzp-Oqs4uyaqRGY8TFhBHIdWOMFMYPs&usqp=CAU" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="password">Forgot <a href="#">password?</a></span>
            </div>
        </div>
    </form>

</body>

</html>