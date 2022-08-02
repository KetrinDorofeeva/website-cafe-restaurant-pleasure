<?php
    namespace app\controllers;

    use Yii;
    use yii\filters\AccessControl;
    use app\models\Comments;
    use app\models\CommentsSearch;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class CommentsController extends Controller
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

        public function actionIndex()
        {
            $searchModel = new CommentsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        public function actionDelete($id)
        {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', "Отзыв успешно удален");

            return $this->redirect(['index']);
        }

        protected function findModel($id)
        {
            if (($model = Comments::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
?>