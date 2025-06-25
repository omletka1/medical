<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabResults $model */

$this->title = 'Update Lab Results: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lab Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lab-results-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
