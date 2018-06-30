<?php

namespace Controller;

use app\db\DbConnection;
use app\Model\Article;

require_once 'app/Model/Article.php';
require_once 'app/db/DbConnection.php';
require_once 'app/Render/Renderer.php';
$env = require_once 'env.php';

$db = new DbConnection();

session_start();

$articlesRepository = new Article($db->connection());

if (!$article = $articlesRepository->getOneArticleById($_GET['id'])) {
    header('Location:' . $env['url']);
}

$articlesRepository->updateArticleView($_GET['id']);

return \App\Renderer\render('article', ['article' => $article]);
