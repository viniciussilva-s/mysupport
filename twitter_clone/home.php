<?php
	session_start();
	
	if (!$_SESSION['usuario']){
	 header('Location: index.php?erro=1');
	}
	$id_usuario = $_SESSION['id_usuario'];
	
	require_once('config.php');
	$new_usu = new Usuario();

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
				
					function atualizaSeguidores(){
						$.ajax({
							url:'seguidores.php',
							success(data){
								$('#qtdseguidores').html(data);
							}							
							
						});
						//pux_seguidores();
					}
					atualizaSeguidores();
					
					function atualizaTweet(){
						//carrega os tweets
						$.ajax({
							url:'get_tweet.php',
							success: function(data){
								$('#tweets').html(data);
								$('.chama-modal').click(function (){
									var id_tweet = $(this).data('id_tweet');
									$.ajax({ // passando o id do tweet para pag alterarTweet.php para o select 
										url:'alterarTweet.php',
										method:'post',
										data:{id_tweet: id_tweet},
										success: function (data){
											//var a = data['id'];
											//a = data;
											//console.log(a);
											$('#campotext_modal').html(data);
											$('#edit_i').dblclick(function(){
												save(); // solicitação de alt por icon 
											});
											$('#edit_t').dblclick(function(){
												
												save(); // solicitação de alt por icon 
											});
											$('#excluir_i').dblclick(function(){
												deletar();
											});
											function save(){
												$('#alt_reg').html('Salvar alterações');
												$('#alt_reg').removeClass('btn-danger').addClass('btn-primary');
												$('#edit_t').removeClass('cursor-close').addClass('cursor-show');
												$('#alt_reg').click(function (data){
													var text_alt = $('#edit_t').val(); 
													$.ajax ({
														url:'alterarTweet.php',
														method:'post',
														data:{id_tweet: id_tweet, update : 1 , text_alt : text_alt},
														success: function (data){
															//alert('UPDATE REALIZADO COM SUCESSO'+ data);
														}
													});
													atualizaTweet();
												});
										
											}
											function deletar(){
												$('#alt_reg').html('Apagar registro');
												$('#alt_reg').removeClass('btn-primary').addClass('btn-danger');
												var x;
												$('#alt_reg').click(function (data){
													var r=confirm("Você tem certeza que deseja deletar?");
													if (r==true){
														var text_alt = $('#edit_t').val(); 
														$.ajax ({
															url:'alterarTweet.php',
															method:'post',
															data:{id_tweet: id_tweet, delete : 1 },
															success: function (data){
																//alert('UPDATE REALIZADO COM SUCESSO'+ data);
																
															}
														});
														
													}	
													atualizaTweet();
												});
										
											}
										}

										
										
									});
									
								});
							}
						});
						$.ajax({
							url:'tweet.php',
							success(data){
								$('#qtdtweets').html(data);
							}
							
						});
						
					}
					
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
		
					atualizaTweet();
				$('#btn_tweet').click(function(){
					if ($('#texto_tweet').val().length > 0){
						//alert('Campo preenchido');
						$.ajax({
							url:'inclui_tweet.php',
							method:'post',
							data: $('#form_tweet').serialize(), //serialize pega a informação de todo o formulario ou pegando um por um em {texto_tweet: $('#texto_tweet').val()}
							success: function (data){
								//alert('Tweet incluido com success');
								$('#texto_tweet').val('');
								atualizaTweet();
							}
							
						});
						
					}
				});
				
				
			});
		/*
		taina uralux 
		21721089
		*/
		</script>
		
		<style>
			.cursor-close{
				cursor: not-allowed;
			}
			.cursor-show{
				cursor: auto;
			}
			a:hover{text-decoration:none;}a:action{text-decoration:none;}a{color:#333;}
		</style>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	       
		<?= $nav_head ; ?>
		 <!---  <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	         <a href="home.php"><img src="imagens/icone_twitter.png" /></a>
	        </div>
	        --->
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="sair.php">Sair</a></li>
				<li><a href="edit_usu.php">Editar perfil</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<div class="col-md-3">
			   <?= pux_menu();?>
				<!--- pux_menu_lateral
				<div class="panel panel-default">
					<div class="panel_body" style="text-align:center;">
						 <img src="imagens/usuariodefault.png" class="rounded-circle" style="height:150px;width:150px;border-radius:50%;margin-top:8px;" alt="...">
						
						<h4><?php//$_SESSION['usuario'] ?></h4>
						<hr/>
						<div class="col-md-4">TWEETS <br/><p id='qtdtweets'> </p> </div>
						<div class="col-md-4"><a id="seguir" class="" data-toggle="collapse" href="#collapseSeguidores" role="button" aria-expanded="true" aria-controls="collapseSeguidores"> SEGUIDORES<br/> <p id='qtdseguidores'> </p>  </a> </div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel_body">
						<div class="collapse in" id="collapseSeguidores" aria-expanded="true" style="">
							<div id="campo_seguidores" class="card card-body">
								Anim pariatur cliche reprehenderit
							</div>
						</div>
					</div>
				</div>>---> 
				
				
				<!---<div class="panel panel-default">
					<div class="panel_body">
						<div class="collapse in" id="collapseSeguido" aria-expanded="true" style="">
							<div id="campo_Seguindo" class="card card-body">
														
							
								Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
							</div>
						</div>
					</div>
				</div>--->
				
			
			</div>
	    	<div class="col-md-6">
				<div class="panel panel-default">					
					<div class="panel-body">
						<form id="form_tweet" class="input-group">
							<input id="texto_tweet" type="text" name="texto_tweet" class="form-control" placeholder="O que está acontecendo agora? " maxlength="140">
							<span class="input-group-btn">
								<button id="btn_tweet" class="btn btn-default" type="button">Tweet</button>
							</span>
						</form>
					</div>
					<div id="tweets" class="list-group">
										
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><a href="procura_pessoa.php">Procurar por pessoas</a></h4>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
				<div  id='campotext_modal' class="modal-content">
				  
				  
				  <!---
					<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div id='campotext_modal' class="modal-body">
					dit
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
					
					--->
				 
				</div>
			  </div>
			</div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>

