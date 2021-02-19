<?php
//чтение данных из таблицы

include "db_connect.php";

//собираем все данные из таблицы в переменную
$query = 'SELECT * FROM users;';
//выношу в переменную результат работы ф-ии которая собирает данные из таблицы
$query_result = mysqli_query($connection, $query);
//проверяю на результат
if (!$query_result) {
    //вывожу ошибку
    die("fail" . mysqli_error());
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
<div class="container">
    <div class="col-md-6">

        <?php
        /*  //цикл с условиями при которых функция извлекает строку в переменную
          while ($row = mysqli_fetch_row($query_result)) {
              //на каждой итерации выводим строку из массива на экран
              print_r($row);
          }*/

        //выводимт не по индексу а по ассоциации
        while ($row = mysqli_fetch_assoc($query_result)) {
            ?>
            <pre>
            <?php

            print_r($row);

            ?>
        </pre>
            <?php

        }
        ?>

    </div>
</div>
</body>
</html>