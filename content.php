<?php


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

// 4. Upload file → saved in SAME folder
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

?>
