<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use yii\helpers\Url;
    use app\models\Clientbooking;
    use app\models\ClientbookingSearch;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class ClientbookingController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'waitingbooking', 'inprogressbooking', 'donebooking', 'delete'],
                    'rules' => [
                        [
                            'actions' => ['index', 'waitingbooking', 'inprogressbooking', 'donebooking', 'delete'],
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

        //Забронированные столики
        public function actionIndex()
        {
            $searchModel = new ClientbookingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        //Назначить бронирующему "Ожидают"
        public function actionWaitingbooking($id) {
            $model = Clientbooking::findOne($id);
            
            $model->id_condition = 1; 
            $model->save();
            Yii::$app->session->setFlash('success', "Бронирующий клиент успешно сменил статус на 'ОЖИДАЮТ'");

            return $this->redirect(Url::to(['/clientbooking/index']));
            return $this->render(compact(['model']));
        }
        
        //Назначить бронирующему "В процессе"
        public function actionInprogressbooking($id) {
            $model = Clientbooking::findOne($id);

            $model->id_condition = 2;
            $model->save();
            Yii::$app->session->setFlash('success', "Бронирующий клиент успешно сменил статус на 'В ПРОЦЕССЕ'");

            return $this->redirect(['/clientbooking/index']);
            return $this->render(compact(['model']));
        }

        //Назначить бронирующему "Готово"
        public function actionDonebooking($id) {
            $model = Clientbooking::findOne($id);

            $model->id_condition = 3;
            $model->save();
            Yii::$app->session->setFlash('success', "Бронирующий клиент успешно сменил статус на 'ГОТОВО'");

            return $this->redirect(['/clientbooking/index']);
            return $this->render(compact(['model']));
        }

        //Удалить бронирующего клиента
        public function actionDelete($id)
        {
            $model = Clientbooking::findOne($id);

            Clientbooking::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Бронирующий клиент успешно удален");

            return $this->redirect(Url::to(['/clientbooking/index', 'id' => $model->id_client_booking]));
            return $this->render(compact(['model']));
        }

        protected function findModel($id)
        {
            if (($model = Clientbooking::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>