<?php

$image=imagecreatefrompng('bkteste.png');
$titleColor=imagecolorallocate($image,0,0,0);
$gray=imagecolorallocate($image,100,100,100);

imagestring($image,5,350,150,'CERTIFICADO',$titleColor);
imagestring($image,5,350,250,'Etiam hendrerit, dolor quis porttitor dignissim, ex ipsum vestibulum leo, at faucibus orci enim eu metus. Morbi ut porttitor metus. Nullam volutpat egestas pretium. Phasellus eget metus ex. Pellentesque pharetra eu nulla ',$titleColor);
imagestring($image,5,340,350,'DIVANEI APARECIDO',$titleColor);
imagestring($image,2,340,380,'Concluido em: '.date('D-m-Y'),$titleColor);

header('Content-type: image/png');
imagepng($image,'Concluido-'.date('d-m-y').'.png'); // com esse segundo parametro  cria a img 
imagedestroy($image);

?>