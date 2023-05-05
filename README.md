# Сайт кафе-ресторана Pleasure (дипломный проект)

<table>
  <tr>
    <td><b>Технологии разработки</b></td>
    <td><b>Языки программирования</b></td>
    <td><b>Фреймворки</b></td>
    <td><b>База данных</b></td>
  </tr>
  
   <tr>
    <td><img src = "https://img.shields.io/badge/-HTML-e44d25?style=for-the-badge&logo=HTML5&labelColor=fcede9&logoColor=e44d25" alt = "HTML"></td>
     <td><img src = "https://img.shields.io/badge/-PHP-787cb4?style=for-the-badge&logo=PHP&labelColor=f2f2f8&logoColor=787cb4" alt = "PHP"></td>
     <td><img src = "https://img.shields.io/badge/-Yii-0083cb?style=for-the-badge&logo=Framework7&labelColor=e6f3fa&logoColor=0083cb" alt = "Yii2"></td>
     <td><img src = "https://img.shields.io/badge/-MySQL-007690?style=for-the-badge&logo=MySQL&labelColor=e6f1f4&logoColor=007690" alt = "MySQL"></td>
  </tr>
  
   <tr>
    <td><img src = "https://img.shields.io/badge/-CSS-214ce5?style=for-the-badge&logo=CSS3&labelColor=e9edfc&logoColor=214ce5" alt = "CSS"></td>
    <td><img src = "https://img.shields.io/badge/-JavaScript-f7df1e?style=for-the-badge&logo=JavaScript&labelColor=fefce9&logoColor=f7df1e" alt = "JavaScript"></td>
    <td><img src = "https://img.shields.io/badge/-Bootstrap-860afb?style=for-the-badge&logo=Bootstrap&labelColor=f3e7ff&logoColor=860afb" alt = "Bootstrap4"></td>
    <td></td>
  </tr>
</table>

## <p id = "table-of-contents">Оглавление</p>
- <a href = "#technical-specification">Техническое задание</a>
- <a href = "#block-diagram">Блок-схема</a>
- <a href = "#database-design">База данных</a>
- <a href = "#yii2-framework">Yii2-framework</a>
  - <a href = "#installing-yii2-framework">Установка Yii2-фреймворка</a>
  - <a href = "#friendly-url">Настройка ЧПУ</a>
- <a href = "#implementation-software-product">Реализация программного продукта</a>
  - <a href = "#main-page">Главная страница</a>
  - <a href = "#contacts-and-feedback-form">Контакты и форма обратной связи</a>
    - <a href = "#fields-and-their-filling-feedback-form">Поля и их заполнение</a>
    - <a href = "#layout-feedback-form">Верстка формы обратной связи</a>
  - <a href = "#registration">Регистрация</a>
    - <a href = "#fields-and-their-filling-registration">Поля и их заполнение</a>
    - <a href = "#layout-registration">Верстка формы регистрации</a>
  - <a href = "#authorization">Авторизация</a>
    - <a href = "#fields-and-their-filling-authorization">Поля и их заполнение</a>
    - <a href = "#layout-authorization">Верстка формы авторизации</a>
  - Меню
  - Подменю
  - Товары
  - Добавление товара в корзину
  - Форма оформления заказа
    - Поля и их заполнение
    - Верстка формы оформления заказа
  - Акции
  - Форма бронирования столика
    - Поля и их заполнение
    - Верстка формы бронирования столика
  - Отзывы
    - Поля и их заполнение
    - Верстка формы отзывов
  - Страницы личных заказов и столиков
  - Админ-панель
    - Категории меню
    - Подкатегории меню (напитки)
    - Товары
    - Заказчики и их заказы
    - Забронированные столики
    - Акции
    - Отзывы
  - <a href = "#hosting-the-site">Размещение сайта на хостинге</a>
    
