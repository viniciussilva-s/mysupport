<?php
	$images=scandir("images");
	$data = array();
	foreach ($images as $key){
		if(!in_array($key,array(".",".."))){
			$filename =  "images".DIRECTORY_SEPARATOR .$key;
			$info = pathinfo($filename);
			$info["size"] = filesize($filename).".bytes";
			$info["modified"] = date("d-m-Y H:i:s",filemtime($filename));
			$info['url'] = "http://localhost/projUdemy/php/POO/dr/".str_replace("\\","/",$filename);
			
			 array_push($data,$info);
			
		}
	}
	echo json_encode($data);
?>