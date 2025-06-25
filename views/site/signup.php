<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    /* Основные стили формы */
    .site-signup {
        max-width: 600px;
        margin: 0 auto;
        padding: 40px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 102, 204, 0.1);
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .site-signup h1 {
        color: #0066cc;
        font-weight: 700;
        text-align: center;
        margin-bottom: 20px;
        position: relative;
    }

    .site-signup h1::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(to right, #0066cc, #00d2ff);
        border-radius: 3px;
    }

    .site-signup p {
        text-align: center;
        color: #666;
        margin-bottom: 30px;
    }

    /* Стили полей формы */
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #0066cc;
        box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
    }

    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }

    /* Чекбокс */
    .form-check {
        margin: 20px 0 25px;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        margin-top: 0.2em;
    }

    .form-check-label {
        margin-left: 8px;
        color: #555;
    }

    /* Кнопка регистрации */
    .btn-signup {
        background: linear-gradient(135deg, #0066cc, #00a1ff);
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 500;
        color: white;
        transition: all 0.3s ease;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 102, 204, 0.2);
    }

    .btn-signup:hover {
        background: linear-gradient(135deg, #005bb7, #0088cc);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 102, 204, 0.3);
        color: white;
    }

    /* Ошибки валидации */
    .invalid-feedback {
        color: #ff5e62;
        font-size: 0.85rem;
        margin-top: 5px;
    }

    /* Адаптация для мобильных */
    @media (max-width: 768px) {
        .site-signup {
            padding: 30px 20px;
        }

        .form-control {
            padding: 10px 12px;
        }
    }
</style>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Заполните форму для регистрации в системе</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($us, 'surname')->textInput([
                        'autofocus' => true,
                        'placeholder' => 'Введите вашу фамилию'
                    ])->label('Фамилия') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($us, 'name')->textInput([
                        'placeholder' => 'Введите ваше имя'
                    ])->label('Имя') ?>
                </div>
            </div>

            <?= $form->field($us, 'username')->textInput([
                'placeholder' => 'Придумайте логин'
            ])->label('Логин') ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($us, 'password')->passwordInput([
                        'placeholder' => 'Не менее 6 символов'
                    ])->label('Пароль') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($us, 'password_repeat')->passwordInput([
                        'placeholder' => 'Повторите пароль'
                    ])->label('Подтверждение пароля') ?>
                </div>
            </div>

            <?= $form->field($us, 'email')->textInput([
                'placeholder' => 'example@mail.ru'
            ])->label('Email') ?>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">
                    Я согласен с <a href="#" style="color: #0066cc;">правилами обработки данных</a>
                </label>
            </div>

            <div class="form-group" style="margin-top: 25px;">
                <?= Html::submitButton('Зарегистрироваться', [
                    'class' => 'btn btn-signup',
                    'name' => 'signup-button'
                ]) ?>
            </div>

            <div style="text-align: center; margin-top: 20px; color: #666;">
                Уже есть аккаунт? <?= Html::a('Войти', ['/site/login'], ['style' => 'color: #0066cc;']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>