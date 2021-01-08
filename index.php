<?php
require 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
   <?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();


   ?>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
            <br>
            <a href="add.php" type="button" class="btn btn-success">Create New</a>
            <br>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=1;
                    if($result){
                        foreach($result as $value){
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $value['title'] ?></td>
                        <td><?= $value['description'] ?></td>
                        <td><?= date("Y-m-d", strtotime($value['created_at'])) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $value['id'] ?>" type="button" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $value['id'] ?>" type="button" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php  
                        $i++;   
                        }
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>