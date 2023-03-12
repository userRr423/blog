<?php


    require "db.php";

    $error = "";


    if (isset($_REQUEST['doGo'])) {


        // Проверка есть ли пароль
        if (!$_REQUEST['pass']) {
            $error = 'Введите пароль';
        }

        // Проверка есть ли логин
        if (!$_REQUEST['login']) {
            $error = 'Введите login';
        }
        // Если ошибок нет, то происходит регистрация 

        if ($error == "") {
            $login = $_REQUEST['login'];
            $checkLogin = mysqli_query($con, "SELECT `login` FROM `user` WHERE `login` = '" . $login . "'");

            if (mysqli_num_rows($checkLogin) > 0) {
                $pass = $_REQUEST['pass'];
                $checkPass = mysqli_query($con, "SELECT `password` FROM `user` WHERE `login` = '" . $login . "'");
                $getHash = mysqli_fetch_assoc($checkPass);
                $hesh = $getHash['password'];

                if (password_verify($pass, $hesh)) {
                    session_start();
                    $_SESSION['online'] = 1;
                    $_SESSION['loginName'] = $login;

                    if (
                        isset($_POST['remember']) &&
                        $_POST['remember'] == 'Yes'
                    ) {

                        $login = $_REQUEST['login'];
                        $checkLogin = mysqli_query($con, "SELECT `login` FROM `remember_device` WHERE `login` = '" . $login . "'");
                        if ($checkLogin) {
                            $ip = $_SERVER['REMOTE_ADDR'];

                            if (mysqli_num_rows($checkLogin) > 0) {
                                $sql = "INSERT INTO `remember_device` (`login`, `ip`, `open`) VALUES ('$login', '$ip', b'1')";
                                if (mysqli_query($con, $sql)) {
                                    echo "Мы вас запомнили<br>";
                                    echo "Данные успешно добавлены";
                                } else {
                                    echo "Ошибка: " . mysqli_error($conn);
                                }
                            } else {
                                
                                $sql = "INSERT INTO `remember_device` (`login`, `ip`, `open`) VALUES ('$login', '$ip', b'1')";
                                if (mysqli_query($con, $sql)) {
                                    echo "Мы вас запомнили<br>";
                                    echo "Данные успешно добавлены";
                                } else {
                                    echo "Ошибка: " . mysqli_error($conn);
                                }
                            }
                        }
                    } else {
                        echo "При выходе из браузера вам придется вводить свои данные для входа";
                    }
                } else {
                    echo "<br>Пароль не правильный";
                }
            } else {
                echo 'логин не существует';
            }
        }
    } else {
        echo "данные не введены";
    }

    header("Location: ../index.php");
    exit();
?>