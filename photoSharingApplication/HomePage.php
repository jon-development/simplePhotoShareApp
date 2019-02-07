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
    
<!--Top heading-->
        <div class='heading'>
        <?php
        echo "<h2>"."Welcome to SharaGram!"."<h2>";
        echo "<h4>"."Our Photo Gallery : "."<h4>";
        ?>
        </div>
<!-- Image Display Area-->
<h6>Images ordered by Date Uploaded</h6>
<?php
/* Displaying Image*/

    foreach($_FILES["file"] as $key => $value) {
                $img="imageAssets/".$image;
                echo '<img src= "'.$img.'>';
            }
    
              

?>

<!-- Image Upload Area -->
<h4>Upload an Image Below, maximum size is 2MB</h4>
    <form action="UploadSubmit.php" method="POST"
          enctype="multipart/form-data">
        <fieldset class="login">
        Contribute an Image to our Page:</br>
        <input type="file" name="ImageUpload" id="ImageUpload"></br>
        <input type="submit" value="Upload Image" name="submitImage"></br>
        </form>
<form action="DBH.PHP" method=POST">
        Enter a name for your image :
        <input type="text" name="imageName"></br>
        Date Image was taken :
        <input type="Date" name="imageDate"></br>
        Comment on photo :
        <input type="text" name="imageComt"></br>
        <button type="submit" value="Upload Image" name="submitImage">Submit Photo Information</br>
        /form>
        </fieldset>
    </form>
        
       
    </body>
</html>

