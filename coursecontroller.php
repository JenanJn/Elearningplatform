<?php
include_once '../config/database.php';
include_once '../models/Course.php';

class CourseController {
    private $db;
    private $course;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->course = new Course($this->db);
    }

    public function listCourses() {
        $stmt = $this->course->read();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($courses);
    }

    public function createCourse($title, $description) {
        $this->course->title = $title;
        $this->course->description = $description;
        if ($this->course->create()) {
            echo json_encode(["message" => "Course created successfully."]);
        } else {
            echo json_encode(["message" => "Unable to create course."]);
        }
    }

    // Other course-related methods
}
?>
