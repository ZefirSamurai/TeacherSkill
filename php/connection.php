<?php
global $link;
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "id15179784_user"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = "fw4@las[]5ST_Ptp"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "id15179784_teacherskill"; // название базы данных

$link = mysqli_connect($hostname, $username, $password) or die ("Не могу создать соединение");
/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysqli_select_db($link, $dbName) or die (mysqli_error());
?>
