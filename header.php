<!DOCTYPE html>
<?php if(!isset($_COOKIE["debug_code"]))
setcookie("debug_code",generateCode(),0,COOKIEPATH, COOKIE_DOMAIN );?>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php echo wp_get_document_title(); ?></title>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
    <?php wp_head(); ?>
</head>
<body>
<header>
<div class="header">
    <div class="logo">
    <img src="<?php bloginfo('template_url'); ?>/img/80.png"/>
    </div>
    <div class="mainText">VD Bridge
        <div class="mainText1">Строить мосты между людьми</div>
    </div>
</div>

<?php

$args = array(
    'theme_location' => 'main-menu',
    'menu' => 'main-menu',
    'container' => 'nav',
    'container_class' => 'menu-{menu-slug}-container',
    'container_id' => 'main-menu',
    'menu_class' => '',
    'menu_id' => 'main-menu',
    'echo' => true,
    'fallback_cb' => '__return_empty_string',
    'before' => '',
    'after' => '',
    'link_before' => '',
    'link_after' => '',
    'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
    'depth' => 0,
    'walker' => ''
);

wp_nav_menu( $args );
?>
<div class="regis">
<?php
    "<button onclick=\"{document.getElementById('windows-regis').style.display='flex';}\">Регистрация/вход</button>"
</div>
</header>
<div id="regform"> <?php get_form();

function get_form(){
        $res="
<div id=\"window-regis\">
    <form action = \"functions.php\"  method=\"post\" name=\"authorizing\" onsubmit=\"return authorize(email, password);\">
	<fieldset class=\"l-fieldset\">
		<legend>Вход</legend>
		<label for=\"email\">Email/телефон<em>*</em></label><input type=\"email\" id=\"email2\">
		<label for=\"password\">Пароль<em>*</em></label><input type=\"password\" id=\"password\">
		<label for=\"check-box\" class=\"check\"><input type=\"checkbox\" id=\"remember\">Запомнить меня</label>
		<div class=\"button-regis\" id=\"u-list\">
			<button type=\"submit\">Забыли пароль?</button>
			<button type=\"submit\">Войти</button>
		</div>
	</fieldset>
</form>
	<hr>

	<script>
		function authorize(email,password)
		{var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = email.value;
   var res=true;
   if(reg.test(email.value) == false) {
      document.getElementById(\"email_ch\").innerHTML =\"Введите корректный e - mail\";
      res= false;
   }
   else document.getElementById(\"email_ch\").innerHTML =' ';
   if(res)
   {var request = new XMLHttpRequest();

request.open(\"POST\", \" . get_theme_file_uri(\"authorize.php\").\", true);
request . setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request . onload = function () {
    if (this . status >= 200 && this . status < 400) {

        var
        resp = this . response;
        if (resp == 1)
            document . getElementById(\"email_ch\").innerHTML = \"Данный E-mail адрес не найден\";
	else if (resp == 2)
            document . getElementById(\"pass_ch\").innerHTML = \"Введен неверный пароль\";
	else if (resp == 0) location . replace(\" . get_site_url() . \");
  } else {
        // We reached our target server, but it returned an error
        alert(\"Все сломалось! Попробуйте перезагрузить страницу\");
  }
};
let data ={
    mail:
    email . value,
	pass:password . value
};

let json = \"login=\" + JSON . stringify(data);

request . send(json);
}

return false;
}
</script>
<form action=\"functions.php\" method=\"post\" class=\"r-fieldset\"name=\"reg_form\" id=\"reg_form window-regis\" onsubmit=\"return check_reg(email);\">
<fieldset class=\"r-fieldset\">
		<legend>Регистрация</legend>
		<label for=\"text\">Имя пользователя<em>*</em></label><input type=\"text\" id=\"u-name\">
		<label for=\"email1\">Email<em>*</em></label><input type=\"email\" id=\"email1\">
		<label for=\"u-number\">Телефон<em>*</em></label><input type=\"number\" id=\"u-number\">
		<label for=\"password\">Пароль<em>*</em></label><input type=\"password\" id=\"password\">
		<div class=\"button-regis\" id=\"u-reg\">
			<button type=\"submit\">Регистрация</button>
		</div>
	
</fieldset>
</form>
  <script>
function check_reg(email)
{
	var res=true;
	
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = email.value;
   if(reg.test(email) == false) {
      document.getElementById('email_ch').innerHTML ='Введите корректный e-mail';
      res= false;
   }
   else document.getElementById('email_ch').innerHTML =' ';
   return res;
}

 function check_password() {
    var password = document.getElementById('password').value; // Получаем пароль из формы
    var s_letters = \"qwertyuiopasdfghjklzxcvbnm\"; // Буквы в нижнем регистре
    var b_letters = \"QWERTYUIOPLKJHGFDSAZXCVBNM\"; // Буквы в верхнем регистре
    var digits = \"0123456789\"; // Цифры
    var specials = \"!@#$%^&*()_-+=\|/.,:;[]{}\"; // Спецсимволы
    var is_s = false; // Есть ли в пароле буквы в нижнем регистре
    var is_b = false; // Есть ли в пароле буквы в верхнем регистре
    var is_d = false; // Есть ли в пароле цифры
    var is_sp = false; // Есть ли в пароле спецсимволы
    for (var i = 0; i < password.length; i++) {
      /* Проверяем каждый символ пароля на принадлежность к тому или иному типу */
      if (!is_s && s_letters.indexOf(password[i]) != -1) is_s = true;
      else if (!is_b && b_letters.indexOf(password[i]) != -1) is_b = true;
      else if (!is_d && digits.indexOf(password[i]) != -1) is_d = true;
      else if (!is_sp && specials.indexOf(password[i]) != -1) is_sp = true;
    }
    var rating = 0;
    var text = \"\";
    if (is_s) rating++; // Если в пароле есть символы в нижнем регистре, то увеличиваем рейтинг сложности
    if (is_b) rating++; // Если в пароле есть символы в верхнем регистре, то увеличиваем рейтинг сложности
    if (is_d) rating++; // Если в пароле есть цифры, то увеличиваем рейтинг сложности
    if (is_sp) rating++; // Если в пароле есть спецсимволы, то увеличиваем рейтинг сложности
    /* Далее идёт анализ длины пароля и полученного рейтинга, и на основании этого готовится текстовое описание сложности пароля */
   if (password.length < 6 ) text = \"Слишком короткий\";
    else if (password.length >= 8 && rating < 3) text = \"Средний\";
    else if (password.length >= 8 && rating >= 3) text = \"Сложный\";
    else if (password.length >= 6 && rating == 1) text = \"Простой\";
    else if (password.length >= 6 && rating > 1 && rating < 4) text = \"Средний\";
    else if (password.length >= 6 && rating == 4) text = \"Сложный\";
    document.getElementById('difficulty').innerHTML = text;
  }
</script></div>"
        ;

    echo $res;}?></div>

