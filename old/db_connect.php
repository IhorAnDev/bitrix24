<?php

//выносим в переменную данные необходимые для доступа к таблице
$connection = mysqli_connect('localhost', 'root', 'root', 'my_data');
//проверяем на наличие данных
if (!$connection) {
    //если что то пошло не так
    die("connection filed");
}