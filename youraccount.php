<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
session_start();

if (empty($_SESSION["eingeloggt"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang = "de">
    <head>
        <meta charset="UTF-8" />
        <title>title</title>
    </head>
    <body>

        <form method="post" action="logout.php">
            <button type="submit" name="logout">Logout</button>
        </form>
        
    </body>
</html>