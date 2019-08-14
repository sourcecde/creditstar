<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Button;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FA;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Klienditeenindus',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse logo',
        ],
    ]);
    
    // echo Yii::t('app', '{icon} 1715', ['icon' => FA::icon('mobile',['class' => 'mobilePhoneIcon'])]);

    // echo Yii::t('app', '{icon} E-P 9.00-21.00', ['icon' => FA::icon('clock-o',['class' => 'clockIcon'])]);
    
    // echo Button::widget([
    //     'encodeLabel' => false,
    //     'label' => FA::i('unlock', ['class' => 'unlock']).'LOG OUT',
    //     'options' => ['class' => 'btn-lg logOutButton hidden-xs'],
    // ]);
    // echo Button::widget([
    //     'encodeLabel' => false,
    //     'label' => 'LOG OUT',
    //     'options' => ['class' => 'btn-lg logOutButton hidden-xs'],
    // ]);
    echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],

                ],
            ]);
    ?>
    <p class="rightTopText hidden-xs">Tere,Kaupo Kasutaja</p>
    <?php
    NavBar::end();
    NavBar::begin([
        'brandLabel' => '<img src="/img/logo.png" class="companyLogo">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse menuLogoRow',
        ],
    ]);
    if(Yii::$app->user->isGuest != '1') {
     echo Nav::widget([
        'options' => ['class' => 'navbar-nav nav2'],
        'encodeLabels' => false,
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Loan', 'url' => ['/loan']],
            ['label' => 'User', 'url' => ['/user']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ],
    ]);
    }
    NavBar::end();
    ?>
    <div class="container-fluid">
        <div class="row breadcrumbsWrap">
            <div class="col-lg-7 text-center">
                <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
