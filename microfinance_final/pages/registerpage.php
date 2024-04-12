
<?php
    require_once __DIR__ . '/../queries/query.php';
    $connect = new Microfinance;
    $connect->db_connect();

    
    $current_userid = 0;

    if (isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telephone = $_POST['telephone'];

        #getting previous id to get new id
        $connect->loginId();
        $id = $connect->db_fetch()[0]['id'];
        $id += 1;

        $connect->register($id, $fname, $lname, $username, $email, $password, $telephone, 2);
        $connect->loginId();
        $current_userid = $connect->db_fetch()[0]['id'];
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Microfinance</title>
    <link rel="stylesheet" href="registerpage.css">
</head>
<body>
    <div class="container">
        <a href="loginpage.php">Back</a>
        <h2>Register</h2>
        <form id="register-form" action="" method="post">
            <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" id="fname" name="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last name</label>
                <input type="text" id="lname" name="lname" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="tel" id="telephone" name="telephone" pattern="\+[0-9]{1,3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" required>
                <small>Format: +233-123-456-789</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <!-- <div class="form-group">
                <input type="text" value="2" name='role' hidden>
                 <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Administrator</option>
                </select>
            </div> -->
            <input id='submit' type="submit" value="Register" name="submit">
        </form>
        <p id="error-message" class="error-message"></p>
    </div>

    <!-- <script>
        document.getElementById('register-form').addEventListener('submit', function(event) {
            
            event.preventDefault();
            var fname = document.getElementById('fname').value.trim();
            var lname = document.getElementById('lname').value.trim();
            var username = document.getElementById('username').value.trim();
            var email = document.getElementById('email').value.trim();
            var telephone = document.getElementById('telephone').value.trim();
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirm-password').value;
            // var role = document.getElementById('role').value; // Get selected role

            var usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var telephoneRegex = /^\+[0-9]{1,3}-[0-9]{3}-[0-9]{3}-[0-9]{3}$/;
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{8,}$/;

            var errorMessage = '';

            if (!usernameRegex.test(fname)) {
                errorMessage += 'Name must be 3-20 characters long and can only contain letters, numbers, and underscores.\n';
            }

            if (!usernameRegex.test(lname)) {
                errorMessage += 'Name must be 3-20 characters long and can only contain letters, numbers, and underscores.\n';
            }

            if (!usernameRegex.test(username)) {
                errorMessage += 'Name must be 3-20 characters long and can only contain letters, numbers, and underscores.\n';
            }

            if (!emailRegex.test(email)) {
                errorMessage += 'Invalid email address.\n';
            }

            if (!telephoneRegex.test(telephone)) {
                errorMessage += 'Invalid telephone number. Please use the format: +233-123-456-7890.\n';
            }

            if (!passwordRegex.test(password)) {
                errorMessage += 'Password must be at least 8 characters long and contain at least one digit, one lowercase letter, one uppercase letter, and one special character.\n';
            }

            if (password !== confirmPassword) {
                errorMessage += 'Passwords do not match.\n';
            }

            if (errorMessage) {
                document.getElementById('error-message').innerText = errorMessage;
            } else {
                document.getElementById('error-message').innerText = '';
                alert('Registration successful!'); // Registee is given 'user' role by default
                // window.location.href = 'loginpage.php';
            }
        });
    </script> -->


</body>
</html>
