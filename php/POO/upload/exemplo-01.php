<form method="post" enctype="multipart/form-data">
	<input type="file" name="fileUpload"/>
	<button type="submit">Send</button>
</form>
<?php
 
//$e = array();

	if($_SERVER['REQUEST_METHOD']=== "POST"){
		$file  = $_FILES["fileUpload"];
		if($file['error']){
			throw new Exception ("Error: ".$file['error']);
		}
		$dirUploads = "imagens";
		if(!is_dir($dirUploads)){
			mkdir($dirUploads);
		}
		print_r($_FILES);
		die;
		$e = explode('.',$file['name']);
		$e[0] = 'Eu'; 
		$file['name'] = $e[0].".".$e[1];
		if(move_uploaded_file($file["tmp_name"],$dirUploads. DIRECTORY_SEPARATOR . $file['name'])){
			echo "Upload realizado com sucesso!" ; 
		}else{
			throw new Exception ("Não foi possivel realizar o upload");
		}
		
	}
?>