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
  </div>
  </nav>
  <div id="home" >
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
  <h2>По вопросам пишите нам</h2>
    <form class="contact_form" action="send/mail.php" method="post">
      <p>
              <label style="color: #e9eef5;" for="name">Имя:</label>
              <input type="text"  name="name" placeholder="Введите ваше имя" required />
          </p>
          <p>
              <label style="color: #e9eef5" for="email">Email:</label>
              <input type="email" name="email" placeholder="Введите электронный адрес" required />
              <span style="color: #fadd73;" class="form_hint">Правильный формат "name@something.com"</span>
          </p>
          <p>
              <label style="color: #e9eef5" for="tel">Телефон:</label>
              <input type="tel" name="tel" placeholder="Введите номер телефона" required />
              <span style="color: #fadd73;" class="form_hint">Правильный формат "+7-123-4567890"</span>
          </p>
          <p>
              <label style="color: #e9eef5;"for="message">Текст сообщения:</label><br>
              <textarea style="width:300px;" name="message" cols="40" rows="4" required ></textarea>
          </p>
          <input name="bezspama" type="text" style="display:none" value="" />
          <p>
              <button class="submit" type="submit">Отправить сообщение</button>
          </p>
  </form>
</body>
</html>



<script type="text/javascript">
$(function(){
  'use strict';
$('#form').on('submit', function(e){
    e.preventDefault();
    var fd = new FormData( this );
    $.ajax({
      url: 'email.php',
      type: 'POST',
      contentType: false,
      processData: false,
      data: fd,
      success: function(msg){
if(msg == 'ok') {
  alert('Отправлено')
} else {
  alert('Ошибка')
}
      }
    });
  });
});
</script>
