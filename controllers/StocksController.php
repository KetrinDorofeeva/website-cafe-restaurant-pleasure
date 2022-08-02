<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use app\models\Stocks;
    use app\models\StocksSearch;
    use yii\web\UploadedFile;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class StocksController extends Controller
    {
        public function behaviors()
        {
            return[
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index', 'create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ];
        }

        //Главная страница акций
        public function actionIndex()
        {
            $searchModel = new StocksSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Добавить акцию
        public function actionCreate()
        {
            $model = new Stocks();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->imglink = UploadedFile::getInstances($model, 'imglink');
                    $temp_name = time() . '_stocks.' . $model->imglink[0]->extension;
                    if ($model->imglink[0]->saveAs('uploads/' . $temp_name)) {
                        $model->imglink = 'uploads/' . $temp_name;
                    }

                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Акция успешно добавлена");
                    return $this->redirect(['index']);
                }
            }

            return $this->render('create', compact(['model']));
        }

        //Редактировать акцию
        public function actionUpdate($id)
        {
            $model = Stocks::findOne($id);
            $model->picture_now = $model->imglink;

            if ($model->load(Yii::$app->request->post()) && $model->upstock()) {
               
            }

            return $this->render('update', compact(['model']));
        }

        //Удалить акцию
        public function actionDelete($id)
        {
            $model = Stocks::findOne($id);

            if (file_exists($model->imglink)) {
                unlink($model->imglink);
            }

            Stocks::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Акция успешно удалена");

            return $this->redirect(['/stocks/index']);
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Stocks::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>