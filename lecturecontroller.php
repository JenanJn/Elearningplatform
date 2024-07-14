<?php
include_once '../config/database.php';
include_once '../models/Lecture.php';

class LectureController {
    private $db;
    private $lecture;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->lecture = new Lecture($this->db);
    }

    public function listLectures($course_id) {
        $stmt = $this->lecture->readByCourse($course_id);
        $lectures = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($lectures);
    }

    public function createLecture($course_id, $title, $content) {
        $this->lecture->course_id = $course_id;
        $this->lecture->title = $title;
        $this->lecture->content = $content;
        if ($this->lecture->create()) {
            echo json_encode(["message" => "Lecture created successfully."]);
        } else {
            echo json_encode(["message" => "Unable to create lecture."]);
        }
    }

    // Other lecture-related methods
}
?>
