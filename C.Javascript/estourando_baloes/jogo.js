var timeId = null; // contagem de tempo do jogo 
function novoJogo(){
	var var_limpeza = limparBalao();
	
	if (var_limpeza == "vazio"){
		iniciajogo();
	}
	else{
		limparBalao();
	}
	
}
function limparBalao() {
    var list = document.getElementById("cenario");
    while (list.hasChildNodes()) {
        list.removeChild(list.firstChild);
    }
	//var balao = "vazio";
	return "vazio";
}
function iniciajogo(){
	var url = window.location.search;
	var nivel_jogo=url.replace("?","");
	var tempo_segundos=0;
	if (nivel_jogo==1){	//1 facil -> 120segundos
		tempo_segundos=120;
	}
	if (nivel_jogo==2){	//2 normal -> 60segundos
		tempo_segundos=60;
	}
	if (nivel_jogo==3){	//3 normal -> 30segundos
		tempo_segundos=30;
	}
	document.getElementById('cronometro').innerHTML=tempo_segundos;
	var qtde_baloes=2;
	cria_baloes(qtde_baloes);
	document.getElementById('baloes_inteiros').innerHTML=qtde_baloes;
	//estoura_balao(qtde_baloes);
	document.getElementById('baloes_estourados').innerHTML=0;
	contagem_tempo(tempo_segundos+1);
	botao_pause();
	}
function contagem_tempo(segundos){
	segundos=segundos;
	segundos = segundos - 1;
	if (segundos == -1 ){
		clearTimeout(timeId);//para execução da função do setTimeout
		game_over();
		return false;
	}
	document.getElementById('cronometro').innerHTML=segundos;
	timeId=setTimeout("contagem_tempo("+segundos+")",1000);
}
function game_over(){
    remove_eventos_baloes();
	cria_game_over()
	document.getElementById('fundo-game-over').classList.remove('hidden');
	//alert("Fim de jogo, você não conseguiu estourar todos os balões a tempo");
}
function cria_game_over(){
	var fundo = document.createElement('div');
		fundo.id='fundo_game_over';
		document.getElementById('cenario').appendChild(fundo);
		//fundo.classList='hidden';
		fundo.style="position:absolute;width:600px;height: 500px;background: rgba(55, 66, 250,0.26);text-align:center;margin-top:-480px;";
		img_fundo(fundo.id);
		fundo.onclick=function(){
			novoJogo();
		};
}
function img_fundo(fundo){
		var img_fundo = document.createElement('img');
			img_fundo.id='img-game-over';
			img_fundo.style='width: 500px;margin-top: -30px;';
			img_fundo.src='imagens/game_over.png';
			document.getElementById(fundo).appendChild(img_fundo);
}
function remove_eventos_baloes() {
    var i = 1; //contado para recuperar balões por id
    
    //percorre o lementos de acordo com o id e só irá sair do laço quando não houver correspondência com elemento
    while(document.getElementById('b'+i)) {
        //retira o evento onclick do elemnto
        document.getElementById('b'+i).onclick = '';
        i++; //faz a iteração da variávei i
    }
}
function cria_baloes(qtde_baloes){
	for(var i=1;i<=qtde_baloes;i++){
		var balao = document.createElement('img');
		balao.src='imagens/balao_azul_pequeno.png';
		balao.style='margin:10px;';
		balao.id='b'+i;
		balao.onclick=function(){
			estourar(this);
			continue_jogo(this);
			
		};
		document.getElementById('cenario').appendChild(balao);
		
	}
}
function estourar(e){
	var id_balao = e.id;
	//document.getElementById(id_balao).setAttribute('onclick',"");
	// Essa função, qual professor realizou,é para varios click em uma unica imagem , porem resolvido pelo o meu codi abaixo
	if(document.getElementById(id_balao).className == "ok"){
		
	}
	else{
	pontuacao(-1);
	document.getElementById(id_balao).src='imagens/balao_azul_pequeno_estourado.png';	
	document.getElementById(id_balao).className="ok";
	}
		
}
function pontuacao(acao){
	
	var baloes_inteiros=document.getElementById('baloes_inteiros').innerHTML;
	var baloes_estourados=document.getElementById('baloes_estourados').innerHTML;
	
	baloes_inteiros=parseInt(baloes_inteiros);
	baloes_estourados=parseInt(baloes_estourados);
	
	baloes_inteiros = baloes_inteiros + acao;
	baloes_estourados = baloes_estourados - acao;
	
	document.getElementById('baloes_inteiros').innerHTML=baloes_inteiros;
	document.getElementById('baloes_estourados').innerHTML=baloes_estourados;

	situacao_jogo(baloes_inteiros);
}
function situacao_jogo(baloes_inteiros){
	if (baloes_inteiros==0)	{
		//alert("Congratulations");
		cria_game_win();
		parar_jogo();
	}
}
function parar_jogo(){
	clearTimeout(timeId);
}
	function cria_game_win(){
	var fundo = document.createElement('div');
		fundo.id='fundo_game_win';
		document.getElementById('cenario').appendChild(fundo);
		//fundo.classList='hidden';
		fundo.style="position:absolute;width:600px;height: 500px;background: rgba(55, 66, 250,0.26);text-align:center;margin-top: -480px;";
		img_fundo_win(fundo.id);
		fundo.onclick=function(){
			novoJogo();
		};
}
function img_fundo_win(fundo){
		var img_fundo = document.createElement('img');
			img_fundo.id='img-game-win';
			img_fundo.style='width: 220px;';
			img_fundo.src='imagens/fundo_game_win.png';
			document.getElementById(fundo).appendChild(img_fundo);
}  

function botao_pause(){ //ao iniciar jogo controlebotao com pause
	var b_pause = document.createElement('img');
		b_pause.onclick=function(){parar_jogo();botao_continuar();remove_eventos_baloes(); };
		b_pause.id='botao-pause';
		b_pause.src= 'imagens/pause.png';
		b_pause.style='width:125px;height:120px;';
		document.getElementById('controle').appendChild(b_pause);
	}

function botao_continuar(){
			remove_bpause();
		var b_continuar = document.createElement('img');
			b_continuar.id='botao-play';
			b_continuar.src= 'imagens/iniciar.png';
			b_continuar.style='width:125px;height:120px;';
			document.getElementById('controle').appendChild(b_continuar);
			b_continuar.onclick=function continue_jogo(){ //continuar jogo 
									// Quantidade atual de baloes cheios
									var qtde_baloes= 81;
										
									for(i=0;i<qtde_baloes;i++){
											//identificado a tag image 
											//var id_balao =();
											// chamando função estourar com o atual quatidade de balões 
											//if(document.getElementById('b'+i).className == "ok"){
												
											//}
											//else{
											pontuacao(-1);
											document.getElementById('b'+1).src='imagens/balao_azul_pequeno_estourado.png';	
											//document.getElementById('b'+1).className="ok";
											//}
										
										}
									}
	}						
function remove_bpause(){
	var controle_botao = document.getElementById("controle");
		var b_pause = document.getElementById("botao-pause");
			controle_botao.removeChild(b_pause);
}	
//function remove_bcontinue(){}	