_________________________________________________________________________________________________________________________________________________________________
## <p id = "technical-specification">Техническое задание</p>
На сайте реализовано семь разделов: «Главная страница», «Акции», «Меню», «Забронировать столик», «Отзывы», «Контакты» и «Корзина»; и формы регистрации и авторизации пользователей.  
Для администраторов доступна админ-панель, включающая в себя семь разделов: «Категории меню», «Подкатегории меню (напитки)», «Товары», «Заказчики и их заказы», «Забронированные столики», «Акции» и «Отзывы».
![Роли и возможности](https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/roles_and_opportunities.png)

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

## <p id = "block-diagram">Блок-схема</p>
![Блок-схема](https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/block-diagram.png)

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

## <p id = "database-design">База данных</p>
![ER-диаграмма базы данных](https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/database-design.png)
![Таблицы и поля базы данных](https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/database-tables-and-fields.png)

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

## <p id = "yii2-framework">Yii2-framework</p>
Для начала нужно [установить и настроить OpenServer](https://timeweb.com/ru/community/articles/ustanovka-i-nastroyka-openserver)  
**OpenServer** — готовая платформа для автоматизации работы мини-хостинга.  

### <p id = "installing-yii2-framework">Установка Yii2-фреймворка</p>
1. **Установка при помощи Composer**  
**Composer** - это пакетный менеджер уровня приложений для языка программирования PHP, который предоставляет средства по управлению зависимостями в PHP-приложении.  
Для того, чтобы установить Yii2-фреймворк, нужно открыть консоль в OpenServer:
<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/console.png" width="250" alt = "Консоль в OpenServer" />

И ввести соответствующую команду:
```php
cd domains
composer create-project yiisoft/yii2-app-basic basic
  
//composer create-project yiisoft/yii2-app-версия придуманное_название_проекта
```
Эта команда устанавливает последнюю стабильную версию Yii в директорию ```basic```. Если хотите, можете выбрать другое имя директории.

2. <b>Установка из архива</b>  
Установка Yii из архива состоит из трёх шагов:
    - Скачайте архив с [yiiframework.com](https://www.yiiframework.com/download);
    - Создать папку в ```domains```;
    - Загрузить в папку архив;
    - Распаковать архив;
    - Зайти в папку ```/config/web.php``` добавьте секретный ключ в значение cookieValidationKey (при установке через Composer это происходит автоматически):
```php
// !!! Напишите секретный ключ в поле (если оно пустое) - это требуется для проверки файлов cookie
'cookieValidationKey' => 'Введите_здесь_секретный_ключ_(произвольный_набор_символов)',
```
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "friendly-url">Настройка ЧПУ</p>
**ЧПУ** – красивые адреса, ставшие стандартом в веб-разработке.  
Фреймворк Yii2 из коробки не имеет настроенных ЧПУ, но исправить это крайне легко. По умолчанию сразу после установки фреймворка для доступа к главной странице необходимо обратиться к папке ```web```, в которой и лежит публичная часть Yii2 приложения. Для доступа к главной странице нужно набрать адрес «http://*название_проекта*/web/».  
От папки ```web``` можно легко избавиться с помощью файлов ```.htaccess```.  
```.htaccess``` в корне приложения:
```php
RewriteEngine on
RewriteRule ^(.+)?$ /web/$1
```
```.htaccess``` в папке ```web```:
```php
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```
Таким образом, папки ```web``` больше нет в адресной строке. Однако это еще не все. Для того, чтобы получить доступ к странице с формой, которая находится в действии ```actionIndex``` контроллера ```SiteController```, нужно набрать следующий адрес: «http://*название_проекта*/?r=site/index». Вместо такого адреса хотелось бы иметь возможность обратиться к данной странице по такому адресу: «http://*название_проекта*/site/index».  
Для решения поставленной задачи необходимо обратиться к файлу ```/config/web.php``` и прописать в массив ```components``` компонента ```urlManager``` необходимый код:
```php
'urlManager' => [
  'enablePrettyUrl' => true,
  'showScriptName' => false,
  'rules' => [
      
  ],
],
```
В элемент ```request``` массива ```components``` нужно добавить строчку ```'baseUrl' => ' '```:
```php
'components' => [
  'request' => [
    'cookieValidationKey' => 'произвольный_код',
    'baseUrl' => '',
  ],
  ...
],
```
Для связи проекта с базой данных в файле ```/config/db.php``` прописываются ```dbname```, ```username``` и ```password```:
```php
return [
  'class' => 'yii\db\Connection',
  'dsn' => 'mysql:host=localhost;dbname=название_базы_данных',
  'username' => 'логин_от_PhpMyAdmin',
  'password' => 'пароль_от_PhpMyAdmin',
  'charset' => 'utf8',
];
```
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

## <p id = "implementation-software-product">Реализация программного продукта</p>
### <p id = "main-page">Главная страница</p>
Главная страница кафе-ресторана состоит из трех составляющих:
1)	Лендинг: пользователь видит его сразу при входе на сайт.  
Лендинг (целевая страница) – веб-страница, которая используется для усиления эффективности рекламы, увеличения аудитории. Целевая страница обычно содержит информацию о товаре или услуге. Призывает выполнить целевое действие: оставить контакты, подписаться на рассылку, оформить заявку.

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/main-page.png" alt = "Главная страница" />

2)	«О нас»: краткое описание кафе-ресторана «Pleasure».

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/about-us.png" alt = "О нас" />

