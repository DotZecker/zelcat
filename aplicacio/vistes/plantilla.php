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

	<div class="header-container">
        <header class="wrapper clearfix">
            Universi.ta!
        </header>
    </div>

    <div role="main" class="inici">
        <div class="wrapper clearfix">
            <?= $contingut ?>
        </div>
    </div>

    <?= Bens::js('vendor/jquery-1.8.3.min') ?>
    <?= Bens::js('main') ?>
</body>
</html>