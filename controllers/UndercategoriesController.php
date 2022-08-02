<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\UploadedFile;
    use app\models\Undercategories;
    use app\models\UndercategoriesSearch;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class UndercategoriesController extends Controller
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

        //Главная страница подкатегорий
        public function actionIndex()
        {
            $searchModel = new UndercategoriesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Добавить подкатегорию (напитки)
        public function actionCreate()
        {
            $model = new Undercategories();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->id_product_categories = 7;
                    
                    $model->imglink = UploadedFile::getInstances($model, 'imglink');
                    $temp_name = time() . '_undercategory.' . $model->imglink[0]->extension;
                    if ($model->imglink[0]->saveAs('uploads/' . $temp_name)) {
                        $model->imglink = 'uploads/' . $temp_name;
                    }

                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Подкатегория успешно добавлена");
                    return $this->redirect(['index']);
                }
            }

            return $this->render('create', compact(['model']));
        }

        //Редактировать подкатегорию
        public function actionUpdate($id)
        {
            $model = Undercategories::findOne($id);
            $model->picture_now = $model->imglink;

            if ($model->load(Yii::$app->request->post()) && $model->upundercategory()) {
               
            }

            return $this->render('update', compact(['model']));
        }

        //Удалить подкатегорию
        public function actionDelete($id)
        {
            $model = Undercategories::findOne($id);

            if (file_exists($model->imglink)) {
                unlink($model->imglink);
            }

            Undercategories::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Подкатегория меню успешно удалена");

            return $this->redirect(['/undercategories/index']);
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Undercategories::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>