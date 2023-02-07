<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style1.css">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-primary">Create a new task</h2>
        <a href="../index.php" class="text-decoration-none">Back</a>
    </div>
    <div class="container mt-4">
        <form action="../phpScript/create.php" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Title" name="title" required >
                <label for="floatingInput">Title</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Description" name="description" required >
                <label for="floatingPassword">Description</label>
            </div>
            <button type="input" name="create" class="create_crude btn btn-outline-primary my-3">Create Task</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>