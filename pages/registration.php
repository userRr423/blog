<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Регистрация</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2?family= Open family= Open+Sans:ital,wght@0,500;0,800;1,600;1,700 & display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2?family= Open + Sans:ital,wght@0,500;0,800;1,600;1,700 &семья = Тинос: Италия, вес @ 0,400; 0,700; 1,400 & display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,800;1,600;1,700&family=Tinos:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../css/style.css'>
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/dropContent.css">
    <link rel="stylesheet" href="../css/media.css">


    <style>
        .registration-container {
            position: fixed;
            display: flex;
            margin-left: 25%;
            margin-top: 5%;
            background-color: rgba(0, 0, 0, 0.8);

            padding: 10px;
            font-weight: bold;
            font-size: 20px;

        }

        .registration-container input {
            float: right;
            margin-top: 10px;
            margin-bottom: 20px;
            margin-left: 5px;
            border-radius: 30px;
            width: 300px;
            height: 30px;
            background-color: rgb(255, 255, 255);
        }

        form {
            display: flex;
            flex-direction: column;
            width: 90%;
            height: 90%;
        }

        samp {
            position: absolute;
            right: 5px;
        }

        .reg-text {
            margin-top: 10px;
            color: rgb(223, 212, 212);
        }



        .email {
            background: url(../images/email.png) no-repeat;
        }

        #changeLi {
            margin-top: 20px;
            margin-left: -30px;
        }

        #changeSubmit {
            width: 220px;
            margin-bottom: 0;
            border-radius: 5px;
            font-weight: bold;
            font-size: 2.2vh;
            transform: translate(0, 40px);

        }

        #changeSubmit:hover {
            background-color: rgb(63, 67, 63);
        }

        #changeCheckBox {

            transform: scale(1.5);
            margin-bottom: 0px;
        }

        .reg-text ul {
            margin-top: -10px;

        }

        .reg-text li {
            list-style: none;
            /* Убираем исходные маркеры */

            /* Параметры фона */
            background-size: 22%;
            padding-top: 6px;
            padding-left: 74px;
            margin-bottom: 24px;

            font-weight: bold;
            font-size: 3.5vh;
            list-style: none;
            background-position: left center;
            word-wrap: break-word;
        }

        .login {
            background: url(../images/log.png) no-repeat;
            transform: translate(-30px, 0);
        }

        .email {
            background: url(../images/email.png) no-repeat;
            transform: translate(-30px, 0);
        }

        .password {
            background: url(../images/password.png) no-repeat;
            transform: translate(-30px, 0);
        }

        .wrapper {
            margin: 0;
        }




        @media (max-width: 1200px) {
            .registration-container {
                margin-left: 15%;
            }
        }

        @media (max-width: 800px) {
            .registration-container {
                margin-left: 0;
            }
        }

        @media (max-width: 650px) {
            .registration-container {
                transform: scale(0.7);
            }
        }

        @media (max-width: 550px) {
            .registration-container {
                margin-left: -90px;
                transform: scale(0.6);
            }

        }
    </style>
</head>

<body>

    <div class="wrapper">
        <canvas id="Matrix"></canvas>

        <div class="css-3d-text">
            Блог <br> программиста
        </div>

        <div class="registration-container">

            <div class="reg-text">
                <ul>
                    <li class="login">
                        Логин
                    </li>

                    <li class="email">
                        Email
                    </li>

                    <li class="password">
                        Пароль
                    </li>

                    <li class="password">
                        Повторите пароль
                    </li>

                    <li id="changeLi">
                        Запомнить меня
                    </li>
                </ul>
            </div>
            <form action="../php/signup.php" method="post">
                <input class="font-input" type="text" name="login">
                <input class="font-input" type="email" name="email">
                <input class="font-input" type="password" name="pass">
                <input class="font-input" type="password" name="pass_rep">
                <input id="changeCheckBox" type="checkbox" name="remember" value="Yes" />
                <input id="changeSubmit" type="submit" name="doGoR">
            </form>
        </div>

    </div>

    <script src="../js/burgerMenu.js"></script>
    <script src="../js/slider.js"></script>

    <script src="../js/index.js"></script>

</body>

</html>