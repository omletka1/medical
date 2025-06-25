<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medications $model */

$this->title = 'Редактировать препарат: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Препараты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';

$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');

$this->registerCss(<<<CSS
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

.medications-update {
    max-width: 700px;
    margin: 40px auto;
    padding: 30px 25px;
    background: #f9fbff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 102, 204, 0.1);
    font-family: 'Montserrat', sans-serif;
    animation: fadeInSlide 0.5s ease forwards;
}

@keyframes fadeInSlide {
    from {opacity: 0; transform: translateY(20px);}
    to {opacity: 1; transform: translateY(0);}
}

.medications-update h1 {
    color: #004a99;
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 25px;
    text-align: center;
    position: relative;
}

.medications-update h1::after {
    content: "";
    width: 70px;
    height: 4px;
    background: linear-gradient(90deg, #0066cc, #3399ff);
    position: absolute;
    left: 50%;
    bottom: -12px;
    transform: translateX(-50%);
    border-radius: 3px;
}

.btn-save-medication {
    background: linear-gradient(135deg, #007bff, #004a99);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 12px 28px;
    font-weight: 600;
    font-size: 15px;
    box-shadow: 0 6px 15px rgba(0, 102, 204, 0.3);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    margin-top: 20px;
}

.btn-save-medication:hover {
    background: linear-gradient(135deg, #004a99, #002f66);
    box-shadow: 0 8px 25px rgba(0, 74, 153, 0.45);
    transform: translateY(-2px);
}

.medications-update label {
    font-weight: 600;
    color: #004a99;
    margin-bottom: 6px;
    display: block;
}

.medications-update input[type="text"],
.medications-update input[type="email"],
.medications-update textarea {
    border: 1.8px solid #a8c0ff;
    border-radius: 8px;
    padding: 10px 14px;
    font-size: 14px;
    width: 100%;
    transition: border-color 0.3s ease;
    margin-bottom: 12px;
}

.medications-update input[type="text"]:focus,
.medications-update input[type="email"]:focus,
.medications-update textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
}
CSS
);
?>

<div class="medications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'buttonClass' => 'btn-save-medication', // передаём стиль кнопки
    ]) ?>

</div>
