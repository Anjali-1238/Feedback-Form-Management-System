<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Feedback Form</title>

    <link rel="stylesheet" href="feedback.css">
</head>

<body>

<div class="feedback-box">

    <h1>Hostel Student Feedback Form</h1>

    <p class="intro">
        Please provide your valuable feedback about the hostel facilities.
    </p>

    <form action="submit_feedback.php" method="POST">

        <label>Student Name</label>
        <input type="text" name="student_name" placeholder="Enter your name" required>


        <label>Email</label>
        <input type="email" name="student_email" placeholder="Enter your email" required>


        <label>Room Number</label>
        <input type="text" name="room_no" placeholder="Enter room number" required>


        <label>Cleanliness</label>

        <select name="cleanliness" required>
            <option value="">Select Rating</option>
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
        </select>


        <label>Food Quality</label>

        <select name="food_quality" required>
            <option value="">Select Rating</option>
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
        </select>


        <label>Staff Communication</label>

        <select name="staff_communication" required>
            <option value="">Select Rating</option>
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
        </select>


        <label>Hostel Environment</label>

        <select name="hostel_environment" required>
            <option value="">Select Rating</option>
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Poor">Poor</option>
        </select>


        <label>Suggestions / Comments</label>

        <textarea
            name="suggestions"
            placeholder="Write your suggestions here..."
            rows="5"></textarea>


        <button type="submit">
            Submit Feedback
        </button>

    </form>

</div>

</body>
</html>