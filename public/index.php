<?php

namespace Controller;

use app\db\DbConnection;
use app\Model\Article;
use JasonGrimes\Paginator;

require_once '../app/Model/Article.php';
require_once '../app/db/DbConnection.php';
require_once '../app/Render/Renderer.php';
require '../vendor/autoload.php';

session_start();

$db = new DbConnection();

$articlesRepository = new Article($db->connection());

$limit = 3;

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$articles = $articlesRepository->getAllArticles($currentPage * $limit - $limit, $limit);

$popularArticles = $articlesRepository->getPopularArticle();

$count = $articlesRepository->getCountArticles();

$paginator = new Paginator($count['count'], $limit, $currentPage, '?page=(:num)');

return \App\Renderer\render('index', [
    'popularArticles' => $popularArticles,
    'articles' => $articles,
    'paginator' => $paginator
]);
