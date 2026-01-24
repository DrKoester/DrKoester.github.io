<?php

require "gallery.php";

$msg = "";
$folder_name = $_POST['myName'];

$upload_dir = "./gallery_images/" . $folder_name ."/";
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

$allowed_mime = [
    'image/jpeg',
    'image/png',
    'image/webp',
    'image/gif',
    'image/avif'
];

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_FILES['myPics']) &&
    is_array($_FILES['myPics']['tmp_name'])
) {
    $count = count($_FILES['myPics']['tmp_name']);

    for ($i = 0; $i < $count; $i++) {

        if ($_FILES['myPics']['error'][$i] !== UPLOAD_ERR_OK) {
            continue;
        }

        $tmp  = $_FILES['myPics']['tmp_name'][$i];
        $name = basename($_FILES['myPics']['name'][$i]);
        $target = $upload_dir . $name;

        // MIME sicher prüfen
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime  = finfo_file($finfo, $tmp);
        finfo_close($finfo);

        if (!in_array($mime, $allowed_mime, true)) {
            continue;
        }

        // Original speichern
        if (!move_uploaded_file($tmp, $target)) {
            $msg .= "Upload fehlgeschlagen: $name<br>";
            continue;
        }

        // Skalieren
        foreach ([600, 1080] as $size) {
            if (scale_image($target, $size, $folder_name)) {
                $msg .= "Skaliert ($size): $name<br>";
            } else {
                $msg .= "Fehler beim Skalieren ($size): $name<br>";
            }
        }
    }
}
?>




<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Galerie Upload</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="myPics[]" webkitdirectory multiple>
    <input type="text" name="myName">
    <button type="submit">Ordner hochladen</button>
</form>

<div>
    <?= $msg ?>
</div>

</body>
</html>