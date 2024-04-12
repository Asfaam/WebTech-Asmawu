<?php
require_once('../database/db_conn.php');

class Microfinance extends DbConnection{

    public function register($userId, $fname, $lname, $username, $email, $password, $telephone, $role){
        $sql = "INSERT INTO `user` VALUES ('$userId', '$fname', '$lname','$username','$email', '$password', '$telephone','$role')";
        return $this->db_query($sql);
    }


    public function loginId(){
        $sql = "SELECT `user_id` as `id` FROM `user` ORDER BY `user_id` DESC LIMIT 1";
        return $this->db_query($sql);
    }

    public function loadId(){
        $sql = "SELECT `loan_application_id` as `id` FROM `loan_application` ORDER BY `loan_application_id` DESC LIMIT 1";
        return $this->db_query($sql);
    }

    public function pendingUserLoans(){
        $sql = "SELECT  `user_id`, `fname`, `lname`, `email`, `telephone`, `loan_amount`, `purpose`, `collateral` FROM `user` INNER JOIN `loan_application` WHERE `role_id` = 2 and `loan_status_id` = 2";
        return $this->db_query($sql);
    }

    

    public function totalLoans(){
        $sql = "SELECT COUNT(*) as `total` FROM `loan_application`";
        return $this->db_query($sql);
    }

    public function outstandingAmount(){
        $sql = "SELECT SUM(`loan_amount`) as `total` FROM `loan_application` WHERE `loan_status_id` = 1";
        return $this->db_query($sql);
    }

    public function activeLoans(){
        $sql = "SELECT COUNT(*) as `active` FROM `loan_application` WHERE `loan_status_id` = 1";
        return $this->db_query($sql);
    }

    public function login($username){
        $sql = "SELECT * FROM `user` WHERE `username` = '$username'";
        return $this->db_query($sql);
    }


    //User applying for loan
    public function loaning($loan_application_id, $user_id, $loan_status_id, $loan_amount, $purpose, $repayment_terms, $collateral){
        $sql = "INSERT INTO `loan_application` VALUES ('$loan_application_id', '$user_id', '$loan_status_id','$loan_amount', '$purpose', '$repayment_terms', '$collateral')";
        return $this->db_query($sql);
    }


    //admin approving loan: I just need to update the status to 'approved'. MUST BE USED IF the ADMIN has already added 
    // to the loaning table
    public function finalizeLoan($decision, $user_id){
        $sql = "UPDATE `loan_application` SET `loan_status_id` = '$decision' WHERE `user_id` = '$user_id'";
        return $this->db_query($sql);
    }

    public function userLoanStatus($user, $status){
        $sql = "SELECT `user_id`, `loan_status_id`, `purpose`, `loan_amount` FROM `loan_application` WHERE `user_id`='$user' AND `loan_status_id`='$status'";
        return $this->db_query($sql);
    }


    //deleting the row record. Must vanish from both user and admin side on the browser
    public function rejectLoan($id){
        $sql = "DELETE FROM `loaning` WHERE `userId` = '$id'";
        return $this->db_query($sql);
    }

    //to be used in the process of approving loan application by ADMIN
    // public function loan($loanId, $applicationId, $userId, $purpose, $repaymentTerms, $collateral, $status){
    //     $sql = "INSERT INTO `loan` VALUES ('$loanId', '$userId', '$loanAmount', '$interestRate', '$repaymentSchedule', '$status')";
    //     return $this->db_query($sql);
    // }

    //To be used by USER
    // public function pay($approve, $userId){
    //     $sql = "UPDATE `loaning` SET `status` = '$approve' WHERE `userId` = '$userId'";
    //     return $this->db_query($sql);
    // }


}