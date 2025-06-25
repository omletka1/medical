<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DoctorVisits $model */

$this->title = 'Update Doctor Visits: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-visits-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
