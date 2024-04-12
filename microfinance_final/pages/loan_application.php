<?php
    require_once __DIR__ . '/../queries/query.php';
    session_start();
    $connect = new Microfinance;
    $connect->db_connect();

    $errors = array('amount'=>'', 'purpose'=>'', 'repayment'=>'', 'collateral'=>'');
    // echo $_SESSION['user_id'];
    if (isset($_POST['submit'])){
        $amount = $_POST['amount'];
        $purpose = $_POST['purpose'];
        $repayment_terms = $_POST['repayment'];
        $collateral = $_POST['collateral'];



        if(!array_filter($errors)){
            $connect->loginId();
            $id = $connect->db_fetch()[0]['id'];
            $id += 1;
            $connect->loaning($id,$_SESSION['user_id'],2,$amount,$purpose,$repayment_terms,$collateral);
            header("Location: homepage.php");
        }else{
            $errors["collateral"] = "something went wrong";
        }



    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Application</title>
    <link rel="stylesheet" href="loan_application.css">
</head>
<body>
    <header>
        <h1 style="text-align: center;">Loan Application</h1>
    </header>

    <section class="container">
        <form id="loan-application-form" method="post">
            <label for="loan-amount">Loan Amount</label>
            <input type="number" id="amount" name="amount" required>

            <label for="loan-purpose">Loan Purpose</label>
            <input type="text" id="purpose" name="purpose" required>

            <label for="repayment">Repayment Terms</label>
                <select id="repayment" name="repayment" required>
                    <option value="MOMO">MOMO</option>
                    <option value="bank">Bank</option>
                    <option value="physical">In-Person</option>
                </select>

            <label for="collateral">Collateral (if any)</label>
            <input type="text" id="collateral" name="collateral">

            <input type="submit" id="submit-btn" value='Submit Application' name='submit' placeholder="e.g house, land, etc">
        </form>
    </section>



    <!-- <script src="script.js">
        document.getElementById('loan-application-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var loanAmount = document.getElementById('loan-amount').value;
    var loanPurpose = document.getElementById('loan-purpose').value;
    var repaymentTerms = document.getElementById('repayment-terms').value;
    var collateral = document.getElementById('collateral').value;


    
    // Displaying a confirmation message
    alert('Loan application submitted successfully!');
});

    </script> -->
</body>
</html>
