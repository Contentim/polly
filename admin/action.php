<?php
/**
 *
 * Created by PhpStorm.
 * User: Иваныч
 * Date: 24.01.2018
 * Time: 21:34
 *
 **/

if(isset($_POST['key'])){
    $req = false; // изначально переменная для "ответа" - false
    $key = (int)$_POST['key']; // мини-защита - приводим к типу INT
    if($key > 0) $req = '<p>Получили значение равное: <strong>' . $key . '</strong></p>'; // присваиваем переменной нужные данные
    echo json_encode($req); // возвращаем данные ответом, преобразовав в JSON-строку
    exit; // останавливаем дальнейшее выполнение скрипта
}