<!DOCTYPE html>
<html>
<head>
	<title>ТАКСИ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Custom Theme files -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/main.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<script src="js/jquery.min.js"> </script>
	<!--webfonts-->
	  <link href='//fonts.googleapis.com/css?family=PT+Mono|Abril+Fatface' rel='stylesheet' type='text/css'>
	<!--//webfonts-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!--/script-->
	<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
					});
				});
	</script>
</head>
<nav class="navbar navbar-default" role="navigation">
<div class="container-fluid">
 <div class="navbar-header">
   <a class="navbar-brand" href="index.php"><i>Cервисы такси города Симферополь</i></a>
 </div>
</div>
</nav>
<body>
	<div id="home" class="test">
					<div class="top-header">
						<div class="container">
							 <div class="top-menu1">
							<span class="menu"> </span>
								<ul class="cl-effect-16">
								 <li><a class="active" href="index.php" data-hover="Домашняя">Домашняя</a></li>
								<li><a  href="about.php" data-hover="О нас">О нас</a></li>
								<li><a href="servise.php" data-hover="Сервисы">Сервисы</a></li>
								<li><a href="email.php" data-hover="Контакты">Контакты</a></li>
								</ul>
							</div>
								<script>
									$("span.menu").click(function(){
										$(".top-menu ul").slideToggle("slow" , function(){
										});
									});
								</script>
					</div>
				</div>
			</div>
<?php
  require_once ("TAXI.php");
  $link = mysqli_connect($host, $user, $pass, $db);
  $note_id = $_GET['note'];

  $proverka = "SELECT * FROM comments_taxi WHERE id = $id";
  $sql = mysqli_query($link, $proverka);


if(empty($proverka))  {
   echo 'Эту запись еще никто не комментировал';
  }
  else{

  $query = "SELECT  `id`,`article`,`number`, `name` FROM `service_taxi` WHERE `id` = {$note_id}";
  $sql = mysqli_query($link, $query);
?>
<div class="up_banner">
<?php
  while ($result = mysqli_fetch_array($sql)) {
    echo $result ['article'], "<br>";
    echo $result ['number'], "<br>";
    echo $result ['name'], "<br>";
    echo "<hr>";
}
?>
</div>
<?php
$query = "SELECT  `id`,`name`,`article`,`url`,`tarif`,`autopark`FROM `taxi` WHERE `id` = {$note_id}";
$sql = mysqli_query($link, $query);
?>
<div class="col-md-12">
<div class="col-md-6 article_taxi">
	<?php
while ($result = mysqli_fetch_array($sql)) {
	echo "<p id='name_servise'>","Наименование сервиса: ", "<br>", $result ['name'], "<br>","</p>";
	echo "<p id='article_servise'>","Описание:", "<br>", nl2br ($result ['article']), "<br>","</p>";
?>
</div>
<div class="col-md-6 right_board">
<?php
	echo "Сервис: ", '<i><a style="color:red;" href="' . htmlspecialchars($result['url']) . '" target="_blank">Перейти</a></i>', "<br>";
	echo "Тарифы:", "<br>", nl2br ($result ['tarif']), "<br>";
	echo "Автопарк:", "<br>", nl2br ($result ['autopark'], "<br>");

}
?>
</div>
</div>
<hr>
<div class="col-md-6 left_board">
	<?php
$query1 = "SELECT id, article, name, art_id FROM comments_taxi WHERE art_id  = {$note_id}";
$sql = mysqli_query($link, $query1);

while ($result = mysqli_fetch_array($sql)) {
  echo "Комментарий: ", $result ['article'], "<br>";
  echo "Автор: ", $result ['name'], "<br>";
	echo "<hr>";
	}
	?>
		</div>
		<div class="col-md-6 com">
	<form id="otz" name="ot" method="post">
     	<label for="author">Автор: </label><br>
			<input type="text" name="author" id="author" size="20" maxlength="20"/> <br>
      <label for="comment">комменитарий: </label><br>
    	<input name="comment" cols="55" rows="10" id="comment" type="text"/> <br>
    	<input name="art_id" cols="55" rows="10" id="art_id" type="hidden" value ="<?php echo $_GET['note'];?>"/>
    	<input type="submit" name="but" id="but" value="Сохранить" />
    </form>
	<!--<p><a href="newcomment.php?note=<?php// echo $note_id; ?>">Добавить комментарий </a></p>-->
</div>
	<?php
	if(isset($_POST['but'])){
		$author = $_POST['author'];
		$created = $_POST['comment'];
		$art__id = $_POST['art_id'];
		//echo $title.$created.$article;
		//echo $art_id;
		if($author && $created && $art__id)
		{
		//	echo $author.$created.$comment;
			//echo $art__id;
			$result = mysqli_query ($link, "INSERT INTO `comments_taxi` (name, article, art_id) VALUES ('$author', '$created', '$art__id')");
			if($result) echo "добавлен";
			else echo " не добавлен";
		}
	}
}
?>

</body>
</html>
