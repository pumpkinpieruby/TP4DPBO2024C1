<?php
class Post {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllPosts() {
        $sql = "SELECT * FROM posts";
        $result = $this->conn->query($sql);
        $posts = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        }
        return $posts;
    }
}
?>
