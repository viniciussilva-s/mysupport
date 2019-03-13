<?php

$image=imagecreatefrompng('bkteste.png');
$titleColor=imagecolorallocate($image,0,0,0);
$gray=imagecolorallocate($image,100,100,100);

///imagettftext($image,32,0,350,150,$titleColor,'BlackHanSans-Regular.tff','CERTIFICADO');


imagettftext($image,35,0,250,150,$titleColor,'fonts\blackhan.ttf','tesste');
imagestring($image,2,340,380,'Concluido em: '.date('D-m-Y'),$titleColor);

//imagettftext($image,32,0,340,350,'DIVANEI APARECIDO',$titleColor);
//imagestring($image,2,340,380,'Concluido em: '.date('D-m-Y'),$titleColor);

header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

?>