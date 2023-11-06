<?php
session_start();
if (isset($_GET['file'])) {
    $fileToDelete = $_GET['file'];
    $dirPath = "uploads/";

    // Check if the file exists before attempting to delete it
    if (file_exists($dirPath . $fileToDelete)) {
        if (unlink($dirPath . $fileToDelete)) {
            $_SESSION["check"] = TRUE;
            $_SESSION["errormessage"] = "File '$fileToDelete' has been deleted successfully.";
        } else {
            $_SESSION["check"] = FALSE;
            $_SESSION["errormessage"] = "Error deleting the file.";
        }
    } else {
        $_SESSION["check"] = FALSE;
        $_SESSION["errormessage"] = "File does not exist.";
    }
} else {
    $_SESSION["check"] = FALSE;
    $_SESSION["errormessage"] = "File not specified for deletion.";
}

header("Location: index.php");
?>