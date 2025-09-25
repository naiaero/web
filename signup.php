<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="proses-signup.php" method="POST">
            <h2>Sign Up</h2>
            <p style="color: #000000;" class="subheading">Lorem ipsum dolor sit amet adipiscing elit.</p>
            <label for="Name">Name*</label>
            <input type="Name" id="Name" name="Name" placeholder="Masukkan Nama" required>

            <label for="email">Email*</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

            <label for="password">
                Password*
                <a href="#" class="forgot-password">Forgot Your Password?</a>
            </label>
            <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

            <button type="submit" class="btn-login">Sign up</button>
            <button type="button" class="btn-google">Sign up with Google</button>

            <p style="color: #000000;" class="signup-text">Already have an account? <a href="login.php">Log In</a></p>
        </form>
    </div>
</body>
</html>