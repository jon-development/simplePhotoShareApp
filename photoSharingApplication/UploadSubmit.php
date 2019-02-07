<?php
//<!--
//Main component of Form Page of PHP Final
//
//# Some code referenced from W3Schools.com
//# I, Jonathan G, certify that all code submitted is my own work; that I have not copied it from any other source.  I also certify that I have not allowed my work to be copied by others.
//-->  


// Set directory
$target_dir = "imageAssets/";
// set name
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = true;
// Find file type Ectension
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check Iamge SIZE when Submit Button is posted
if(isset($_POST["submitImage"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = true;
    } else {
        echo "File is not an image.";
        $uploadOk = false;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = false;
}
// Check file size - UP TO 2048 KB OR 2MB
if ($_FILES["fileToUpload"]["size"] > 2048000) {
    echo "Sorry, your file is too large.";
    $uploadOk = false;
}
// Check File Format
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = false;
}
// Check if uploaded
if ($uploadOk == false) {
    echo "Sorry, our file was not uploaded.";
// Attempt to Upload File
} else {
    // Move and confirm upload
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Start validating image name, data, and comments and import into SQL

if (isset($_POST['submitLogin'])) {
    include_once 'DBH.php';
    
    $name = mysqli_real_escape_string($conn, $_POST['imageName']);
    $date = mysqli_real_escape_string($conn, $_POST['imageData']);
    $comt = mysqli_real_escape_string($conn, $_POST['imageComt']);
    
    
    // Set name MIN and Max Characters
    if (strlen($name) < 1 || strlen($name) > 30) {
        echo "<p class ='error'>You must make a name of at least 1 character.</p>";
        exit();
    }
    // Set Comment to optional up to 200 chars
    if (strlen($comt) < 1 || strlen($comt) > 200) {
        echo "<p class ='error'>Your comment can be 200 characters max</p>";
        exit();
    } 
    // Check no special characters
    if (!pregmatch("/^[a-zA-Z]*$/", $name) || !pregmatch("/^[a-zA-Z]*$/", $comt )) {
        echo "<p class ='error'>Image name or Image Comment has unvalid characters. </p>";
        exit();
    } else {
        
        // INSERT PHOTO PROPERTIES INTO SQL
        $sql = "INSERT INTO images (name, date, comment) VALUES ('$name','$date','$comt')";
        mysqli_query($conn, $sql);
        echo "<p class ='pass'><strong>Image Comments Posted Succefully</strong></p>";
        exit();
        }
    }

?>


