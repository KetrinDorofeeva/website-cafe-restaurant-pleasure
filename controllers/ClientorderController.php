<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\helpers\Url;
    use app\models\Clientorder;
    use app\models\ClientorderSearch;
    use app\models\Order;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class ClientorderController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'waitingproduct', 'inprogressproduct', 'doneproduct', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index', 'waitingproduct', 'inprogressproduct', 'doneproduct', 'delete'],
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

        //Главная страница заказов
        public function actionIndex($id)
        {
            $searchModel = new ClientorderSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Назначить товару "Ожидают" (У отдельного заказчика)
        public function actionWaitingproduct($id) {
            $model = Clientorder::findOne($id);
            
            $model->id_condition = 1; 

            $model->save();
            Yii::$app->session->setFlash('success', "Заказ успешно сменил статус на 'ОЖИДАЮТ'");

            return $this->redirect(Url::to(['/clientorder/index', 'id' => $model->id_client_order]));
            return $this->render(compact(['model']));
        }

        //Назначить товару "В процессе" (У отдельного заказчика)
        public function actionInprogressproduct($id) {
            $model = Clientorder::findOne($id);

            $model->id_condition = 2;
            $model->save();
            Yii::$app->session->setFlash('success', "Заказ успешно сменил статус на 'В ПРОЦЕССЕ'");

            return $this->redirect(Url::to(['/clientorder/index', 'id' => $model->id_client_order]));
            return $this->render(compact(['model']));
        }

        //Назначить товару "Готово" (У отдельного заказчика)
        public function actionDoneproduct($id) {
            $model = Clientorder::findOne($id);

            $model->id_condition = 3;
            $model->save();
            Yii::$app->session->setFlash('success', "Заказ успешно сменил статус на 'ГОТОВО'");

            return $this->redirect(Url::to(['/clientorder/index', 'id' => $model->id_client_order]));
            return $this->render(compact(['model']));
        }

        //Удалить заказ
        public function actionDelete($id)
        {
            $model = Clientorder::findOne($id);

            Clientorder::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Заказ успешно удален");

            return $this->redirect(Url::to(['/clientorder/index', 'id' => $model->id_client_order]));
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Clientorder::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>