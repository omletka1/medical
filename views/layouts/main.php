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
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f8f9fa;
                color: #333;
                margin: 0;
                padding-top: 80px;
                line-height: 1.6;
            }

            header#header {
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1030;
                background: rgba(255, 255, 255, 0.96);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                box-shadow: 0 2px 20px rgba(0, 102, 153, 0.1);
                border-bottom: 1px solid rgba(8, 75, 109, 0.08);
                transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
                animation: headerAppear 0.8s ease-out;
            }

            @keyframes headerAppear {
                0% { opacity: 0; transform: translateY(-100%); }
                100% { opacity: 1; transform: translateY(0); }
            }

            .navbar-brand {
                font-family: 'Montserrat', sans-serif;
                font-weight: 700;
                font-size: 1.8rem;
                color: #0066cc;
                display: flex;
                align-items: center;
                transition: all 0.3s ease;
                position: relative;
                padding-left: 40px;
            }

            .navbar-brand::before {
                content: "⚕";
                position: absolute;
                left: 0;
                font-size: 2rem;
                transition: all 0.3s ease;
            }

            .navbar-brand:hover {
                color: #004d99;
                transform: translateY(-2px);
            }

            .navbar-brand:hover::before {
                transform: rotate(15deg) scale(1.1);
            }

            .navbar-nav {
                gap: 5px;
            }

            .nav-link {
                font-family: 'Roboto', sans-serif;
                font-weight: 500;
                font-size: 1rem;
                color: #333 !important;
                padding: 10px 18px !important;
                border-radius: 8px;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: #0066cc;
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }

            .nav-link:hover {
                color: #0066cc !important;
                background: rgba(0, 119, 204, 0.05);
                transform: translateY(-2px);
            }

            .nav-link:hover::after {
                width: 70%;
            }

            .nav-link.active {
                color: #0066cc !important;
                font-weight: 600;
            }

            .nav-link.active::after {
                width: 70%;
            }

            .logout {
                background: rgba(0, 102, 204, 0.1);
                border-radius: 8px;
                padding: 8px 16px !important;
                color: #0066cc !important;
                font-weight: 500;
                transition: all 0.3s ease;
                border: none;
                margin-left: 10px;
            }

            .logout:hover {
                background: rgba(0, 102, 204, 0.2);
                color: #004d99 !important;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0, 102, 204, 0.15);
            }

            header.scrolled {
                background: rgba(255, 255, 255, 0.98);
                box-shadow: 0 4px 30px rgba(0, 75, 109, 0.15);
                padding-top: 5px;
                padding-bottom: 5px;
            }

            header.scrolled .navbar-brand {
                font-size: 1.6rem;
            }

            main#main {
                padding: 30px 0;
                flex: 1;
                animation: fadeIn 1s ease-in;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            footer#footer {
                background: #fff;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
                padding: 25px 0;
                color: #666;
                font-size: 0.9rem;
                animation: slideUp 0.8s ease-out;
            }

            @keyframes slideUp {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }

            .breadcrumb {
                background: rgba(0, 102, 204, 0.05);
                border-radius: 8px;
                padding: 10px 15px;
            }

            @media (max-width: 768px) {
                body {
                    padding-top: 70px;
                }

                .navbar-brand {
                    font-size: 1.5rem;
                    padding-left: 35px;
                }

                .navbar-brand::before {
                    font-size: 1.7rem;
                }

                .nav-link {
                    padding: 8px 12px !important;
                }
            }

            .login-page {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: calc(100vh - 160px);
            }

            .login-box {
                width: 100%;
                max-width: 500px;
                padding: 40px;
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <?php if (Yii::$app->user->isGuest && $this->context->route !== 'site/login'): ?>
        <?php ?>
        <?php Yii::$app->response->redirect(['/site/login'])->send(); ?>
        <?php return; ?>
    <?php endif; ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => "Medical",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-md navbar-light']
        ]);

        $menuItems = [];
        if (!Yii::$app->user->isGuest) {
            $menuItems = [
                ['label' => 'Главная', 'url' => ['/site/index'], 'active' => $this->context->route == 'site/index'],
            ];

            if (Yii::$app->user->identity->role == 1) {
                $menuItems[] = ['label' => 'Доктора', 'url' => ['/doctors/index'], 'active' => strpos($this->context->route, 'doctors') === 0];
            }

            $menuItems = array_merge($menuItems, [
                ['label' => 'Пациенты', 'url' => ['/pacient/index'], 'active' => strpos($this->context->route, 'pacient') === 0],
                ['label' => 'Лекарства', 'url' => ['/medications/index'], 'active' => strpos($this->context->route, 'medications') === 0],
                ['label' => 'Учет лекарств', 'url' => ['/logs/index'], 'active' => strpos($this->context->route, 'logs') === 0],
                ['label' => 'Результаты', 'url' => ['/results/index'], 'active' => strpos($this->context->route, 'results') === 0],
                ['label' => 'Прием', 'url' => ['/visits/index'], 'active' => strpos($this->context->route, 'visits') === 0],
                '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'nav-link logout']
                )
                . Html::endForm()
                . '</li>'
            ]);

        } else {
            $menuItems = [
                ['label' => 'Вход', 'url' => ['/site/login'], 'active' => $this->context->route == 'site/login']
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto'],
            'items' => $menuItems
        ]);

        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container <?= Yii::$app->user->isGuest ? 'login-page' : '' ?>">
            <?php if (!Yii::$app->user->isGuest && !empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget([
                    'links' => $this->params['breadcrumbs'],
                    'options' => ['class' => 'breadcrumb'],
                    'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                    'activeItemTemplate' => '<li class="breadcrumb-item active">{link}</li>'
                ]) ?>
            <?php endif ?>

            <?= Alert::widget() ?>

            <?php if (Yii::$app->user->isGuest && $this->context->route === 'site/login'): ?>
                <div class="login-box">
                    <?= $content ?>
                </div>
            <?php else: ?>
                <?= $content ?>
            <?php endif; ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    © Медицинская клиника <?= date('Y') ?>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header#header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>