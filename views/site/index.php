<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Панель врача | Медицинская система';
?>
    <style>
        :root {
            --primary-color: #3a7bd5;
            --primary-light: #4a8be5;
            --primary-dark: #2a6bc5;
            --secondary-color: #00d2ff;
            --accent-color: #ff5e62;
            --light-color: #f8f9fa;
            --dark-color: #2c3e50;
            --text-color: #4a4a4a;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.16);
            --transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Poppins', 'Roboto', sans-serif;
            background-color: #f5f7fa;
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .site-index {
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Карточки */
        .doctor-card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            margin-bottom: 25px;
            overflow: hidden;
            position: relative;
            border: none;
            height: 100%;
        }

        .doctor-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            transition: var(--transition);
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .doctor-card:hover::before {
            width: 6px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 18px 25px;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
        }

        .card-header i {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 25px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stat-label {
            color: #7f8c8d;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .btn-doctor {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            text-decoration: none;
        }

        .btn-doctor i {
            margin-right: 8px;
        }

        .btn-doctor:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: white;
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .recent-table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border-collapse: separate;
            border-spacing: 0;
        }

        .recent-table th {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 14px 18px;
            text-align: left;
            font-weight: 500;
        }

        .recent-table td {
            padding: 14px 18px;
            border-bottom: 1px solid #f0f0f0;
            transition: var(--transition);
        }

        .recent-table tr:last-child td {
            border-bottom: none;
        }

        .recent-table tr:hover td {
            background-color: rgba(58, 123, 213, 0.05);
            transform: translateX(4px);
        }

        /* Стили для погоды */
        .weather-widget-container {
            position: relative;
            height: 100%;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }



        .weather-loading {
            font-size: 1.2rem;
        }

        .weather-icon {
            font-size: 3rem;
            margin-bottom: 10px;
            animation: pulse 2s infinite;
        }

        .weather-temp {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .weather-desc {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .weather-details {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 20px;
        }

        .weather-detail {
            text-align: center;
            flex: 1;
        }

        .weather-detail i {
            margin-bottom: 5px;
            display: block;
            font-size: 1.5rem;
        }

        .weather-location {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .weather-location i {
            margin-right: 8px;
        }

        .weather-refresh {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            z-index: 3;
        }

        .weather-refresh:hover {
            background: rgba(255,255,255,0.3);
            transform: rotate(180deg);
        }

        /* Анимации */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .animated-card {
            opacity: 0;
            animation: fadeInUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
        }

        .delay-1 { animation-delay: 0.15s; }
        .delay-2 { animation-delay: 0.3s; }
        .delay-3 { animation-delay: 0.45s; }
        .delay-4 { animation-delay: 0.6s; }

        .floating {
            animation: float 6s ease-in-out infinite;
        }



        .quick-actions .btn-doctor {
            width: 100%;
            margin-bottom: 10px;
            transition: var(--transition);
        }

        .quick-actions .btn-doctor:hover {
            transform: translateY(-5px) scale(1.02);
        }

        /* Стили для скрытия рекламы виджета */
        .elfsight-app-container {
            position: relative;
        }

        .elfsight-app-container .elfsight-app-badge {
            display: none !important;
        }

        /* Адаптивность */
        @media (max-width: 992px) {
            .stat-number {
                font-size: 2.2rem;
            }

            .card-header {
                padding: 15px 20px;
            }

            .card-body {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .stat-number {
                font-size: 2rem;
            }

            .btn-doctor {
                padding: 10px 15px;
                font-size: 0.9rem;
            }

            .weather-widget-overlay {
                padding: 15px;
            }

            .weather-temp {
                font-size: 2rem;
            }

            .weather-details {
                flex-direction: column;
            }

            .weather-detail {
                margin-bottom: 10px;
            }
            .weather-widget-container {
                position: relative;
                height: 100%;
                overflow: hidden;
                border-radius: 12px;
                box-shadow: var(--shadow-sm);
                padding: 0;
            }

            .elfsight-app-fe9f0031-c59b-419b-99f8-adf3bf2400a4 {
                width: 100% !important;
                height: 100% !important;
                margin-left: 0 !important;
            }

            .OWMWidget {
                width: 100% !important;
                height: 100% !important;
                background: transparent !important;
                border: none !important;
            }

            .OWMWidget .widget-header,
            .OWMWidget .widget-footer {
                display: none !important;
            }


            .welcome-card h3 {
                margin-top: 0;
            }
            .OWMWidget .widget-content {
                padding: 0 !important;
                margin: 0 !important;
            }

            .weather-widget-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                z-index: 2;
                transition: var(--transition);
                padding: 20px;
            }
            .weather-widget-container {
                position: relative;
                height: 300px; /* Явно задаём высоту */
                min-height: 300px; /* Защита от сжатия */
                overflow: hidden;
                border-radius: 12px;
                box-shadow: var(--shadow-sm);
            }

            /* Стили для iframe виджета */
            .weather-widget-container iframe {
                width: 100% !important;
                height: 100% !important;
                border: none !important;
                display: block !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
            }
            /* Добавьте в стили */
            .site-index, .row, .col-md-8 {
                overflow: visible !important;
                opacity: 1 !important;
                visibility: visible !important;
                height: auto !important;
            }
            .welcome-card {
                z-index: 1000 !important;
                position: relative !important;
            }
            /* Скрываем ненужные элементы виджета */
            .elfsight-app-fe9f0031-c59b-419b-99f8-adf3bf2400a4 {
                display: block !important;
                width: 100% !important;
                height: 100% !important;
                min-height: 300px !important;
            }
        }
    </style>
    <div class="site-index">
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="doctor-card animated-card welcome-card floating" style="opacity: 1; animation: none;">
                    <div class="card-header" style="background: linear-gradient(135deg, #3a7bd5, #2a6bc5);">
                        <i class="fas fa-user-md"></i> Добро пожаловать, доктор <?= Yii::$app->user->identity->name ?? 'Пользователь' ?>!
                    </div>
                    <div class="card-body" style="padding: 25px;">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3 style="color: #3a7bd5; font-weight: 600; margin-bottom: 15px;">Медицинская информационная система</h3>
                                <p class="mb-0" style="color: #4a4a4a; font-size: 1rem;">
                                    Здесь вы можете управлять записями пациентов, просматривать результаты анализов и назначать лечение.
                                </p>
                            </div>
                            <div class="col-md-4 text-md-end">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="doctor-card animated-card delay-1" style="    width: 74%;
    height: 100%;">
                    <div class="weather-widget-wrapper" style="    height: 258px;">
                        <div class="elfsight-app-fe9f0031-c59b-419b-99f8-adf3bf2400a4" data-elfsight-app-lazy></div>
                    </div>
                </div>
            </div>
                </div>
            </div>


        <div class="row mb-4">
            <div class="col-md-3">
                <div class="doctor-card animated-card delay-1">
                    <div class="card-body text-center">
                        <div class="stat-number"><?= $todayVisits ?></div>
                        <div class="stat-label">Записей сегодня</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="doctor-card animated-card delay-1">
                    <div class="card-body text-center">
                        <div class="stat-number"><?= $totalPatients ?></div>
                        <div class="stat-label">Ваших пациентов</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="doctor-card animated-card delay-2">
                    <div class="card-body text-center">
                        <div class="stat-number"><?= $pendingResults ?></div>
                        <div class="stat-label">Результатов анализов</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="doctor-card animated-card delay-3">
                    <div class="card-body text-center">
                        <div class="stat-number"><?= $prescriptions ?></div>
                        <div class="stat-label">Назначений</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="doctor-card animated-card delay-2">
                    <div class="card-header">
                        <i class="fas fa-calendar-alt"></i> Ближайшие записи
                    </div>
                    <div class="card-body">
                        <?php if (!empty($upcomingVisits)): ?>
                            <table class="recent-table">
                                <thead>
                                <tr>
                                    <th>Пациент</th>
                                    <th>Дата</th>
                                    <th>Время</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($upcomingVisits as $visit): ?>
                                    <tr>
                                        <td><?= Html::encode($visit->user->surname . ' ' . $visit->user->name) ?></td>
                                        <td><?= Yii::$app->formatter->asDate($visit->visit_date) ?></td>
                                        <td><?= Html::encode($visit->notes) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted text-center py-3">Нет предстоящих записей</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="doctor-card animated-card delay-3">
                    <div class="card-header">
                        <i class="fas fa-flask"></i> Последние результаты анализов
                    </div>
                    <div class="card-body">
                        <?php if (!empty($recentResults)): ?>
                            <table class="recent-table">
                                <thead>
                                <tr>
                                    <th>Пациент</th>
                                    <th>Тип анализа</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($recentResults as $result): ?>
                                    <tr>
                                        <td><?= Html::encode($result->user->surname . ' ' . $result->user->name) ?></td>
                                        <td><?= Html::encode($result->test_type) ?></td>
                                        <td><?= Yii::$app->formatter->asDate($result->date_taken) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-muted text-center py-3">Нет последних результатов</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="doctor-card animated-card delay-4">
                <div class="card-header">
                    <i class="fas fa-bolt"></i> Быстрые действия
                </div>
                <div class="card-body quick-actions">
                    <div class="row text-center">
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= Url::to(['/visits/index']) ?>" class="btn btn-doctor">
                                <i class="fas fa-calendar-check"></i> Все записи
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= Url::to(['/results/index']) ?>" class="btn btn-doctor">
                                <i class="fas fa-flask"></i> Результаты
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= Url::to(['/logs/index']) ?>" class="btn btn-doctor">
                                <i class="fas fa-pills"></i> Назначения
                            </a>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <a href="<?= Url::to(['/procedures/index']) ?>" class="btn btn-doctor">
                                <i class="fas fa-procedures"></i> Процедуры
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script

<?php
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
$this->registerJsFile('https://static.elfsight.com/platform/platform.js', ['async' => true, 'position' => \yii\web\View::POS_HEAD]);
?>