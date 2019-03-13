<form method="post">
	<input type="text" name="busca">
	<button type="submit"> Enviar</button>

</form>

<?php
	if(isset($_POST['busca'])){
		//echo strip_tags($_POST['busca'],"<strong>"); Removendo as tags aceitando apenas a tag strong
		echo htmlentities($_POST['busca']); // descreve tudo , 
	}



?>