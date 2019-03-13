<?php
$pasta="arquivos";
$permissao="0755";

if(!is_dir($pasta)) mkdir($pasta);
	echo "Diretorio criado";


/* Pemissoes de um diretorio . 
Sendo de 0-7:
0- Sem permissao;
1- Permissao de exec;
2- Permissao de grav;
4- Somente Leitura;
5- Permissao de Leitura e exec;
6- Permissao de Leitura e grav;
7- Permissao de Leitura,grav e exec, ou seja, Permissao Total ;

"0755"
Sendo o campo do n 7 é desiguidado ao Dono do dir
Campo n 5 , é para gr de usuarios criado no sistema
Segundo campo n 5, é para os outros usuarios ,ou seja ,os visitantes

*/
?>