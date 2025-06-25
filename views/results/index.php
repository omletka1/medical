<?php

use app\models\LabResults;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LabResultsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Лабораторные результаты';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    /* Основные стили страницы */
    .lab-results-index {
        padding: 30px 0;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .lab-results-index h1 {
        font-family: 'Montserrat', sans-serif;
        color: #0066cc;
        margin-bottom: 30px;
        font-weight: 700;
        position: relative;
        display: inline-block;
    }

    .lab-results-index h1::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 3px;
        background: #0066cc;
        border-radius: 3px;
    }

    /* Кнопка создания */
    .btn-create-lab {
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

    .btn-create-lab:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 102, 204, 0.4);
        color: white;
    }

    .btn-create-lab::before {
        content: '+';
        margin-right: 8px;
        font-size: 1.2em;
    }

    /* Стили для таблицы */
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

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(0, 102, 204, 0.03);
        transform: translateX(5px);
    }

    .table tbody tr:hover td {
        color: #0066cc;
    }

    /* Стили для кнопок действий */
    .action-column {
        width: 120px;
        text-align: center;
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

    .action-column a:hover {
        transform: scale(1.1);
    }

    .action-column .btn-view {
        color: #0066cc;
        background: rgba(0, 102, 204, 0.1);
    }

    .action-column .btn-view:hover {
        background: rgba(0, 102, 204, 0.2);
    }

    .action-column .btn-update {
        color: #28a745;
        background: rgba(40, 167, 69, 0.1);
    }

    .action-column .btn-update:hover {
        background: rgba(40, 167, 69, 0.2);
    }

    .action-column .btn-delete {
        color: #dc3545;
        background: rgba(220, 53, 69, 0.1);
    }

    .action-column .btn-delete:hover {
        background: rgba(220, 53, 69, 0.2);
    }

    /* Карточки */
    #cards-view {
        margin-top: 30px;
        display: none;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }
    #cards-view .card {
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        padding: 15px;
        width: 300px;
        background: #fff;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    #cards-view .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 102, 204, 0.3);
    }
    #cards-view .card-header {
        font-weight: 700;
        color: #0066cc;
        margin-bottom: 15px;
        font-size: 1.1em;
        border-bottom: 2px solid #0066cc;
        padding-bottom: 5px;
    }
    #cards-view .card-body p {
        margin: 6px 0;
        font-size: 0.95em;
        color: #333;
    }
    #cards-view .card-footer {
        margin-top: 15px;
        text-align: right;
    }
    #cards-view .card-footer a {
        margin-left: 8px;
        display: inline-block;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        transition: all 0.3s ease;
    }
    #cards-view .btn-view {
        color: #0066cc;
        background: rgba(0, 102, 204, 0.1);
    }
    #cards-view .btn-view:hover {
        background: rgba(0, 102, 204, 0.2);
    }
    #cards-view .btn-update {
        color: #28a745;
        background: rgba(40, 167, 69, 0.1);
    }
    #cards-view .btn-update:hover {
        background: rgba(40, 167, 69, 0.2);
    }
    #cards-view .btn-delete {
        color: #dc3545;
        background: rgba(220, 53, 69, 0.1);
    }
    #cards-view .btn-delete:hover {
        background: rgba(220, 53, 69, 0.2);
    }

    /* Адаптация для мобильных */
    @media (max-width: 768px) {
        .table-responsive {
            border-radius: 8px;
        }

        .table th, .table td {
            padding: 10px;
        }

        .action-column {
            width: auto;
        }

        #cards-view .card {
            width: 100%;
        }
    }
</style>

<div class="lab-results-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <?= Html::a('Добавить результат', ['create'], ['class' => 'btn btn-create-lab']) ?>
        <button id="toggle-view" class="btn btn-outline-secondary">
            <i class="fas fa-th-large"></i> Переключить вид
        </button>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-hover'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                    'header' => '№',
                    'contentOptions' => ['style' => 'width: 50px;']],

                'id',
                [
                    'attribute' => 'user_id',
                    'label' => 'Пациент',
                    'value' => function($model) {
                        return $model->user->surname ?? 'Не указано';
                    },
                ],
                [
                    'attribute' => 'test_type',
                    'label' => 'Тип теста',
                ],
                [
                    'attribute' => 'date_taken',
                    'label' => 'Дата сдачи',
                    'format' => ['date', 'php:d.m.Y'],
                ],
                [
                    'attribute' => 'results',
                    'label' => 'Результаты',
                    'format' => 'ntext',
                ],

                [
                    'class' => ActionColumn::className(),
                    'header' => 'Действия',
                    'headerOptions' => ['style' => 'width: 120px;'],
                    'contentOptions' => ['class' => 'action-column'],
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-eye"></i>', $url, [
                                'class' => 'btn-view',
                                'title' => 'Просмотр',
                            ]);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-pencil-alt"></i>', $url, [
                                'class' => 'btn-update',
                                'title' => 'Редактировать',
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-trash"></i>', $url, [
                                'class' => 'btn-delete',
                                'title' => 'Удалить',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите удалить этот результат?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                    'urlCreator' => function ($action, LabResults $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
    </div>

    <!-- Вид карточек -->
    <div class="d-flex flex-wrap" id="cards-view">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="card mb-4">
                <div class="card-header">
                    Результат #<?= Html::encode($model->id) ?>
                </div>
                <div class="card-body">
                    <p><strong>Пользователь:</strong> <?= Html::encode($model->user_id) ?></p>
                    <p><strong>Тип теста:</strong> <?= Html::encode($model->test_type) ?></p>
                    <p><strong>Дата сдачи:</strong> <?= Yii::$app->formatter->asDate($model->date_taken, 'php:d.m.Y') ?></p>
                    <p><strong>Результаты:</strong> <?= nl2br(Html::encode($model->results)) ?></p>
                </div>
                <div class="card-footer">
                    <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $model->id], [
                        'class' => 'btn btn-view btn-sm',
                        'title' => 'Просмотр',
                    ]) ?>
                    <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-update btn-sm',
                        'title' => 'Редактировать',
                    ]) ?>
                    <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-delete btn-sm',
                        'title' => 'Удалить',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить этот результат?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
?>

<script>
    document.getElementById('toggle-view').addEventListener('click', function() {
        const tableView = document.querySelector('.table-responsive');
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

    // Добавим анимацию на строки таблицы при наведении
    const rows = document.querySelectorAll('.table tbody tr');
    rows.forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.style.transform = 'translateX(5px)';
            row.style.color = '#0066cc';
        });
        row.addEventListener('mouseleave', () => {
            row.style.transform = 'translateX(0)';
            row.style.color = 'inherit';
        });
    });
</script>