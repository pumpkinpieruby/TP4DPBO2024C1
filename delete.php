<?php
    include "connection.php";
    
    // Check if the 'id' parameter is set in the URL
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        // Check if the 'confirm' parameter is set indicating the user confirmed the deletion
        if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
            // User confirmed deletion, proceed with deleting the member
            $sql = "DELETE FROM `members` WHERE id=$id";
            $conn->query($sql);
            
            // Redirect to index.php after deletion
            header('Location: index.php');
            exit;
        }
    }

    // If the 'id' parameter is set but 'confirm' is not, display the confirmation popup
    if(isset($_GET['id'])){
        echo "<script>
                if(confirm('Are you sure you want to delete this member?')) {
                    // User confirmed deletion, redirect with 'confirm=true' parameter
                    window.location.href = 'delete.php?id=$id&confirm=true';
                } else {
                    // User canceled deletion, redirect to index.php
                    window.location.href = 'index.php';
                }
              </script>";
    } else {
        // If 'id' parameter is not set, redirect to index.php
        header('Location: index.php');
        exit;
    }
?>
