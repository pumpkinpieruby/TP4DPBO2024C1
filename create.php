<?php
include "connection.php";

if(isset($_POST['submit'])){
    // Tambahkan anggota baru
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $q = "INSERT INTO `members`(`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone')";
    $query = mysqli_query($conn, $q);

    // Dapatkan ID anggota yang baru saja ditambahkan
    $member_id = mysqli_insert_id($conn);

    // Tambahkan pos baru yang terkait dengan anggota yang sesuai
    $title = $_POST['title'];
    $content = $_POST['content'];
    $q = "INSERT INTO `posts`(`title`, `content`, `member_id`) VALUES ('$title', '$content', '$member_id')";
    $query = mysqli_query($conn, $q);
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
        <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php"><span style="font-size:larger;">Add New</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-primary">
 <h1 class="text-white text-center">  Create New Member & Post </h1>
 </div><br>

 <label> Member Name: </label>
 <input type="text" name="name" class="form-control"> <br>

 <label> Member Email: </label>
 <input type="text" name="email" class="form-control"> <br>

 <label> Member Phone: </label>
 <input type="text" name="phone" class="form-control"> <br>

 <label> Post Title: </label>
 <input type="text" name="title" class="form-control"> <br>

 <label> Post Content: </label>
 <textarea name="content" class="form-control"></textarea> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

 </div>
 </form>
 </div>
 
</body>
</html>
