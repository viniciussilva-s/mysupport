<?php

header('content-type: image/jpeg');

$file = 'bkteste.png';

$new_width = 256;
$new_height = 256;

 list($old_width,$old_height) = getimagesize($file);
 
 $new_image = imagecreatetruecolor($new_width,$new_height);
 $old_image = imagecreatefrompng($file);
 
imagecopyresampled(	$new_image, $old_image,	0,0,0,0,$new_width,$new_height,$old_width,$old_height);
//imagecopyresampled(dst_image destino image, src_image image original, dst_x aonde começa corta , dst_y aonde começa corta , src_x corta a img de origem, src_y corta a img de origem , dst_w futuro tamenho ,  dst_h futuro tamanho, src_w atual tamanho,  src_h atual tamanho)

imagepng($new_image);
imagedestroy($old_image);
imagedestroy($new_image);

?>