<?php
session_start();

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {

        $_SESSION['admin'] = $username;

        header("Location: admin_dashboard.php");
        exit();

    } else {

        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nitya Hostel - Admin Login</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;

            font-family: Arial, sans-serif;

            min-height: 100vh;

            background: linear-gradient(
                135deg,
                #0759d9,
                #3828c7,
                #a927d5
            );

            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* MAIN BOX */

        .main-box {
            width: 1000px;
            height: 620px;

            display: flex;

            background: white;

            border-radius: 25px;

            overflow: hidden;

            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }


        /* ================= LEFT ================= */

        .left {
            width: 50%;

            padding: 50px;

            background: linear-gradient(
                145deg,
                #064fd0,
                #3526b5
            );

            color: white;

            position: relative;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;

            color: white;
        }

        .system-name {
            font-size: 17px;

            color: white;

            margin-top: 8px;
        }

        .welcome {
            margin-top: 75px;
        }

        .welcome h1 {
            font-size: 38px;

            color: white;

            margin: 0 0 18px 0;
        }

        .welcome p {
            font-size: 18px;

            color: white;

            line-height: 1.6;

            width: 390px;
        }

        .hostel {
            position: absolute;

            bottom: 55px;

            left: 50%;

            transform: translateX(-50%);

            text-align: center;
        }

        .building {
            font-size: 130px;
        }

        .hostel-title {
            background: #171452;

            color: white;

            font-weight: bold;

            padding: 10px 30px;

            border-radius: 5px;

            font-size: 18px;
        }


        /* ================= RIGHT ================= */

        .right {
            width: 50%;

            background: white;

            padding: 50px 65px;

            display: flex !important;

            flex-direction: column !important;

            justify-content: center !important;

            align-items: stretch !important;

            visibility: visible !important;

            opacity: 1 !important;

            color: #17213d !important;

            position: relative;

            z-index: 10;
        }


        .login-icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 18px auto;

            border-radius: 50%;

            background: #f0eaff;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 40px;

            visibility: visible !important;
        }


        .right h2 {
            display: block !important;

            visibility: visible !important;

            opacity: 1 !important;

            color: #17213d !important;

            text-align: center;

            font-size: 36px;

            margin: 0 0 10px 0;
        }


        .description {
            display: block !important;

            visibility: visible !important;

            opacity: 1 !important;

            color: #777 !important;

            text-align: center;

            font-size: 16px;

            margin: 0 0 30px 0;
        }


        /* ERROR */

        .error {
            display: block !important;

            background: #ffe3e3;

            color: #d00000 !important;

            padding: 12px;

            text-align: center;

            border-radius: 8px;

            margin-bottom: 15px;
        }


        /* FORM */

        .login-form {
            display: block !important;

            visibility: visible !important;

            opacity: 1 !important;
        }


        .login-form label {
            display: block !important;

            color: #202742 !important;

            font-size: 16px;

            font-weight: bold;

            margin-bottom: 8px;
        }


        .login-form input {
            display: block !important;

            visibility: visible !important;

            opacity: 1 !important;

            width: 100%;

            height: 52px;

            padding: 0 15px;

            border: 2px solid #ddd6ff;

            border-radius: 10px;

            background: white !important;

            color: #222 !important;

            font-size: 16px;

            outline: none;

            margin-bottom: 20px;
        }


        .login-form input:focus {
            border-color: #6535df;
        }


        /* LOGIN BUTTON */

        .login-button {
            display: block !important;

            visibility: visible !important;

            opacity: 1 !important;

            width: 100%;

            height: 54px;

            border: none;

            border-radius: 10px;

            background: linear-gradient(
                90deg,
                #5931df,
                #bd2bd3
            ) !important;

            color: white !important;

            font-size: 18px;

            font-weight: bold;

            cursor: pointer;

            margin-top: 5px;
        }


        .login-button:hover {
            opacity: 0.9 !important;
        }


        /* OR */

        .or {
            display: flex !important;

            visibility: visible !important;

            opacity: 1 !important;

            align-items: center;

            gap: 10px;

            color: #888 !important;

            margin: 22px 0;
        }

        .or::before,
        .or::after {
            content: "";

            height: 1px;

            background: #ddd;

            flex: 1;
        }


        /* STUDENT BUTTON */

        .student-button {
            display: block !important;

            visibility: visible !important;

            opacity: 1 !important;

            width: 100%;

            height: 52px;

            background: white !important;

            color: #6334dc !important;

            border: 2px solid #ded5ff;

            border-radius: 10px;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }


        .student-button:hover {
            background: #f6f2ff !important;
        }


        /* MOBILE */

        @media(max-width:800px) {

            .main-box {
                width: 95%;
                height: auto;

                flex-direction: column;
            }

            .left,
            .right {
                width: 100%;
            }

            .left {
                height: 450px;
            }

            .right {
                padding: 40px 30px;
            }
        }

    </style>

</head>

<body>


<div class="main-box">


    <!-- LEFT SIDE -->

    <div class="left">

        <div class="logo">
            🏠 Nitya Hostel
        </div>

        <div class="system-name">
            Hostel Feedback System
        </div>


        <div class="welcome">

            <h1>Welcome Back!</h1>

            <p>
                Login to your admin account
                to manage hostel feedback.
            </p>

        </div>


        <div class="hostel">

            <div class="building">
                🏢
            </div>

            <div class="hostel-title">
                NITYA HOSTEL
            </div>

        </div>

    </div>


    <!-- RIGHT SIDE -->

    <div class="right">


        <div class="login-icon">
            🔒
        </div>


        <h2>
            Admin Login
        </h2>


        <p class="description">
            Enter your credentials to access the dashboard
        </p>


        <?php

        if ($error != "") {

            echo "<div class='error'>$error</div>";

        }

        ?>


        <form method="POST" class="login-form">


            <label>
                Username
            </label>

            <input
                type="text"
                name="username"
                placeholder="Enter username"
                required
            >


            <label>
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Enter password"
                required
            >


            <button
                type="submit"
                name="login"
                class="login-button"
            >

                ➜ &nbsp; Login

            </button>


        </form>


        <div class="or">
            <span>or</span>
        </div>


        <button
            type="button"
            class="student-button"
            onclick="window.location.href='feedback.php'"
        >

            🛡️ &nbsp; Go to Student Feedback

        </button>


    </div>

</div>


</body>
</html>