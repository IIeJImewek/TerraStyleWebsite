<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Практические</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
<center>
    <table border="1">
        <tr style='text-size: 24px !important;'>
            <td>Практическая работа №1</td>
            <td>Практическая работа №2</td>
            <td>Практическая работа №3</td>
            <td>Практическая работа №4</td>
            <td>Практическая работа №5</td>
            <td>Практическая работа №6</td>
            <td>Практическая работа №7</td>
        </tr>;
    </table>
    <h1>Практическая №2</h1>
    Старое расписание
<?php
$train = array('Сапсан'=>4.0, '№119А'=>9.3, 'Невский экспресс'=>4.2, 'Аврора'=>4.5, 'Юность'=>7.8, 'Красная стрела'=>8.0, 'Смена'=>8.2);
$table = '<table border="1">   
<tr style=\'text-size: 24px !important;\'>
                <td><b>Название поезда</b></td>
                <td><b>Время в пути, ч</b></td>
            </tr>';
foreach ($train as $name => $time)
{
    $table .= "
            <tr style='text-size: 24px !important;'>
                <td>$name</td>
                <td>$time</td>
            </tr>";
}
$table .= '</table>';
echo $table;
?>
<?php
    $train1 = array('Сапсан'=>4.0, '№119А'=>9.3, 'Невский экспресс'=>4.2, 'Аврора'=>4.5, 'Юность'=>7.8, 'Красная стрела'=>8.0, 'Смена'=>8.2);
    echo '<p/>Новое расписание';
    $table1 = '<table border="1">   
<tr style=\'text-size: 24px !important;\'>
                <td><b>Название поезда</b></td>
                <td><b>Время в пути, ч</b></td>
            </tr>';
    natcasesort($train1);
    foreach ($train1 as $name => $time)
    {
        if($name != 'Аврора' && $name != 'Юность') {
            $table1 .= "
            <tr style='text-size: 24px !important;'>
                <td>$name</td>
                <td>$time</td>
            </tr>";
        }
    }
    $table1 .= '</table>';
    echo $table1;
?>
</center>
</body>
<footer>
    <center><button onclick="location.href='../index.php'">Вернуться на главную</button></center>
</footer>
</html>
