<?php
session_start();

/* =========================
   DATABASE CONNECTION
========================= */

$conn = mysqli_connect("localhost", "root", "", "nitya_hostel");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


/* =========================
   UPDATE FEEDBACK
========================= */

if (isset($_POST['update_feedback'])) {

    $old_student_name = $_POST['old_student_name'];

    $student_name     = $_POST['student_name'];
    $room_no          = $_POST['room_no'];
    $cleanliness      = $_POST['cleanliness'];
    $overall_rating   = $_POST['overall_rating'];
    $mobile_no        = $_POST['mobile_no'];
    $email_id         = $_POST['email_id'];
    $room_facilities  = $_POST['room_facilities'];
    $security         = $_POST['security'];
    $water_service    = $_POST['water_service'];
    $staff_respect    = $_POST['staff_respect'];
    $staff_etiquette  = $_POST['staff_etiquette'];
    $suggestions      = $_POST['suggestions'];


    $sql = "UPDATE feedback SET
            student_name = ?,
            room_no = ?,
            cleanliness = ?,
            overall_rating = ?,
            mobile_no = ?,
            email_id = ?,
            room_facilities = ?,
            security = ?,
            water_service = ?,
            staff_respect = ?,
            staff_etiquette = ?,
            suggestions = ?
            WHERE student_name = ?";


    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssss",
        $student_name,
        $room_no,
        $cleanliness,
        $overall_rating,
        $mobile_no,
        $email_id,
        $room_facilities,
        $security,
        $water_service,
        $staff_respect,
        $staff_etiquette,
        $suggestions,
        $old_student_name
    );


    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
                alert('Feedback updated successfully!');
                window.location.href='admin_dashboard.php';
              </script>";

        exit();

    } else {

        echo "<script>
                alert('Error updating feedback!');
              </script>";
    }
}


/* =========================
   GET EDIT DATA
========================= */

$edit_data = null;

if (isset($_GET['edit'])) {

    $student_name_edit = $_GET['edit'];

    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM feedback WHERE student_name = ? LIMIT 1"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $student_name_edit
    );

    mysqli_stmt_execute($stmt);

    $edit_result = mysqli_stmt_get_result($stmt);

    $edit_data = mysqli_fetch_assoc($edit_result);
}


/* =========================
   GET ALL FEEDBACK
========================= */

$result = mysqli_query(
    $conn,
    "SELECT * FROM feedback ORDER BY submitted_at DESC"
);

$total_feedback = mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Nitya Hostel - Admin Dashboard</title>


<style>

/* =========================
   GENERAL
========================= */

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 30px;
    font-family: Arial, sans-serif;

    background: linear-gradient(
        135deg,
        #0066cc,
        #667eea
    );
}


/* =========================
   HEADER
========================= */

.header {

    background: white;

    border-radius: 25px;

    padding: 25px 35px;

    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 30px;
}

.header h1 {

    margin: 0;

    color: #173b72;

    font-size: 30px;
}

.header p {

    margin: 5px 0 0;

    color: #555;

    font-size: 17px;
}


.logout {

    background: #dc3545;

    color: white;

    text-decoration: none;

    padding: 14px 25px;

    border-radius: 10px;

    font-weight: bold;
}


/* =========================
   CARDS
========================= */

.cards {

    display: flex;

    gap: 25px;

    margin-bottom: 30px;
}

.card {

    background: white;

    border-radius: 20px;

    padding: 25px;

    flex: 1;

    min-height: 120px;
}

.card h2 {

    margin: 0;

    color: #173b72;

    font-size: 28px;
}

.card p {

    margin-top: 10px;

    color: #555;

    font-size: 17px;
}


/* =========================
   EDIT BOX
========================= */

.edit-box {

    background: white;

    border-radius: 20px;

    padding: 30px;

    margin-bottom: 30px;
}

.edit-box h2 {

    color: #173b72;

    margin-top: 0;
}


