<?php
     require_once __DIR__ . '/../queries/query.php';
     session_start();

     $connect = new Microfinance;
     $connect->db_connect();

     

     if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $connect->login($username);

        $info = $connect->db_fetch();
        
        // var_dump($info[0]['password']);
            if ($info[0]['username'] == $_POST['username'] && $info[0]['password'] == $_POST['password']){
                if ($_POST['role'] == 'user' && $info[0]['role_id'] == 2){
                    $_SESSION['fname'] = $info[0]['fname'];
                    $_SESSION['user_id'] = $info[0]['user_id'];
                    header("Location: welcomepage.php");
                }else if ($_POST['role'] == 'admin' && $info[0]['role_id'] == 1){
                    header("Location: admindashboard.php");
                }
                else{
                    echo 'something went wrong';
                }
            }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Microfinance</title>
    <link rel="stylesheet" href="loginpage.css"> <!-- Ensure your CSS file is linked here -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="login-form" action="#" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <input type="submit" value="Login" name="login">
        </form>
        <p id="error-message" class="error-message"></p>
        <p class="register-link">Don't have an account? <a href="registerpage.php">Register</a></p>
    </div>
</body>
</html>
