<!DOCTYPE html>
<html>
<head>
<title>Такси Симферополя</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
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
<body>
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
   <div class="navbar-header">
     <a class="navbar-brand" href="index.php"><i>Cервисы такси города Симферополь</i></a>
   </div>
   <div class="collapse navbar-collapse" id="navbar1">
  			<ul class="nav navbar-nav navbar-right">
  				<li><p>Админстратор сайта?<a href="loginAdmin.php"><i>Перейти</i></a></p></li>
  			</ul>
  		</div>
  </div>
  </nav>
	<div class="header">
					<div class="top-header">
						<div class="container">
					     <div class="top-menu">
							<span class="menu"> </span>
								<ul class="cl-effect-16">
								 <li><a class="active" href="index.php" data-hover="Домашняя">Домашняя</a></li>
								<li><a  href="about.php" data-hover="О нас">О нас</a></li>
								<li><a href="servise.php" data-hover="Сервисы">Сервисы</a></li>
								<li><a href="email.php" data-hover="Контакты">Контакты</a></li>
								  <div class="clearfix"></div>
								</ul>
							</div>
							<div class="logo">
							  <a href="index.php"><h1><i>Такси-Симферополя</i></h1></a>
						    </div>
								<script>
									$("span.menu").click(function(){
										$(".top-menu ul").slideToggle("slow" , function(){
										});
									});
								</script>
							<div class="clearfix"> </div>
					</div>

				</div>
				  <div class="banner">
					<div class="container">
						<div  id="top" class="callbacks_container">
						<ul class="rslides" id="slider4">
						<li>
									<div class="banner-info">
										<h3>Мы предоставим выбор</h3>
										<h4>любого сервиса</h4>
									</div>
								</li>
							</ul>
						</div>
					<script src="js/responsiveslides.min.js"></script>
				 <script>
					$(function () {
					  // Slideshow 4
					  $("#slider4").responsiveSlides({
						auto: true,
						pager:false,
						nav: true,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
					  });

					});
				  </script>
					</div>
				   </div>
			</div>
			<div class="service-section">
	    <div class="container">
			<div class="tittle-head">
		       <h3 class="tittle">Сервисы</h3>
			</div>
		    <div class="serve-grids">
			      <div class="col-md-6 serve-left">
							<div class="col-md-6 service-grid">
								<div class="icon">
								 <i class="glyphicon glyphicon-time"></i>
								</div>
								<h5>Быстро И Безопасно</h5>
                	<p>Быстрый выбор сервиса такси</p>
                  <p>Каждый сервис проверен и надежен</p>
							</div>
							<div class="col-md-6 service-grid">
								<div class="icon">
								 <i class="glyphicon glyphicon-thumbs-up"></i>
								</div>
								<h5>Лучшая Цена</h5>
								<p>Вы можете выбрать такси по той цене,</p>
                <p>которая подходит Вам!</p>
							</div>
							<div class="clearfix"></div>
					 </div>
					 <div class="col-md-6 serve-img">
					    <img src="images/s1.jpg"/>
					 </div>
					 <div class="clearfix"></div>
				</div>
				</div>
			</div>
	</body>
</html>
