<?php

namespace Controller;

use app\db\DbConnection;
use app\Model\Article;
use app\Model\User;
use app\Services\ImageService;
use app\Services\UserService;

require_once '../app/Model/Article.php';
require_once '../app/Model/User.php';
require_once '../app/db/DbConnection.php';
require_once '../app/Services/UserService.php';
require_once '../app/Services/ImageService.php';
require_once '../app/Render/Renderer.php';

session_start();

$db = new DbConnection();
$userService = new UserService();
$articlesRepository = new Article($db->connection());
$imageService = new ImageService();

$article = $articlesRepository->getOneArticleById($_GET['id']);

$isAuthorize = $userService->authorization();

if (!$isAuthorize || $_SESSION['user']['id'] != $article['user_id']) {
    header('Location: /');
}

if (isset($_POST['update-article'])) {
    $errors = null;
    if (!empty($_FILES['file']['name'])) {
        $filename = $imageService->uploadImageOnServer($_FILES['file']['name']);

        if (!$filename) {
            echo 'Данный Файл не поддерживается';
            exit();
        } else {
            if ($article['image']) {
                $imageService->deleteImageFromServer($article['image']);
            }
        }
    }

    $isUpdated = $articlesRepository->updateArticle(
        $_GET['id'],
        $_POST['title'],
        $_POST['content'],
        $filename
    );

    if ($isUpdated) {
        $_SESSION['success'] = 'Запись была успешно обновлена';
        header('Location: /');
    } else {
        $errors = ['Запись не была обновлена'];
    }
}

return \App\Renderer\render('edit', ['errors' => $errors, 'article' => $article]);
