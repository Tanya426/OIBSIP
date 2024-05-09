<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the database for the user
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

// Check if the user exists
if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // Check if the password is correct
    if (password_verify($password, $user['password'])) {
        // Password is correct, set the session variable
        $_SESSION['username'] = $user['username'];
        header('Location: welcome.php');
    } else {
        // Password is incorrect
        echo '<script>document.getElementById("error-message").innerHTML = "Invalid password";</script>';
    }
} else {
    // User does not exist
    echo '<script>document.getElementById("error-message").innerHTML = "User not found";</script>';
}

mysqli_close($conn);
?>