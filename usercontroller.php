<?php
include_once '../config/database.php';
include_once '../models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register($name, $email, $password) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->password = $password;
        if ($this->user->create()) {
            echo json_encode(["message" => "User registered successfully."]);
        } else {
            echo json_encode(["message" => "Unable to register user."]);
        }
    }

    public function login($email, $password) {
        $user = $this->user->login($email, $password);
        if ($user) {
            echo json_encode(["message" => "Login successful.", "user" => $user]);
        } else {
            echo json_encode(["message" => "Invalid credentials."]);
        }
    }

    // Other user-related methods
}
?>
