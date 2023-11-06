

<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #121212; /* Dark background color */
            color: #ffffff; /* White text color */
        }

        .card {
            background-color: #1e1e1e; /* Dark card background color */
            border: 1px solid #2d2d2d; /* Darker border color */
        }

        .list-group-item {
            background-color: #1e1e1e; /* Dark list item background color */
            border: 1px solid #2d2d2d; /* Darker border color */
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
</head>
<body>
<?php
session_start();

if (!isset($_SESSION["check"])){
    $_SESSION["check"] = "";
}


if ($_SESSION["check"] === TRUE) {

    $errorMessage = $_SESSION["errormessage"];

    echo '<script>
    Swal.fire({
        title: "Successfully",
        text: "' . $errorMessage . '",
        icon: "success",
        confirmButtonText: "Close"
    });
</script>';

    $_SESSION["check"] = "";
    $_SESSION["errormessage"] = "";

}

if ($_SESSION["check"] === FALSE) {

    $errorMessage = $_SESSION["errormessage"];

    echo '<script>
    Swal.fire({
        title: "Error",
        text: "' . $errorMessage . '",
        icon: "error",
        confirmButtonText: "Close"
    });
</script>';

    $_SESSION["check"] = "";
    $_SESSION["errormessage"] = "";
    
}
?>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Upload</h5>
            </div>
            <div class="card-body">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fileToUpload">Choose a File:</label>
                        <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" >Upload File</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">

            <div class="d-flex justify-content-between card-header">
                <h5 class="card-title">Files</h5>
                <a href="uploads/"><button class="btn btn-primary">Raw files</button></a>
            </div>

                <div class="card-body">
                    <div class="list-group">
                        <?php
                        $dirPath = "uploads/";
                        $files = scandir($dirPath);
                        foreach ($files as $file) {
                            $filePath = $dirPath . '/' . $file;
                            if (is_file($filePath)) {
                                echo '<div class="d-flex justify-content-between align-items-center list-group-item list-group-item-action">
                                    <h5 class="text-white">' . $file . '</h5>
                                    <div class="d-flex">
                                        <a href="' . $dirPath . '/' . $file . '" class="btn btn-success mr-2" download>Download</a>
                                        <a href="delete.php?file=' . $file . '" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>';
                            }
                        }
                        ?>
                    </div>
                </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@12.4.2/dist/sweetalert2.min.js"></script>

</body>
</html>
