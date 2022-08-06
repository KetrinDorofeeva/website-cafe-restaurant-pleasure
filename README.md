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
- Страницы сайта
  - Реализация главной страницы
    - Верстка главной страницы
    - Мобильная версия главной страницы
  - Реализация контактов и формы обратной связи
    - Поля и их заполнение
    - Верстка контактов и формы обратной связи
    - Мобильная версия контактов и формы обратной связи
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
Для того, чтобы установить Yii2-фреймворк, нужно открыть консоль в OpenServer и ввести соответствующую команду:
```php
  cd domains
  composer create-project yiisoft/yii2-app-basic basic
  
  //composer create-project yiisoft/yii2-app-версия придуманное_название_проекта
```
Эта команда устанавливает последнюю стабильную версию Yii в директорию ```basic```. Если хотите, можете выбрать другое имя директории.

2. <b>Установка из архива</b>  
Установка Yii из архива состоит из трёх шагов:
    - Скачайте архив с [yiiframework.com](https://www.yiiframework.com/download);
    - Создать папку в domains;
    - Загрузить в папку архив;
    - Распаковать архив;
    - Зайти в папку ```config/web.php``` добавьте секретный ключ в значение cookieValidationKey (при установке через Composer это происходит автоматически):
```php
  // !!! Напишите секретный ключ в поле (если оно пустое) - это требуется для проверки файлов cookie
  'cookieValidationKey' => 'Введите_здесь_секретный_ключ_(произвольный_набор_символов)',
```
:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>

### <p id = "friendly-url">Настройка ЧПУ</p>

:bookmark_tabs: <a href = "#table-of-contents">Оглавление</a>
    
Ссылка на разработанный программный продукт: [f0635336.xsph.ru](http://f0635336.xsph.ru/)
