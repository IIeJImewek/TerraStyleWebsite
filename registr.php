<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/registr.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<?php
require('php/connect.php');

if(isset($_POST['login']) && isset($_POST['password']))
{
    $login=$_POST['login'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $surname=$_POST['surname'];
    $name=$_POST['name'];
    $middle_name=$_POST['middle-name'];
    $company_name=$_POST['company_name'];
    $creation_date=$_POST['creation_date'];
    $type_of_activity=$_POST['type_of_activity'];
    $bio=$_POST['bio'];
    $phone=$_POST['phone'];
    $check_email = intval(0);
    $checked = intval(0);
    $queryCompaniesData ="INSERT INTO companies_data (name, creation_date, type_of_activity, bio) VALUES('$company_name','$creation_date','$type_of_activity','$bio')";
    mysqli_query($connection,$queryCompaniesData);
    $result1 = mysqli_query($connection, "SELECT id FROM companies_data WHERE name = '$company_name'");
    $row = $result1->fetch_assoc();
    $company_id = intval($row['id']);
    $queryUser="INSERT INTO user (login, password, first_name, last_name, middle_name, phone_number, company_id, e_mail, check_email, checked) VALUES('$login','$password','$name','$surname','$middle_name','$phone', '$company_id', '$email', '$check_email', '$checked')";
    $result = mysqli_query($connection, $queryUser);
    if($result)
    {
        //криворукий пхп код по получению id пользователя
        $result1 = mysqli_query($connection, "SELECT id FROM user WHERE login='$login'"); //запрос
        $row1 = $result1->fetch_assoc(); //преобразрование
        $id = $row1['id']; //получение id
        $path="images\\uploaded\\users\\$id"; //задаём путь
        mkdir($path,0777,TRUE); //создаём директорию для фотографий пользователя
        $smsg ="Регистрация прошла успешно";
    }
    else
    {
        $fsmg="Ошибка";
    }
}
?>

<form method="post">
    <?php if(isset($smsg)){?> <div class="alert alert-success" role="alert"><?php echo $smsg; ?></div><?php }?>
    <?php if(isset($fsmg)){?> <div class="alert alert-danger" role="alert"><?php echo $fsmg; ?></div><?php }?>
    <script src="java/script.js"></script>
    <div id="block">
        <div class="form-group col-md-6">
            <h2>Логин</h2>
            <input type="text" name="login" class="form-control" id="inputLogin4" size="20" required>
        </div><p/>
        <div class="form-group col-md-6">
            <h2>Пароль</h2>
            <input type="text" name="password" class="form-control" id="inputPassword4" required>
        </div><p/>
        <div class="form-group col-md-6">
            <h2>Почта</h2>
            <input type="email" name="email" class="form-control" id="inputEmail4" size="20" required>
        </div>

        <hr/>
        <div class="form-group col-md-6">
            <h2>Фамилия</h2>
            <input type="text" name="surname" class="form-control" id="inputSurname4" required>
        </div><p/>
        <div class="form-group col-md-6">
            <h2>Имя</h2>
            <input type="text" name="name" class="form-control" id="inputName4" required>
        </div><p/>
        <div class="form-group col-md-6">
            <h2>Отчество</h2>
            <input type="text" name="middle-name" class="form-control" id="inputMiddleName4" required>
        </div><p/>


        <input class="btn btn-primary" id="inputButtton4" type="submit" value="Зарегистрироваться">
    </div>

    <div id="block2">
        <div class="form-group col-md-6">
            <h2>Фото</h2>
        </div>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <div class="example-1">
            <div class="form-group">
                <label class="label">
                    <i class="material-icons">attach_file</i>
                    <input name="photo" type="file">
                </label>
            </div>
        </div>
        <div class="form-group col-md-6">
            <h2 style="white-space: nowrap !important;">Название вашей компании</h2>
            <input type="text" name="company_name" class="form-control" id="inputCompany4" required>
        </div><p/>
        <div class="form-group col-md-6">
            <h2 style="white-space: nowrap !important;">Дата основания</h2>
            <input type="date" name="creation_date" class="form-control" id="inputData4" size="20" required>
        </div>
        <div class="form-group col-md-6">
            <h2 style="white-space: nowrap !important;">Род деятельности</h2>
            <input type="text" name="type_of_activity" class="form-control" id="inputActivity4" size="20" required>
        </div>
        <div class="form-group col-md-6">
            <h2 style="white-space: nowrap !important;">Описание компании</h2>
            <textarea class="form-control" name="bio" id="inputActivityCompany4" ></textarea>
        </div>
        <div class="form-group col-md-6">
            <h2 style="white-space: nowrap !important;">Номер телефона</h2>
            <input type="text" name="phone" class="form-control" id="inputPhone" size="20" required>
        </div>
    </div>
</form>
</body>
</html>
