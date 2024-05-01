<?php
class Delete {
    private $conn;

    public function __construct($db_tp4) {
        $this->conn = $db_tp4;
    }

    public function deleteMember($id) {
        $query = "DELETE FROM `members` WHERE id = '$id'";
        if(mysqli_query($this->conn, $query)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
