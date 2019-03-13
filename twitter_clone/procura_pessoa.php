<?php
	session_start();
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	$id_usuario = $_SESSION['id_usuario'];
	require_once('config.php');
	
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script type="text/javascript">
			$(document).ready(function (){
					
					function atualizaSeguidores(){
						$.ajax({
							url:'seguidores.php',
							success(data){
								$('#qtdseguidores').html(data);
							}							
							
						});
					}
					atualizaSeguidores();
					function atualizaTweet(){
						$.ajax({
							url:'tweet.php',
							success(data){
								$('#qtdtweets').html(data);
							}
							
						});
					}
					atualizaTweet();
				$('#btn_procurar_pessoa').click(function(){
					
					if ($('#nome_pessoa').val().length > 0){
						//alert('Campo preenchido');
						$.ajax({
							url:'get_pessoa.php',
							method:'post',
							data: $('#form_procurar_pessoa').serialize(), 
							//serialize pega a informação de todo o formulario ou pegando um por um em {texto_tweet: $('#texto_tweet').val()}
							success: function (data){
								//alert(data);
								$('#pessoas').html(data);
								$('.btn_seguir').click(function(){
									var id_usuario = $(this).data('id_usuario');
									$('#btn_seguir_'+id_usuario).hide();
									$('#btn_deixar_seguir_'+id_usuario).show();
									
									$.ajax({
										url:'seguir.php',
										method:'post',
										data: {seguir_id_usuario : id_usuario},
										success:function (data){
											//alert('Requisição efetuada com sucesso');
											
										}
										
									});
									atualizaSeguidores();								
								});
								$('.btn_deixar_seguir').click(function(){
									var id_usuario = $(this).data('id_usuario');
									
									$('#btn_seguir_'+id_usuario).show();
									$('#btn_deixar_seguir_'+id_usuario).hide();
				
									$.ajax({
										url:'deixar_seguir.php',
										method:'post',
										data: {deixar_seguir_id_usuario : id_usuario},
										success:function (data){
											
										}
										
									});
									atualizaSeguidores();
								});
								
								
								
							}
							
						});
						
					}
				});
				$('#seguir').click(function(){
						//alert('Campo preenchido');
						pux_seguidores();
					});	
						function pux_seguidores(){
							$.ajax({
								url:'seguidores.php',
								method:'POST',
								data:{pux_seguidores : 1 },
								success: function (data){
									//alert(data);
									$('#campo_seguidores').html(data); /// campo_seguidores
									$('.btn_seguir').click(function(){
										var id_usuario = $(this).data('id_usuario');
										$('#btn_seguir_'+id_usuario).hide();
										$('#btn_deixar_seguir_'+id_usuario).show();
										
										$.ajax({ // gravando no BD
											url:'seguir.php',
											method:'post',
											data: {seguir_id_usuario : id_usuario},
											success:function (data){
												//alert('Requisição efetuada com sucesso');
												
											}
											
										});
										//atualizaSeguidores();								
									});
									$('.btn_deixar_seguir').click(function(){
										var id_usuario = $(this).data('id_usuario');
										
										$('#btn_seguir_'+id_usuario).show();
										$('#btn_deixar_seguir_'+id_usuario).hide();
					
										$.ajax({ // DELETANDO 
											url:'deixar_seguir.php',
											method:'post',
											data: {deixar_seguir_id_usuario : id_usuario},
											success:function (data){
												
											}
											
										});
										//atualizaSeguidores();
									});
									
									
									
								}
								
							});
						
						}
						pux_seguidores();
			});
		
		
		</script>
		<style>
		a:hover{text-decoration:none;}
		a:action{text-decoration:none;}
		a{color:#333;}
		
		</style>
		
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
			
			<?= $nav_head ; ?>
	        <!---<div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a href="home.php"><img src="imagens/icone_twitter.png" /></a>
	        </div>--->
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="home.php">Home</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<div class="col-md-3">
			 <?=pux_menu()?>
			<!---
				<div class="panel panel-default">
					<div class="panel_body">
						<h4><?=$_SESSION['usuario'] ?></h4>
						<hr/>
						<div class="col-md-4">TWEETS <br/><p id='qtdtweets'> </p> </div>
						<div class="col-md-4">SEGUIDORES<br/> <p id='qtdseguidores'> </p>  </div>
						<div class="clearfix"></div>
					</div>
				</div>
			-->	
			</div>
	    	<div class="col-md-6">
				<div class="panel panel-default">					
					<div class="panel-body">
						<form id="form_procurar_pessoa" class="input-group">
							<input type="text" id="nome_pessoa"  name="nome_pessoa" class="form-control" placeholder="Quem você esta procurando?" maxlength="140">
							<span class="input-group-btn">
								<button id="btn_procurar_pessoa" class="btn btn-default" type="button">Procurar</button>
							</span>
							
						</form>
					</div>
					<div id="pessoas" class="list-group">
										
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						
					</div>
				</div>
			</div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>

