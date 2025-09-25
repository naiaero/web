<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Login to Your Account</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="proses-login.php" method="POST">
            <h2>Login to Your Account</h2>
            <p style="color: #000000;" class="subheading">Enter your Email and Password to rent your car</p>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

            <label for="password">
                Password
                <a href="#" class="forgot-password">Forgot Your Password?</a>
            </label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

            <button type="submit" class="btn-login">Login</button>
            <button type="button" class="btn-google">Login with Google</button>

            <p style="color: #000000;" class="signup-text">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>