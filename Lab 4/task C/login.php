<?php
session_start();

    $username = "admin";
    $password = "admin";

// Function to check if the provided username and password are valid
function authenticate($username, $password) {
    // Read the user data from data.json file
    $userData = file_get_contents('data.json');
    $users = json_decode($userData, true);

    // Check if the username and password match any user in the data.json file
    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            return true;
        }
    }

    return false;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate the user
    if (authenticate($username, $password)) {
        $_SESSION['username'] = $username;

        // Set "Remember Me" cookie if the checkbox is checked
        if (isset($_POST['remember'])) {
            $expiry = time() + (30 * 24 * 60 * 60); // Set cookie expiration to 30 days
            setcookie('remember_me', $username, $expiry);
        }        
        
    } else {
        $loginError = 'Invalid username or password';
    }
}
?>

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
