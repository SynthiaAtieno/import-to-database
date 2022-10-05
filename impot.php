<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel file import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">

        <?php
        if(isset($_SESSION['message']))
        {
            echo '<h4>'.$_SESSION['message'].'</h4>';
            unset($_SESSION['message']);
        }

        ?>
            <div class="col-md-12 mt-4">
            <h1>Importing excel file into MYSQL database</h1>
            </div>
            <div class="card-body">
                <form action="house.php" method="POST" enctype="multipart/form-data"> 
                    <input type="file" name="import_file" class="form-control">
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Import</button>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>