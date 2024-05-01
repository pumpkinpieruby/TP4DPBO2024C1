<?php
class Edit {
    private $conn;

    public function __construct($db_tp4) {
        $this->conn = $db_tp4;
    }

    public function getMember($id) {
        $query = "SELECT * FROM `members` WHERE id = '$id'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public function updateMember($id, $name, $email, $phone) {
        $query = "UPDATE `members` SET `name`='$name',`email`='$email',`phone`='$phone' WHERE id='$id'";
        if(mysqli_query($this->conn, $query)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
