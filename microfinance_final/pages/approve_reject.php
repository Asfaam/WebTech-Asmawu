<?php
    require_once __DIR__ . '/../queries/query.php';
    session_start();
    $connect = new Microfinance;
    $connect->db_connect();

    $connect->pendingUserLoans();
    $pending_loans = [];
    $pending_loans = $connect->db_fetch();


    if (isset($_POST['approve'])){
        $connect->finalizeLoan(1,$_POST['user_id']);
    }

    if (isset($_POST['reject'])){
        $connect->finalizeLoan(1,$_POST['user_id']);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decision</title>
</head>
<body>
        <table class="table">
            <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>telephone</th>
                    <th>Loan Amount</th>
                    <th>Purpose</th>
                    <th>Collateral</th>
            </thead>

            <tbody>
                <?php
                    foreach($pending_loans as $p){
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['fname']); ?></td>
                    <td> <?php echo htmlspecialchars($p["lname"]);?></td>
                    <td><?php echo htmlspecialchars($p["email"]); ?></td>
                    <td><?php echo htmlspecialchars($p["telephone"]); ?></td>
                    <td><?php echo htmlspecialchars($p["loan_amount"]); ?></td>
                    <td><?php echo htmlspecialchars($p["purpose"]); ?></td>
                    <td><?php echo htmlspecialchars($p["collateral"]); ?></td>
                    <form action="approve_reject.php" method="post" enctype="multipart/form">
                    <td><input type="submit" style="background-color:#004643; color: white;" name="approve" value="APPROVE"></td>
                    <td><input type="submit" style="background-color:#004643; color: white;" name="reject" value="REJECT"></td>
                    <input name="user_id" value=<?php $p['user_id'];?> hidden>
                    </form>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>

</body>
</html>