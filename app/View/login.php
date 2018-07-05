<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="wrapper">
    <header>
        <a href="/index.php">На главную</a>
    </header>

    <?php if (!empty($errors)): ?>
        <div class="error"> <?php echo array_shift($errors); ?> </div>
    <?php endif ?>

    <div class="container">
        <form method="post" class="form">
            <input type="text" name="login" minlength="5" maxlength="25" required placeholder="Введите логин"> <br> <br>
            <input type="password" name="password" required minlength="5" maxlength="60" placeholder="Введите пароль">
            <br> <br>
            <input type="submit" name="submit" value="ВОЙТИ">
        </form>
    </div>
</div>
</body>
