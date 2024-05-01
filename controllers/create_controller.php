<?php
include "connection.php";
include "member.php";
include "post.php";

// Check if form is submitted
if(isset($_POST['submit'])){
    // Create instances of Member and Post models
    $member = new Member($conn);
    $post = new Post($conn);

    // Extract data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Add member
    $memberAdded = $member->addMember($name, $email, $phone);

    // If member added successfully, add post
    if($memberAdded) {
        $member_id = mysqli_insert_id($conn); // Get ID of newly inserted member
        $postAdded = $post->addPost($title, $content, $member_id);
        if($postAdded) {
            echo "Member and Post added successfully!";
        } else {
            echo "Failed to add post.";
        }
    } else {
        echo "Failed to add member.";
    }
}
?>
