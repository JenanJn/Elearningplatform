<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/courses' :
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . '/controllers/CourseController.php';
            $courseController = new CourseController();
            $courseController->listCourses();
        }
        break;
    case '/create-course' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/controllers/CourseController.php';
            $courseController = new CourseController();
            $courseController->createCourse($data->title, $data->description);
        }
        break;
    case '/lectures' :
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $course_id = $_GET['course_id'];
            require __DIR__ . '/controllers/LectureController.php';
            $lectureController = new LectureController();
            $lectureController->listLectures($course_id);
        }
        break;
    case '/create-lecture' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/controllers/LectureController.php';
            $lectureController = new LectureController();
            $lectureController->createLecture($data->course_id, $data->title, $data->content);
        }
        break;
    case '/update-progress' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/controllers/ProgressController.php';
            $progressController = new ProgressController();
            $progressController->updateProgress($data->user_id, $data->lecture_id, $data->progress_percentage);
        }
        break;
    case '/get-progress' :
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $user_id = $_GET['user_id'];
            $lecture_id = $_GET['lecture_id'];
            require __DIR__ . '/controllers/ProgressController.php';
            $progressController = new ProgressController();
            $progressController->getProgress($user_id, $lecture_id);
        }
        break;
    case '/enroll' :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"));
            require __DIR__ . '/controllers/UserController.php';
            $userController = new UserController();
            $userController->enrollCourse($data->user_id, $data->course_id);
        }
        break;
    // Add more routes as needed
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
?>