3)	«Интерьер»: показ интерьера при помощи слайдера.  
**Слайдер** – это специальный элемент веб-дизайна, представляющий собой блок определенной ширины. Их функция заключается в добавлении картинок в текст и более выгодный показ данных сайта. Описание того, какие атрибуты содержит в себе разработанный слайдер, представлено в таблице:
<table>
  <tr>
    <td><b>Атрибуты</b></td>
    <td><b>Описание</b></td>
  </tr>
  <tr>
    <td><code>data-nav = "thumbs"</code></td>
    <td>По стандарту слайдер переключается по флажкам, которые находятся под изображением. Чтобы эти флажки заменить на изображения из слайдера, нужно прописать дополнительный атрибут со значением <code>data-nav = "thumbs"</code></td>
  </tr>
  <tr>
    <td><code>data-loop = "true"</code></td>
    <td>По стандарту слайдеры доходят до последнего изображения и останавливаются. Есть специальный атрибут, который запускает просмотр заново — <code>data-loop = "true"</code></td>
  </tr>
  <tr>
    <td><code>data-keyboard = "true"</code></td>
    <td>Позволяет листать слайды кнопками на клавиатуре</td>
  </tr>
</table>

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/interior.png" alt = "Интерьер" />

Мобильная версия главной страницы:

https://user-images.githubusercontent.com/93386515/183287813-1ed216e0-fae1-40f5-b9d4-6ddb47910e9d.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "contacts-and-feedback-form">Контакты и форма обратной связи</p>
В начале раздела «Контакты» указаны адрес, телефон, e-mail и режим работы кафе-ресторана, а также была добавлена Google карта.  
Стоит разобрать добавление Google карты на сайт поподробнее:
1)	Открыть сайт [Google Maps](https://www.google.ru/maps/);
2)	Ввести компанию на картах, нажать на «Поделиться»;
3)	Нажать «Встраивание карт» и выбрать размер из предложенных или выбрать «Другой размер» и указать свои параметры;
4)	Скопировать получившийся HTML-код и вставить его в код своего сайта в то место, где будет размещена карта.

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/contacts.png" alt = "Контакты" />

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

