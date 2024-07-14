# E-Learning Platform

Welcome to our E-Learning Platform project! This platform allows users to browse courses, enroll in them, track their progress through lectures, and update their learning status in real-time. Below, you'll find information on how to set up and use this platform effectively.

## Features

- **Course Management**: Browse and enroll in available courses.
- **Lecture Viewing**: View lectures associated with enrolled courses.
- **Progress Tracking**: Track progress through lectures with real-time updates.
- **Interactive Learning**: Engage with interactive content and quizzes (future enhancement).

## Technologies Used

- **Backend**: PHP with PDO for database interactions.
- **Frontend**: HTML, CSS, JavaScript (AJAX for API communication).
- **Database**: MySQL for storing user data, courses, lectures, and progress tracking.

1. **Database Setup:**

- Import the `schema.sql` file into your MySQL database to create necessary tables.
- Update `config/database.php` with your MySQL database credentials.

2. **Configure the Backend:**

- Ensure your web server (e.g., Apache, Nginx) is set up to run PHP scripts.
- Adjust `index.php`, `coursecontroller.php`, `lecturecontroller.php`, `progresscontroller.php`, `usercontroller.php`, and other PHP files as needed based on your server environment.

3. **Run the Application:**

- Start your local server (e.g., XAMPP, MAMP).
- Access the application through your web browser (`http://localhost/e-learning-platform`).

4. **Usage:**

- Open `index.html` in your browser to view and interact with available courses and lectures.
- Enroll in courses, view lectures, and complete lectures to update your progress.
- Use the provided JavaScript (`scripts.js`) for additional interactions and functionality.

## Acknowledgments

- Inspired by the need for accessible and interactive online learning platforms.
