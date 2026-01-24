<?php




function scale_image(string $path, int $new_size, string $folder_name): bool
{
    if (!file_exists($path)) {
        return false;
    }

    $info = getimagesize($path);
    if ($info === false) {
        return false;
    }

    [$width, $height] = $info;
    $mime = $info['mime'];

    if ($width <= 0 || $height <= 0) {
        return false;
    }

    $aspect_ratio = $width / $height;

    $important_length;

    if ($width >= $height) {
        $new_width  = $new_size;
        $new_height = (int) round($new_size / $aspect_ratio);
        $important_length = $new_width;
    } else {
        $new_height = $new_size;
        $new_width  = (int) round($new_size * $aspect_ratio);
        $important_length = $new_height;
    }

    $scaled_dir = "./gallery_images_scaled/{$folder_name}/{$important_length}/";
    if (!is_dir($scaled_dir) && !mkdir($scaled_dir, 0755, true)) {
        return false;
    }

    $filename = basename($path);
    $target   = $scaled_dir . $filename;

    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($path);
            break;
        case 'image/png':
            $src = imagecreatefrompng($path);
            break;
        case 'image/webp':
            $src = imagecreatefromwebp($path);
            break;
        case 'image/gif':
            $src = imagecreatefromgif($path);
            break;
        case 'image/avif':
            if (!function_exists('imagecreatefromavif')) return false;
            $src = imagecreatefromavif($path);
            break;
        default:
            return false;
    }

    if ($src === false) {
        return false;
    }

    $dst = imagescale($src, $new_width, $new_height);
    if ($dst === false) {
        imagedestroy($src);
        return false;
    }

    $ok = match ($mime) {
        'image/jpeg' => imagejpeg($dst, $target, 85),
        'image/png'  => imagepng($dst, $target),
        'image/webp' => imagewebp($dst, $target),
        'image/gif'  => imagegif($dst, $target),
        'image/avif' => imageavif($dst, $target),
    };

    imagedestroy($src);
    imagedestroy($dst);

    return $ok;
}


?>
