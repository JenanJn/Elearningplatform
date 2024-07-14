<?php
include_once '../config/database.php';
include_once '../models/Progress.php';

class ProgressController {
    private $db;
    private $progress;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->progress = new Progress($this->db);
    }

    public function updateProgress($user_id, $lecture_id, $progress_percentage) {
        if ($this->progress->updateProgress($user_id, $lecture_id, $progress_percentage)) {
            echo json_encode(["message" => "Progress updated successfully."]);
        } else {
            echo json_encode(["message" => "Unable to update progress."]);
        }
    }

    public function getProgress($user_id, $lecture_id) {
        $progress = $this->progress->getProgress($user_id, $lecture_id);
        echo json_encode(["progress_percentage" => $progress]);
    }

    // Other progress-related methods
}
?>
