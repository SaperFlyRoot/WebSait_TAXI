<?php
session_start();
include_once 'TAXI.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8"/>
  <title>Админ-панель</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/main.css" rel='stylesheet' type='text/css' />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
  <?php   if (isset($_SESSION['usr_id'])) { ?>

  <nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
 <div class="navbar-header">
   <a class="navbar-brand" href="index.php"><i>Админ-Панель Такси Симферополя</i></a>
 </div>
 <div class="collapse navbar-collapse" id="navbar1">
   <ul class="nav navbar-nav navbar-right">
     <?php if (isset($_SESSION['usr_id'])) { ?>
     <li><p class="navbar-text">Вошел в систему как <?php echo $_SESSION['usr_name']; ?></p></li>
     <li><a href="logout.php">выйти</a></li>
     <?php } else { ?>
     <?php } ?>
   </ul>
 </div>
</div>
</nav>
  <?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'taxi';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }
    //Если переменная Name передана
    if (isset($_POST["Name3"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id4'])) {
          $sql = mysqli_query($link, "UPDATE `users` SET `name` = '{$_POST['Name4']}',
            `email` = '{$_POST['Email']}',
             `password` = '{$_POST['Password']}' WHERE `id`={$_GET['red_id4']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `taxi` (`id`, `name`,`email`,`password`)
           VALUES ('{$_POST['Name4']}','{$_POST['Email']}','{$_POST['Password']}',)");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id4'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `users` WHERE `id` = {$_GET['del_id4']}");
      if ($sql) {
        echo "<p>удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id4'])) {
      $sql = mysqli_query($link, "SELECT `id`, `name`,`email`,`password` FROM `users` WHERE `id`={$_GET['red_id4']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <div class="col-md-12">
  <div class="admins col-md-4">
  <h3>Администраторы</h3>
  <form class="forms"name="one" action="" method="post">
    <table>
      <tr>
        <td>Имя:</td>
        <td><input type="text" name="Name4" value="<?= isset($_GET['red_id4']) ? $product['Name4'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Почта:</td>
        <td><input type="text" name="Email"  value="<?= isset($_GET['red_id4']) ? $product['Email'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Пароль:</td>
        <td><input type="text" name="Password" value="<?= isset($_GET['red_id4']) ? $product['Password'] : ''; ?>"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <table border='1'>
    <tr>
      <td>Имя</td>
      <td>Почта</td>
      <td>Пароль</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT `id`, `name`,`email`,`password` FROM `users`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['name']}</td>" .
             "<td>{$result['email']}</td>" .
             "<td>{$result['password']}</td>" .
             "<td><a href='?del_id3={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id3={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
  <p><a href="?add=new">Добавить</a></p>
</div>
<?php
    //Если переменная Name передана
    if (isset($_POST["Name3"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id3'])) {
          $sql = mysqli_query($link, "UPDATE `comments_taxi` SET `name` = '{$_POST['Name3']}',
            `article` = '{$_POST['Article3']}',
             `autopark` = '{$_POST['AutoPark']}',
             `tarif` = '{$_POST['Tarif']}',
              `url` = '{$_POST['URL']}' WHERE `id`={$_GET['red_id3']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `taxi` (`id`, `name`,`article`,`art_id`,`url`,`tarif`,`autopark`)
           VALUES ('{$_POST['Name3']}','{$_POST['Article3']}','{$_POST['Tarif']}','{$_POST['AutoPark']}'
             '{$_POST['URL']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id3'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `taxi` WHERE `id` = {$_GET['del_id3']}");
      if ($sql) {
        echo "<p>удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id3'])) {
      $sql = mysqli_query($link, "SELECT `id`, `name`,`article`,`art_id`,`url`,`tarif`,`autopark` FROM `taxi` WHERE `id`={$_GET['red_id3']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <div class="article_servise_taxi col-md-8 ">
  <h3>Описание сервисов Такси</h3>
  <form name="one" action="" method="post">
    <table>
      <tr>
        <td>Название:</td>
        <td><input type="text" name="Name3" value="<?= isset($_GET['red_id3']) ? $product['Name3'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Описание:</td>
        <td><input type="text" name="Article3"  value="<?= isset($_GET['red_id3']) ? $product['Article3'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td>Тариф:</td>
        <td><input type="text" name="Tarif" value="<?= isset($_GET['red_id3']) ? $product['Tarif'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Автопарк:</td>
        <td><input type="text" name="AutoPark" value="<?= isset($_GET['red_id3']) ? $product['AutoPark'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Ссылка:</td>
        <td><input type="text" name="URL" value="<?= isset($_GET['red_id3']) ? $product['URL'] : ''; ?>"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <table border='1'>
    <tr>
      <td>Название</td>
      <td>Описание</td>
      <td>Ссылка</td>
      <td>Тариф</td>
      <td>Автопарк</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT `id`, `name`,`article`,`art_id`,`url`,`tarif`,`autopark` FROM `taxi`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['name']}</td>" .
             "<td>{$result['article']}</td>" .
             "<td>{$result['url']}</td>" .
             "<td>{$result['tarif']}</td>" .
             "<td>{$result['autopark']}</td>" .
             "<td><a href='?del_id3={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id3={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
  <p><a href="?add=new">Добавить</a></p>
</div>
</div>
<?php


    //Если переменная Name передана
    if (isset($_POST["Name"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `comments_taxi` SET `name` = '{$_POST['Name']}', `article` = '{$_POST['Article']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `comments_taxi` (`name`, `article`,`art_id`)
           VALUES ('{$_POST['Name']}',
             '{$_POST['Article']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<p>Успешно!</p>';
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `comments_taxi` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `id`, `name`, `article`,`art_id` FROM `comments_taxi` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }
  ?>
  <div class="col-md-12">
  <div class="comment_servise_taxi col-md-6">
    <h3>Комментарии сервисов Такси</h3>
  <form name="one" action="" method="post">
    <table>
      <tr>
        <td>Автор:</td>
        <td><input type="text" name="Name" value="<?= isset($_GET['red_id']) ? $product['Name'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Комментарий:</td>
        <td><input type="text" name="Article"  value="<?= isset($_GET['red_id']) ? $product['Article'] : ''; ?>"> </td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <table border='1'>
    <tr>
      <td>Автор</td>
      <td>Комментарий</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT `id`, `name`,`article`,`art_id` FROM `comments_taxi`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['name']}</td>" .
             "<td>{$result['article']}</td>" .
             "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
  <p><a href="?add=new">Добавить</a></p>
</div>
<?php
  //Если переменная Name передана
$created = $_POST['created'];
  if (isset($_POST["Name2"])) {
    //Если это запрос на обновление, то обновляем
    if (isset($_GET['red_id2'])) {
        $sql = mysqli_query($link, "UPDATE `service_taxi` SET `name` = '{$_POST['Name2']}',
          `article` = '{$_POST['Article2']}',`number` = '{$_POST['Number2']}'
          WHERE `id`={$_GET['red_id2']}");
    } else {
        //Иначе вставляем данные, подставляя их в запрос
        $sql = mysqli_query($link, "INSERT INTO `service_taxi` (`name`, `article`,`number`)
         VALUES ('{$_POST['Name2']}','{$_POST['Number2']}',
           '{$_POST['Article2']}')");
    }

    //Если вставка прошла успешно
    if ($sql) {
      echo '<p>Успешно!</p>';
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }

  if (isset($_GET['del_id2'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($link, "DELETE FROM `service_taxi` WHERE `id` = {$_GET['del_id2']}");
    if ($sql) {
      echo "<p>удален.</p>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }

  //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
  if (isset($_GET['red_id2'])) {
    $sql = mysqli_query($link, "SELECT `id`, `name`, `article`,`number` FROM `service_taxi` WHERE `id`={$_GET['red_id2']}");
    $product = mysqli_fetch_array($sql);
  }
?>
<div class="list_servise_taxi col-md-6 ">
  <h3>Список сервисов Такси</h3>
<form name="two" action="" method="post">

  <table>
    <tr>
      <td>Название:</td>
      <td><input type="text" name="Name2" value="<?= isset($_GET['red_id2']) ? $product['Name2'] : ''; ?>"></td>
    </tr>
    <tr>
      <td>Описание:</td>
      <td><input type="text" name="Article2"  value="<?= isset($_GET['red_id2']) ? $product['Article2'] : ''; ?>"> </td>
    </tr>
    <tr>
      <td>Номер:</td>
      <td><input type="text" name="Number"  value="<?= isset($_GET['red_id2']) ? $product['Number2'] : ''; ?>"> </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="OK"></td>
    </tr>
  </table>
</form>
<table border='1'>
  <tr>
    <td>Название:</td>
    <td>Описание:</td>
    <td>Номер:</td>
    <td>Удаление</td>
    <td>Редактирование</td>
  </tr>
  <?php
    $sql = mysqli_query($link, 'SELECT `id`, `name`, `article`,`number` FROM `service_taxi`');
    while ($result = mysqli_fetch_array($sql)) {
      echo '<tr>' .
           "<td>{$result['name']}</td>" .
           "<td>{$result['article']}</td>" .
           "<td>{$result['number']}</td>" .
           "<td><a href='?del_id2={$result['id']}'>Удалить</a></td>" .
           "<td><a href='?red_id2={$result['id']}'>Изменить</a></td>" .
           '</tr>';
    }
  ?>
</table>
<p><a href="?add2=new">Добавить</a></p>
</div>
</div>
<?php } else echo "НЕТ ПРАВ ДОСТУПА!"; ?>

</body>
</html>
