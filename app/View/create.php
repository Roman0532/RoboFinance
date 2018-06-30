<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Создание статьи</title>
    <script src="../../public/js/jquery-1.3.2.js"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="Stylesheet" type="text/css" href="../../public/css/jHtmlArea.css"/>
    <script type="text/javascript" src="../../public/js/jHtmlArea-0.8.js"></script>
    <script>$(function () {
            $("textarea").htmlarea();
        });</script>
</head>
<body>
<div class="wrapper">
    <?php if (!empty($errors)): ?>
        <div class="error"> <?= array_shift($errors); ?> </div>
    <?php endif; ?>

    <header>
        <?php if ($_SESSION['user']) : ?>
            <a href="/logout.php">Выйти</a>
            <a href="/index.php">На главную</a>
        <?php endif; ?>
    </header>

    <div class="container">
        <form method="post" class="form" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
            <input type="file" name="file"> <br> <br>
            <input class="title" type="text" name="title" minlength="5" maxlength="100" required placeholder="Введите заголовок"> <br><br>
            <textarea id="txtEditor" class="textarea" name="content" required minlength="5" cols="50"
                      rows="20"></textarea>
            <input type="submit" name="create-article" value="Создать">
        </form>
    </div>
</div>
</body>
