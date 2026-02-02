<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100 overflow-x-hidden">
    <?php $this->beginBody() ?>
    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'brandOptions' => ['class' => 'fs-4 fw-semibold text-warning'],
            'options' => ['class' => 'navbar-expand-lg bg-header']
        ]);
        echo Nav::widget([
            'activateParents' => true,
            'options' => ['class' => 'navbar-nav lsp-125 text-uppercase fw-semibold'],
            'items' => [
                ['label' => 'Home', 'url' => ['site/index']],
                [
                    'label' => 'search',
                    'items' => [
                        [
                            'label' => 'systems',
                            'url' => ['/system/index'],
                            'linkOptions' => [
                                'class' => 'fw-semibold',
                                'aria-current' => isActive('system/', false) ? 'page' : null,
                            ],
                            'active' => isActive('system/', false)
                        ],
                        [
                            'label' => 'stations',
                            'url' => ['/station/index'],
                            'linkOptions' => [
                                'class' => 'fw-semibold',
                                'aria-current' => isActive('station/', false) ? 'page' : null,
                                'active' => isActive('station/', false) ? 'page' : null
                            ]
                        ],
                        [
                            'label' => 'materials',
                            'url' => ['/raw-material/index'],
                            'linkOptions' => [
                                'class' => 'fw-semibold',
                                'aria-current' => isActive('station/', false) ? 'page' : null
                            ]
                        ],
                    ],
                    'dropdownOptions' => ['data-bs-theme' => 'dark', 'class' => 'bg-header border-light'],
                ],
                ['label' => 'engineers', 'url' => ['#']],

            ]
        ]);
        echo Nav::widget([
            'activateParents' => true,
            'options' => ['class' => 'navbar-nav lsp-125 text-uppercase fw-semibold ms-auto'],
            'items' => [
                // Yii::$app->user->isGuest ? ['label' => 'Signup', 'url' => ['/user/user/signup']] : '',
                // Yii::$app->user->isGuest
                //     ? ['label' => 'Login', 'url' => ['/user/user/login']]
                //     : '<li class="nav-item">'
                //     . Html::beginForm(['/user/user/logout'])
                //     . Html::submitButton(
                //         'Logout (' . Yii::$app->user->identity->username . ')',
                //         ['class' => 'nav-link btn btn-link logout']
                //     )
                //     . Html::endForm()
                //     . '</li>'
                
                !Yii::$app->user->isGuest ? '<li class="nav-item">'
                    . Html::beginForm(['/user/user/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>' : '',
            ]
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-1 flex-grow-1 bg-main h-auto">
        <div class="container bg-light pt-1 pb-2 h-100">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs']
                ]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-header text-light">
        <div class="container">
            <div class="row">
                <div class="col text-center">&copy; AlexT <?= date('Y') ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>