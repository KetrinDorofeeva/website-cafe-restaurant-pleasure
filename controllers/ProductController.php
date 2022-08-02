<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\web\UploadedFile;
    use app\models\Product;
    use app\models\ProductSearch;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class ProductController extends Controller
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

        //Главная страница товаров
        public function actionIndex()
        {
            $searchModel = new ProductSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Добавить товар
        public function actionCreate()
        {
            $model = new Product();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->imglink = UploadedFile::getInstances($model, 'imglink');
                    $temp_name = time() . '_product.' . $model->imglink[0]->extension;
                    if ($model->imglink[0]->saveAs('uploads/' . $temp_name)) {
                        $model->imglink = 'uploads/' . $temp_name;
                    }

                    $model->save(false);
                    Yii::$app->session->setFlash('success', "Товар успешно добавлен");
                    return $this->redirect(['index']);
                }
            }

            return $this->render('create', compact(['model']));
        }

        //Редактировать товар
        public function actionUpdate($id)
        {
            $model = Product::findOne($id);
            $model->picture_now = $model->imglink;

            if ($model->load(Yii::$app->request->post()) && $model->upproduct()) {
               
            }

            return $this->render('update', compact(['model']));
        }

        //Удалить товар
        public function actionDelete($id)
        {
            $model = Product::findOne($id);

            if (file_exists($model->imglink)) {
                unlink($model->imglink);
            }

            Product::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Товар успешно удален");

            return $this->redirect(['/product/index']);
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Product::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>