.form-grid {

    display: grid;

    grid-template-columns:
    repeat(2, 1fr);

    gap: 18px;
}


.form-group {

    display: flex;

    flex-direction: column;
}


.form-group label {

    font-weight: bold;

    margin-bottom: 7px;

    color: #333;
}


.form-group input,
.form-group select,
.form-group textarea {

    padding: 12px;

    border: 1px solid #bbb;

    border-radius: 8px;

    font-size: 15px;

    outline: none;
}


.form-group textarea {

    min-height: 90px;

    resize: vertical;
}


.update-btn {

    margin-top: 25px;

    background: #198754;

    color: white;

    border: none;

    padding: 13px 25px;

    border-radius: 8px;

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;
}


.cancel-btn {

    display: inline-block;

    margin-left: 10px;

    background: #6c757d;

    color: white;

    text-decoration: none;

    padding: 13px 25px;

    border-radius: 8px;

    font-weight: bold;
}


/* =========================
   FEEDBACK BOX
========================= */

.feedback-box {

    background: white;

    border-radius: 20px;

    padding: 25px;
}

.feedback-box h2 {

    color: #173b72;

    margin-top: 0;
}


/* =========================
   TABLE
========================= */

.table-container {

    width: 100%;

    overflow-x: auto;
}


table {

    width: 100%;

    min-width: 1500px;

    border-collapse: collapse;
}


th {

    background: #174bb5;

    color: white;

    padding: 15px;

    text-align: left;

    white-space: nowrap;
}


td {

    background: white;

    padding: 15px;

    border-bottom: 1px solid #ddd;

    white-space: nowrap;
}


tr:hover td {

    background: #f5f7ff;
}


/* =========================
   EDIT BUTTON
========================= */

.edit-btn {

    background: #ffc107;

    color: black;

    padding: 9px 15px;

    border-radius: 7px;

    text-decoration: none;

    font-weight: bold;

    display: inline-block;
}


/* =========================
   MOBILE
========================= */

