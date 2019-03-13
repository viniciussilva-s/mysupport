<?php
namespace vCode\Model;
use \vCode\DB\Sql;
use \vCode\Model;

Class Article extends Model{
	const SESSION = "User";
	public static function getPage( $pag = 1 , $itemsPerPage = 10)
	{	
		$start = (int)($pag - 1 ) * $itemsPerPage;
		$sql = new Sql() ;
		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_article as a
            LEFT JOIN tb_users as u 
            USING(iduser)
			ORDER by a.title
			LIMIT $start,$itemsPerPage

		");
		$resultsTotal = $sql->select(" SELECT FOUND_ROWS () as nrtotal ");
		return array(
			'data'=>Parent::encodeUTF8($results),
			'total'=>(int)$resultsTotal[0]['nrtotal'],
			'pages'=>ceil($resultsTotal[0]['nrtotal'] / $itemsPerPage)
		);
		
	}
	public static function getPageSearch($search, $pag = 1 , $itemsPerPage = 10)
	{	
		$start = (int)($pag - 1 ) * $itemsPerPage;
		$sql = new Sql() ;
		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS * 
			FROM tb_article as a
            LEFT JOIN tb_users as u 
            USING(iduser)
			WHERE a.title LIKE :search 
            OR a.titleori LIKE :search
            OR  u.desname LIKE :search
        	ORDER by a.title
			LIMIT $start,$itemsPerPage	
		",array(
			":search"=>'%'. $search .'%'
		
		));
		$resultsTotal = $sql->select(" SELECT FOUND_ROWS () as nrtotal ");
		
		return array(
			'data'=>Parent::encodeUTF8($results),
			'total'=>(int)$resultsTotal[0]['nrtotal'],
			'pages'=>ceil($resultsTotal[0]['nrtotal'] / $itemsPerPage)
		);
		
	}
	public function searchArticle($titleori){

		$textSearch =  Article::clearText($titleori);
		$textSearch = isset($textSearch)?$textSearch:'aa'; 
		
		$link = "https://www.uplexis.com.br/blog/?s=".$textSearch;
		$ch = curl_init($link);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER , 1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

		$var1 = curl_exec($ch);

		curl_close($ch);
		

		$var2 = explode("row mt-5 mb-5",$var1);
		if(empty($var2[1])){
			Article::setErrorArticle("Texto inválido!");
		}

		$data = explode("post",$var2[1]);
		$res = array();
		$i = 1 ; 
					while ($i !== 0 ) {
					 	# code...
						if(!empty($data[$i])){
							$text = explode('<div class="row image"',$data[$i]);
							if((!empty($text[0]) ) and (!empty($text[1]) ) ){
								$title=Article::getTitle($text);
								$link=Article::getLink($text);

								$this->saveArticle($title,$link,$titleori);							
								array_push($res,$title,$link);
							}
							$i++;
						}else{
							$i = 0 ;
						}
					}	
					return $res;
		}

	public static function setErrorArticle($msg){
		User::setError($msg);
		header('Location:  /admin/search');	
		exit;	
	}
	public static function setSuccessArticle($msg){
		User::setSuccess($msg);
		header('Location:  /admin/search');	
		exit;	
	}	
	public function saveArticle($title='',$link='',$titleori=''){
		$sql = new Sql() ;
		$sql->select("
			INSERT INTO 
			tb_article(iduser, title, link,titleori) 
			VALUES 
			(:iduser,:title,:link,:titleori)
			",array(
				':iduser'=>$_SESSION['User']['iduser'],
				':title'=>utf8_decode($title),
				':link'=>$link,
				':titleori'=>$titleori
			));
	}	

	public static function  deleteArticle($idarticle){
		$sql = new Sql();
		$sql->select("
			DELETE FROM tb_article WHERE iduser = :iduser and idarticle = :idarticle
			",array(
				':iduser'=>$_SESSION['User']['iduser'],
				':idarticle'=>$idarticle
			));

	}
	public static function clearText($textSearch):string{
		$textSearch = str_replace (" ","+",trim($textSearch)); 
		 return $textSearch; 
	}	
	public static function getTitle($data= array() ){
		if(!empty($data[1])){
			$data1 = explode('title',$data[1]);
			if(!empty($data1[1])){
				$data2 = explode('</div>',$data1[1]);
				if(!empty($data3 = explode(' div class="col-md-6">',$data2[0]))){
					 $data4 = explode('">',$data3[0]);
					return trim($data4[1]);
				}
			}
		}else{
			return '';
		}
		
	}
	public static function getLink($data = array()){
		$link1 = explode(".href='",$data[0]);
		if(!empty($link1[1])){
			$link2 = explode('"',$link1[1]); 
			return $link2[0];
		}else{
			return '';
		}
	}	
		
}


?>
