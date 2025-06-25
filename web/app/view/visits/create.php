<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DoctorVisits $model */

$this->title = 'Create Doctor Visits';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-visits-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
