<div class="sidebar">


            <div class="gadget">
                <h2 class="star"><span>Меню</span></h2>
                <div class="clr"></div>
                <ul class="sb_menu">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/service">Услуги</a></li>
                    <li><a href="/blog">Блог</a></li>
                    <li><a href="/about">О компании</a></li>
                    <li><a href="/contacts">Написать нам</a></li>
                </ul>
    </div>
    <?php if($_SESSION['AdminName'] == AdminName && $_SESSION['AdminPassword'] == AdminPassword){ ?>

            <div class="gadget">
                <h2 class="star"><span>Админ панель</span></h2>
                <div class="clr"></div>
                <ul class="ex_menu">
                    <li><a href="/admin/blog/"> <span>Управление блогом</span></a></li>
                    <li><a href="/admin/news/"> <span>Управление новостями</span></a></li>
                    <li><a href="/admin/contacts/"> <span>Почта</span></a></li>
                </ul>
    </div>
    <?php } ?>
</div>
<div class="clr"></div>
</div>
</div>
<div class="fbg">
    <div class="fbg_resize">
        <div class="col c1">
            <h2><span>Галерея</span></h2>
            <a href="/common/images/gal1.jpg"><img src="/common/images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a>
            <a href="#"><img src="/common/images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a>
            <a href="#"><img src="/common/images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a>
            <a href="#"><img src="/common/images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a>
            <a href="#"><img src="/common/images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a>
            <a href="#"><img src="/common/images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
        <div class="col c2">
            <h2><span>Партнеры </span></h2>
            <ul class="fbg_ul">
                <li><a href="http://google.com">Google inc.</a></li>
                <li><a href="http://vk.com">VK inc.</a></li>
                <li><a href="http://yandex.ru">Yandex inc.</a></li>
            </ul>
        </div>
        <div class="col c3">
            <h2><span>Контакты</span> </h2>
            <p class="contact_info"> <span>Адрес:</span> 1458 TemplateAccess, USA<br />
                <span>Телефон:</span> +123-1234-5678<br />
                <span>FAX:</span> +458-4578<br />
                <span>Другое:</span> +301 - 0125 - 01258<br />
                <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
        </div>