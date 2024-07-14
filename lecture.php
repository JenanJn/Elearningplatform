<?php
class Lecture {
    private $conn;
    private $table_name = "lectures";

    public $id;
    public $course_id;
    public $title;
    public $content;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readByCourse($course_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE course_id = :course_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":course_id", $course_id);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET course_id=:course_id, title=:title, content=:content";
        $stmt = $this->conn->prepare($query);

        $this->course_id = htmlspecialchars(strip_tags($this->course_id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars($this->content);

        $stmt->bindParam(":course_id", $this->course_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Other CRUD operations
}
?>
