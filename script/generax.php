<?php

// imagen captcha


if(isset($_GET['imgCant']) && $_GET['imgTipo']){
	session_start();
	$texto = randomText(4,'true');
	$captcha = imagecreate(70, 22);
	imagecolorallocate($captcha, 255, 255, 255);
	$textColor = imagecolorallocate($captcha, 0, 105 , 255);
	$lineColor = imagecolorallocate($captcha, 193, 50, 93);
	$imageInfo[]=80;
	$imageInfo[]=60;
	$linesToDraw = 5;
	for($i=0; $i<$linesToDraw; $i++ ) { 
		$xStart = mt_rand(0, $imageInfo[0]);
		$xEnd = mt_rand(0, $imageInfo[0]);
		imageline($captcha, $xStart, 0, $xEnd, $imageInfo[1], $lineColor);
	}
	imagettftext( $captcha, 17, 1, 5, 20, $textColor, "leadcoat.ttf", $texto );
	$_SESSION['key'] = md5($texto);
	imagesavealpha($captcha, true);
	header("Content-type: image/png");
	imagepng($captcha);
	imagedestroy($captcha);
}
function randomText ($length, $alpha=NULL){
	if($alpha!=NULL) $ap=9;
	else $ap=35;
	$lista = "123456789abcdefghijklmnopqrstuvwxyz";
	for($i=0;$i<$length;$i++) { 
		$key.= $lista{rand(0,$ap)};
	}
	return $key;
};
?>