<?php

namespace Controller;

use app\db\DbConnection;
use app\Model\User;

require_once '../app/Model/User.php';
require_once '../app/db/DbConnection.php';
require_once '../app/Render/Renderer.php';

$db = new DbConnection();

session_start();

if (isset($_SESSION['user'])) {
    header('Location: /');
}
$errors = null;
$userRepository = new User($db->connection());

if (isset($_POST['submit'])) {
    $user = $userRepository->authenticate($_POST['login'], $_POST['password']);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: /');
    } else {
        $errors[] = 'Вы ввели неправильный логин или пароль';
    }
}

return \App\Renderer\render('login', ['errors' => $errors]);