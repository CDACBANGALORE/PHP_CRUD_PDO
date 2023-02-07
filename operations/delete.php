<?php
    session_start();
    $pdo = include "../db_connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET["id"];
        $sql = "DELETE FROM `crud_items` WHERE `id`=:id";
        $stmt = $pdo->prepare($sql);
        $data = [
            ":id" => $id
        ];
        $result = $stmt->execute($data);
        
        if($result) {
            $_SESSION['message'] = "Task deleted successfully";
            header('Location: ../index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Task can not be deleted";
            header('Location: ../index.php');
            exit(1);
        }
    }
    try {

    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    
?>