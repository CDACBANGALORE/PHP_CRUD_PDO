<?php
    $pdo = include 'db_connect.php';

    try {
        $sno = 0;
        $sql = 'SELECT * FROM `crud_items`';
        
        $stmt = $pdo->query($sql);
        
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($items as $item) {?>
            <tr>
                <td>
                    <?php echo $sno; $sno += 1; ?>
                </td>
                <td>
                    <?php echo $item['title']; ?>
                </td>
                <td>
                    <?php echo $item['description']; ?>
                </td>
                <td>
                    <?php echo $item['created_at']; ?>
                </td>
                <td class="d-flex justify-content-center flex-wrap">
                    <button class="btn btn-sm btn-outline-primary m-1"><a class="text-decoration-none text-dark" href="operations/update.php?id=<?php echo $item['id']; ?>"><i class="bi bi-pencil-fill"></i></a></button>
                    <button class="btn btn-sm btn-outline-danger m-1"><a class="text-decoration-none text-dark" href="operations/delete.php?id=<?php echo $item['id']; ?>"><i class="bi bi-trash"></i></a></button>
                </td>
            </tr>
        <?php
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
