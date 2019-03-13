<?php

//header('content-type: image/jpeg');

$file = 'bkteste.png';

$new_width = 256;
$new_height = 256;

 list($old_width,$old_height) = getimagesize($file);
 
 $new_image = imagecreatetruecolor($new_width,$new_height);
 $old_image = imagecreatefrompng($file);
 
image

?>