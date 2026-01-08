<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. Sanitize input
    $user = htmlspecialchars($_POST['username']);
    $pass = $_POST['password'];

    // 2. Hash the password (Never store plain text!)
    // Argon2id is the 2026 standard for high-security hashing
    $hashedPassword = password_hash($pass, PASSWORD_ARGON2ID);

    // 3. Database logic goes here (e.g., INSERT INTO users...)
    // For now, we simulate a success response
    echo "Account created for $user! You can now <a href='login.html'>Login</a>.";
}
?>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // 1. Fetch the hashed password from your database based on the username
    // (Simulating a fetched hash for this example)
    $storedHashFromDB = '$argon2id$v=19$m=65536,t=4,p=1$...'; 

    // 2. Verify the password against the hash
    if (password_verify($pass, $storedHashFromDB)) {
        // 3. Prevent Session Fixation by regenerating the ID
        session_regenerate_id(true); 
        $_SESSION['user'] = $user;
        echo "Login successful! Welcome back, " . htmlspecialchars($user);
    } else {
        http_response_code(401);
        echo "Invalid username or password.";
    }
}
?>