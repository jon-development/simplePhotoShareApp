<!DOCTYPE html>
<html>
<!--
Main component of Form Page of PHP Final

# Some code referenced from W3Schools.com
# I, Jonathan G, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
-->    
<link rel="stylesheet" type="text/css" href="sharagram.css">
        <meta charset="UTF-8">
        <title></title>
    <body>
<!--        Main headings-->
        <?php
        echo "<div class='heading'>";
        echo "<h3>"."SharaGram, the indie photo sharing Application!"."</h3>";
        echo "<h3>"."By: Jonathan Gyurki, 000773383"."</h3>";
        echo "<h3>"."Please Enter Login Information: "."</h3>";
        echo "</div>";
        ?>
        
<!--        Form to post information to Database-->
        <form action = "DBH.php" method = "POST" class="login">
            <fieldset>
                <legend>Login</legend>
            </br>
            Username (for testing use, please use tadmin):
            <input type="text" name="username"></br>
            Password (for testing use, please use tpassword): 
            <input type="password" name="password"></br>
            </br>
            <button type="submit" name="submitLogin">Submit Login</button>
            <?php require 'LoginSubmit.php'?>
            </fieldset>
        </form>
        <h2>Sign Up <a href='SignUp.php'>Here</a></h2>
    </body>
</html>
