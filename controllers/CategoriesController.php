<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\UploadedFile;
    use app\models\Categories;
    use app\models\CategoriesSearch;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class CategoriesController extends Controller
    {
        public function behaviors()
        {
            return [
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

        //Главная страница категорий
        public function actionIndex()
        {
            $searchModel = new CategoriesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Добавить категорию
        public function actionCreate()
        {
            $model = new Categories();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->imglink = UploadedFile::getInstances($model, 'imglink');
                    $temp_name = time() . '_category.' . $model->imglink[0]->extension;
                    if ($model->imglink[0]->saveAs('uploads/' . $temp_name)) {
                        $model->imglink = 'uploads/' . $temp_name;
                    }

                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Категория успешно добавлена");
                    return $this->redirect(['index']);
                }
            }

            return $this->render('create', compact(['model']));
        }

        //Редактировать категорию
        public function actionUpdate($id)
        {
            $model = Categories::findOne($id);
            $model->picture_now = $model->imglink;

            if ($model->load(Yii::$app->request->post()) && $model->upcategory()) {
               
            }

            return $this->render('update', compact(['model']));
        }

        //Удалить категорию
        public function actionDelete($id)
        {
            $model = Categories::findOne($id);

            if (file_exists($model->imglink)) {
                unlink($model->imglink);
            }

            Categories::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Категория меню успешно удалена");

            return $this->redirect(['/categories/index']);
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Categories::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>