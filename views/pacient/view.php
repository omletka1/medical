<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pacient $model */

$this->title = $model->surname.' '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пациенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

$this->registerCss(<<<CSS
.pacient-view {
    padding: 40px 20px;
    background: #fefefe;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    max-width: 900px;
    margin: 40px auto;
    font-family: 'Montserrat', sans-serif;
    animation: fadeInSlide 0.6s ease-out;
}

@keyframes fadeInSlide {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.pacient-view h1 {
    font-weight: 700;
    font-size: 26px;
    color: #003366;
    text-align: center;
    margin-bottom: 30px;
    position: relative;
}

.pacient-view h1::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #0066cc, #00bfff);
    border-radius: 4px;
}

.pacient-view p {
    text-align: center;
    margin-bottom: 30px;
}

/* Кнопки */
.btn-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    font-weight: 600;
    text-transform: uppercase;
    border-radius: 8px;
    border: none;
    transition: all 0.3s ease;
    font-size: 14px;
    cursor: pointer;
}

.btn-update {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

.btn-update:hover {
    background: linear-gradient(135deg, #0056b3, #003d7a);
    transform: translateY(-1px);
}

.btn-delete {
    background: linear-gradient(135deg, #dc3545, #a71d2a);
    color: white;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    margin-left: 12px;
}

.btn-delete:hover {
    background: linear-gradient(135deg, #a71d2a, #7a1520);
    transform: translateY(-1px);
}

/* Детали */
.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f4f8fb;
}

.detail-view th {
    width: 30%;
    font-weight: 600;
    color: #004a99;
    background-color: #f8f9fa;
}

.detail-view td {
    padding: 12px 15px;
    border-top: 1px solid #dee2e6;
}
CSS
);
?>

<div class="pacient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="fas fa-edit"></i> Редактировать', ['update', 'id' => $model->id], ['class' => 'btn-action btn-update']) ?>
        <?= Html::a('<i class="fas fa-trash"></i> Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn-action btn-delete',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этого пациента?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute' => 'surname', 'label' => 'Фамилия'],
            ['attribute' => 'name', 'label' => 'Имя'],
            ['attribute' => 'patronymic', 'label' => 'Отчество'],
            ['attribute' => 'email', 'label' => 'Email', 'format' => 'email'],
            ['attribute' => 'created_at', 'label' => 'Дата создания'],
            ['attribute' => 'updated_at', 'label' => 'Дата обновления'],
        ],
        'options' => ['class' => 'table table-striped detail-view'],
    ]) ?>

</div>