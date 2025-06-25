<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Doctors $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

$this->registerCss(<<<CSS
.doctors-form {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
    animation: fadeIn 0.8s ease-out;
    max-width: 800px;
    margin: 0 auto;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.btn-save-doctor {
    background: linear-gradient(135deg, #0066cc, #004d99);
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-weight: 600;
    color: white;
    box-shadow: 0 4px 15px rgba(0, 102, 204, 0.3);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-save-doctor:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
    color: white;
}
CSS);
?>

<div class="doctors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'Имя')) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'Фамилия')) ?>
    <?= $form->field($model, 'specialization')->textInput(['maxlength' => true])->label(Yii::t('app', 'Специализация')) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label(Yii::t('app', 'Телефон')) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(Yii::t('app', 'Email')) ?>
    <?= $form->field($model, 'address')->textarea(['rows' => 6])->label(Yii::t('app', 'Адрес')) ?>

    <div class="form-group mt-3">
        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Сохранить'), ['class' => 'btn-save-doctor']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
