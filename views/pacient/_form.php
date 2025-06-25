<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pacient $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    .pacient-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 25px 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 25px rgba(0, 102, 204, 0.15);
        animation: fadeIn 0.8s ease-out;
        font-family: 'Montserrat', sans-serif;
        color: #333;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .pacient-form .form-group label {
        font-weight: 600;
        color: #0066cc;
    }

    .pacient-form .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 14px;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .pacient-form .form-control:focus {
        border-color: #0066cc;
        box-shadow: 0 0 8px rgba(0, 102, 204, 0.3);
        outline: none;
    }

    .btn-save-pacient {
        background: linear-gradient(135deg, #0066cc, #004d99);
        border: none;
        border-radius: 8px;
        padding: 12px 25px;
        font-weight: 700;
        color: white;
        box-shadow: 0 5px 18px rgba(0, 102, 204, 0.35);
        transition: all 0.3s ease;
        cursor: pointer;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem;
    }

    .btn-save-pacient:hover {
        background: linear-gradient(135deg, #004d99, #003366);
        box-shadow: 0 7px 22px rgba(0, 77, 153, 0.5);
        transform: translateY(-2px);
    }
</style>

<div class="pacient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true])->label('Фамилия') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Имя') ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true])->label('Отчество') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Сохранить', ['class' => 'btn-save-pacient']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>