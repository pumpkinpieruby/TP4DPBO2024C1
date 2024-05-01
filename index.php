<?php
// Include file yang diperlukan
include "connection.php";
include "models/member_model.php";

// Buat instance dari model anggota
$memberModel = new Member($conn);

// Ambil data anggota dari model
$members = $memberModel->getAllMembers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
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
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary nav-link active" href="create.php">Add New</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>JOINING DATE</th>
            <th>POSTS</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach((array)$members as $member): ?>
            <tr>
                <td><?php echo $member['id']; ?></td>
                <td><?php echo $member['name']; ?></td>
                <td><?php echo $member['email']; ?></td>
                <td><?php echo $member['phone']; ?></td>
                <td><?php echo $member['join_date']; ?></td>
                <td>
                    <ul>
                        <?php foreach ($member['posts'] as $post): ?>
                            <li><?php echo $post['title']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </td>
                <td>
                    <a class="btn btn-success" href="edit.php?id=<?php echo $member['id']; ?>">Edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $member['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
