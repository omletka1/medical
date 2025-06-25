<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LabResults $model */

$this->title = 'Create Lab Results';
$this->params['breadcrumbs'][] = ['label' => 'Lab Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-results-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
