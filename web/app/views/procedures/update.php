<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Procedures $model */

$this->title = 'Update Procedures: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Procedures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="procedures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
