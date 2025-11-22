<?php
session_start();

// Already logged in?
if (!empty($_SESSION["eingeloggt"])) {
    header("Location: youraccount.php");
    exit;
}

$error = "";

// Handle login submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Hard-coded login
    $validUser = "Bratdackel";
    $validPass = "Bratdackel#13";

    if ($username === $validUser && $password === $validPass) {
        $_SESSION["eingeloggt"] = true;
        header("Location: youraccount.php");
        exit;
    } else {
        $error = "Falsche Login-Daten!";
    }
}
?>
<!DOCTYPE html>
<html lang = "de">
<head>
    <title>Login - Frigidipedia</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="/DrKoester.github.io/images/AvatarFrederik.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="window.location.href='index.html'">Cancel</button>
  </div>
</form>








</body>
</html>