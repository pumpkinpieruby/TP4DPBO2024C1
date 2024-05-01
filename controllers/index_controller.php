<?php
include "connection.php";
include "member_model.php";
include "post_model.php";

$memberModel = new Member($conn);
$postModel = new Post($conn);

// Attempt to fetch members data
$members = $memberModel->getAllMembers();

// If there are no members, display an error message or handle it according to your application's requirements
if (empty($members)) {
    // Handle the case where no members are found
    echo "No members found.";
    // You can choose to exit here or proceed with displaying the page without members
    exit;
}

// Mendapatkan data postingan untuk setiap anggota
foreach ($members as &$member) {
    $member_id = $member['id'];
    $member['posts'] = $postModel->getPostsByMember($member_id);
}
?>
