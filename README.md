# Сайт кафе-ресторана Pleasure (дипломный проект)

<table>
  <tr>
    <td><b>Технологии разработки</b></td>
    <td><b>Языки программирования</b></td>
    <td><b>Фреймворк</b></td>
    <td><b>База данных</b></td>
  </tr>
  
   <tr>
    <td><img src = "https://img.shields.io/badge/-HTML-orange?style=for-the-badge&logo=HTML5&labelColor=FFF6E8" alt = "HTML"></td>
     <td><img src = "https://img.shields.io/badge/-PHP-777BB4?style=for-the-badge&logo=PHP&labelColor=F0F1FA&logoColor=777BB4" alt = "PHP"></td>
     <td><img src = "https://img.shields.io/badge/-Yii-blue?style=for-the-badge&logo=Framework7&labelColor=F8F8FF&logoColor=blue" alt = "Yii2"></td>
     <td><img src = "https://img.shields.io/badge/-MySQL-4479A1?style=for-the-badge&logo=MySQL&labelColor=EFF8FF&logoColor=4479A1" alt = "MySQL"></td>
  </tr>
  
   <tr>
    <td><img src = "https://img.shields.io/badge/-CSS-1572B5?style=for-the-badge&logo=CSS3&labelColor=EAEBFE&logoColor=1572B5" alt = "CSS"></td>
    <td><img src = "https://img.shields.io/badge/-JavaScript-F7DF1E?style=for-the-badge&logo=JavaScript&labelColor=FFFDF1&logoColor=F7DF1E" alt = "JavaScript"></td>
    <td></td>
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
    - <a href = "#fields-and-their-filling">Поля и их заполнение</a>
    - <a href = "#layout-feedback-form">Верстка формы обратной связи</a>
  - Реализация страницы товаров
    - Верстка страницы товаров
    - Мобильная версия страницы товаров
  - Реализация добавления товара в корзину
    - Верстка добавления товара в корзину
    - Мобильная версия добавления товара в корзину
  - Реализация формы оформления заказа
    - Поля и их заполнение
    - Верстка формы оформления заказа
    - Мобильная версия формы оформления заказа
  - Реализация формы бронирования столика
    - Поля и их заполнение
    - Верстка формы бронирования столика
    - Мобильная версия формы бронирования столика
  - Реализация страниц личных заказов и столиков
  - Реализация админ-панели
  - Размещение сайта на хостинге
    
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
    - Зайти в папку ```config/web.php``` добавьте секретный ключ в значение cookieValidationKey (при установке через Composer это происходит автоматически):
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

https://user-images.githubusercontent.com/93386515/183287813-1ed216e0-fae1-40f5-b9d4-6ddb47910e9d.mp4

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

#### <p id = "fields-and-their-filling">Поля и их заполнение</p>
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
Отправленное письмо:

<img src="https://github.com/ketrindorofeeva/website-cafe-restaurant-pleasure/raw/main/for-readme/sent-email.jpg" width = "250" alt = "Отправленное письмо" />


:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>
    
Ссылка на разработанный программный продукт: [f0635336.xsph.ru](http://f0635336.xsph.ru/)
