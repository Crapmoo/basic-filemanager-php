<?php
session_start();

if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/";  // Specify the directory where you want to save the uploaded file.
    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    // Check if the file is valid
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($_FILES["fileToUpload"]["size"] > 0) {
        // You can add additional checks here, such as file type, size, and more.

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $_SESSION["check"] = TRUE;
            $_SESSION["errormessage"] = "Upload file successfully";
        } else {
            $_SESSION["check"] = FALSE;
            $_SESSION["errormessage"] = "Sorry, there was an error uploading your file.";
        }
    } else {
        $_SESSION["check"] = FALSE;
        $_SESSION["errormessage"] = "Invalid file.";
    }
}
header("Location: index.php");
?>
