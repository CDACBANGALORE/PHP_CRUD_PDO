<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="">
        <?php
        if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; $_SESSION['message'] = null?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="container border border-1 py-3 mt-3 d-flex justify-content-between flex-wrap">
        <h2 class="text-info">PHP PDO CRUD</h2>
        <button type="button" class="create_crude btn btn-outline-info"><a href="./operations/create.php" class="text-decoration-none text-dark">New Task</a></button>
    </div>

    <div class="container">
        <h2 class="my-4 text-secondary">List of all tasks</h2>
        <table class="table table-bordered table-stripped">
            <thead class="bg-info text-light">
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php include_once('operations/fetch.php'); ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
