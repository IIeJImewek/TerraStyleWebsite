<?PHP
require('php/connect.php');

$log_in = $_POST['login'];
$pass = md5($_POST['password']);
$result1 = mysqli_query($connection, "SELECT login FROM user WHERE login='$log_in'");
$result2 = mysqli_query($connection, "SELECT password FROM user WHERE password='$pass' AND login='$log_in'");
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();
$login = $row1['login'];
$password = $row2['password'];
if(isset($_POST['login']) && isset($_POST['password'])){
    if($log_in == $login AND $pass == $password)
    {
        $result = mysqli_query($connection,"SELECT * FROM user WHERE login='$log_in'");
        $row = $result->fetch_assoc();
        setcookie ("log", $row['login'], time() + 50000);
        setcookie ("passw", $pass, time() + 50000);
        $id = $row['id'];
        $_SESSION['id'] = $id;   //записываем в сессию id пользователя
        setcookie("session_id", $_SESSION['id']);
        $smsg ="Авторизация прошла успешно";
        Header('Location: profile.php');
    }
    else
    {
        $fsmg="Ошибка авторизации";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TerraGroup Labs</title>
    <!--JQuery-->
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <!--Popper для Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!--Bootstrap для модальных окон и др.-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--Стандартные стили Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu_buttons.css"/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"><?php echo $smsg; ?></div><?php }?>
<?php if(isset($fsmg)){?> <div class="alert alert-danger" role="alert"><?php echo $fsmg; ?></div><?php }?>
<script src="java/script.js"></script>
<header>
    <img src="images/terragroup.png"/><br/>
    <li><a href="#">Главная</a></li>
    <li><a href="#">О нас</a></li>
    <li><a href="#" data-toggle="modal" data-target="#Registration">Авторизация</a></li>
    <li><a href="registr.php">Регистрация</a></li>
    <li><a href="#">Контакты</a></li>
</header>
</body>
</html>
<!-- Модальное окно -->
<form method="post">
<div class="modal fade" id="Registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="Title">Представьтесь</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="description" style="text-align:center !important;">
                    <b>TerraGroup Labs - Virtus in Sciencia.</b><p/>
                    Мы крупная иностранная трансатлантическая корпорация, инвестирующая в развитие сельского хозяйства Норвинской области.
                </div>
                <p/><p/>
                <div class="why_auth" style="text-align: center !important;">
                    <b>Авторизация необходима для подтверждения вашей личности в компании</b>
                </div>
                <p/><p/>
                <div class="auth" style="text-align: center !important;">
                    <h3>Авторизация</h3>
                    <table border="1" width="100%" cellpadding="5">
                        <th>
                            <input type="text" size="30" name="login" placeholder="Имя пользователя..."/>
                            <input type="password" size="30" name="password" placeholder="Пароль..."/>
                            <br><input type="checkbox" value="0"> Запомнить</input>
                        </th>
                    </table>
                    <table border="0" width="100%" cellpadding="5" align="center">
                        <th><button type="submit" class="btn btn-primary" style="background-color: #2e3c6f !important;">Войти</button></th>
                        <th><button type="button" class="btn btn-secondary" onclick="location.href='registr.php'">Зарегистрироваться</button></th>
                        <th><button type="button" class="btn btn-secondary">Забыли пароль</button></th>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                «Virtus in Sciencia», ©2020
                <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #2e3c6f !important;">Отмена</button>
            </div>
        </div>
    </div>
</div>
</form>
