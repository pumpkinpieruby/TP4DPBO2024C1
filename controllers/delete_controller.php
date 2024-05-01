<?php
include "connection.php";
include "delete_model.php";

if(isset($_GET['id'])) {
    $delete = new Delete($conn);
    $id = $_GET['id'];

    if($delete->deleteMember($id)) {
        echo "Member deleted successfully!";
    } else {
        echo "Failed to delete member.";
    }
}
?>
