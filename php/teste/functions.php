<?php
use \vCode\Model\User;

function formatPrice($vlprice)
{	
	if(!$vlprice > 0) $vlprice = 0;
	
	return number_format($vlprice,2,","," ");
}
function formatDate($date)
{
	return date('d/m/Y',strtotime($date));
}
function formatutf8($msg){
	$msg = utf8_encode($msg);
	return $msg;
}
function checkLogin($inadmin = true)
{
	return User::checkLogin($inadmin);
}
function getUserName()
{
	$user = User::getFromSession();
//	return print_r($user);
	return $user->getdesname();
}
function getMsgLogin(){
  $msg = User::getError(); 
	if ($msg !=''){
		$r = "<div class='help-block text-center'>
    <div class='callout callout-danger'>
      <h4>".$msg."</h4>
    </div>
  </div>";		
	}else{
		$r="";
	}  
	return $r;
}

?>