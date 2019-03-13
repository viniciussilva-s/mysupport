var rodada=1;
var a , b,c ;
var matriz_jogo= Array(3);

matriz_jogo['a']=Array(3);
matriz_jogo['b']=Array(3);
matriz_jogo['c']=Array(3);

matriz_jogo['a'][1]=0;
matriz_jogo['a'][2]=0;
matriz_jogo['a'][3]=0;

matriz_jogo['b'][1]=0;
matriz_jogo['b'][2]=0;
matriz_jogo['b'][3]=0;

matriz_jogo['c'][1]=0;
matriz_jogo['c'][2]=0;
matriz_jogo['c'][3]=0;

$(document).ready(function(){
		$('#btn_iniciar_jogo').click(function(){
			// valida a digitação 
			var player01= ($('#entrada_apelido_jogador_1').val());
			var player02= ($('#entrada_apelido_jogador_2').val());
			//alert(player01);
			if(player01 === ''){
				alert('Apelido do jogador 1 não foi preenchido');
				return false;
			}
			if(player02 == ''){
				alert('Apelido do jogador 2 não foi preenchido');
				return false;
				
			}
			//exibir apelido 
			$('#nome_jogador_1').html(player01);
			$('#nome_jogador_2').html(player02);
			
			// alterar pagina
			$('#pagina_inicial').hide();
			$('#palco_jogo').show();
		});
		$('.jogada').click(function(){
			var id_campo_clicado = this.id; 
			$('#'+id_campo_clicado).off();
			jogada(id_campo_clicado);
			
			
		});
		function jogada(id)	{
			var icone ='';
			var ponto = 0;
			if ((rodada%2)==1){
				ponto=-1;
				icone='url("imagens/marcacao_1.png")';
			}else{
				ponto=1;
				icone='url("imagens/marcacao_2.png")';
			}
			rodada++;
			$('#'+id).css('background-image',icone);
			
			var linha_coluna=id.split('-');
			matriz_jogo[linha_coluna[0]][linha_coluna[1]]=ponto;
			console.log(matriz_jogo);
			verifica_combinacao();
		}
		function verifica_combinacao(){
			// Verifica na horizontal 
			var pontos=0;	
			for(var i = 1; i <=3; i++){
				pontos = pontos +  matriz_jogo['a'][i];
			}
			verificarVencedor(pontos);	
			pontos=0;
			for(var i = 1; i <=  3; i++){
				pontos = pontos + matriz_jogo['b'][i];
			}	
			verificarVencedor(pontos);	
			pontos=0;
			for(var i = 1; i <= 3; i++){
				pontos = pontos + matriz_jogo['c'][i];
			}
			verificarVencedor(pontos);	
			pontos=0;
			// verifar coluna 
			for(var i = 1; i <= 3; i++){
				pontos = 0;
				pontos = pontos + matriz_jogo['a'][i];
				pontos = pontos + matriz_jogo['b'][i];
				pontos = pontos + matriz_jogo['c'][i];
			verificarVencedor(pontos);	
			}
			//verifar na diagonal
			pontos=0;
			pontos = pontos + matriz_jogo['a'][1]+ matriz_jogo['b'][2]+ matriz_jogo['c'][3] ;
			verificarVencedor(pontos);	
			
			pontos=0;
			pontos = pontos + matriz_jogo['a'][3]+ matriz_jogo['b'][2]+ matriz_jogo['c'][1] ;
			verificarVencedor(pontos);	
			
		}
		function verificarVencedor(pontos){
			if(pontos == '-3'){
			var jogador1 = ($('#entrada_apelido_jogador_1').val());	
				alert(jogador1+ ' é vencedor(a)');
				$('.jogada').off();
			}
			if(pontos == '3'){
			var jogador2 = ($('#entrada_apelido_jogador_2').val());
			alert( jogador2 +' é vencedor(a)');
				$('.jogada').off();
			}
			
		}

});





			