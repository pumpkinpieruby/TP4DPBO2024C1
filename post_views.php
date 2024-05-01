<?php
// Include file yang diperlukan
include "connection.php";
include "models/post_model.php";

// Buat instance dari model post
$postModel = new Post($conn);

// Ambil semua post dari model
$posts = $postModel->getAllPosts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View Post</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Title</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post_views.php">Posts</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-4">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach((array)$posts as $post): ?>
            <tr>
                <td><?php echo isset($post['id']) ? $post['id'] : ''; ?></td>
                <td><?php echo isset($post['title']) ? $post['title'] : ''; ?></td>
                <td><?php echo isset($post['content']) ? $post['content'] : ''; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
