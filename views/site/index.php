<?php
    $this->title = 'Главная страница';
?>

<div class = "site-index">
    <div class = "lending"></div>
    <div class = "main_block" style = "position: relative; top: 60px">
        <span class = "food_delivery_text">Доставка еды</span><br>
        <span class = "and_text">и</span> <span class = "booking_table_text">бронирование столика</span><br>
        <span class = "in_St_Peterburg_from_text">из кафе-ресторана Pleasure</span><br>
        <span class = "atmospheric_delicious_original_text">Атмосферно. Вкусно. Оригинально.</span><br>
        <a href = "/site/fullmenu"><input type = "button" class = "view_menu_button" value = "Посмотреть меню"></a>
        <a href = "/site/booking"><span class = "view_menu_button_right"><input type = "button" class = "view_menu_button" style = "margin-left: 30px" value = "Забронировать столик"></span></a>
    </div>

    <div class = "fon" style = "position: relative; bottom: 320px; margin-left: 630px">
        <img src = "/web/img/fon.png">
    </div> 

    <div class = "pluses" style = "position: relative; bottom: 330px; right: 130px">
        <img src = "/web/img/free.png" style = "position: relative; bottom: 50px; width: 50px; left: 130px;">
        <div style = "position: relative; bottom: 90px; width: 40px; left: 190px; color: white; font-weight: bold; font-size: 13px;">Бесплатная доставка</div>
        <img src = "/web/img/table.png" style = "position: relative; bottom: 132px; width: 40px; left: 300px;">
        <div style = "position: relative; bottom: 168px; width: 130px; left: 350px; color: white; font-weight: bold; font-size: 13px;">Бронирование <br>в течение 1 минуты</div>
        <img src = "/web/img/salad.png" style = "position: relative; bottom: 214px; width: 40px; left: 510px;">
        <div style = "position: relative; bottom: 246px; width: 130px; left: 560px; color: white; font-weight: bold; font-size: 13px;">Свежие продукты + большой выбор</div>
    </div>

    <div class = "jumbotron">
        <div class = "about_us_text">О нас</div>
    </div>

    <img src = "/web/img/interior.jpg" class = "interior">
    
    <p class = "about_us">
        Рады приветствовать вас в нашем кафе-ресторане “Pleasure”!<br><br>

        Перед входом в ресторан расположена летняя терраса, на которой можно отведать легкий бизнес-ланч
        или выпить чашку кофе.<br><br>

       Интерьер ресторана изысканно оформлен в теплых цветах. В зале звучит тихая музыка. Здесь можно
        заказать свежую пиццу, вкусную пасту, а также великолепные мясные и рыбные блюда.<br><br>

        В меню представлен широкий выбор салатов и закусок. После обеда или ужина вам предложат
        попробовать один из десертов. К столу подают алкогольные и безалкогольные напитки.<br><br>

        В “Pleasure” вы можете как забронировать столик, так и заказать еду на дом, в офис, на природе.
    </p>
    
    <div class = "interior_text">Интерьер</div>

    <div class = "fotorama_block">
        <div class = "fotorama" border-radius = "10%" data-nav = "thumbs" data-loop = "1" data-keyboard = "true">
            <img src = "/web/img/interior1.jpg">
            <img src = "/web/img/interior2.jpg">
            <img src = "/web/img/interior3.jpg">
            <img src = "/web/img/interior4.jpg">
            <img src = "/web/img/interior5.jpg">
        </div>
    </div>
</div>