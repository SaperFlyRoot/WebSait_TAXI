<!DOCTYPE html>
<html>
<head>
<title>Такси Симферополя</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
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
		<form class="search_taxi" method="get">
      <h4>Поиск такси по названию</h4>
		<input type="text" name="usersearch" id="usersearch"  />
</form>

<?php
require_once ("TAXI.php");
$link = mysqli_connect($host, $user, $pass, $db);
$sql = mysqli_query($link, 'SELECT * FROM `service_taxi`');
?>
<?php
		//Поиск по фразе (по содержанию заметки)
		$user_search = $_GET['usersearch'];
		$where_list = array();
		$query_usersearch = "SELECT * FROM service_taxi";
		$clean_search = str_replace(',', ' ', $user_search);
		$search_words = explode(' ', $user_search);
		//Создаем еще один массив с окончательными результатами
		$final_search_words = array();
		//Проходим в цикле по каждому элементу массива $search_words.
		//Каждый непустой элемент добавляем в массив $final_search_words
		if (count($search_words) > 0)
			{
				foreach($search_words as $word)
				{
					if (!empty($word))
					{
						$final_search_words[] = $word;
					}
				}
			}
//работа с использованием массива $final_search_words
	foreach ($final_search_words as $word)
	{
		$where_list[] = " name LIKE '%$word%'";

	}

	$where_clause = implode (' OR ', $where_list);
	if (!empty($where_clause))
	{
		$query_usersearch .=" WHERE $where_clause";
	}
		$res_query = mysqli_query($link, $query_usersearch);
    ?>

    <div class="prokrytka">
    <?php
		while ($res_array = mysqli_fetch_array($res_query))
		{
				?>
				<a  href="comments.php?note=<?php echo $res_array['id']; ?>">
			<?php echo $res_array ['name'],"<br>"?></a>
		<?php echo $res_array['article'],"<br>";?>
    <?php echo $res_array['number'],"<br>";}?>
</div>


	</body>
</html>
