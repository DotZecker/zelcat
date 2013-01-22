<!doctype html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?= $descripcio ?>">
    <title><?= $titol ?></title>
    <?= Bens::js('vendor/modernizr-2.6.2-respond-1.1.0.min') ?>

    <?= Bens::css('normalize.min') ?>
    <?= Bens::css('styles') ?>
</head>
<body>

    <header class="header-container">
        <ul class="wrapper clearfix">
            <li><a href="#">Izquierda</a></li>
            <li class="logo"><img src="/bens/img/logo.png" alt=""></li>
            <li><a href="#">Derecha</a></li>
        </ul>
    </header>

    <div role="main" class="inici">
        <div class="wrapper clearfix">
            <?= $contingut ?>
        </div>
    </div>

    <?= Bens::js('vendor/jquery-1.8.3.min') ?>
    <?= Bens::js('main') ?>
</body>
</html>