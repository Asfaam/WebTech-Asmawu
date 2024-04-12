<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userdashboard.css">
    <style>
        
        .dashboard-options {
            margin-top: 20px;
        }
        .dashboard-options ul {
            list-style-type: none;
            padding: 0;
        }
        .dashboard-options ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
       
        <h1>Welcome User</h1>
    </header>

    <nav class="sidemenu">
        <div class="sidebar">
            <h2>User Dashboard</h2>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="loan_details.html">Loan Details</a></li>
                <li><a href="payment_processing.html">Payment Processing</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="reports_and_analytics.html">Reports and Analytics</a></li>
                <li><a href="loan_application.html">Loan Applications</a></li>
                <li><a href="application_status.html">Application Status</a></li>
                <li><a href="registerpage.html">Logout</a></li>
                li><a href="welcomepage.php" class="nav-link">Account</a></li>
            </ul>
        </div>
    </nav>

    <div class="main-content">

        <div class="dashboard-options">
            <h3>Overview:</h3>
            <ul>
                <li>Overview of active loans, including loan balances, repayment schedules, and upcoming payments.</li>
                <li>Options to request loan modifications or view payment history.</li>
            </ul>
        
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Microfinance. All rights reserved.</p>
    </footer>
</body>
</html>
