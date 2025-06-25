<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DoctorsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="doctors-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'id')->textInput(['placeholder' => 'ID']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'Имя']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Фамилия']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'specialization')->textInput(['placeholder' => 'Специализация']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Телефон']) ?>
        </div>
    </div>

    <div class="form-group mt-3 d-flex flex-wrap gap-2">
        <?= Html::submitButton('<i class="fas fa-search"></i> Найти', ['class' => 'btn-search-doctor']) ?>
        <?= Html::resetButton('<i class="fas fa-undo-alt"></i> Сбросить', ['class' => 'btn-reset-doctor']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
