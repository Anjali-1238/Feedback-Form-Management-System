<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hostel Feedback System</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f3ff, #eef6ff);
            color: #172554;
            min-height: 100vh;
        }

        /* HEADER */

        .header {
            display: flex;
            align-items: center;
            padding: 25px 7%;
        }

        .house {
            width: 65px;
            height: 65px;
            background: #e0e7ff;
            border-radius: 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 38px;
            margin-right: 15px;
        }

        .header h1 {
            font-size: 32px;
            color: #172554;
        }

        .header p {
            margin-top: 5px;
            color: #64748b;
            font-size: 14px;
        }

        /* FEEDBACK MESSAGE */

        .top-message {
            position: absolute;
            right: 7%;
            top: 45px;

            color: #312e81;
            font-size: 17px;
            font-weight: bold;
            font-style: italic;
            transform: rotate(-5deg);
        }

        /* MAIN */

        .main {
            text-align: center;
            padding: 25px 20px 55px;
        }

        .main h2 {
            font-size: 43px;
            margin-bottom: 12px;

            background: linear-gradient(
                90deg,
                #2563eb,
                #4f46e5,
                #7c3aed
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .main-text {
            color: #64748b;
            font-size: 17px;
            margin-bottom: 15px;
        }

        .heart {
            color: #7c3aed;
            font-size: 25px;
            margin-bottom: 35px;
        }

        /* CARDS */

        .cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card {
            width: 360px;
            min-height: 330px;

            padding: 28px;

            border-radius: 20px;

            background: rgba(255,255,255,0.9);

            box-shadow: 0 12px 35px rgba(30,41,59,0.13);

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
        }

        .feedback-card {
            border: 2px solid #c4b5fd;
            background: #faf5ff;
        }

        .admin-card {
            border: 2px solid #93c5fd;
            background: #eff6ff;
        }

        /* ICON */

        .icon {
            width: 100px;
            height: 100px;

            margin: 0 auto 18px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 55px;
        }

        .feedback-icon {
            background: #ede9fe;
        }

        .admin-icon {
            background: #dbeafe;
        }

        /* CARD CONTENT */

        .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #172554;
        }

        .card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 22px;
        }

        /* BUTTON */

        .btn {
            display: inline-block;

            padding: 12px 25px;

            color: white;

            text-decoration: none;

            border-radius: 25px;

            font-size: 14px;

            font-weight: bold;
        }

        .feedback-btn {
            background: linear-gradient(
                90deg,
                #7c3aed,
                #4f46e5
            );
        }

        .admin-btn {
            background: linear-gradient(
                90deg,
                #2563eb,
                #0ea5e9
            );
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* SIDE MESSAGE */

        .side-message {
            position: absolute;
            right: 5%;
            bottom: 100px;

            width: 130px;

            color: #312e81;

            font-size: 16px;

            font-weight: bold;

            font-style: italic;

            text-align: center;

            transform: rotate(-5deg);
        }

        /* FOOTER */

        .footer {
            background: #172554;
            color: white;

            text-align: center;

            padding: 18px;

            font-size: 13px;
        }

        /* MOBILE */

        @media (max-width: 800px) {

            .top-message,
            .side-message {
                display: none;
            }

            .header {
                padding: 20px;
            }

            .main h2 {
                font-size: 31px;
            }

            .card {
                width: 90%;
            }
        }

    </style>
</head>


<body>

    <!-- HEADER -->

    <div class="header">

        <div class="house">
            🏠
        </div>

        <div>
            <h1>Nitya Hostel</h1>

            <p>
                Better Feedback | Better Hostel | Happier Students
            </p>
        </div>

    </div>


    <!-- TOP MESSAGE -->

    <div class="top-message">
        Your Feedback<br>
        Matters!
    </div>


    <!-- MAIN CONTENT -->

    <div class="main">

        <h2>
            Welcome to Hostel Feedback System
        </h2>

        <p class="main-text">
            Share your feedback and help us improve our hostel services.
        </p>

        <div class="heart">
            ─── ♥ ───
        </div>


        <!-- TWO CARDS -->

        <div class="cards">


            <!-- HOSTEL FEEDBACK -->

            <div class="card feedback-card">

                <div class="icon feedback-icon">
                    📝
                </div>

                <h3>
                    Hostel Feedback Form
                </h3>

                <p>
                    Share your experience, suggestions and
                    feedback about hostel facilities.
                </p>

                <a href="index.php" class="btn feedback-btn">
                    Go to Feedback Form →
                </a>

            </div>


            <!-- ADMIN LOGIN -->

            <div class="card admin-card">

                <div class="icon admin-icon">
                    🔐
                </div>

                <h3>
                    Admin Login
                </h3>

                <p>
                    Admin can login to view and manage
                    student feedback records.
                </p>

                <a href="admin_login.php" class="btn admin-btn">
                    Login Here →
                </a>

            </div>


        </div>

    </div>


    <!-- SIDE MESSAGE -->

    <div class="side-message">
        Your Voice<br>
        Builds a<br>
        Better Hostel
    </div>


    <!-- FOOTER -->

    <div class="footer">
        © 2026 Nitya Hostel. All rights reserved.
    </div>


</body>
</html>