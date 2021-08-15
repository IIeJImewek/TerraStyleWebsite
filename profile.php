<?PHP
                    require("php/connect.php");
                    if ($_COOKIE["log"]!="" && $_COOKIE["passw"]!="" && $_COOKIE["session_id"]!="")
                    {
                        $log_in = $_COOKIE["log"];
                        $pass = $_COOKIE["passw"];
                        $result = mysqli_query($connection, "SELECT * FROM user WHERE login='$log_in' AND password = '$pass'");
                        $row = $result->fetch_assoc();
                        $last_name = $row['last_name'];
                        $first_name = $row['first_name'];
                        $middle_name = $row['middle_name'];
                        $phone = $row['phone_number'];
                        $e_mail = $row['e_mail'];
                        $company_id = $row['company_id'];
                        $result1 = mysqli_query($connection, "SELECT * FROM companies_data WHERE id = '$company_id'");
                        $row1 = $result1->fetch_assoc();
                        $company_name = $row1['name'];
                        $type_of_activity = $row1['type_of_activity'];
                    }
                    else
                    {
                        Header('Location: index.php');
                    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>

    <script src="http://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<script src="java/script.js"></script>
<form method="post" >
    <div id="table">
        <h3>Добро пожаловать, <?php echo $row['first_name']?></h3>
        <table>
            <caption>Ваши данные</caption>
            <tr>
                <th>ФИО</th>
                <th>Логин</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th>Компания</th>
                <th>Род деятельности</th>
            </tr>
            <tr>
               <?php
                    $table .= "
                    <td>$last_name $first_name $middle_name</td>
                    <td>$log_in</td>
                    <td>$phone</td>
                    <td>$e_mail</td>
                    <td>$company_name</td>
                    <td>$type_of_activity</td>";
                    echo $table;
                ?>
            </tr>
        </table>
    </div>
</form>
<center><button id="button1" onclick="logout()">Вернуться на главную</button></center>
</body>
<style>
    body{
        margin: 0%;
        overflow: hidden;
        background: rgba(0, 50, 50, 0);
    }
    #table{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
    }
    table
    {
        border: 4px double #333; /* Рамка вокруг таблицы */
        border-collapse: separate; /* Способ отображения границы */
        width: 100%; /* Ширина таблицы */
        border-spacing: 7px 11px; /* Расстояние между ячейками */
        background-color: rgba(255, 255, 255, 0.5);
    }
    td {
        padding: 5px; /* Поля вокруг текста */
        border: 1px solid #000000; /* Граница вокруг ячеек */
    }
    #button1 {
        position: fixed;
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
    }
</style>
<script>
    function logout() {
        document.cookie = "session_id=";
        location.href = "index.php";
    }
</script>
</html>
