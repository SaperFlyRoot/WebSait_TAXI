<?php
$localhost = "localhost";
$db = "taxi";
$user = "root";
$password = "";
$link = mysqli_connect($localhost, $user, $password) or
trigger_error(mysql_error(),E_USER_ERROR);
//trigger_error выводит на страницу сообщение об ошибке. Первый параметр - сообщение об ошибке в строковом виде, в данном случае возвращается функция mysql_error(),
//второй - числовой код ошибки(почти всегда используется значение константы E_USER_ERROR, равное 256)
//Следующие строки необходимы для того, чтобы MySQL воспринимал кириллицу.
//Параметры функции mysqli_query(): идентификатор соединения с сервером и запрос SQL
mysqli_query($link, "SET NAMES cp1251;") or die(mysql_error());
mysqli_query($link, "SET CHARACTER SET cp1251;") or die(mysql_error());
?>
