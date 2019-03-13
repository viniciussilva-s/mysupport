<?php

use \vCode\PageAdmin;
use \vCode\Model\User;
use \vCode\Model\Article;

$app->get('/admin/list',function(){
	User::verifyLogin();
	
	$search = (isset($_GET['search']))?$_GET['search']:"";
	$page = (isset($_GET['page']))?(int)$_GET['page']:1;
	
	$pages = [];
	if ($search != '')
	{
		$pagination = Article::getPageSearch($search,$page);
	}else
	{
		$pagination = Article::getPage($page);			
	}
	
	for ($x = 0; $x < $pagination['pages']; $x++)
	{
		array_push($pages,[
			'href'=>'/admin/list?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
				'text'=>$x+1
		]);	
	}
	$page = new PageAdmin();
	$page->setTpl("viewArticle",array(
		"article"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages		
	));
});
$app->get('/admin/search',function(){
	User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl('create',array(
		'getError'=> User::getError(),
		'getSuccess'=> User::getSuccess()
	));
});
$app->post('/admin/search',function(){
	User::verifyLogin();

	$textSearch = $_POST['textsearch'];
	$article = new Article();
	if(empty($textSearch)){
		Article::setErrorArticle("Texto vazio!");
	}else{
		$result = $article->searchArticle($textSearch);	
	}
	header('Location:  /admin/list');
	exit;
});
$app->get('/admin/article/:idarticle/delete',function($idarticle){
	User::verifyLogin();
	Article::deleteArticle($idarticle);
	header('Location:  /admin/list');
	exit;

});

?>