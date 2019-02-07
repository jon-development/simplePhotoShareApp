<!--
Main component of Form Page of PHP Final

# Some code referenced from W3Schools.com
# I, Jonathan G, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
-->   
<?php

if (isset($_POST['submitSignUp'])) {
    include_once 'DBH.php';
    
    $usernameSignUp = mysqli_real_escape_string($conn, $_POST['usernameSignUp']);
    $passwordSignUp = mysqli_real_escape_string($conn, $_POST['passwordSignUp']);
    
    // See length of Data
    if (strlen($usernameSignUp) < 6 || strlen($usernameSignUp) > 18) {
        echo "<p class ='error'>Username must be between 6 to 18 characters. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();
    }
    
    if (strlen($passwordSignUp) < 6 || strlen($passwordSignUp) > 18) {
        echo "<p class ='error'>Password must be between 6 to 18 characters. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();
    } 
    // Check Special Characters
    if (!pregmatch("/^[a-zA-Z]*$/", $usernameSignUp) || !pregmatch("/^[a-zA-Z]*$/", $passwordSignUp )) {
        echo "<p class ='error'>Signup has unvalid characters. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();
    } else {
        // Submit data to Database
        $sql = "SELECT * FROM users WHERE user_id='$id'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        
        // Check if user acco8nt already created
        if ($resultcheck > 0 ) {
        echo "<p class ='error'>Signup has been taken. <a href='SignUp.php'>Click here</a> to Try Again</p>";
        exit();    
        } else {
            // INSERT NEW USER DATA INTO TABEL
            $sql = "INSERT INTO users (user_username, user_password) VALUES ('$usernameSignUp','$passwordSignUp')";
            mysqli_query($conn, $sql);
                echo "<p class ='pass'><strong>User Created, now you can login <a href='Login.php'>By Clicking Here</a></strong></p>";
                exit();
        }
    }
    
        
    
    
    
} else {
    header("Location: ../signup.php");
    exit();
}

?>