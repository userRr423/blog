<?php


    require_once "db.php";

    session_start();
    // Проверяем нажата ли кнопка отправки формы
    $error = "";
    if (isset($_REQUEST['doGoR'])) {

        // Все последующие проверки, проверяют форму и выводят ошибку
        // Проверка на совпадение паролей
        if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) {
            $error = 'Пароль не совпадает';
        }

        // Проверка есть ли вообще повторный пароль
        if (!$_REQUEST['pass_rep']) {
            $error = 'Введите повторный пароль';
        }

        // Проверка есть ли пароль
        if (!$_REQUEST['pass']) {
            $error = 'Введите пароль';
        }

        // Проверка есть ли email
        if (!$_REQUEST['email']) {
            $error = 'Введите email';
        }

        // Проверка есть ли логин
        if (!$_REQUEST['login']) {
            $error = 'Введите login';
        }

        $login = htmlspecialchars($_REQUEST['login']);
        $checkLogin = mysqli_query($con, "SELECT `login` FROM `user` WHERE `login` = '" . $login . "'");
        if ($checkLogin) {
            if (mysqli_num_rows($checkLogin) > 0) {
                $error = 'Такой login уже используется в системе';
            }
        }

        $email = htmlspecialchars($_REQUEST['email']);
        $checkEmail = mysqli_query($con, "SELECT `email` FROM `user` WHERE `email` = '" . $email . "'");

        if ($checkEmail) {
            if (mysqli_num_rows($checkEmail) > 0) {
                $error = 'Такой email уже используется в системе';
            }
        }


        // Если ошибок нет, то происходит регистрация 
        if ($error == "") {
            $login = htmlspecialchars($_REQUEST['login']);
            $email = htmlspecialchars($_REQUEST['email']);
            // Пароль хешируется
            $pass = password_hash(htmlspecialchars($_REQUEST['pass']), PASSWORD_DEFAULT);
            // хешируем хеш, который состоит из логина и времени
            $hash = md5($login . time());

            // Переменная $headers нужна для Email заголовка
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "To: <$email>\r\n";
            $headers .= "From: <misterinkognito67@gmail.com>\r\n";
            // Сообщение для Email
            
            $message = '
                <html>
                <head>
                <title>Подтвердите Email</title>
                </head>
                <body>
                <p>Что бы подтвердить Email, перейдите по <a href="http://blog/php/finalRegistation.php?hash=' . $hash . '">ссылка</a></p>
                </body>
                </html>
                ';

            // Добавление пользователя в БД
            mysqli_query($con, "INSERT INTO `user` (`login`, `email`, `password`, `hash`, `email_confirmed`) VALUES ('" . $login . "','" . $email . "','" . $pass . "', '" . $hash . "', 1)");


            // проверяет отправилась ли почта
            if (mail($email, "Подтвердите Email на сайте", $message, $headers)) {
                // Если да, то выводит сообщение
                
                echo 'Подтвердите на почте';
            }
            //echo $pass;
            //header('location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
            exit;
        } else {
            // Если ошибка есть, то выводить её 
            echo $error;
        }
    }
?>