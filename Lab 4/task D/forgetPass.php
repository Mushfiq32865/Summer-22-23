<?php
// Function to check if the provided email exists in the data.json file
function checkEmail($email) {
    // Read the user data from data.json file
    $userData = file_get_contents('data.json');
    $users = json_decode($userData, true);

    // Check if the email exists in the data.json file
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return true;
        }
    }

    return false;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists
    if (checkEmail($email)) {
        // Email exists, perform password reset logic
        // ...
        echo "Password reset instructions sent to your email address.";
        exit();
    } else {
        $emailError = 'Email not found.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
   
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <input type="submit" value="Submit">
            <span class="error"><?php echo $emailError ?? ''; ?></span>
        </form>
    </div>
</body>
</html>
