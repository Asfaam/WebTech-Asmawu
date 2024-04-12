<?php
    require_once __DIR__ . '/../queries/query.php';

    $connect = new Microfinance;
    $connect->db_connect();

    $connect->totalLoans();
    $total = $connect->db_fetch()[0]['total'];

    $connect->activeLoans();
    $active = $connect->db_fetch()[0]['active'];

    $connect->outstandingAmount();
    $outstanding = $connect->db_fetch()[0]['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admindashboard.css">
    <style>
        .box {
            border: 1px solid #1ee1f7;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2 style="text-align: center;">Admin Dashboard</h2>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="loan_application.html">Loan Applications</a></li>
            <li><a href="reports.html">Reports</a></li>
            <li>
                <form action="registerpage.php">
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    
    <div class="main">
        <section class="summary">
            <div class="container box">
                <h2 style="text-align: center;">Loan Portfolio Summary</h2>
                <div class="metrics">
                    <div class="metric-box">
                        <div class="metric">
                            <h3 style="color: red;">Total Loans</h3>
                            <p><?php echo $total ?></p>
                        </div>
                    </div>
                    <div class="metric-box">
                        <div class="metric">
                            <h3 style="color: blue;">Active Loans</h3>
                            <p><?php echo $active ?></p>
                        </div>
                    </div>
                    <div class="metric-box">
                        <div class="metric">
                            <h3 style="color: green;">Outstanding Amount</h3>
                            <p><?php echo $outstanding ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="analytics">
                    <img src="loan_performance_chart.png" alt="Loan Performance Chart">
                </div>
            </div>
        </section>

        <section class="tools">
            <div class="container box">
                <h2 style="text-align: center;">Loan Management Tools</h2>
                <div class="tools">
                    <div class="tool-box">
                        <div class="tool">
                            <a href="">
                                <h3>Review Applications</h3>
                                <p>View and evaluate loan applications from borrowers.</p>
                            </a>
                        </div>
                    </div>
                    <div class="tool-box">
                        <div class="tool">
                            <a href="approve_reject.php">
                                <h3>Approve/Reject Loans</h3>
                                <p>Take action on loan applications by approving or rejecting them.</p>
                            </a>

                        </div>
                    </div>
                    <div class="tool-box">
                        <div class="tool">
                            <a href="">
                                <h3>Generate Reports</h3>
                                <p>Access detailed reports on loan portfolio trends and performance.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="container">
            <p style="text-align: center;">2024 Microfinance. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
