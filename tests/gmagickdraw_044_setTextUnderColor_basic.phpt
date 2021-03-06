--TEST--
Test GmagickDraw, setTextUnderColor
--SKIPIF--
<?php
$imageMagickRequiredVersion=0x675;
require_once(dirname(__FILE__) . '/skipif.inc');
?>
--FILE--
<?php

$backgroundColor = 'rgb(225, 225, 225)';
$strokeColor = 'rgb(0, 0, 0)';
$fillColor = 'DodgerBlue2';
$textUnderColor = 'DeepPink2';

function setTextUnderColor($strokeColor, $fillColor, $backgroundColor, $textUnderColor) {
    $draw = new \GmagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->annotate(50, 75, "Lorem Ipsum!");
    $draw->setTextUnderColor($textUnderColor);
    $draw->annotate(50, 175, "Lorem Ipsum!");

    $gmagick = new \Gmagick();
    $gmagick->newImage(500, 500, $backgroundColor);
    $gmagick->setImageFormat("png");
    $gmagick->drawImage($draw);

    $bytes = $gmagick->getImageBlob();
    if (strlen($bytes) <= 0) { echo "Failed to generate image.";} 
}

setTextUnderColor($strokeColor, $fillColor, $backgroundColor, $textUnderColor) ;
echo "Ok";
?>
--EXPECTF--
Ok