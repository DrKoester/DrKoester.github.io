<?php


$whitelist = [
    "image/jpeg",
    "image/png",
    "image/webp",
    "image/svg"
];

function getAllImages(string $path, array $allowedTypes = ['jpg','jpeg','png','gif']) : array {
    $images = [];

    if (!is_dir($path)) return $images;

    $items = scandir($path);
    foreach ($items as $item) {

        // folder mit punkten überspringen
        if ($item === "." || $item === "..") continue;

        $fullPath = rtrim($path, "/") . "/" . $item;

        if (is_dir($fullPath)) {
            // tiefer
            $images = array_merge($images, getAllImages($fullPath, $allowedTypes));
        } else {
            // extensions
            $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedTypes)) {
                $images[] = $fullPath;
            }
        }
    }
    return $images;
}

// 1. Collect all POST data safely
$name      = $_POST['name'] ?? "unknown";
$gender    = $_POST['gender'] ?? "";
$intr1     = $_POST['intr1'] ?? "";
$intr2     = $_POST['intr2'] ?? "";
$intr3     = $_POST['intr3'] ?? "";
$vote    = $_POST['vote'] ?? "";
$skincolor = $_POST['skincolor'] ?? "";
$birthday  = $_POST['birthday'] ?? "";
$phone     = $_POST['phone'] ?? "";
$email     = $_POST['email'] ?? "";

// 2. Create folder using sanitized name
$cleanName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $name);
$folder = "data/" . $cleanName;

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);  // create the folder
}

// 3. Write all form info to info.txt
$info = "Name: $name\n";
$info .= "Gender: $gender\n";
$info .= "Ticked: $intr1 $intr2 $intr3\n";
$info .= "Voted: $vote\n";
$info .= "Skin Tone: $skincolor\n";
$info .= "Birthday: $birthday\n";
$info .= "Phone: $phone\n";
$info .= "Email: $email\n";

file_put_contents("$folder/info.txt", $info);

// 4. Upload file > saved in SAME folder
if (!empty($_FILES['dickpic']['name'])) {

    $fileName   = basename($_FILES['dickpic']['name']);
    $targetPath = "$folder/" . $fileName;

    if (move_uploaded_file($_FILES['dickpic']['tmp_name'], $targetPath)) {
        echo "File saved successfully.<br>";
    } else {
        echo "Could not save uploaded file.<br>";
    }
}

echo "Thanks for participating!";


$allImages = getAllImages("data");

foreach ($allImages as $img) {
    echo "<img src='$img' class='bildergalerie'>\n";
}

?>

<!doctype html>
<html lang="de">
    <head>
        <title>DickPic Gallerie</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    </body>
</html>
