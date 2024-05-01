<?php
// Include file yang diperlukan
include "connection.php";

class Member {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllMembers() {
        $query = "SELECT * FROM members";
        $result = mysqli_query($this->conn, $query);

        $members = array();

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $member['id'] = $row['id'];
                $member['name'] = $row['name'];
                $member['email'] = $row['email'];
                $member['phone'] = $row['phone'];
                $member['join_date'] = $row['join_date'];
                
                // Example: Fetch associated posts
                $member['posts'] = $this->getMemberPosts($row['id']);

                $members[] = $member;
            }
        }

        return $members;
    }

    // Example method to fetch associated posts for a member
    private function getMemberPosts($memberId) {
        $query = "SELECT * FROM posts WHERE member_id = $memberId";
        $result = mysqli_query($this->conn, $query);

        $posts = array();

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $posts[] = $row;
            }
        }

        return $posts;
    }
}

?>
