<?php
    require_once __DIR__ . '/../queries/query.php';
    session_start();
    $connect = new Microfinance;
    $connect->db_connect();

    $connect->userLoanStatus($_SESSION['user_id'],2);
    $pending_loans = [];
    $pending_loans = $connect->db_fetch();

    $connect->userLoanStatus($_SESSION['user_id'],1);
    $approved_loans = [];
    $approved_loans = $connect->db_fetch();

    $connect->userLoanStatus($_SESSION['user_id'],3);
    $reject_loans = [];
    $reject_loans = $connect->db_fetch();


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status | Micro Loan Management System</title>
    <link rel="stylesheet" href="application_status.css">
</head>
<body>
    <header>
        <h1>Application Status</h1>
    </header>
    <div class="all_status">

        <section class="status">
            <div class="container">
                <h2 style="text-align: center;">Status Updates</h2>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="status-update">
                    <div>
                        <h3>Under Review</h3>
                        <table class="table">
                        <thead>
                            <th>Purpose</th>
                            <th>Loan Amount</th>
                        </thead>

                        <tbody>
                            <?php
                                foreach($pending_loans as $p){
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($p['purpose']); ?></td>
                                    <td> <?php echo htmlspecialchars($p["loan_amount"]);?></td>
                                    </form>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            <div>
        </section>

        <section>
            <div class="container">
                <div class="status-update">
                    <h3>Approved</h3>
                    <table class="table">
                        <thead>
                            <th>Purpose</th>
                            <th>Loan Amount</th>
                        </thead>

                        <tbody>
                            <?php
                                foreach($approved_loans as $a){
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($a['purpose']); ?></td>
                                    <td> <?php echo htmlspecialchars($a["loan_amount"]);?></td>
                                    </form>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="status-update">
                    <h3>Rejected</h3>
                    <table class="table">
                        <thead>
                            <th>Purpose</th>
                            <th>Loan Amount</th>
                        </thead>

                        <tbody>
                            <?php
                                foreach($reject_loans as $r){
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($r['purpose']); ?></td>
                                    <td> <?php echo htmlspecialchars($r["loan_amount"]);?></td>
                                    </form>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
    

    <section class="instructions">
        <div class="container">
            <h2>What to Do Next</h2>
            <p>Depending on the status of your application, please take the following actions:</p>
            <ul>
                <li>If your application is <strong>under review</strong>, please wait for further updates.</li>
                <li>If your application is <strong>approved</strong>, follow the instructions provided to proceed with the loan disbursement process.</li>
                <li>If your application is <strong>rejected</strong>, consider reviewing your application and reapplying if necessary.</li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Micro Loan Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