#### <p id = "fields-and-their-filling-feedback-form">Поля и их заполнение</p>
<table>
  <tr>
    <td><b>Поля</b></td>
    <td><b>Обязательность заполнения</b></td>
    <td><b>Правила заполнения</b></td>
  </tr>
  <tr>
    <td>Ваше имя</td>
    <td>Да</td>
    <td></td>
  </tr>
  <tr>
    <td>Ваш E-mail</td>
    <td>Да</td>
    <td>Формат: ***@yandex.ru<br>Пример: multiveb@yandex.ru</td>
  </tr>
  <tr>
    <td>Тема письма</td>
    <td>Да</td>
    <td></td>
  </tr>
  <tr>
    <td>Сообщение</td>
    <td>Да</td>
    <td></td>
  </tr>
  <tr>
    <td>Проверочные символы</td>
    <td>Да</td>
    <td>Пример: zugioo</td>
  </tr>
</table>

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

#### <p id = "layout-feedback-form">Верстка формы обратной связи</p>
Отправка сообщения на почту происходит через Simple Mail Transfer Protocol (SMTP) с помощью yandex. В файле настроек ```/config/web.php``` и добавляется настройка отправки почты в элемент массива ```components```:
```php
'components' => [
  'mailer' => [
    'class' => 'yii\swiftmailer\Mailer',
    'useFileTransport' => false,
    'transport' => [
      'class' => 'Swift_SmtpTransport',
      'host' => 'smtp.yandex.ru',
      'username' => 'ваша_почта@yandex.ru',
      'password' => 'ваш_пароль',
      'port' => '465',
      'encryption' => 'ssl',
    ],
  ],
  ...
],
```
Код для отправки введенных данных на почту, прописанный в вашей модели:
```php
public function contact($email)
{
  if ($this->validate()) {
    Yii::$app->mailer->compose()
      ->setTo('***@yandex.ru') //Кому отправить
      ->setFrom(['***@yandex.ru' => $this->name]) //От кого
      ->setSubject($this->subject) //Тема сообщения
      ->setHtmlBody($this->body. '<br><br>' . $this->email) //Текст сообщения и отправивший
      ->send(); //Отправка сообщения

      return true;
  }

  return false;
}
```
Код для отправки введенных данных на почту, прописанный в вашем контроллере:
```php
public function actionContact() //actionContact() - название контроллера
{
  $model = new ContactForm(); //ContactForm() - название модели
  if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    if (true) {
      Yii::$app->session->setFlash('success', "Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.");
        
      return $this->refresh();
    } else {
      Yii::$app->session->setFlash('error', 'Внимание! Ваше письмо по каким-то причинам не отправлено! 
        Вы можите связаться с нами по телефону 8 (981) 942-53-40 или написать нам на почту cafe_restaurant_pleasure@email.com');
    }
  } 

  return $this->render('contact', ['model' => $model]); //contact - название вьюшки
}
```
После того, как клиент ввел корректные данные и нажал на кнопку «ОТПРАВИТЬ», всплывает Flash-сообщение «Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.». Все данные, которые ввел пользователь, отправляются на почту администратора.

Форма обратной связи с корректно заполненными полями:
<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/correct-feedback-form.png" alt = "Корректо заполненная форма обратной связи" />

Оповещение об успешной отправке письма:
<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/success-sending-feedback-form.png" alt = "Успешная отправка формы обратной связи" />

Мобильная версия страницы "Контакты":

https://user-images.githubusercontent.com/93386515/183302230-dbb81e5a-c8ea-4f36-b349-6d4f809ce47a.mp4

<br>
Отправленное письмо:

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/sent-email.jpg" width = "250" alt = "Отправленное письмо" />

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "registration">Регистрация</p>
#### <p id = "fields-and-their-filling-registration">Поля и их заполнение</p>
<table>
  <tr>
    <td><b>Поля</b></td>
    <td><b>Обязательность заполнения</b></td>
    <td><b>Правила заполнения</b></td>
  </tr>
  <tr>
    <td>Логин</td>
    <td>Да</td>
    <td>Логин должен быть уникальным (не должен совпадать с логиным из базы данных).</td>
  </tr>
  <tr>
    <td>Пароль</td>
    <td>Да</td>
    <td>Пароль от 8 до 12 символов должен содержать хотя бы одну большую букву, одну маленькую букву и одну цифру.<br>Пример: Goodpassword7</td>
  </tr>
  <tr>
    <td>Повторите пароль</td>
    <td>Да</td>
    <td>Введенные данные должны совпадать с данными из поля "Пароль".</td>
  </tr>
