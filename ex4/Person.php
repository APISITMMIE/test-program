<?php
class Person {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllPersons() {
        $sql = "SELECT * FROM personal_data";
        $result = $this->db->query($sql);

        if ($result === false) {
            error_log($this->db->conn->error);
            return [];
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPersonById($id) {
        $sql = "SELECT * FROM personal_data WHERE id = ?";
        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            error_log($this->db->conn->error);
            return null;
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            error_log($stmt->error);
            return null;
        }

        return $result->fetch_assoc();
    }
}
?>
