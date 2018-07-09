<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Редактирование</title>
    <script src="js/jquery-1.3.2.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="Stylesheet" type="text/css" href="css/jHtmlArea.css"/>
    <script type="text/javascript" src="js/jHtmlArea-0.8.js"></script>

    <script>$(function () {
            $("textarea").htmlarea();
        });</script>
</head>
<body>
<div id="wrapper">
    <?php if (!empty($errors)) : ?>
        <div class="error"> <?php echo array_shift($errors); ?> </div>
    <?php endif; ?>

    <header>
        <?php if ($_SESSION['user']) : ?>
            <a href="/logout.php">Выйти</a>
            <a href="/create.php">Добавить статью</a>
            <a href="/index.php">На главную</a>
        <?php else : ?>
            <a href="/login.php">Войти</a>
            <a href="/index.php">На главную</a>
        <?php endif; ?>
    </header>

    <div class="container">
        <form method="post" class="form" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
            <input type="file" name="file"> <br> <br>
            <input type="hidden" name="_method" value="put"/>
            <input type="text" class="title" name="title" minlength="5" 
                   maxlength="100" required placeholder="Введите заголовок"
                   value="<?php echo $article['title'] ?>"> <br><br>
            <textarea id="txtEditor" class="textarea" name="content" required minlength="5" cols="50"
                      rows="20"><?php echo $article['content'] ?></textarea>
            <input type="submit" name="update-article" value="Обновить">
        </form>
    </div>
</div>
</body>
