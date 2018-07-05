<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Статья</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="wrapper">
    <div class="article">
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

        <h1><?php echo $article['title']; ?></h1>
        <hr>
        <?php if (isset($article['image'])) : ?>
            <div class="one-article"><img src="storage/<?php echo $article['image']; ?>" alt=""></div>
        <?php endif; ?>
        <div class="one-article-content"><p><?php echo $article['content']; ?></p></div>
    </div>
</div>
</body>
