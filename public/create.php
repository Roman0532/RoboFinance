<?php

namespace Controller;

use app\db\DbConnection;
use app\Model\Article;
use app\Services\ImageService;
use app\Services\UserService;

require_once '../app/db/DbConnection.php';
require_once '../app/Services/ImageService.php';
require_once '../app/Services/UserService.php';
require_once '../app/Model/Article.php';
require_once '../app/Render/Renderer.php';

session_start();

$db = new DbConnection();
$userService = new UserService();
$imageService = new ImageService();
$articlesRepository = new Article($db->connection());

$isAuthorize = $userService->authorization();

if (!$isAuthorize) {
    header('Location: /');
}

$errors = null;
if (isset($_POST['create-article'])) {
    if (!empty($_FILES['file']['name'])) {
        
        $filename = $imageService->uploadImageOnServer($_FILES['file']['name']);
        if (!$filename) {
            echo 'Данный Файл не поддерживается';
            exit();
        }
    }

    $isCreated = $articlesRepository->createArticle(
        $filename,
        $_SESSION['user']['id'],
        $_POST['title'],
        $_POST['content']
    );

    if ($isCreated) {
        $_SESSION['success'] = 'Запись была успешно добавлена';
        header('Location: /');
    } else {
        $errors = ['Запись не была добавлена'];
    }
}

return \App\Renderer\render('create', ['errors' => $errors]);