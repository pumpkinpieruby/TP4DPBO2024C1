<?php
include "connection.php";
include "edit_model.php";

if(isset($_POST['submit'])) {
    $edit = new Edit($conn);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($edit->updateMember($id, $name, $email, $phone)) {
        echo "Member updated successfully!";
    } else {
        echo "Failed to update member.";
    }
}
?>
