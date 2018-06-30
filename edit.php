<?php

namespace Controller;

use app\db\DbConnection;
use app\Model\Article;
use app\Model\User;
use app\Services\ImageService;
use app\Services\UserService;

require_once 'app/Model/Article.php';
require_once 'app/Model/User.php';
require_once 'app/db/DbConnection.php';
require_once 'app/Services/UserService.php';
require_once 'app/Services/ImageService.php';
require_once 'app/Render/Renderer.php';
$env = require_once 'env.php';

session_start();

$db = new DbConnection();
$userService = new UserService();
$articlesRepository = new Article($db->connection());
$imageService = new ImageService();

$article = $articlesRepository->getOneArticleById($_GET['id']);

if ($_POST['update-article']) {
    $errors = null;
    if (!empty($_FILES['file']['name'])) {
        if (!$filename = $imageService->uploadImageOnServer($_FILES['file']['name'])) {
            echo 'Данный Файл не поддерживается';
            exit();
        } else {
            if ($article['image']) {
                $imageService->deleteImageFromServer($article['image']);
            }
        }
    }

    if ($articlesRepository->updateArticle($_GET['id'], $filename, $_POST['title'], $_POST['content'])) {
        $_SESSION['success'] = 'Запись была успешно обновлена';
        header('Location:' . $env['url']);
    } else {
        $errors = ['Запись не была обновлена'];
    }
}

if (!$userService->authorization() || $_SESSION['user']['id'] != $article['user_id']) {
    header('Location:' . $env['url']);
}

return \App\Renderer\render('edit', ['errors' => $errors, 'article' => $article]);