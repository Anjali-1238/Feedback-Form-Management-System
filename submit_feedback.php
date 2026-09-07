<?php

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $student_name = $_POST['student_name'];
    $mobile_no = $_POST['mobile_no'];
    $email_id = $_POST['email_id'];
    $room_no = $_POST['room_no'];
    $cleanliness = $_POST['cleanliness'];
    $room_facilities = $_POST['room_facilities'];
    $security = $_POST['security'];
    $water_service = $_POST['water_service'];
    $staff_respect = $_POST['staff_respect'];
    $staff_etiquette = $_POST['staff_etiquette'] ??'';
    $overall_rating = $_POST['overall_rating'];
    $suggestions = $_POST['suggestions'];

    $sql = "INSERT INTO feedback
    (student_name, mobile_no, email_id, room_no, cleanliness,
    room_facilities, security, water_service, staff_respect,
    staff_etiquette, overall_rating, suggestions)
    
    VALUES
    ('$student_name', '$mobile_no', '$email_id', '$room_no',
    '$cleanliness', '$room_facilities', '$security', '$water_service',
    '$staff_respect', '$staff_etiquette', '$overall_rating',
    '$suggestions')";

    if (mysqli_query($conn, $sql)) {

        echo "
        <div style='text-align:center; margin-top:100px; font-family:Arial;'>
            <h1>Thank You!</h1>
            <p>Your feedback has been submitted successfully.</p>
            <br>
            <a href='index.php'>Back to Feedback Form</a>
        </div>
        ";

    } else {

        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>