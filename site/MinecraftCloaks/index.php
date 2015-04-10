<?php
foreach($_REQUEST as $key => $val)
$path = dirname(__FILE__); 
$imgBig = str_replace("$", "", $key.'.png');
$img1 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgBig); 
if($img1) {
imageSaveAlpha($img1, true);
header('Content-Type: image/png');
imagepng($img1);
imagedestroy($img1);
} else {
header("HTTP/1.0 404 Not Found");
}