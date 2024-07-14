document.addEventListener('DOMContentLoaded', () => {
    // Function to update progress
    function updateProgress(user_id, lecture_id, progress_percentage) {
        fetch('http://localhost/e-learning-platform/backend/index.php/update-progress', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ user_id, lecture_id, progress_percentage })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                // Optionally update UI after progress update
            });
    }

    // Function to get progress
    function getProgress(user_id, lecture_id) {
        fetch(`http://localhost/e-learning-platform/backend/index.php/get-progress?user_id=${user_id}&lecture_id=${lecture_id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data.progress_percentage);
                // Update UI with progress information (if needed)
            });
    }

    // Function to enroll in a course
    function enrollCourse(user_id, course_id) {
        fetch('http://localhost/e-learning-platform/backend/index.php/enroll', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ user_id, course_id })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                // Optionally update UI after enrollment
            });
    }

    // Function to load courses
    function loadCourses() {
        fetch('http://localhost/e-learning-platform/backend/index.php/courses')
            .then(response => response.json())
            .then(data => {
                const coursesContainer = document.getElementById('courses');
                coursesContainer.innerHTML = '';
                data.forEach(course => {
                    const courseElement = document.createElement('div');
                    courseElement.className = 'course';
                    courseElement.innerHTML = `
                        <h2>${course.title}</h2>
                        <p>${course.description}</p>
                        <button class="enroll-course" data-course-id="${course.id}">Enroll</button>
                    `;
                    coursesContainer.appendChild(courseElement);
                });

                // Add event listener for course enrollment
                document.querySelectorAll('.enroll-course').forEach(button => {
                    button.addEventListener('click', (event) => {
                        const courseId = event.target.getAttribute('data-course-id');
                        const userId = 1; // Replace with actual user ID
                        enrollCourse(userId, courseId);
                    });
                });
            });
    }

    // Function to load lectures for a course
    function loadLectures(courseId) {
        fetch(`http://localhost/e-learning-platform/backend/index.php/lectures?course_id=${courseId}`)
            .then(response => response.json())
            .then(data => {
                const lecturesContainer = document.getElementById('lectures');
                lecturesContainer.innerHTML = '';
                data.forEach(lecture => {
                    const lectureElement = document.createElement('div');
                    lectureElement.className = 'lecture';
                    lectureElement.innerHTML = `
                        <h2>${lecture.title}</h2>
                        <p>${lecture.content}</p>
                        <button class="complete-lecture" data-lecture-id="${lecture.id}">Complete Lecture</button>
                    `;
                    lecturesContainer.appendChild(lectureElement);
                });

                // Add event listener for completing lectures
                document.querySelectorAll('.complete-lecture').forEach(button => {
                    button.addEventListener('click', (event) => {
                        const lectureId = event.target.getAttribute('data-lecture-id');
                        const userId = 1; // Replace with actual user ID
                        const progressPercentage = 100; // Assuming completion marks 100%
                        updateProgress(userId, lectureId, progressPercentage);
                    });
                });
            });
    }

    // Example usage:
    const userId = 1; // Replace with actual user ID

    // Load courses when the page loads
    loadCourses();

    // Simulate getting progress for a lecture
    const lectureId = 1; // Replace with actual lecture ID
    getProgress(userId, lectureId);
});