</table>

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

#### <p id = "layout-registration">Верстка формы регистрации</p>
Для того, чтобы пользователь смог зарегистрироваться, для начала нужно создать модель.     
**Модуль (Module)** – предоставляет данные, позволяет работать с конкретной таблицей из базы данных и реагирует на команды контроллера, изменяя своё состояние.  
Для занесения данных зарегистрированного пользователя в базу данных, требуется получить таблицу с именем ``user``. Для этого используется статическая функция ``tableName``, которая возвращает имя таблиц. Функция ``attributeLabels`` возвращает ассоциативный массив, в котором передаются имена для отображения в представлении.  
Для более наглядного понимания безопасного заполнения полей данных информацией, стоит поподробнее описать функцию ``rules``. Она проверяет является ли выбранное поле строкой, числом и т.д. Также в ``rules`` при желании можно написать собственные валидаторы, которые можно будет использовать для своих каких-либо проверок.
<table>
  <tr>
    <td><b>Валидатор</b></td>
    <td><b>Описание</b></td>
    <td><b>Для каких полей</b></td>
  </tr>
  <tr>
    <td>required</td>
    <td>Поля обязательны для заполнения</td>
    <td>login, password, confirm_password</td>
  </tr>
  <tr>
    <td>unique</td>
    <td>Проверка на уникальность</td>
    <td>login</td>
  </tr>
  <tr>
    <td>match</td>
    <td>Проверка совпадения значения с заданным условием</td>
    <td>password</td>
  </tr>
  <tr>
    <td>pattern</td>
    <td>Регулярное выражение, с которым должно совпадать входящее значение</td>
    <td>password</td>
  </tr>
  <tr>
    <td>compare</td>
    <td>Проверка на совпадение</td>
    <td>confirm_password</td>
  </tr>
  <tr>
    <td>compareAttribute</td>
    <td>Сравнение введенного значения со значением из таблицы</td>
    <td>confirm_password</td>
  </tr>
  <tr>
    <td>message</td>
    <td>Сообщение/предупреждение</td>
    <td>login, password, confirm_password</td>
  </tr>
</table>

```php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use app\models\User;

class RegistrationForm extends ActiveRecord {
  public static function tableName() {
    return 'user';
  }

  public function attributeLabels() {
    return [
      'login' => 'Логин',
      'password' => 'Пароль',
      'confirm_password' => 'Повторите пароль',
    ];
  }

  public $confirm_password;

  public function rules() {
    return [
      [['login', 'password', 'confirm_password'], 'required'],
      ['login', 'unique'],
      ['password', 'match', 'pattern' => '/^\S*(?=\S{8,12})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', 
        'message' => 'Пароль от 8 до 12 символов должен содержать хотя бы одну большую букву, одну маленькую букву и одну цифру'],
      ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают'],
    ];
  }

  public function registration() {
    if ($this->validate()) {
      $this->password = md5($this->password);
      $this->role = 2;

      if ($this->save(false)) {
        if (Yii::$app->user->login(User::findIdentity($this->id), 3600 * 24 * 30)) {
          return true;
        }
      }
    }

    return false;
  }
}
```

