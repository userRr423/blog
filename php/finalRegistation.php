<?php

echo "Спасибо за регистрацию!";

// Подключаем коннект к БД
require_once 'db.php';

// Проверка есть ли хеш

$remeber = $_GET['rememberR'];

if ($_GET['hash']) {
    $hash = htmlentities($_GET['hash']);
    // Получаем id и подтверждено ли Email
    if ($result = mysqli_query($con, "SELECT `id`, `email_confirmed`, `login` FROM `user` WHERE `hash`='" . $hash . "'")) {
        while( $row = mysqli_fetch_assoc($result) ) { 
            echo $row['id'] . " " . $row['email_confirmed'];
            // Проверяет получаем ли id и Email подтверждён ли 
            if ($row['email_confirmed'] == 1) {
                // Если всё верно, то делаем подтверждение
                mysqli_query($con, "UPDATE `user` SET `email_confirmed`=0 WHERE `id`=". $row['id'] );// не достает ковычки
                echo "Email подтверждён";
                session_start();
                $_SESSION['online'] = 1;
                $_SESSION['loginName'] = $row['login'];

                if($remeber == 1)
                {
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $login = $row['login'];
                    $sql = "INSERT INTO `remember_device` (`login`, `ip`, `open`) VALUES ('$login', '$ip', b'1')";
                                if (mysqli_query($con, $sql)) {
                                    echo "Мы вас запомнили<br>";
                                    echo "Данные успешно добавлены";
                                } else {
                                    echo "Ошибка: " . mysqli_error($conn);
                                }
                }
                
            } else {
                echo "Что то пошло не так";
            }
        } 
    } else {
        echo "Что то пошло не так";
    }
} else {
    echo "Что то пошло не так";
}

header("Location: ../index.php");