@media(max-width:700px) {

    body {
        padding: 15px;
    }

    .cards {
        flex-direction: column;
    }

    .header {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

}

</style>

</head>


<body>


<!-- =========================
     HEADER
========================= -->

<div class="header">

    <div>

        <h1>🏠 Nitya Hostel</h1>

        <p>Admin Dashboard</p>

    </div>


    <a href="logout.php"
       class="logout">

       🚪 Logout

    </a>

</div>



<!-- =========================
     DASHBOARD CARDS
========================= -->

<div class="cards">


    <div class="card">

        <h2>
            📊 <?php echo $total_feedback; ?>
        </h2>

        <p>
            Total Feedback Received
        </p>

    </div>


    <div class="card">

        <h2>
            ⭐ Feedback
        </h2>

        <p>
            Student Hostel Reviews
        </p>

    </div>


</div>



<!-- =========================
     EDIT FORM
========================= -->

<?php if ($edit_data) { ?>

<div class="edit-box">

    <h2>
        ✏️ Edit Student Feedback
    </h2>


    <form method="POST">


        <!-- OLD NAME -->

        <input type="hidden"
               name="old_student_name"
               value="<?php
               echo htmlspecialchars(
                   $edit_data['student_name']
               );
               ?>">


        <div class="form-grid">


            <!-- STUDENT NAME -->

            <div class="form-group">

                <label>
                    Student Name
                </label>

                <input type="text"
                       name="student_name"
                       value="<?php
                       echo htmlspecialchars(
                           $edit_data['student_name']
                       );
                       ?>"
                       required>

            </div>



            <!-- ROOM NO -->

            <div class="form-group">

                <label>
                    Room No
                </label>

                <input type="text"
                       name="room_no"
                       value="<?php
                       echo htmlspecialchars(
                           $edit_data['room_no']
                       );
                       ?>">

            </div>



            <!-- MOBILE -->

            <div class="form-group">

                <label>
                    Mobile No
                </label>

                <input type="text"
                       name="mobile_no"
                       value="<?php
                       echo htmlspecialchars(
                           $edit_data['mobile_no']
                       );
                       ?>">

            </div>



            <!-- EMAIL -->

            <div class="form-group">

                <label>
                    Email ID
                </label>

                <input type="email"
                       name="email_id"
                       value="<?php
                       echo htmlspecialchars(
                           $edit_data['email_id']
                       );
                       ?>">

            </div>



            <!-- CLEANLINESS -->

            <div class="form-group">

                <label>
                    Cleanliness
                </label>

                <select name="cleanliness">

                    <option value="Highly Satisfactory"
                    <?php
                    if (
                        $edit_data['cleanliness']
                        ==
                        "Highly Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Highly Satisfactory
                    </option>


                    <option value="Satisfactory"
                    <?php
                    if (
                        $edit_data['cleanliness']
                        ==
                        "Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Satisfactory
                    </option>


                    <option value="Unsatisfactory"
                    <?php
                    if (
                        $edit_data['cleanliness']
                        ==
                        "Unsatisfactory"
                    )
                        echo "selected";
                    ?>>
                        Unsatisfactory
                    </option>

                </select>

            </div>



            <!-- OVERALL RATING -->

            <div class="form-group">

                <label>
                    Overall Rating
                </label>

                <select name="overall_rating">

                    <?php

                    for ($i = 1; $i <= 5; $i++) {

                        ?>

                        <option value="<?php echo $i; ?>"
                        <?php

                        if (
                            $edit_data['overall_rating']
                            == $i
                        )
                            echo "selected";

                        ?>>

                            <?php echo $i; ?> ⭐

                        </option>

                        <?php
                    }

                    ?>

                </select>

            </div>



            <!-- ROOM FACILITIES -->

            <div class="form-group">

                <label>
                    Room Facilities
                </label>

                <select name="room_facilities">

                    <option value="Highly Satisfactory"
                    <?php
                    if (
                        $edit_data['room_facilities']
                        ==
                        "Highly Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Highly Satisfactory
                    </option>


                    <option value="Satisfactory"
                    <?php
                    if (
                        $edit_data['room_facilities']
                        ==
                        "Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Satisfactory
                    </option>


                    <option value="Unsatisfactory"
                    <?php
                    if (
                        $edit_data['room_facilities']
                        ==
                        "Unsatisfactory"
                    )
                        echo "selected";
                    ?>>
                        Unsatisfactory
                    </option>

                </select>

            </div>



            <!-- SECURITY -->

            <div class="form-group">

                <label>
                    Security
                </label>

                <select name="security">

                    <option value="Highly Satisfactory"
                    <?php
                    if (
                        $edit_data['security']
                        ==
                        "Highly Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Highly Satisfactory
                    </option>


                    <option value="Satisfactory"
                    <?php
                    if (
                        $edit_data['security']
                        ==
                        "Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Satisfactory
                    </option>


                    <option value="Unsatisfactory"
                    <?php
                    if (
                        $edit_data['security']
                        ==
                        "Unsatisfactory"
                    )
                        echo "selected";
                    ?>>
                        Unsatisfactory
                    </option>

                </select>

            </div>



            <!-- WATER SERVICE -->

            <div class="form-group">

                <label>
                    Water Service
                </label>

                <select name="water_service">

                    <option value="Highly Satisfactory"
                    <?php
                    if (
                        $edit_data['water_service']
                        ==
                        "Highly Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Highly Satisfactory
                    </option>


                    <option value="Satisfactory"
                    <?php
                    if (
                        $edit_data['water_service']
                        ==
                        "Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Satisfactory
                    </option>


                    <option value="Unsatisfactory"
                    <?php
                    if (
                        $edit_data['water_service']
                        ==
                        "Unsatisfactory"
                    )
                        echo "selected";
                    ?>>
                        Unsatisfactory
                    </option>

                </select>

            </div>



            <!-- STAFF RESPECT -->

            <div class="form-group">

                <label>
                    Staff Respect
                </label>

                <select name="staff_respect">

                    <option value="Always"
                    <?php
                    if (
                        $edit_data['staff_respect']
                        ==
                        "Always"
                    )
                        echo "selected";
                    ?>>
                        Always
                    </option>


                    <option value="Sometimes"
                    <?php
                    if (
                        $edit_data['staff_respect']
                        ==
                        "Sometimes"
                    )
                        echo "selected";
                    ?>>
                        Sometimes
                    </option>


                    <option value="Never"
                    <?php
                    if (
                        $edit_data['staff_respect']
                        ==
                        "Never"
                    )
                        echo "selected";
                    ?>>
                        Never
                    </option>

                </select>

            </div>



            <!-- STAFF ETIQUETTE -->

            <div class="form-group">

                <label>
                    Staff Etiquette
                </label>

                <select name="staff_etiquette">

                    <option value="Highly Satisfactory"
                    <?php
                    if (
                        $edit_data['staff_etiquette']
                        ==
                        "Highly Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Highly Satisfactory
                    </option>


                    <option value="Satisfactory"
                    <?php
                    if (
                        $edit_data['staff_etiquette']
                        ==
                        "Satisfactory"
                    )
                        echo "selected";
                    ?>>
                        Satisfactory
                    </option>


                    <option value="Unsatisfactory"
                    <?php
                    if (
                        $edit_data['staff_etiquette']
                        ==
                        "Unsatisfactory"
                    )
                        echo "selected";
                    ?>>
                        Unsatisfactory
                    </option>

                </select>

            </div>



            <!-- SUGGESTIONS -->

            <div class="form-group">

                <label>
                    Suggestions
                </label>

                <textarea
                    name="suggestions"><?php
                    echo htmlspecialchars(
                        $edit_data['suggestions']
                    );
                    ?></textarea>

            </div>


        </div>



        <button type="submit"
                name="update_feedback"
                class="update-btn">

            ✅ Update Feedback
</button>
<a href="admin_dashboard.php"
class="cancel-btn">

    Cancel
</a>
</form>
</div>
<?php } ?>

<!-- =========================
     STUDENT FEEDBACK TABLE
========================= -->

<div class="feedback-box">


    <h2>
        📝 Student Feedback
    </h2>


    <div class="table-container">


        <table>


            <tr>

                <th>Student Name</th>

                <th>Room No</th>

                <th>Cleanliness</th>

                <th>Overall Rating</th>

                <th>Submitted At</th>

                <th>Mobile No</th>

                <th>Email ID</th>

                <th>Room Facilities</th>

                <th>Security</th>

                <th>Water Service</th>

                <th>Staff Respect</th>

                <th>Staff Etiquette</th>

                <th>Suggestions</th>

                <th>Action</th>

            </tr>



            <?php

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

            ?>


            <tr>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['student_name']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['room_no']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['cleanliness']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['overall_rating']
                    );
                    ?>
                    ⭐
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['submitted_at']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['mobile_no']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['email_id']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['room_facilities']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['security']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['water_service']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['staff_respect']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['staff_etiquette']
                    );
                    ?>
                </td>


                <td>
                    <?php
                    echo htmlspecialchars(
                        $row['suggestions']
                    );
                    ?>
                </td>


                <td>

                    <a
                    href="admin_dashboard.php?edit=<?php
                    echo urlencode(
                        $row['student_name']
                    );
                    ?>"
                    class="edit-btn">

                    ✏️ Edit

                    </a>

                </td>


            </tr>


            <?php

                }

            } else {

            ?>

            <tr>

                <td colspan="14"
                    style="text-align:center;">

                    No feedback available.

                </td>

            </tr>

            <?php

            }

            ?>


        </table>

    </div>

</div>

</body>

</html>

