<?php
    namespace app\controllers;

    use Yii;
    use yii\helpers\Url;
    use yii\filters\AccessControl;
    use yii\web\Controller;
    use yii\web\Response;
    use yii\filters\VerbFilter;
    use app\models\LoginForm;
    use app\models\RegistrationForm;
    use app\models\Clientbooking;
    use app\models\ClientbookingSearch;
    use app\models\ClientbookingForm;
    use app\models\Categories;
    use app\models\Product;
    use app\models\Clientorder;
    use app\models\ClientorderSearch;
    use app\models\ClientorderForm;
    use app\models\Cartproduct;
    use app\models\Undercategories;
    use app\models\ContactForm;
    use app\models\Stocks;
    use app\models\Comments;
    use app\models\CommentsSearch;

    class SiteController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout', 'deletecomment', 'myorders', 'mybooking'],
                    'rules' => [
                        [
                            'actions' => ['logout', 'deletecomment', 'myorders', 'mybooking'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post', 'get'],
                    ],
                ],
            ];
        }

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

        //Главная страница
        public function actionIndex()
        {
            return $this->render('index');
        }

        //Контакты
        public function actionContact()
        {
            $model = new ContactForm();
            if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
                if (true) {
                    Yii::$app->session->setFlash('success', "Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.");
        
                    return $this->refresh();
                } else {
                    Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено! Вы можите связаться с нами по телефону 8 (981) 942-53-40 или написать нам на почту cafe_restaurant_pleasure@email.com');
                }
            } 

            return $this->render('contact', ['model' => $model]);
        }

        //Забронировать столик
        public function actionBooking()
        {
            $model = new ClientbookingForm();
            $con_client_model = new Clientbooking();

            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->id_user = \Yii::$app->user->identity->id;
                    $model->save();
                    Yii::$app->session->setFlash('success', "Вы успешно забронировали столик");

                    $model_id_booking = $model->id_client_booking;
                    $con_client_model->id_client_booking = $model_id_booking;
                    $con_client_model->id_user = \Yii::$app->user->identity->id;
                    $con_client_model->id_condition = 1;
                    $con_client_model->save(false);
                }
            }

            return $this->render('booking', compact(['model', 'con_client_model']));
        }

        //Акции
        public function actionStocks()
        {
            $model = Stocks::find()->all();

            return $this->render('stocks', compact(['model']));
        }

        //Отзывы
        public function actionComments()
        { 
            $query = Comments::find()->orderBy('date_and_time DESC')->all();

            $model = new Comments();

            if ($model->load(Yii::$app->request->post())) {
                $model->date_and_time = date('Y-m-d H:i:s');
                $model->id_user = Yii::$app->user->identity->id;

                if ($model->save(false)) {
                    return $this->redirect('comments');
                }
            }

            return $this->render('comments', compact('model', 'query'));
        }

        //Пользователь может удалить свой отзыв
        public function actionDeletecomment($id) {
            $model = Comments::findOne($id);

            Comments::findOne($id)->delete();
            Yii::$app->session->setFlash('success', "Ваш отзыв успешно удален");

            return $this->redirect(['/site/comments']);
            return $this->render(compact(['model']));
        }

        //Товары акции
        public function actionStocksproducts($id)
        {
            $model = Product::find($id)
            ->where(['=', 'id_stock', $id])
            ->all();

            $query = Product::find($id)
            ->where(['=', 'id_stock', $id])
            ->limit(1)
            ->all();

            return $this->render('stocksproducts', compact(['model', 'query']));
        }

        //Полное меню
        public function actionFullmenu()
        {
            $model = Categories::find()->all();

            return $this->render('fullmenu', compact(['model']));
        } 

        //Подменю
        public function actionUndercategories($id)
        {
            $model = Undercategories::find($id)
            ->where(['=', 'id_product_categories', $id])
            ->all();

            return $this->render('undercategories', compact(['model']));
        }

        //Товары в меню
        public function actionProducts($id) {
            $model = Product::find($id)
            ->where(['=', 'id_product_categories', $id])
            ->all();

            return $this->render('products', compact(['model']));
        }

        //Товары в подменю
        public function actionUnderproducts($id) {
            $model = Product::find($id)
            ->where(['=', 'id_product_undercategories', $id])
            ->all();

            return $this->render('underproducts', compact(['model']));
        }

        private $cart;

        public function __construct($id, $module, $config = [])
        {
            parent::__construct($id, $module, $config);
            //Компонент корзины
            $this->cart = Yii::$app->cart;
        }
 
        //Оформление заказа в корзине
        public function actionBasket()
        {
            $model = new ClientorderForm();
            $cart = Yii::$app->cart;
            
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->id_user = \Yii::$app->user->identity->id;
                    $model->save();

                    $items = $cart->getItems();

                    foreach ($items as $product) {
                        $con_client_model = new Clientorder();

                        $model_id_order = $model->id_client_order; 
                        $con_client_model->id_client_order = $model_id_order;

                        $con_client_model->id_product = $product->getId();
                        $con_client_model->id_condition = 1;
                        $con_client_model->id_user = \Yii::$app->user->identity->id;
                        $con_client_model->quantity = $product->getQuantity();
                        $con_client_model->cost = $product->getCost();
                        $con_client_model->save(false);
                    }

                    Yii::$app->session->setFlash('success', "Ваш заказ успешно оформлен. Он будет доставлен в течение указанного вами времени.");
                    return $this->redirect(['site/clear']);
                }
            }

            return $this->render('basket', ['cart' => $this->cart, 'model' => $model, 'con_client_model' => $con_client_model]);
        }

        //Добавить товар в корзину
        public function actionAdd($id, $qty = 1)
        {
            $model = Product::findOne($id);
            
            try {
                $product = $this->getProduct($id);
                $quantity = $this->getQuantity($qty, $product->quantity);

                //Получает конкретный элемент из корзины
                if ($item = $this->cart->getItem($product->id)) {
                    //Добавляет кол-во существующего товара корзины
                    $this->cart->plus($item->getId(), $quantity);
                } else {
                    //Создает элемент корзины из переданного товара и его кол-ва
                    $this->cart->add($product, $quantity);
                }
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }

            return $this->redirect(Url::to(['/site/products', 'id' => $model->id_product_categories]));
        }

        //Добавить товар из подменю в корзину
        public function actionAddunderproduct($id, $qty = 1)
        {
            $model = Product::findOne($id);
            
            try {
                $product = $this->getProduct($id);
                $quantity = $this->getQuantity($qty, $product->quantity);

                //Получает конкретный элемент из корзины
                if ($item = $this->cart->getItem($product->id)) {
                    //Добавляет кол-во существующего товара корзины
                    $this->cart->plus($item->getId(), $quantity);
                } else {
                    //Создает элемент корзины из переданного товара и его кол-ва
                    $this->cart->add($product, $quantity);
                }
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }

            return $this->redirect(Url::to(['/site/underproducts', 'id' => $model->id_product_undercategories]));
        }

        //Изменить количество товара в корзине
        public function actionChange($id, $qty = 1){
            $item = $this->cart->getItem($id);
            $product = $this->getProduct($id);
    
            if ($item->getQuantity() >= $product->quantity && $qty == 1) {
                $this->cart->plus($id, 0);
            } elseif ($item->getQuantity() == 1 && $qty == -1) {
                $this->cart->plus($id, 0);
            } else {
                $this->cart->plus($id, $qty);
            }
            
            return $this->redirect(['basket']);
        }

        //Удаление товара из корзины
        public function actionRemove($id)
        {
            try {
                $product = $this->getProduct($id);
                //Удаляет конкретный элемент из корзины
                $this->cart->remove($product->id);
                Yii::$app->session->setFlash('success', "Товар успешно удалился из корзины");
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }

            return $this->redirect(['basket']);
        }

        //Удаление всех товаров из корзины
        public function actionClear()
        {
            $this->cart->clear();
            return $this->redirect(['basket']);
        }

        //Получить определенный товар
        private function getProduct($id)
        {
            if (($product = Cartproduct::findOne((int)$id)) !== null) {
                return $product;
            }

            throw new \DomainException('Товар не найден');
        }

        //Получить количество определенного товара
        private function getQuantity($qty, $maxQty)
        {
            $quantity = (int)$qty > 0 ? (int)$qty : 1;
            if ($quantity > $maxQty) {
                throw new \DomainException('Товара в наличии всего ' . Html::encode($maxQty) . ' шт.');
            }

            return $quantity;
        }

        //Мои заказы
        public function actionMyorders() {
            $searchModel = new ClientorderSearch();
            $dataProvider = $searchModel->search_m(Yii::$app->request->queryParams);

            return $this->render('myorders', compact('searchModel', 'dataProvider'));
        }

        //Отдельный заказ пользователя
        public function actionVieworder($id) {
            $model = ClientorderSearch::findOne($id);
            $searchModel = new ClientorderSearch();
            $dataProvider = $searchModel->search_v(Yii::$app->request->queryParams, $id);
 
            return $this->render('vieworder', compact('searchModel', 'dataProvider',  'model'));
        }

        //Мои столики
        public function actionMybooking() {
            $searchModel = new ClientbookingSearch();
            $dataProvider = $searchModel->search_m(Yii::$app->request->queryParams);

            return $this->render('mybooking', compact('searchModel', 'dataProvider'));
        }

        //Регистрация пользователя
        public function actionRegistration() {
            $model = new RegistrationForm();

            if ($model->load(Yii::$app->request->post()) && $model->registration()) { 
                return $this->goHome();
            } 

            return $this->render('registration', compact(['model']));
        }

        //Авторизация
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

        //Выход
        public function actionLogout()
        {
            Yii::$app->user->logout();

            return $this->goHome();
        }
    }
?>