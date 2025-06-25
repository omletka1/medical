<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medications $model */

$this->title = 'Create Medications';
$this->params['breadcrumbs'][] = ['label' => 'Medications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
