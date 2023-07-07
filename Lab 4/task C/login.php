<?php
session_start();

    $username = "admin";
    $password = "admin";

 

    if (isset($_POST['uname'])) {
        if ($_POST['uname']==$username && $_POST['pass']==$password) {
            $_SESSION['uname'] = $username;
           
            header("location:dashboard.php");
        }
        else{
            $msg = "username or password invalid";
        }
    }
 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <span><?php
        if (isset($msg)) {
            echo $msg;
        }

     ?>     
     </span>
     <br>
    

</form>


<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="remember">Remember me:</label>
            <input type="checkbox" id="remember" name="remember">
            <br>
            <span class="psw">  <a href="#">Forgot Password?</a></span>
            <br>
            <br>
            <input type="submit" value="Submit">
            <span class="error"><?php echo $loginError ?? ''; ?></span>
        </form>
    </div>
</body>
</html>
