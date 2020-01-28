<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}

$host = 'localhost';  // Хост, у нас все локально
$user = 'root';    // Имя созданного вами пользователя
$pass = ''; // Установленный вами пароль пользователю
$db_name = 'taxi';   // Имя базы данных
$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$result = mysqli_query($link, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . ($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: adminpanelv2.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
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
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Логин</legend>

					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Ваш Email" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Пароль</label>
						<input type="password" name="password" placeholder="Ваш пароль" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Войти" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
