<?php
spl_autoload_register(function ($class_name){
	$filename="Class".DIRECTORY_SEPARATOR .$class_name.".php";
	if(file_exists($filename)){
		require_once($filename);
		return false;
	}

	// else if (file_exists($class_name.".php")){ Se estiver na mesma pasta 
		
		
		// require_once($class_name.".php");
		// return false;
	// }
	
});

		
		$nav_head= "
			<div class='navbar-header'>
	          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
	            <span class='sr-only'>Toggle navigation</span>
	            <span class='icon-bar'></span>
	            <span class='icon-bar'></span>
	            <span class='icon-bar'></span>
	          </button>
				  <a href='home.php'> <img src='imagens/icone_twitter.png'/></a>
	        </div>
		
		";
		function pux_menu(){
				$n = new usuario();
		$pux_menu="
			<div class='panel panel-default'>
					<div class='panel_body' style='text-align:center;'>
						 <img src='".$n->getImg()."' class='rounded-circle' style='height:150px;width:150px;border-radius:50%;margin-top:8px;' alt='...'>
						
						<h4> ".$_SESSION['usuario'] ."</h4>
						<hr/>
						<div class='col-md-4'>TWEETS <br/><p id='qtdtweets'> </p> </div>
						<div class='col-md-4'><a id='seguir' class='' data-toggle='collapse' href='#collapseSeguidores' role='button' aria-expanded='true' aria-controls='collapseSeguidores'> SEGUIDORES<br/> <p id='qtdseguidores' > </p>  </a> </div>
						<div class='clearfix'></div>
					</div>
				</div>
				<div class='panel panel-default'>
					<div class='panel_body'>
						<div class='collapse in' id='collapseSeguidores' aria-expanded='true' style=''>
							<div id='campo_seguidores' class='card card-body'>
								Anim pariatur cliche reprehenderit
							</div>
						</div>
					</div>
				</div>
		
		";
		return $pux_menu;
		}

	




//"Class".DIRECTORY_SEPARATOR .
?> 

