<?php
include "connection.php";

$id = "";
$name = "";
$email = "";
$phone = "";
$member_posts = [];
$all_posts = [];

$error = "";
$success = "";

// Ambil semua postingan
$sql_all_posts = "SELECT * FROM posts";
$result_all_posts = $conn->query($sql_all_posts);
if ($result_all_posts->num_rows > 0) {
    while ($row = $result_all_posts->fetch_assoc()) {
        $all_posts[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("location:crud100/index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM members WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while (!$row) {
        header("location: crud100/index.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];

    // Ambil postingan yang terkait dengan anggota
    $sql_member_posts = "SELECT post_id FROM member_posts WHERE member_id='$id'";
    $result_member_posts = $conn->query($sql_member_posts);
    if ($result_member_posts->num_rows > 0) {
        while ($row = $result_member_posts->fetch_assoc()) {
            $member_posts[] = $row['post_id'];
        }
    }
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $posts = isset($_POST["posts"]) ? $_POST["posts"] : [];

    $sql = "UPDATE members SET name='$name', email='$email', phone='$phone' WHERE id='$id'";
    $result = $conn->query($sql);

    // Hapus postingan lama
    $sql_delete_posts = "DELETE FROM member_posts WHERE member_id='$id'";
    $conn->query($sql_delete_posts);

    // Tambahkan postingan yang baru
    foreach ($posts as $post_id) {
        $sql_add_post = "INSERT INTO member_posts (member_id, post_id) VALUES ('$id', '$post_id')";
        $conn->query($sql_add_post);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
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
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-lg-6 m-auto">
    <form method="post">
        <br><br><div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">Update Member</h1>
            </div><br>

            <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

            <label>NAME:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"> <br>

            <label>EMAIL:</label>
            <input type="text" name="email" value="<?php echo $email; ?>" class="form-control"> <br>

            <label>PHONE:</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control"> <br>

            <label>POSTS:</label>
            <select name="posts[]" multiple class="form-control">
                <?php foreach ($all_posts as $post) : ?>
                    <option value="<?php echo $post['id']; ?>" <?php echo in_array($post['id'], $member_posts) ? 'selected' : ''; ?>><?php echo $post['title']; ?></option>
                <?php endforeach; ?>
            </select> <br>

            <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
            <a class="btn btn-info" type="submit" name="cancel" href="index.php">Cancel</a><br>
        </div>
    </form>
</div>
</body>
</html>
