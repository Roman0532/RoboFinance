<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Главная странницы</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div id="wrapper">
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="success"> <?php echo $_SESSION['success'];
            unset($_SESSION['success']); ?> </div>
    <?php endif ?>

    <header>
        <?php if ($_SESSION['user']) : ?>
            <a href="/logout.php">Выйти</a>
            <a href="/create.php">Добавить статью</a>
        <?php else : ?>
            <a href="/login.php">Войти</a>
        <?php endif; ?>
    </header>

    <div class="article-wrapper">
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <h1><a href="article.php?id=<?= $article['id'] ?>"><?= $article['title']; ?></a></h1>
                <div class="admin-info">
                    <?php if ($_SESSION['user']['id'] == $article['user_id'] && $_SESSION['user']['isAdmin']) : ?>
                        <span><a href="edit.php?id=<?= $article['id']; ?>">Редактировать</a></span>
                    <?php endif; ?>

                    <?= $article['full_name'] ?>
                    <?= $article['created_at'] ?>
                </div>
                <hr>

                <?php if ($article['image']) : ?>
                    <div class="article-image">
                        <img src="../../public/storage/<?= $article['image']; ?>" alt="">
                    </div>
                <?php endif; ?>

                <div class="article-content">
                    <p><?= mb_substr(strip_tags($article['content']), 0, 300); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="popular-block">
        <?php foreach ($popularArticles as $popularArticle): ?>
            <a href="article.php?id=<?= $popularArticle['id'] ?>"> <?= $popularArticle['title'] ?></a> <br>
            <hr>
        <?php endforeach; ?>
    </div>

    <div class="paginate"> <?= $paginator ?></div>

</div>
</body>



