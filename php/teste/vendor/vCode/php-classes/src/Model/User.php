<?php
namespace vCode\Model;
use \vCode\DB\Sql;
use \vCode\Model;

Class User extends Model{
	const SESSION = "User";
	const SECRET = "estae1chavecrypt";
	const ERROR = 'UserError';
	const ERROR_REGISTER = 'UserErrorRegister';
	const SUCCESS = 'UserSuccess';

	public static function getFromSession(){
		$user = new User();
		
		if(isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0)
		{
			$user->setData($_SESSION[User::SESSION]);
		}
		return $user;
	}
	public static function checkLogin($inadmin = true){
		if(
			!isset($_SESSION[User::SESSION])			
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]['iduser']>0		
		){
			// Usuario não esta Log
			return false ; 
		}else{
			if($inadmin === true &&(bool)$_SESSION[User::SESSION]['inadmin']===true){
				return true;
			}else if( $inadmin === false){
				return true;
			}else{
				return false;
			}
		}
	}
	public static function login($login,$password)
	{	
		$sql = new Sql();
		$results = $sql->select("SELECT * 
					FROM tb_users AS a
					WHERE a.deslogin = :login",	
		array(":login" =>$login	));

		if (count($results)===0){
			return User::setError('Usuário inexistente ou senha inválida.');
		}
		$data = $results[0];
		
		if ($password === User::sslDec($data['despassword'])){
			$user = new User();
			$data['desname']= utf8_encode($data['desname']);
			$user->setData($data);
			$_SESSION[User::SESSION] = $user->getValues();
			return $user;
		}else{
			User::setError('Usuário inexistente ou senha inválida.');
		}	
		return true;
	}
	public static function verifyLogin($inadmin = true){
		if (!User::checkLogin($inadmin)){
			if($inadmin){
				header('Location: /admin/login');	
			}else{
				header('Location: /login');	
			}
			exit;
		}
	}
	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}
		
	public static function sslEnc($msg)
	{ # --- ENCRYPTION ---
	  list ($pass, $iv, $method)= User::sslPrm();
		if(function_exists('openssl_encrypt')){
			return urlencode(openssl_encrypt(urlencode($msg), $method, $pass, false, $iv));
		}
		else{
			return urlencode(exec("echo \"".urlencode($msg)."\" | openssl enc -".urlencode($method)." -base64 -nosalt -K ".bin2hex($pass)." -iv ".bin2hex($iv)));
		} 
	}
	
	public static function sslDec($msg)
	{ # --- DECRYPTION ---
	
		list ($pass, $iv, $method)=User::sslPrm();
		if(function_exists('openssl_decrypt')){
			
		  return trim(urldecode(openssl_decrypt(urldecode($msg), $method, $pass, false, $iv)));
		// como ta ?	return urldecode(openssl_decrypt(urldecode($msg), $method, $pass, false, $iv));	
		}
		else{
			  // como ta  return urldecode(exec("echo \"".urldecode($msg)."\" | openssl enc -".$method." -d -base64 -nosalt -K ".bin2hex($pass)." -iv ".bin2hex($iv)));
			return trim(urldecode(exec("echo \"".urldecode($msg)."\" | openssl enc -".$method." -d -base64 -nosalt -K ".bin2hex($pass)." -iv ".bin2hex($iv))));
			
		}
		
	}
	public static function sslPrm()
	{
		return array(User::SECRET,User::SECRET,"aes-128-cbc");
	}
	
	public static function getPasswordHash($password){
		return password_hash($password, PASSWORD_DEFAULT,[
			'cost'=>12
		]);
	}
	public static function setError($msg)
	{
		$_SESSION[User::ERROR] = $msg;
		
	}
	public static function getError()
	{
		$msg = (isset($_SESSION[User::ERROR])&& $_SESSION[User::ERROR])?$_SESSION[User::ERROR]:'';
		User::clearError();
		return $msg;
	}
	public static function clearError()
	{
		$_SESSION[User::ERROR]=NULL;
	}

	public static function setSuccess($msg)
	{
		$_SESSION[User::SUCCESS] = $msg;
		
	}
	public static function getSuccess()
	{
		$msg = (isset($_SESSION[User::SUCCESS])&& $_SESSION[User::SUCCESS])?$_SESSION[User::SUCCESS]:'';
		User::clearSuccess();
		return $msg;
	}
	public static function clearSuccess()
	{
		$_SESSION[User::SUCCESS]=NULL;
	}
	public static function setErrorRegister($msg)
	{
		$_SESSION[User::ERROR_REGISTER] = $msg ;
		
	}
	
}


?>