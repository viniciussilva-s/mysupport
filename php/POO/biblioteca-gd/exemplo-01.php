<?php
header("Content-Type: image/png");

$image = ImageCreate(300,300);

$black = ImageColoralLocate($image,116, 185, 255);
$gr = ImageColoralLocate($image,255, 234, 167);
//$red = imagecolorallocate($image,255,0,0);
//$blue = imagecolorallocate($image,0,0,255);

$e ='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lacinia consequat arcu eget eleifend. Suspendisse placerat mattis sagittis. Pellentesque pharetra cursus posuere. Vivamus a malesuada tortor. Morbi tortor metus, ullamcorper a enim non, malesuada porta arcu. Nullam a est vitae tortor fringilla ullamcorper. Pellentesque aliquam consequat imperdiet. Pellentesque at blandit quam. Pellentesque diam turpis, rhoncus malesuada placerat et, lacinia et felis. Nulla eu tellus semper nunc imperdiet malesuada. Phasellus egestas cursus metus non dignissim. Quisque congue accumsan lobortis. Aenean a varius libero, non luctus orci. Aenean eu ante vitae elit sodales iaculis. Sed tortor sapien, sagittis sit amet purus at, mollis egestas turpis.';

imagestring($image,5,60,150,$e,$gr);

imagepng($image);

imagedestroy($image);

imagecolorallocate


?>