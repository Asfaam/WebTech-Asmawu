<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microfinance Home</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1 style="text-align: center;">Microfinance</h1>
                <ul>
                    <li><a href="homepage.php" class="nav-link">Home</a></li>
                    <li><a href="registerpage.php" class="nav-link">Loan Application</a></li>
                    <li><a href="aboutus.html" class="nav-link">About Us</a></li>
                    <li><a href="contactus.html" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <h2>Welcome to Microfinance</h2>
            <p>Your partner in financial empowerment</p>
            <a href="registerpage.php" class="btn">Apply Now</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="feature">
                <h3>Easy Application Process</h3>
                <p>Apply for a loan in minutes with our simple online application.</p>
            </div>
            <div class="feature">
                <h3>Quick Approval</h3>
                <p>Get approved for your loan quickly with our streamlined process.</p>
            </div>
            <div class="feature">
                <h3>Flexible Repayment Options</h3>
                <p>Choose from a variety of repayment terms that fit your budget.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Microfinance. All rights reserved.</p>
        </div>
    </footer>

    <script src="homepage.js">
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent default behavior of anchor tag
        // Add active class to clicked link and remove it from others
        navLinks.forEach(item => item.classList.remove('active'));
        this.classList.add('active');
    });
});

    </script>
</body>
</html>
