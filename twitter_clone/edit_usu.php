<?php
	session_start();
	
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	$id_usuario = $_SESSION['id_usuario'];
	
	require_once('db.php');
	require_once('config.php');
$n_usuario = new Usuario ();
	$objDB = new db();
	$link = $objDB->conecta_mysql();

	$erro_usuario = isset($_GET['erro_usuario'])? $_GET['erro_usuario'] : 0 ;
	$erro_email = isset($_GET['erro_email'])?$_GET['erro_email'] : 0 ;
	$erro_senha = isset($_GET['erro_senha'])?$_GET['erro_senha'] : 0 ;
	
		
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
		<script type="text/javascript">
			$(document).ready(function (){
				
				var campo_vazio = false;
				var senha_inval = false;
				$('#msg_erro').hide();
				$('#btn_edit').click(function(){
					
					if (campo_vazio){
						alert('Nova senha invalida');
						return false;
					}
					
					// $.ajax({
						// url:'get_senha.php',
						// method:'POST',
						// data:{senha_atual : senha},
						// success: function(data){
							// if(data){
								
								// console.log(data); //icon_senha_atual
								// $('#form_edit').attr('action','');
								
								// $('#msg_erro').show();
								// parar(true);
							// } else {
								// alert('senha ok');
								// //
								// $('#msg_erro').hide();
								// console.log(data);	
							// }
							// function parar(e){
								// if(e){
									// alert('entrei na func');
									// return false;
								// }
							// }						
						// }
						// //senha_inval = '10';
						
					// });	
										
					// if(senha_inval){
						// return false;
					// }
					
																		
				});
								
				$( "#Senha_nova_edit1" ).keyup(function() {
					var senha1 = 'Senha_nova_edit1';
					var senha2 = 'Senha_nova_edit2';
					
					verifica_nsenha(senha1 , senha2);
					
				});
				$( "#Senha_nova_edit2" ).keyup(function() {
					var senha1 = 'Senha_nova_edit2';
					var senha2 = 'Senha_nova_edit1';
					
					verifica_nsenha( senha1 , senha2);
				});
				function verifica_nsenha( senha1 , senha2){
					if (($('#'+ senha1 ).val()) !=($('#'+ senha2 ).val())) {
						console.log('senha1 :'+ senha1);
						console.log('senha2 :'+ senha2);
						$('#icon_'+ senha1).addClass('fa-times-circle error').removeClass('fa-check-cirle valid');
						$('#icon_'+ senha2).addClass('fa-times-circle error').removeClass('fa-check-cirle valid fa-times-circle error');
						campo_vazio = true;
												 
					}else{
						$('#icon_'+ senha1).addClass('fa-check-circle valid').removeClass('fa-times-circle error');
						$('#icon_'+ senha2).addClass('fa-check-circle valid').removeClass('fa-times-circle error');
						campo_vazio = false;
					}
				}			
				
				
				function uploadFile(blobFile, fileName) { //carregar image
					var fd = new FormData();
					fd.append("fileToUpload", blobFile);
	
					$.ajax({
					   url: "edit_perfil.php",
					   type: "POST",
					   data: fd,
					   processData: false,
					   contentType: false,
					   success: function(response) {
						   // .. do something
					   },
					   error: function(jqXHR, textStatus, errorMessage) {
						   console.log(errorMessage); // Optional
					   }
					});
				}
				
				
			});
				
		</script>
		
		<style>
			.error{
				color:red;
				
			}
			.valid{
				color:blue;
			}
		</style>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	      
		  <?= $nav_head ; ?>
			<!--<div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a href="home.php"><img src="imagens/icone_twitter.png" /></a>
	        </div>
	        -->
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
				<li><a href="home.php">Home</a></li>
	            <li><a href="sair.php">Sair</a></li>
				
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	<div class="col-md-3"></div>
	    	<div class="col-md-6">
				<form id="form_edit" method="post"  class="input-group" action="edit_perfil.php" enctype="multipart/form-data"> <!---->
					<div class="text-center">
					  <img src="<?=$n_usuario->getImg()?>" class="rounded-circle" style="height:150px;width:150px;border-radius:50%;" alt="...">
					</div>
													
				
					<fieldset for="#Senha_atual_edit">
						<legend for="#Senha_atual_edit" >Editar</legend>	
							<div class="form-group"><!--Input Nome-->
								<label for="name_edit">Nome</label>
								<input id="name_edit" type="text" name="name_edit" class="form-control" placeholder="<?=$n_usuario->getUsuario()?> " maxlength="140"><br/><br/>
								<?php
									if($erro_usuario){
										echo "Usuário já existe <i id='icon' data-toggle='left' title='' class='far fa-times-circle error'></i>";
									}
								?>
							</div>
							<div class="form-group"><!--Input Email-->
								<label for="email_edit">Email</label>
									<input id="email_edit" type="email" name="email_edit" class="form-control" maxlength="140" placeholder="<?=$n_usuario->getEmail()?> " ><br/><br/>
								<?php
									if($erro_email){
										echo "Email já existe <i id='icon' data-toggle='left' title='' class='far fa-times-circle error'></i>";
									}
								?>
								</div>
							<div class="form-group"><br/> <!--Input Image-->
								<label for="fileedit">Selecione o imagem</label>
								<input type="file" id="fileedit" name="fileedit" class="form-control-file" >
							</div>
							<div class="form-group"><!--Input Senha-->
								<label for="Senha_atual_edit">Atual senha</label>
								<input type="password" id="Senha_atual_edit"  name="Senha_atual_edit" class="form-control"  maxlength="140">
								<?php
									if($erro_senha){
										echo "incorreta <i id='icon' data-toggle='left' title='' class='far fa-times-circle error'></i>";
									}
								?>
							</div>		
							<div class="form-group"> <!--Input Alterar Senha-->
								<label for="#Senha_nova_edit1">Nova senha</label>
								<input type="password" id="Senha_nova_edit1" name="Senha_nova_edit1" class="form-control"  maxlength="140">
								 <i id="icon_Senha_nova_edit1" data-toggle="left" title="" class="far"></i>
							</div>
							<div class="form-group">
								<label for="#Senha_nova_edit2"> Digite novamente</label>
								<input type="password" id="Senha_nova_edit2" name="Senha_nova_edit2" class="form-control" maxlength="140">
								 <i id="icon_Senha_nova_edit2" data-toggle="left" title="" class="far"></i>
								 
							</div>
							<div class="form-group">
								<br/><br/>
								<button id="btn_edit" class="btn btn-default" type="submit">Editar</button> <!--  type="submit" -->
							</div>
					</fieldset>
				</form>
			</div>		
			<div class="col-md-3"></div>
		</div>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>

