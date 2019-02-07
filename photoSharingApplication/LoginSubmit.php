<!--
Main component of Form Page of PHP Final

# Some code referenced from W3Schools.com
# I, Jonathan G, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
-->   
<?php

if (isset($_POST['submitLogin'])) {
    include_once 'DBH.php';
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // See length of Data
    if (strlen($username) < 6 || strlen($username) > 18) {
        echo "<p class ='error'>Username must be between 6 to 18 characters. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();
    }
    
    if (strlen($password) < 6 || strlen($password) > 18) {
        echo "<p class ='error'>Password must be between 6 to 18 characters. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();
    } 
    // Check no special characters
    if (!pregmatch("/^[a-zA-Z]*$/", $username) || !pregmatch("/^[a-zA-Z]*$/", $password )) {
        echo "<p class ='error'>Signup has unvalid characters. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();
    } else {
        // SQL commands to check LOGIN DATA
        $sql = "SELECT * FROM users WHERE user_id='$id'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        
        // Check if user has an account
        if ($resultcheck > 1 ) {
        echo "<p class ='error'>User does not have an account. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();    
        } else {
            // Qurery to confirm login data.
            $sql = "INSERT INTO users (user_username, user_password) VALUES ('$username','$password')";
            mysqli_query($conn, $sql);
                echo "<p class ='pass'><strong>Login <a href='Login.php'>By Clicking Here</a></strong></p>";
                exit();
        }
    }
}
?>