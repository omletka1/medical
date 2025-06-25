<?php

use app\models\Procedures;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProceduresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Процедуры';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .procedures-index {
        padding: 30px 0;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .procedures-index h1 {
        font-family: 'Montserrat', sans-serif;
        color: #0066cc;
        margin-bottom: 30px;
        font-weight: 700;
        position: relative;
        display: inline-block;
    }

    .procedures-index h1::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: #0066cc;
        border-radius: 3px;
    }

    .btn-create-procedure {
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
    }

    .btn-create-procedure:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
        color: white;
    }

    .btn-create-procedure::before {
        content: '+';
        margin-right: 8px;
        font-size: 1.2em;
    }

    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        margin-top: 30px;
        animation: slideUp 0.8s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .table thead {
        background: linear-gradient(135deg, #0066cc, #004d99);
        color: white;
    }

    .table th {
        border: none;
        padding: 15px;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85em;
        letter-spacing: 0.5px;
    }

    .table td {
        padding: 15px;
        vertical-align: middle;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(0, 102, 204, 0.03);
        transform: translateX(5px);
    }

    .table tbody tr:hover td {
        color: #0066cc;
    }

    .action-column a {
        display: inline-block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        margin: 0 2px;
        transition: all 0.3s ease;
    }

    .action-column .btn-view {
        color: #0066cc;
        background: rgba(0, 102, 204, 0.1);
    }

    .action-column .btn-update {
        color: #28a745;
        background: rgba(40, 167, 69, 0.1);
    }

    .action-column .btn-delete {
        color: #dc3545;
        background: rgba(220, 53, 69, 0.1);
    }

    #cards-view {
        display: none !important;
        margin-top: 30px;
        gap: 20px;
    }

    .card {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        .table th, .table td {
            padding: 10px;
        }
    }
</style>

<div class="procedures-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row mb-3">
        <div class="col-md-6">
            <?= Html::a('Добавить процедуру', ['create'], ['class' => 'btn btn-create-procedure']) ?>
        </div>
        <div class="col-md-6 text-end">
            <button id="toggle-view" class="btn btn-outline-secondary">
                <i class="fas fa-th-large"></i> Переключить вид
            </button>
        </div>
    </div>

    <div class="table-responsive" id="table-view">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-hover'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn', 'header' => '№'],

                [
                    'attribute' => 'user_id',
                    'label' => 'Пользователь',
                ],
                [
                    'attribute' => 'procedure_name',
                    'label' => 'Название процедуры',
                ],
                [
                    'attribute' => 'date_performed',
                    'label' => 'Дата проведения',
                    'format' => ['date', 'php:d.m.Y'],
                ],
                [
                    'attribute' => 'description',
                    'label' => 'Описание',
                    'format' => 'ntext',
                ],
                [
                    'class' => ActionColumn::className(),
                    'header' => 'Действия',
                    'contentOptions' => ['class' => 'action-column'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => fn($url, $model) =>
                        Html::a('<i class="fas fa-eye"></i>', $url, ['class' => 'btn-view', 'title' => 'Просмотр']),
                        'update' => fn($url, $model) =>
                        Html::a('<i class="fas fa-pencil-alt"></i>', $url, ['class' => 'btn-update', 'title' => 'Редактировать']),
                        'delete' => fn($url, $model) =>
                        Html::a('<i class="fas fa-trash"></i>', $url, [
                            'class' => 'btn-delete',
                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить эту процедуру?',
                                'method' => 'post',
                            ],
                        ]),
                    ],
                    'urlCreator' => fn($action, Procedures $model) =>
                    Url::toRoute([$action, 'id' => $model->id]),
                ],
            ],
        ]); ?>
    </div>

    <div class="row" id="cards-view" class="d-flex flex-wrap">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Процедура #<?= Html::encode($model->id) ?>
                    </div>
                    <div class="card-body">
                        <p><strong>Пользователь:</strong> <?= Html::encode($model->user_id) ?></p>
                        <p><strong>Название:</strong> <?= Html::encode($model->procedure_name) ?></p>
                        <p><strong>Дата:</strong> <?= Yii::$app->formatter->asDate($model->date_performed, 'php:d.m.Y') ?></p>
                        <p><strong>Описание:</strong> <?= Html::encode($model->description) ?></p>
                    </div>
                    <div class="card-footer text-end">
                        <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], [
                            'class' => 'btn btn-view btn-sm me-1',
                            'title' => 'Просмотр',
                        ]) ?>
                        <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], [
                            'class' => 'btn btn-update btn-sm me-1',
                            'title' => 'Редактировать',
                        ]) ?>
                        <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-delete btn-sm',
                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить эту процедуру?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
?>

<script>
    document.getElementById('toggle-view').addEventListener('click', function () {
        const tableView = document.getElementById('table-view');
        const cardsView = document.getElementById('cards-view');

        if (tableView.style.display === 'none') {
            tableView.style.display = 'block';
            cardsView.style.display = 'none';
            this.innerHTML = '<i class="fas fa-th-large"></i> Переключить вид';
        } else {
            tableView.style.display = 'none';
            cardsView.style.display = 'flex';
            this.innerHTML = '<i class="fas fa-table"></i> Переключить вид';
        }
    });
</script>
