<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Статья</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
<div class="wrapper">
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

        <h1><?= $article['title']; ?></h1>
        <hr>
        <?php if (isset($article['image'])) : ?>
            <div class="one-article"><img src="../../public/storage/<?= $article['image']; ?>" alt=""></div>
        <?php endif; ?>
        <div class="one-article-content"><p><?= $article['content']; ?></p></div>
    </div>
</div>
</body>