Далее в контроллере ``SiteController`` было реализовано действие ``actionRegistration``.  
**Контроллер (Controller)** – при запуске выполняет соответствующее действие, что обычно подразумевает создание соответствующих моделей и отображение необходимых представлений.  
**Действие (Action)** – это метод класса контроллера, имя которого начинается на ``action``.  
В переменной ``$model`` при помощи ``new`` реализована связь с моделью ``RegistrationForm``. Вызов ``$model->load()`` ищет подмассив, который имеет имя, которое должно быть у формы модели, а уже из этого правильно именованного подмассива извлекает атрибуты. Для того, чтобы получить параметры запроса, нужно использовать методы ``Yii::$app->request->post()`` компонента ``request``. Вызов ``$model->registration()`` расписан в модели ``RegistrationForm``. Для перенаправления на домашнюю страницу в контроллере наследнике ``\yii\base\Controller`` есть метод ``goHome()``. Данный метод позволяет успешно зарегистрированному пользователю попасть сразу на главную страницу, а именно на страницу представления ```index.php``` в папке ```/views/site``` авторизированного пользователя.  
Передача введенных и автоматически прописанных данных, а именно ``login, password, confirm_password, role`` происходит при помощи метода ``render``, куда первым параметром поступает строка – название представления и информация, передаваемая представлению.  
В модели ``RegistrationForm`` прописана функция ``registration``, в которой проверяется валидность введенных данных при помощи метода ``$this->validate()``. Для безопасного хранения и использования хэшированных паролей в базе данных используется ``md5``. Если данных успешно прошли проверку на валидность, определяется ``id`` зарегистрированного пользователя, используя выражение ``Yii::$app->user->login(User::findIdentity($this->id))``. Оно возвращает экземпляр класса идентификатора, представляющего текущего пользователя, вошедшего в систему.  
```php
//Регистрация пользователя
public function actionRegistration() {
  $model = new RegistrationForm();

  if ($model->load(Yii::$app->request->post()) && $model->registration()) { 
    return $this->goHome();
  } 

  return $this->render('registration', compact(['model']));
}
```

Наконец, представление.  
**Представление (View)** – отвечает за отображение данных модели пользователю, зашедшему на страницу сайта, реагируя на изменения модели.  
Представление содержит в себе ту информацию, которая передается ей в контроллере. Здесь осуществляется вёрстка данной страницы, и в места, где это нужно, вставляется информация из контроллера.   
Для создания интерактивной HTML-формы используется виджет ```ActiveForm```. Его следует описать поподробнее.  
В контроллере передается экземпляр этой модели (``$model``) в представление для виджета ``ActiveForm``, который генерирует форму. В вышеприведённом коде ``ActiveForm::begin()`` не только создаёт экземпляр формы, но также и знаменует её начало. Весь контент, расположенный между ``ActiveForm::begin()`` и ``ActiveForm::end()``, будет завёрнут в HTML-тег ``<form>``. Для создания в форме элемента с меткой и любой применимой валидацией с помощью JavaScript, вызывается ``ActiveForm::field()``, который возвращает экземпляр ``yii\widgets\ActiveField``. Дополнительные HTML-элементы можно добавить к форме, используя обычный HTML или методы из класса помощника Html, как это было сделано с помощью ``Html::submitButton()``.

```php
<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;

  $this->title = 'Регистрация';
  $this->params['breadcrumbs'][] = $this->title;
?>
   
<div class = "site-registration">
  <div class = "admin-panel_name"><?= Html::encode($this->title) ?></div><br>

  <?php 
    $form = ActiveForm::begin([
      'id' => 'myform',
      'method' => 'post',
      'fieldConfig' => [
          'template' => '{label}{input}{error}',
      ],
    ]);

      echo $form->field($model, 'login')->textInput();
      echo $form->field($model, 'password')->passwordInput();
      echo $form->field($model, 'confirm_password')->passwordInput();
      echo "<br>";
      echo Html::submitButton("Зарегистрироваться", ['class' => 'btn btn-primary']);
    ActiveForm::end(); 
  ?>
</div>
```

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/registration.png" alt = "Регистрация" />

Мобильная версия страницы "Регистрация":

