<?php
    session_start();
    
    $pdo = include "../db_connect.php";

    try {
        if(isset($_POST['create'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
    
            $sql = "INSERT INTO `crud_items`(`title`, `description`) VALUES (:title, :description)";
    
            // prepare the statement
            $stmt = $pdo->prepare($sql);
    
            //bind values
            $data = [
                ":title" => $title,
                ":description" => $description
            ];
    
            // execute the query
            $result = $stmt->execute($data);
    
            if($result) {
                $_SESSION['message'] = 'New task created successfully';
                header('Location: ../index.php');
                exit(0);
            }
            else {
                $_SESSION['message'] = 'Failed to create new task';
                header('Location: ../index.php');
                exit(1);
            }
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>