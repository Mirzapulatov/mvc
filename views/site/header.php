<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Distorted</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/common/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/common/css/coin-slider.css" />
    <script type="text/javascript" src="/common/js/cufon-yui.js"></script>
    <script type="text/javascript" src="/common/js/cufon-titillium-250.js"></script>
    <script type="text/javascript" src="/common/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/common/js/script.js"></script>
    <script type="text/javascript" src="/common/js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="logo">
                <h1><a href="/">MVC <span>site</span> <small>Company Ideas World</small></a></h1>
            </div>
            <div class="menu_nav">
                <ul>
                    <li><a href="/news">Новости</a></li>
                    <li><a href="/service">Услуги</a></li>
                    <li><a href="/portfolio">Работы</a></li>
                    <li><a href="/blog">Блог</a></li>
                    <li><a href="/about">О компании</a></li>
                    <li><a href="/contacts">Написать нам</a></li>
                    <?php if(isset($_SESSION['Admin'])) { ?>
                        <li><a href="/admin">Админка</a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>
</div>