https://user-images.githubusercontent.com/93386515/184327925-7f12653b-7680-4222-a5bb-fbefdd1f671a.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "authorization">Авторизация</p>
#### <p id = "fields-and-their-filling-authorization">Поля и их заполнение</p>
<table>
  <tr>
    <td><b>Поля</b></td>
    <td><b>Обязательность заполнения</b></td>
    <td><b>Правила заполнения</b></td>
  </tr>
  <tr>
    <td>Логин</td>
    <td>Да</td>
    <td>Введенные данные должны совпадать с данными из таблицы.</td>
  </tr>
  <tr>
    <td>Пароль</td>
    <td>Да</td>
    <td>Введенные данные должны совпадать с данными из таблицы.</td>
  </tr>
  <tr>
    <td>Запомнить меня</td>
    <td>Нет</td>
    <td></td>
  </tr>
</table>

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

#### <p id = "layout-authorization">Верстка формы авторизации</p>
Для того, чтобы доступ к системе имели только авторизированные пользователи, используются фильтры контроля доступа (ACF).  
**ACF** – это фильтры, которые могут присоединяться к контроллеру или модулю как поведение.
```php
public function behaviors()
{
  return [
    'access' => [
      'class' => AccessControl::className(),
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
      'class' => VerbFilter::className(),
      'actions' => [
        'logout' => ['post', 'get'],
      ],
    ],
  ];
}
```

Код выше показывает ACF фильтр, связанный с контроллером ```SiteController``` через поведение. Параметр ```only``` указывает, что фильтр ACF нужно применять только к действию ```logout``` (выйти из системы). Параметр ```rules``` задает правила доступа, которые означают следующее: разрешить аутентифицированным пользователям доступ к действию ```logout```.  
При попытке доступа к действию ```logout``` неавторизированного пользователя перенаправляет на форму авторизации, за которую отвечает метод действия ```actionLogin``` контроллера ```SiteController```. Это действие проверяет, не является ли пользователь гостем. Если условие возвращает ```false```, это значит, что пользователь авторизован и он попадает на главную страницу. Если возвращается ```true``` – создается экземпляр модели ```LoginForm```, в нее загружаются данные и вызывается метод ```login()```, который авторизует пользователя. Если данные загружены и метод ```login()``` вернул ```true```, то пользователь переносится туда, откуда он пришел. В противном случае передается модель в вид ```login```.  

```php
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
```

Метод ```login()``` проверяет данные на соответствие правилам, описанных в модели.  Здесь вызывается метод ```validatePassword()```, который при отсутствии ошибок создает объект ```User```, вызывая метод ```getUser()```. Метод проверяет, не авторизован ли пользователь. Если не авторизован – вызывается статический метод ```findByUsername()``` с переданным ему введенным именем пользователя класса ```User```.  
Модель ```User``` реализует интерфейс ```yii\web\IdentityInterface```. В данной моделе должно быть объявлено семь методов:

<table>
  <tr>
    <td><b>Методы</b></td>
    <td><b>Описание</b></td>
  </tr>
  <tr>
    <td>findIdentity()</td>
    <td>Данный метод находит экземпляр <code>identity class</code>, используя ID пользователя.</td>
  </tr>
  <tr>
    <td>findIdentityByAccessToken()</td>
    <td>Данный метод находит экземпляр <code>identity class</code>, используя токен доступа. Метод используется, когда требуется аутентифицировать пользователя только по секретному токену.</td>
  </tr>
  <tr>
    <td>findByUsername()</td>
    <td>Данный метод находит пользователя по его логину.</td>
  </tr>
  <tr>
    <td>getId()</td>
    <td>Данный метод возвращает ID пользователя, представленного данным экземпляром <code>identity</code>.</td>
  </tr>
  <tr>
    <td>getAuthKey()</td>
    <td>Данный метод возвращает ключ, используемый для основанной на cookie аутентификации. Ключ сохраняется в аутентификационной cookie и позже сравнивается с версией, находящейся на сервере, чтобы удостоверится, что аутентификационная cookie верная.</td>
  </tr>
  <tr>
    <td>validateAuthKey()</td>
    <td>Данный метод реализует логику проверки ключа для основанной на cookie аутентификации.</td>
  </tr>
  <tr>
    <td>validatePassword()</td>
    <td>Данный метод сравнивает хранящийся в базе данных пароль с тем, что ввел пользователь.</td>
  </tr>
