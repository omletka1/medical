<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход в систему';
$this->params['breadcrumbs'][] = $this->title;
?>

    <style>
        :root {
            --primary-color: #3a7bd5;
            --primary-light: #4a8be5;
            --primary-dark: #2a6bc5;
            --secondary-color: #00d2ff;
            --accent-color: #ff5e62;
            --light-color: #f8f9fa;
            --dark-color: #2c3e50;
            --text-color: #4a4a4a;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.16);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .site-login {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px 30px;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .site-login h1 {
            color: var(--primary-color);
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .site-login h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 3px;
        }

        .site-login p {
            text-align: center;
            color: var(--text-color);
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 500;
            color: white;
            transition: var(--transition);
            width: 100%;
            box-shadow: var(--shadow-sm);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            color: white;
        }

        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: var(--primary-color);
            border-color: var(--primary-light);
        }

        .login-help {
            text-align: center;
            margin-top: 30px;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .login-help code {
            background: rgba(0, 0, 0, 0.05);
            padding: 2px 4px;
            border-radius: 4px;
        }

        .invalid-feedback {
            color: var(--accent-color);
        }
    </style>

    <div class="site-login">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, заполните следующие поля для входа в систему:</p>

        <div class="row">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'form-label'],
                        'inputOptions' => ['class' => 'form-control'],
                        'errorOptions' => ['class' => 'invalid-feedback'],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true, 'placeholder' => 'Введите ваш логин'])
                    ->label('Логин') ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => 'Введите ваш пароль'])
                    ->label('Пароль') ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"form-check mb-3\">{input} {label}</div>\n<div>{error}</div>",
                    'class' => 'form-check-input',
                    'labelOptions' => ['class' => 'form-check-label']
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-login', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="login-help">
                    Для теста вы можете войти с: <strong>admin/admin</strong> или <strong>demo/demo</strong>.<br>
                    Для изменения данных пользователей проверьте <code>app\models\User::$users</code>.
                </div>
            </div>
        </div>
    </div>

<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
?>