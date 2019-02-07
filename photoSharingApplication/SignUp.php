<!DOCTYPE html>
<html>
<!--
Login Page of PHP Final

# Some code referenced from W3Schools.com
# I, Jonathan G, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
-->    
<link rel="stylesheet" type="text/css" href="sharagram.css">
        <meta charset="UTF-8">
        <title></title>
    <body>
<!--        Main Heading-->
        <?php
        echo "<div class='heading'>";
        echo "<h3>"."SharaGram, the indie photo sharing Application!"."</h3>";
        echo "<h3>"."By: Jonathan Gyurki, 000773383"."</h3>";
        echo "<h3>"."Please Sign-Up Here: "."</h3>";
        echo "</div>";
        ?>
        
<!--        SIGN UP FORM WHICH POSTS TO SIGNUPSUBMIT-->
        <form action="DBH.php" method="POST" class="login">
            <fieldset>
                <legend>Sign Up</legend>
            </br>
            Username (must be 6 to 18 Letters or Numbers):
            <input type="text" name="usernameSignUp" placeholder="username"></br>
            Password (must be 6 to 18 Letters or Numbers): 
            <input type="password" name="passwordSignUp" placeholder="password"></br>
            </br>
            <button type="submit" name="submitSignUp" value="Signup">Sign Up</button>
            <?php require 'SignUpSubmit.php'?>
            </fieldset>
        </form>
        <h2>Go back to Login Page <a href='Login.php'>Here</a></h2>
    </body>
</html>

