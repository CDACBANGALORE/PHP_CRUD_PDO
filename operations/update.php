<?php
session_start();
$pdo = include_once "../db_connect.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD || Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style1.css">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-primary">Update the task</h2>
        <a href="../index.php" class="text-decoration-none">Back</a>
    </div>

    <?php
    try {
        if (isset($_POST['update'])) {
            $updateId = $_POST['id'];
            $newTitle = $_POST['title'];
            $newDescription = $_POST['description'];

            $sql = "UPDATE `crud_items` SET `title` = :title, `description` = :description WHERE `id` = :updateId";
            $stmt = $pdo->prepare($sql);
            $data = [
                ":updateId" => $updateId,
                ":title" => $newTitle,
                ":description" => $newDescription
            ];
            $result = $stmt->execute($data);

            if ($result) {
                $_SESSION['message'] = 'Task updated successfully';
                header('Location: ../index.php');
                exit(0);
            } else {
                $_SESSION['message'] = 'Task can not be updated';
                header('Location: ../index.php');
                exit(1);
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    try {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = 'SELECT * FROM `crud_items` WHERE `id`=:id';
            $stmt = $pdo->prepare($sql);
            $data = [
                ':id' => $id
            ];
            $stmt->execute($data);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>
    <div class="container mt-4">
        <form action="#" method="post">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Title" name="title" value="<?php echo $result->title; ?>" required>
                <label for="floatingInput">Title</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Description" value="<?php echo $result->description; ?>" name="description" required>
                <label for="floatingPassword">Description</label>
            </div>
            <button type="input" name="update" class="create_crude btn btn-outline-primary my-3">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>