</table>

А так же объявляется метод ```tableName()```, который укажет, что модель ```User``` будет взаимодействовать с таблицей ```user```.

```php
namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
  public static function tableName() {
    return 'user';
  }

  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  public static function findIdentityByAccessToken($token, $type = null)
  {

  }

  public static function findByUsername($login)
  {
    return static::findOne(['login' => $login]);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getAuthKey()
  {
    return $this->auth_key;
  }

  public function validateAuthKey($authKey)
  {
    return $this->auth_key === $authKey;
  }

  public function validatePassword($password)
  {
    return $this->password === md5($password);
  }
}
```

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/authorization.png" alt = "Авторизация" />

Мобильная версия страницы "Авторизация":

https://user-images.githubusercontent.com/93386515/184353387-4c1823c7-7914-4bd0-9e1f-ad70175bd229.mp4

<br>
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "hosting-the-site">Размещение сайта на хостинге</p>
Хостинг – это комплекс услуг, которые позволяют разместить сайт или другие данные в сети Интернет. Обычно под фразой "хостинг для сайта" подразумевают место и мощности на сервере (специальном компьютере с круглосуточным подключением к сети). Таблица сравнений популярных хостинг-компаний за май 2022 года (Данные были взяты с сайтов https://ru.hostings.info и https://hostinghub.ru):

<table>
  <tr>
    <td><b>Хостинг</b></td>
    <td><b>Оценка</b></td>
    <td><b>Количество клиентов</b></td>
    <td><b>Стоимость от, р.</b></td>
    <td><b>Поддержка</b></td>
    <td><b>Тестовый период, дн.</b></td>
  </tr>
  <tr>
    <td>timeweb</td>
    <td>9.5/10</td>
    <td>210000</td>
    <td>179</td>
    <td>PHP, Python, HTTP/2, Memcached</td>
    <td>10</td>
  </tr>
  <tr>
    <td>спринт ХОСТ</td>
    <td>9.5/10</td>
    <td>358669</td>
    <td>133</td>
    <td>PHP, Python, Node.js, HTTP/2, Memcached, Perl, Sphinx</td>
    <td>30</td>
  </tr>
  <tr>
    <td>Beget</td>
    <td>9.3/10</td>
    <td>165000</td>
    <td>169</td>
    <td>PHP, Python, HTTP/2, Memcached, Redis, Perl, Sphinx</td>
    <td>30</td>
  </tr>
  <tr>
    <td>FORNEX</td>
    <td>9.0/10</td>
    <td>110000</td>
    <td>75</td>
    <td>PHP, Python, Node.js, Memcached, Ruby</td>
    <td>7</td>
  </tr>
  <tr>
    <td>REG.RU</td>
    <td>9.0/10</td>
    <td>2200000</td>
    <td>152</td>
    <td>PHP, Python, HTTP/2, Perl</td>
    <td>14</td>
  </tr>
</table>

Для размещения проекта на сервере был выбран хостинг-провайдер Beget по следующим причинам: долгий пробный период, оперативная деятельность технической поддержки, стабильная и быстрая работа расположенных на нем сайтов.  
Загрузка проекта на сервер состоит из следующих этапов:
1)	Выбор хостинга;
2)	Выбор и регистрация домена;
3)	Загрузка сайта на хостинг:  
  3.1. Добавление архива, который содержит в себе все файлы сайта;  
  3.2. Импорт SQL-файла в PhpMyAdmin.

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>
    
Ссылка на разработанный программный продукт (на данный момент сайт расположен на хостинге "спринт ХОСТ"): [f0635336.xsph.ru](http://f0635336.xsph.ru/)
