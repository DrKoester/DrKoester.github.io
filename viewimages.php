
<?php
$base_dir = './gallery_images_scaled/';

$folder = $_GET['folder'] ?? '';
$folder = basename($folder); // security

$thumb_dir = $base_dir . $folder . '/600/';
$full_dir  = $base_dir . $folder . '/1080/';

$images = [];

if ($folder && is_dir($thumb_dir) && is_dir($full_dir)) {
    foreach (glob($thumb_dir . '*.{jpg,jpeg,png,webp,gif,avif}', GLOB_BRACE) as $thumb) {
        $filename = basename($thumb);
        $full = $full_dir . $filename;

        if (file_exists($full)) {
            $images[] = [
                'thumb' => $thumb,
                'full'  => $full
            ];
        }
    }
}


?>


<!doctype html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Willkommen bei Dr Köster</title>
        <link rel="stylesheet" href="styles.css">
        <script type="text/javascript" src="darkmode.js" defer></script>
    </head>
    <body>
        <div class="gallery-list">
            <?php
            $base_dir = './gallery_images_scaled/';

            foreach (glob($base_dir . '*', GLOB_ONLYDIR) as $dir) {
                $name = basename($dir);
                echo '<a href="?folder=' . htmlspecialchars($name) . '">' . htmlspecialchars($name) . '</a><br>';
            }
            ?>
            </div>
        <div class="gallery">
            <?php foreach ($images as $img): ?>
                <a href="<?= htmlspecialchars($img['full']) ?>" target="_blank">
                    <img src="<?= htmlspecialchars($img['thumb']) ?>" alt="">
                </a>
            <?php endforeach; ?>
        </div>
    </body>