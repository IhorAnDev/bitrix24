<?php

if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];

 /*   echo $email;
    echo $password;*/


    //выносим в переменную данные необходимые для доступа к таблице
    $connection = mysqli_connect('localhost', 'root', 'root', 'my_data');
    //проверяем на наличие данных
    if ($connection) {
        //если данные есть выводим на экран
        echo "Database connect";
        //если данных нет
    } else {
        //передаем строку и тормозим выполение
        die('connection filed');
    }
    //говорим в какие строки таблицы добавить и что добавить
    $query = "INSERT INTO users (user_name,email,password) VALUES 
        ('$username','$email','$password');";
    //вносим данные  в таблицу
    $query_result = mysqli_query($connection, $query);
    //если что то пошло не так
    if (!$query_result) {
        //говорим об ошибке + ф-я ошибки
        die("Query failed " . mysqli_error());
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>login</title>
</head>
<body>
<form action="login2.php" method="post">
    <div class="form-group">
        <label for="exampleInputUsername1">Username</label>
        <input type="form-text" class="form-control" id="exampleInputUsername1" name="username"
               aria-describedby="usernameHelp" placeholder="enter your name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>