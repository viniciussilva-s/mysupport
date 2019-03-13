<?php
	$erro_usuario = isset($_GET['erro_usuario'])? $_GET['erro_usuario'] : 0 ;
	$erro_email   = isset($_GET['erro_email'])?$_GET['erro_email'] : 0 ;
	
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		
		<!--FontAwesome-->
		<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
		
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script>
			var var1 = Math.floor(Math.random() * 4 + 1);
			var var2 = Math.floor(Math.random() * 4 + 1);
			var resultado = var1 + var2;
			var campo_vazio = false ; 
			$(document).ready(function(){
				$('#img1').attr('src','http://www.wingo.com.br/content/interfaces/cms/themes/wingo/images/'+var1+'.gif');
				$('#img2').attr('src','http://www.wingo.com.br/content/interfaces/cms/themes/wingo/images/'+var2+'.gif');
							
				$('#icon_number').addClass('fa-times-circle');
					//$('#value').tooltip();   
					$('#value').attr('title','Digite um valor');
					
				$( '#value').keyup(function() {
						var vdigitado = $('#value').val();	
						if($('#value').val()!="" && $.isNumeric($('#value').val())){		
							if( vdigitado == resultado ){//     ((vdigitado >= 2) == (vdigitado <= 8)){
								$('#icon_number').addClass('fa-check-circle valid').removeClass('fa-times-circle error');
								$('#icon_number').attr('title','valor correto');	
								campo_vazio = false ; 
							}else { 
								$('#icon_number').addClass('fa-times-circle error').removeClass('fa-check-circle valid');
								campo_vazio=true;
							}
						}else{// digito incorreto
								$('#icon_number').addClass('fa-times-circle error').removeClass('fa-check-circle valid');
								$('#value').attr('title','valor incorreto');
								campo_vazio = true; 
							}
						
				});
				$('#ins').click(function(){
					if(campo_vazio){
							return false;
						}
				
				});
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
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para Home</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    		<h3>Inscreva-se já.</h3>
	    		<br />
				<form method="post" action="registra_usuario.php" id="formCadastrarse">
					<div class="form-group">
						<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
						<?php
							if($erro_usuario){
								echo "Usuário já existe <i id='icon' data-toggle='left' title='' class='far fa-times-circle error'></i>";
							}
						?>
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
						<?php
							if($erro_email){
								echo "Email já existe  <i id='icon' data-toggle='left' title='' class='far fa-times-circle error'></i>";
							}
						?>
					</div>
					
					<div class="form-group">
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
					</div>
					<div class="form-group" style="text-align:center;">
						<img id="img1" src=""/>
						<img id="plus" src="http://www.wingo.com.br/content/interfaces/cms/themes/wingo/images/plus.gif"/>
						<img id="img2" src=""/>=
						<input id="value" class="form-group"type="text" maxlength="1"  required="requiored" style="width:75px;" > <i id="icon_number" data-toggle="left" title="" class="far fa-times-circle"></i>
					</div>
	
				
					<button id="ins"type="submit" class="btn btn-primary form-control">Inscreva-se</button>
				</form>
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>