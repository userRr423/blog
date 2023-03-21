<?php
require_once "./php/db.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Главная страница</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2?family= Open family= Open+Sans:ital,wght@0,500;0,800;1,600;1,700 & display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2?family= Open + Sans:ital,wght@0,500;0,800;1,600;1,700 &семья = Тинос: Италия, вес @ 0,400; 0,700; 1,400 & display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,800;1,600;1,700&family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='./css/style.css'>
    <link rel="stylesheet" href="./css/slider.css">
    <link rel="stylesheet" href="./css/dropContent.css">
    <link rel="stylesheet" href="./css/media.css">
</head>

<body>

    <?php
    require "./php/db.php";

    $ip = $_SERVER['REMOTE_ADDR'];
    $result = mysqli_query($con, "SELECT `open`, `login` FROM `remember_device` WHERE `ip` = '" . $ip . "'");

    $open = 0;
    $loginName;
    while (($o = mysqli_fetch_assoc($result))) {
        $open = $o['open'];
        $loginName = $o['login'];
    }

    if ($open == 1) {
        $_SESSION['online'] = 1;
        $_SESSION['loginName'] = $loginName;
    } 

    if(!isset($_SESSION['online']))
    {
        $_SESSION['online'] = 0;
    }
    ?>

    <div class="wrapper">
        <canvas id="Matrix"></canvas>

        <div class="css-3d-text">
            Блог <br> программиста
        </div>

        <div class='header'>

            <?php

            if ($open == 1 || $_SESSION['online'] == 1) {
                echo '
                <div class="login-container">
                <di class="log-img">
                    <img src="./images/log.png" alt="", width="40" height="40">
                </di>
                <div class="log">
                    ' . $_SESSION['loginName'] . '
                </div>
                <div class="exit">
                    <a href="./php/exit.php"><img src="./images/exit.png" alt="", width="30" height="30"></a>
                </div>
                </div>
                ';
            } else {
                echo '
                
                <form action="./php/login.php" class="login-form" method="post">
                Логин:&nbsp;&nbsp; <input class="login-input font-input-login" type="text" name="login"> <samp
                    style="color:rgb(253, 253, 253)"></samp>
                Пароль: <input class="login-input font-input-login" type="password" name="pass"><samp
                    style="color:rgb(255, 254, 254)"></samp>
                <div class="checkbox-container">
                    <input class="checkbox-input" type="checkbox" id="vehicle1" name="remember" value="Yes">
                    <label class="checkLabel" for="vehicle1">Запомнить меня</label><br>
                </div>

                <div class="button-container">
                    <input class="login-button" type="submit" name="doGo">
                    <button class="button-registation"><a class="reg" href="./pages/registration.php">Регистрация</a></button>
                </div>
            </form>
                
                ';
            }

            ?>

            <!--
            
            -->

            <div class="container">


                <div class='header-line'>

                    <nav class="nav">
                        <a href="./index.php"><img class="img-house" src="./images/house.png" width="30" height="30"></a>
                        <div class="item-container">
                            <a class="nav-item" href="@">Обо мне</a>
                            <a class="nav-item" href="@">Контакты</a>
                            <a class="nav-item" href="@">Мои проекты</a>
                        </div>

                        <div class="dropdown">
                            <div class="dropbtn"> Статьи </div>
                            <a href="@"><img class="img-hidden" src="./images/hid.png" width="20" height="8"></a>
                            <div class="dropdown-content">
                                <a href="#">C++</a>
                                <a href="#">Pyrhon</a>
                                <a href="#">Php</a>
                                <a href="./pages/articles.php">Все статьи</a>
                            </div>
                        </div>

                    </nav>

                    <div class="search-container">
                        <img class="img-search" src="./images/lupa.png" width="20" height="20">
                        <form>
                            <input class="font-input" type="text" onkeyup="showHint(this.value)">
                        </form>
                    </div>

                    <div class="burger-btn">
                        <img class="img-burger-menu" src="./images/burgerMenuW.png" width="30" height="30">
                    </div>


                </div>

            </div>

            <div id="item-container-dropBurger">
                <a class="dropBurger" href="@">Обо мне</a>
                <a class="dropBurger" href="@">Контакты</a>
                <a class="dropBurger" href="@">Мои проекты</a>
                <div class="dropdown-brg">
                    <div class="dropbtn-brg"> Статьи </div>
                    <img class="img-hidden-burg" src="./images/hid.png" width="20" height="8">
                    <div class="dropdown-content-brg">
                        <a href="#">С++</a>
                        <a href="#">Python</a>
                        <a href="#">Php</a>
                        <a href="./pages/articles.php">Все статьи</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="container-content">
                <div class="main-content">
                    <div class="slider">
                        <div class="slider-line">
                            <img src="./images/css3.png" alt="">
                            <img src="./images/javascript.png" alt="">
                            <img src="./images/linux.png" alt="">
                            <img src="./images/git.png" alt="">
                            <img src="./images/csharp.png" alt="">
                            <img src="./images/cplusplus.png" alt="">
                            <img src="./images/php.png" alt="">
                        </div>
                    </div>


                    <div class="main-container">
                        <div class="greetings-text">
                            <center>
                                <h1>Приветствую вас на своем сайте!!!</h1>
                            </center>
                            <p>Но ключевые особенности структуры проекта являются только методом политического участия и
                                смешаны с не
                                уникальными данными <br>до степени совершенной неузнаваемости, из-за чего возрастает их
                                статус бесполезности.
                                Также как базовый вектор развития создаёт <br>предпосылки для глубокомысленных
                                рассуждений. Имеется спорная точка
                                зрения, гласящая примерно следующее: <br>явные признаки победы институционализации,
                                которые <br>представляют собой
                                яркий пример континентально-европейского типа политической культуры, будут функционально
                                разнесены на независимые
                                элементы. Но перспективное планирование требует от нас анализа своевременного выполнения
                                <br>сверхзадачи. Кстати, активно
                                развивающиеся страны <br>третьего мира, инициированные исключительно синтетически,
                                ограничены исключительно образом мышления.
                                Лишь предприниматели в сети интернет, которые представляют <br><br>собой яркий пример
                                континентально-европейского<br> типа
                                политической культуры, будут рассмотрены исключительно в разрезе маркетинговых и
                                финансовых предпосылок. Банальные,
                                но неопровержимые выводы, а также базовые сценарии поведения пользователей представляют
                                собой не что иное,
                                как квинтэссенцию победы маркетинга <br>над разумом и должны быть объединены в целые
                                кластеры себе подобных.
                            </p>
                        </div>

                        <div class="title-new-articles1">
                            <center>
                                <h2>Недавно добавленные</h2>
                            </center>
                        </div>
                        <div class="articles-container">

                            <?php 
                            
                            $articles = mysqli_query($con, "SELECT * FROM `articles`");
                            $category_q = mysqli_query($con, "SELECT * FROM `articles_categories`");
                            $category = array();

                            while( $cat = mysqli_fetch_assoc($category_q))
                            {
                                $category[] = $cat;
                            }

                            ?>

                            <?php

                            while( $article = mysqli_fetch_assoc($articles))
                            { 
                                ?>
                            <div class="article-container">
                                <img class="img-article" src="<?php echo $article['image'] ?>" alt="" width="150" height="150">
                                <div class="article">
                                    <p class="article-title"><a class="article-refer" href="@"><h3><b><?php echo $article['title'] ?></b></h3></a></p> <br>
                                    <div class="view-article">
                                        <img class="img-view" src="./images/viwes.png" alt="" width="20" height="20">
                                        <?php echo $article['views'] ?>
                                    </div>
                                    <br>
                                    <br>
                                    <?php
                                    $art_cat = false;
                                    foreach($category as $cat)
                                    {
                                        if($cat['id'] == $article['id'])
                                        {
                                            $art_cat = $cat;
                                            break;
                                        }
                                    }
                                    
                                    ?>
                                    Категория: <?php echo $art_cat['title'] ?><br>
                                    Описание:<br>
                                    <?php echo $article['text'] ?>
                                </div>
                            </div>

                            <?php }

                            ?>

                            
                        </div>

                        <div class="title-new-articles2">
                            <center>
                                <h2>Самые читаемые</h2>
                            </center>
                        </div>


                        <div class="articles-container">

                            <div class="article-container">
                                <img class="img-article" src="./images/linux.png" alt="" width="150" height="150">
                                <div class="article">
                                    <p class="article-title"><a class="article-refer" href="@"><h3><b>Cоздание
                                                переменных</b></h3></a></p> <br>
                                    <div class="view-article">
                                        <img class="img-view" src="./images/viwes.png" alt="" width="20" height="20">
                                        1004
                                    </div>
                                    <br>
                                    <br>
                                    Категория: Python<br>
                                    Описание:<br>
                                    Привет мужичок я боровиче как дела привет я спою для тебя
                                </div>
                            </div>


                            <div class="article-container">
                                <img class="img-article" src="./images/cplusplus.png" alt="" width="150" height="150">
                                <div class="article">
                                    <p class="article-title"><a class="article-refer" href="@"><h3><b>Cоздание
                                                переменных</b></h3></a></p> <br>
                                    <div class="view-article">
                                        <img class="img-view" src="./images/viwes.png" alt="" width="20" height="20">
                                        1004
                                    </div>
                                    <br>
                                    <br>
                                    Категория: Python<br>
                                    Описание:<br>
                                    Привет мужичок я боровиче как дела привет я спою для тебя
                                </div>
                            </div>

                            <div class="article-container">
                                <img class="img-article" src="./images/css3.png" alt="" width="150" height="150">
                                <div class="article">
                                    <p class="article-title"><a class="article-refer" href="@"><h3><b>Cоздание
                                                переменных</b></h3></a></p> <br>
                                    <div class="view-article">
                                        <img class="img-view" src="./images/viwes.png" alt="" width="20" height="20">
                                        1004
                                    </div>
                                    <br>
                                    <br>
                                    Категория: Python<br>
                                    Описание:<br>
                                    Привет мужичок я боровиче как дела привет я спою для тебя
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="side-bar">
                    <center>
                        <h1 class="side-bar-title">Новости</h1>
                    </center>

                    
                    <?php include "./parser.php" ?>
                    
                        
                    <center>
                        <h1 class="side-bar-title-teg">Теги</h1>
                    </center>

                    <div class="tegs">
                        <ul>
                            <li class="cpp">
                                <a href="#">C++</a> (3)
                            </li>

                            <li class="javascript">
                                <a href="#">Javascript</a> (1)
                            </li>

                            <li class="php">
                                <a href="#">PHP</a> (6)
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer">

            <div class="footer-text">
                Copyring 2022
            </div>

        </div>
    </div>

    <script src="./js/burgerMenu.js"></script>
    <script src="./js/slider.js"></script>

    <script src="./js/index.js"></script>

</body>

</html>