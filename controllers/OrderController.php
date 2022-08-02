<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\helpers\Url;
    use app\models\Order;
    use app\models\OrderSearch;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class OrderController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index', 'delete'],
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

        //Главная страница заказчиков
        public function actionIndex()
        {
            $searchModel = new OrderSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Удалить заказчика
        public function actionDelete($id)
        {
            $model = Order::findOne($id);

            Order::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Заказчик успешно удален");

            return $this->redirect(Url::to(['/order/index', 'id' => $model->id_client_order]));
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Order::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>