<?php

namespace app\controllers;

use app\models\Application;
use app\models\Bilet;
use app\models\Category;
use app\models\Comments;
use app\models\DoctorVisits;
use app\models\LabResults;
use app\models\MedicationLogs;
use app\models\News;
use app\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        // Статистика для врача
        $todayVisits = DoctorVisits::find()
            ->where(['doctor_id' => Yii::$app->user->id])
            ->andWhere(['visit_date' => date('Y-m-d')])
            ->count();

        $totalPatients = DoctorVisits::find()
            ->select('user_id')
            ->where(['doctor_id' => Yii::$app->user->id])
            ->distinct()
            ->count();

        $pendingResults = LabResults::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->count();

        $prescriptions = MedicationLogs::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->count();

        // Ближайшие записи
        $upcomingVisits = DoctorVisits::find()
            ->with('user')
            ->where(['doctor_id' => Yii::$app->user->id])
            ->andWhere(['>=', 'visit_date', date('Y-m-d')])
            ->orderBy('visit_date ASC')
            ->limit(5)
            ->all();

        // Последние результаты анализов
        $recentResults = LabResults::find()
            ->with('user')
            ->where(['user_id' => Yii::$app->user->id])
            ->orderBy('date_taken DESC')
            ->limit(5)
            ->all();

        return $this->render('index', [
            'todayVisits' => $todayVisits,
            'totalPatients' => $totalPatients,
            'pendingResults' => $pendingResults,
            'prescriptions' => $prescriptions,
            'upcomingVisits' => $upcomingVisits,
            'recentResults' => $recentResults,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionComend()
    {
        $model = new Comments();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goBack();
        }
        return $this->render('comend',
            [
                'model' => $model
            ]);
    }
    public function actionCategory(){
        $categorys = Category::find()->all();
        return $this->render('category', ['categorys'=>$categorys]);
    }

    public function actionNews($id)
    {
        $category = Category::findOne($id);
        $news = News::find()->where(['category_id' => $id])->all();

        return $this->render('news', [
            'category' => $category,
            'news' => $news,
        ]);
    }
    public function actionSignup()
    {
        $us = new SignupForm();
        if ($us->load(Yii::$app->request->post()) && $us->signup()) {
            return $this->goHome();
        }
        return $this->render('signup', [
            'us' => $us
        ]);
    }
    public function actionBilet()
    {
        $model = new Bilet();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id; // Добавляем user_id
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные успешно сохранены');
                return $this->refresh();
            }
        }

        return $this->render('bilet', [
            'model' => $model
        ]);
    }

}
