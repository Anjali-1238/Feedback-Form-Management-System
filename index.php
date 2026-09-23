<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nitya Hostel - Feedback Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>🏠 Nitya Girl's Hostel</h1>
        <p>Hostel Feedback Form</p>
        <span>Your feedback helps us improve hostel facilities
            and provide a better living experience.</span>
    </div>

    <form action="submit_feedback.php" method="POST">

        <div class="section">
            <h2>👨‍🎓Student Information</h2>
            <label>Student Name</label>
            <input type="text" name="student_name" placeholder="Enter your full name" required>

            <label>Mobile Number</label>
            <input type="text" name="mobile_no" placeholder="Enter your mobile number" required>

            <label>Email ID</label>
            <input type="email" name="email_id" placeholder="Enter your email address" required>

            <label>Room Number</label>
            <input type="text" name="room_no" placeholder="Enter your room number" required>
        </div>


        <div class="section">
            <h2>🏠Hostel Services</h2>

            <label>How is the cleanliness of the hostel?</label>
            <select name="cleanliness" required>
                <option value="">Select an option</option>
                <option>Highly Satisfactory</option>
                <option>Satisfactory</option>
                <option>Unsatisfactory</option>
                <option>Very Poor</option>
            </select>

            <label>How are the facilities provided in the hostel rooms?</label>
            <select name="room_facilities" required>
                <option value="">Select an option</option>
                <option>Highly Satisfactory</option>
                <option>Satisfactory</option>
                <option>Unsatisfactory</option>
                <option>Very Poor</option>
            </select>

            <label>How is the security condition of the hostel?</label>
            <select name="security" required>
                <option value="">Select an option</option>
                <option>Highly Satisfactory</option>
                <option>Satisfactory</option>
                <option>Unsatisfactory</option>
                <option>Very Poor</option>
            </select>

            <label>What is your overall opinion about the water service?</label>
            <select name="water_service" required>
                <option value="">Select an option</option>
                <option>Highly Satisfactory</option>
                <option>Satisfactory</option>
                <option>Unsatisfactory</option>
                <option>Very Poor</option>
            </select>
        </div>


        <div class="section">
            <h2>🤵🏻‍♂️Staff Behaviour</h2>

            <label>Did the hostel staff treat you respectfully?</label>
            <select name="staff_respect" required>
                <option value="">Select an option</option>
                <option>Always</option>
                <option>Sometimes</option>
                <option>Rarely</option>
                <option>Never</option>
            </select>

            <label>Did the staff maintain proper etiquette while communicating with you?</label>
            <select name="staff_etiquette" required>
                <option value="">Select an option</option>
                <option>Highly Satisfactory</option>
                <option>Satisfactory</option>
                <option>Unsatisfactory</option>
                <option>Very Poor</option>
            </select>
        </div>


        <div class="section">
            <h2>☺️Overall Feedback</h2>

            <label>Overall Rating</label>
            <select name="overall_rating" required>
                <option value="">Select rating</option>
                <option value="5">🌟🌟🌟🌟🌟 - Excellent🤩</option>
                <option value="4">🌟🌟🌟🌟 - Very Good😄</option>
                <option value="3">🌟🌟🌟 - Good😊</option>
                <option value="2">🌟🌟- Need Improvement😐</option>
                <option value="1">🌟 - Poor😔</option>
            </select>

            <label>What are your thoughts and suggestions about hostel management?</label>
            <textarea name="suggestions" rows="5"
                placeholder="Write your suggestions here..."></textarea>
        </div>

        <button type="submit">Submit Feedback</button>

    </form>

    <div class="footer">
        © 2026 Nitya Hostel | Student Feedback System
    </div>

</div>

</body>
</html>