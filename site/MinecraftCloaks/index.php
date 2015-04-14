<?php
foreach($_REQUEST as $key => $val)
$path = dirname(__FILE__);
$imgBig = '1.png';
$imgSmall = str_replace("$", "", $key.'.png');
@$img1 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgBig);
@$img2 = imagecreatefrompng($path . DIRECTORY_SEPARATOR . $imgSmall);
if($img1 and $img2) {
	imageSaveAlpha($img1, true);
	imageSaveAlpha($img2, true);
	header('Content-Type: image/png');
	if(getimagesize($imgSmall)[0] == 22) {
		$x2 = imagesx($img2);
		$y2 = imagesy($img2);
		imagecopyresampled(
		$img1, $img2,
		0, 0,
		0, 0,
		$x2, $y2,
		$x2, $y2
		);
		imagepng($img1);
	} else {
		imagepng($img2);
	}
	imagedestroy($img1);
	imagedestroy($img2);
} else {
	header("HTTP/1.0 404 Not Found");
}