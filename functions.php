<?php
if(!isset($_COOKIE["debug_code"]))
    setcookie("debug_code",generateCode(),0,COOKIEPATH, COOKIE_DOMAIN );
/**
 * Поддержка миниатюр
 **/
add_theme_support( 'post-thumbnails' );

/**
 * Подключение меню
 **/
register_nav_menus( array(
    'main-menu' => __( 'main-menu' )
));

/**
 * Подключение сайдбара
 **/
register_sidebar( array(
    'name' => __( 'Sidebar', 'mytheme' ),
    'id' => 'sidebar',
    'description' => 'Правая колонка сайта.',
    'before_widget' => '<aside class="widget">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));

/**
 * Функции вывода анонса поста (цитаты) на главной
 **/
function new_excerpt_length( $length ) {
    return 100;//количество выводимых символов анонса (по умолчанию 55)
}
add_filter( 'excerpt_length', 'new_excerpt_length' );

/**
 * Функции заменяет «[…]» на «...» в конце цитаты
 **/
function new_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

add_shortcode('set_order','get_oreder_form');

function get_oreder_form(){
    if ( is_user_logged_in()&&!isset($_COOKIE['Demo'])||is_logged_in() ) {
        $res="
<script>
      function checkForm(form)
{    
var txt = document.getElementById('projectName').value; //создаем переменную по данным Имя пользователя
//var file=document.getElementById('scheme').value; //создаем переменную по номеру телефона пользователя
    if(txt == ''||txt==null) //проверяем не пустое ли поле Имя
    {        alert(txt);
alert('Вы забыли ввести имя проекта.');
//и выводим сообщение если пустое поле Имя
        return false;
    }     
//if(file== ''||file==null)    { //проверяем пустое ли поле телефон
  //      alert('Необходимо прекрепить файл проекта.'); // и если таки да, оно пустое, то выводим сообщение об этом
  //      return false;
 //   }
 {var request = new XMLHttpRequest();

request.open(\"POST\", \"".get_theme_file_uri("set-order.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function() {
  if (this.status >= 200 && this.status < 400) {
   
    var resp = this.response;
    alert(resp);
//	if(resp==1)
	//document.getElementById(\"email_ch\").innerHTML =\"Данный E-mail адрес не найден\";
//	else if(resp==2)
//		document.getElementById(\"pass_ch\").innerHTML =\"Введен неверный пароль\";
//	else if(resp==0)location.replace(\"".get_site_url()."\");
  } else {
    // We reached our target server, but it returned an error
alert(\"Все сломалось! Попробуйте перезагрузить страницу\");
  }
};
let data={
	 last_date:lastDate.value,
    max_price:cost.value,
    name:projectName.value,
    descr:description.value,
    sch:scheme.value,
    def:defect.value,
    acc:accuracy.value,
    tpe:PCB_type.value,
    mthd:prod_type.value,
    stck:stock.value,   
    qtty:quantity.value
};

let json = \"login=\"+JSON.stringify(data);

request.send(json);

  
   return false;
		}
      return true;}      </script>

<form id=\"order\" onsubmit=\"return checkForm(this)\" action=\"set-order.php\"  method=\"POST\">
<p>Название проекта: <input name=\"projectName\" id=\"projectName\" type=\"text\" requied></p>
<p>Крайний срок готовности: <input name=\"lastDate\" id='lastDate' type=\"date\"></p>
Максимальная стоимость:<p style=\"display: flex;\"> <input name=\"cost\" id='cost' type=\"number\" width=80%>
<select name=\"valueType\" form=\"order\" width=20%>
	
	<option value=\"usd\">$,usd</option>
	</select>
	</p>

<p>Описание проекта:<input name=\"description\" id=\"description\" type=\"text\" requied></p>
<p>Количество экзепляров:<input name=\"quantity\" id =\"quantity\" type='number' required> </p>
<p>Допустимый процент брака:<input name=\"defect\" id='defect' type='number' required></p>
<p>Требуемый класс точности
<select name='accuracy' id='accuracy'>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
</select>
</p>
<p></p>
<p>
Тип печатной платы
<select name='PCB_type' id='PCB_type'>
<option>Односторонняя </option>
<option>Двусторонняя </option>
<option>Многослойная </option>
</select>
</p>
<p>
<details>
<summary>Приложения</summary>
<p>Схема<input type='file' id='scheme' name='scheme' required></p>
<p>Документация<input type='file' id='documentation' name='documentation'></p>
<p>Требования<input type='file' id='requirements' name='requirements'></p>
<p>BOM-лист<input type='file' id='BOM' name='BOM'></p>

</details></p>
<p> Метод изготовления печатной платы
<select name='prod_type' id='prod_type'>
<option>Любой</option>
<option>субтрактивный</option>
<option>полуаддитивный </option>
<option>аддитивный</option>
<option>комбинированный</option>
</select></p>
<p>Наличие давальческого сырья: <input type='checkbox' id='stock' name='stock'> </p>
<p><input type=\"submit\" form=\"order\" value=\"Отправить\" name=\"submit_order\"></p>

</form>
";
        return $res;}
    else
        if (isset($_COOKIE['Demo']))
        {
            $res="
<script>
      function checkForm(form)
{    
var txt = document.getElementById('projectName').value; //создаем переменную по данным Имя пользователя
var file=document.getElementById('scheme').value; //создаем переменную по номеру телефона пользователя
    if(txt == ''||txt) //проверяем не пустое ли поле Имя
    {        
alert('Вы забыли ввести имя проекта.'); //и выводим сообщение если пустое поле Имя
        return false;
    }     
if(file== ''||file==null)    { //проверяем пустое ли поле телефон
        alert('Необходимо прекрепить файл проекта.'); // и если таки да, оно пустое, то выводим сообщение об этом
        return false;
    }
      return true;}      </script>

<form id=\"order\" onsubmit=\"return checkForm(this)\" action=\"functions.php\" target=\"_self\" method=\"POST\">
<p>Название проекта: <input name=\"projectName\" id=\"projectName\" type=\"text\" requied></p>
<p>Крайний срок готовности: <input name=\"lastDate\" type=\"date\"></p>
Максимальная стоимость:<p style=\"display: flex;\"> <input name=\"cost\" type=\"number\" width=80%>
<select name=\"valueType\" form=\"order\" width=20%>
	
	<option value=\"usd\">$,usd</option>
	</select>
	</p>
<p>Ссылка на Файл проекта:<input name=\"file\" id=\"file\" type=\"text\" requied></p>
<p>Описание проекта:<input name=\"description\" id=\"description\" type=\"text\" requied></p>

<p><input type=\"submit\" form=\"order\" value=\"Отправить\" name=\"submit_order\" disabled></p>
</form>
";
            return $res;
        }
    {
        $res="<h2>Необходимо авторизоваться</h2>";
        return $res;
    }
}


/*
if(isset($_POST['submit_order']))
{	echo ($wpdb->get_var("SHOW TABLES LIKE 'vdb_orders'") == $table_name);
    global $wpdb;
    if($wpdb->get_var("SHOW TABLES LIKE 'vdb_orders'") != $table_name){
        $sql = "CREATE TABLE vdb_orders (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  user_id mediumint(9) NOT NULL,
	  prod_id mediumint(9) ,
	  max_price bigint(11) DEFAULT '0' NOT NULL,
	  name tinytext NOT NULL,
	  last_date DATE NOT NULL,
	  description text NOT NULL,
	  original_url VARCHAR(55) NOT NULL,
	  demo_url VARCHAR(55) ,
	  UNIQUE KEY id (id)
	);";

        require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
        dbDelta($sql,true);
    }


    // подготавливаем данные
    $user_id = esc_sql(get_current_user_id());
    $last_date=esc_sql($_POST["lastDate"]);
    $max_price = esc_sql($_POST["cost"]);
    $name = esc_sql($_POST["projectName"]);
    $description=esc_sql($_POST["description"]);
    $original_url=esc_sql($_POST["file"]);


    header("Location: http://vdbridge.ru");
    //die();}
    $sql = "INSERT INTO vdb_orders (`user_id`,`max_price`,`name`,`last_date`,`description`,`original_url`) VALUES
	('".$user_id."','".$max_price."','".$name."','".$last_date."','".$description."','".$original_url."')";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);

}*/

add_shortcode('order_list','get_order_list');

function get_order_list()
{
    if (isset($_COOKIE['Demo'])) {global $wpdb;
        $sql = "SELECT * FROM `vdb_orders_demo`";
        $posts = $wpdb->get_results($sql,ARRAY_N);

        $res="
	<ul>";

        foreach ($posts as $posts_i)  {

            $res=$res."
                    <li>
                        <a href=\"/order/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <a href=\"/order/?order-id= ".$posts_i[0] ."\">Подробнее</a>
                        </span>
                    </li>

				  ";}
        $res=$res."</ul>";
        return "$res";}
    global $wpdb;
    $sql = "SELECT * FROM `vdb_orders`";
    $posts = $wpdb->get_results($sql,ARRAY_N);

    $res="
	<ul>";

    foreach ($posts as $posts_i)  {

        $res=$res."
                    <li>
                        <a href=\"/order/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <a href=\"/order/?order-id= ".$posts_i[0] ."\">Подробнее</a>
                        </span>
                    </li>

				  ";}
    $res=$res."</ul>";
    return "$res";
}

function get_demo_order_listorder_list()
{

    global $wpdb;
    $sql = "SELECT * FROM `vdb_orders_demo`";
    $posts = $wpdb->get_results($sql,ARRAY_N);

    $res="
	<ul>";

    foreach ($posts as $posts_i)  {

        $res=$res."
                    <li>
                        <a href=\"/order/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <a href=\"/order/?order-id= ".$posts_i[0] ."\">Подробнее</a>
                        </span>
                    </li>

				  ";}
    $res=$res."</ul>";
    return "$res";
}

add_shortcode('get_order','view_order');
function view_order(){
//if( isset($_GET['order-id']))
    {
        $id=$_GET['order-id'];
        global $wpdb;
        $table_name='vdb_orders';
        if (isset($_COOKIE['Demo'])) $table_name=$table_name.'_demo';
        $sql = "SELECT * FROM ".$table_name." WHERE `id`=".$id;;
        $posts = $wpdb->get_results($sql,ARRAY_N);

        foreach ($posts as $posts_i)  {

            $res=$res."
                    
                        <a href=\"/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <span>Описание проекта:<span>
					   <span>".$posts_i[6]."</span>
					   <span>Необходимо выполнить до ".$posts_i[5]."
                        </span>";
            $order=$wpdb->get_row("SELECT * FROM 'vdb_orders' WHERE id LIKE '%".$id."%'",ARRAY_N);
            if($order["1"]==$_COOKIE["user_id"]&&is_logged_in())
                $res=$res." <span><a href='".home_url()."/order-edit/?id='".$id."'>Редактировать</a></span>";
            elseif (is_logged_in())
                $res=$res." <span><a href='".home_url()."/order-offer/?id='".$id."'>Оставить завяку на выполнение</a></span>";


            ;}
        return"$res";
    }
}

if( array_key_exists('demo',$_GET))
{
    if(empty($_GET['demo']))
        setcookie("Demo", "1",  0,COOKIEPATH, COOKIE_DOMAIN );
    else setcookie("Demo", "1", time() + $_GET['demo']*60,COOKIEPATH, COOKIE_DOMAIN );
}

add_shortcode('reg_form', 'get_reg_form');

function get_reg_form()
{
    if(!is_logged_in())
        $res="
<form action=\"functions.php\" method=\"post\" name=\"reg_form\" id=\"reg_form\" onsubmit=\"return check_reg(company,email);\">
   
   <p>Название компании<input type=\"text\" name=\"company\" > <span id=\"company_ch\"/></p>
   <p>E-mail<input type=\"e-mail\" name=\"email\" > <span id=\"email_ch\"</p>
   <p>Пароль<input type=\"password\" oninput=\"check_password()\"id=\"password\" name=\"password\" > <span id=\"difficulty\"/></p>
   
   <p><input type=\"submit\" onsubmit=\"return check_reg(company,email);\" value=\"Зарегистрироваться\"></p>
  </form>
  <script>
function check_reg(company,email)
{
	var res=true;
	if(/^[a-zA-Z1-9а-яА-Я]+$/.test(company.value) == false)
	{document.getElementById('company_ch').innerHTML ='Название компании содержит недопустимые символы'; res= false;}
else document.getElementById('company_ch').innerHTML = ' ';
if(company.value.length < 2 || company.value.length > 30)
	{ document.getElementById('company_ch').innerHTML = 'В названии компании должно быть от 2 до 30 символов'; res= false;}
else document.getElementById('company_ch').innerHTML = ' ';
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
</script>";
    else $res="<p>Вы уже зарегистрированны</p>";
    return $res;
}


if(isset($_POST['submit_order']))
{
    $sql = "CREATE TABLE vdb_clients( id mediumint(9) NOT NULL AUTO_INCREMENT,\n"

        . "	  email tinytext NOT NULL,\n"

        . "	  pass text NOT NULL,\n"

        . "	  role text NOT NULL,\n"

        . "	  UNIQUE KEY id (id))";
    $email=esc_sql($_POST['email']);
    $company=esc_sql($_POST['company']);
    $password=esc_sql(md5($_POST['password']));

    $sql = "INSERT INTO vdb_clients (`email`,`pass`,`company`,'code') VALUES
	('".$email."','".$password."','".$company.",NULL)";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);
}

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

add_shortcode('login_form','authorize');

function authorize()
{
    if(!is_logged_in())
        $res="<form action=\"functions.php\" method=\"post\" name=\"authorizing\" onsubmit=\"return authorize(email,password);\">
	<p><input type=\"e-mail\" requied id=\"email\" name=\"email\"><span id=\"email_ch\"></span></p>
	<p><input type=\"password\" requied id=\"password\" name=\"password\"><span id=\"pass_ch\"></span></p>
	<p><input type=\"submit\" value=\"Войти\" onsubmit=\"return authorize(email,password);\"></p>
	<p><a href='".home_url()."/registration'></a>Еще не зарегистрированны?</p>
	<script>
		function authorize(email,password)
		{var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = email.value;
   var res=true;
   if(reg.test(email.value) == false) {
      document.getElementById(\"email_ch\").innerHTML =\"Введите корректный e-mail\";
      res= false;
   }
   else document.getElementById(\"email_ch\").innerHTML =' ';
   if(res)
   {var request = new XMLHttpRequest();

request.open(\"POST\", \"".get_theme_file_uri("authorize.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function() {
  if (this.status >= 200 && this.status < 400) {
   
    var resp = this.response;
	if(resp==1)
	document.getElementById(\"email_ch\").innerHTML =\"Данный E-mail адрес не найден\";
	else if(resp==2)
		document.getElementById(\"pass_ch\").innerHTML =\"Введен неверный пароль\";
	else if(resp==0)location.replace(\"".get_site_url()."\");
  } else {
    // We reached our target server, but it returned an error
alert(\"Все сломалось! Попробуйте перезагрузить страницу\");
  }
};
let data={
	mail:email.value,
	pass:password.value
};

let json = \"login=\"+JSON.stringify(data);

request.send(json);
}
  
   return false;
		}
</script>
";
    else $res="<span> Вы уже вошли в систему</span>";
    return $res;

}

function is_logged_in()
{
    global $wpdb;
    $sql = "SELECT * FROM `vdb_clients` WHERE id='".$_COOKIE["user_id"]."'";

    $posts = $wpdb->get_row($sql,ARRAY_A);
    return isset($_COOKIE["user_id"])&&strcmp($posts['code'],$_COOKIE["debug_code"]);
}
add_shortcode('main_page_content','get_main_page_content');

function get_main_page_content()
{
    $res=" <div class=\"intro_panel\">
                <div id=\"description\">
                    <span> Платформа, выполняющая роль информатора,контролера и мессенджера</span>
                </div>
                <div id=\"quote_block\">
                    <span id=\"quote\">
    \"Посвятить жизнь бизнесу, который строит мосты между людьми.\"
                    </span>
                    <span id=\"quote_author\">
                        ДЭНИЕЛ ЛЮБЕЦКИ,<br>ОСНОВАТЕЛЬ КОМПАНИИ KIND
                    </span>
                    <input type=\"button\" id=\"begin_work\" value=\"Начать работу\" onclick=\"start()\">
                    <script>
                        function start() {//TODO: сделать алгоритм перенаправления взависимости от роли
                          
                            if (".is_logged_in()." )
                            {
                                var results = document.cookie.match ( '(^|;) ?' + \"role\" + '=([^;]*)(;|$)' );
                                alert(results);
                            }
                            else
                            {
                                location.replace(\"". home_url()."/login\")
                            }
                        }
                    </script>       
                </div>
            </div>";
    return $res;
}

add_shortcode("own_orders","get_client_orders");
function get_client_orders()
{
    global $wpdb;
    $sql = "SELECT * FROM `vdb_orders_demo` where 'id'='" . $_COOKIE["user_id"] . "'";
    $posts = $wpdb->get_results($sql, ARRAY_N);

    $res = "
	<ul>";

    foreach ($posts as $posts_i) {

        $res = $res . "
                    <li>
                        <a href=\"/order/?order-id=" . $posts_i[0] . "\">" . $posts_i[4] . "</a>
                        <span>Стоимость до " . $posts_i[3] . "</span>
                       <a href=\"/order/?order-id= " . $posts_i[0] . "\">Подробнее</a>
                        </span>
                    </li>

				  ";
    }
}

add_shortcode("company_info","get_company_info");
function get_company_info()
{
    if(isset($_GET["id"]))
        return get_other_company_info($_GET["id "]);
    else return get_own_comany_info();
}
function get_other_company_info($id)
{
    global $wpdb;
    $sql = "SELECT `role` FROM `vdb_clients` WHERE `id`=".$_COOKIE["user_id"];
    $role=$wpdb->get_var($sql);
    $res="<div id='info'>";
    if($role=="individual")
    {
        $sql = "SELECT * FROM `vdb_individual` where 'id'=".$_COOKIE["user_id"];
        $info=$wpdb->get_row($sql,ARRAY_A);
        $res=$info;
    }elseif($role==NULL)
    {
        $res="<div id='info'>
<select onchange='get_info_form(this.value)' id='comp_type'>
<option value='1'>ИП</option>
<option value='2'>ООО</option>
<option value='3'>ОДО</option>
<option value='4'>ОАО</option>
<option value='5'>АО</option>
<option value='6'>ЗАО</option>
<option value='7'>Государственное или муниципальное унитарное предприятие</option>
</select>
<div id='data'>
</div>
<script>
function get_info_form(type){
    
    var request = new XMLHttpRequest();

request.open(\"POST\", \"".get_theme_file_uri("first-info.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function() {
  if (this.status >= 200 && this.status < 400) {
   alert(this.response);
	document.getElementById('data').innerHTML =this.response;
}else alert('fuck');}
alert(type);
request.send(type);

  
   
		}
}
</script>";
    }elseif
    ($role!=employee)
    {
        $sql = "SELECT * FROM `vdb_companies` WHERE`id`=".$_COOKIE["user_id"];
        $info=$wpdb->get_row($sql,ARRAY_A);
        $res=$info;
    }
    return $res;
}

function get_own_comany_info()
{

}
add_shortcode("lk_script","get_lk_script");
function get_lk_script()
{
    "<script>
	
function change(block)
{
	
		var request = new XMLHttpRequest();

request.open(\"POST\", \"". get_theme_file_uri("cabinet.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function () {
    if (this . status >= 200 && this . status < 400) {

        var
        resp = this.response;
            document.getElementById(\"personal_info\").innerHTML = resp;
	
  }
};
let data ={
    blockId:block
};

let json = \"login=\" + JSON . stringify(data);

request . send(json);
return false;
}

</script><?php
if(!isset($_COOKIE["debug_code"]))
    setcookie("debug_code",generateCode(),0,COOKIEPATH, COOKIE_DOMAIN );
/**
 * Поддержка миниатюр
 **/
add_theme_support( 'post-thumbnails' );

/**
 * Подключение меню
 **/
register_nav_menus( array(
    'main-menu' => __( 'main-menu' )
));

/**
 * Подключение сайдбара
 **/
register_sidebar( array(
    'name' => __( 'Sidebar', 'mytheme' ),
    'id' => 'sidebar',
    'description' => 'Правая колонка сайта.',
    'before_widget' => '<aside class="widget">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
));

/**
 * Функции вывода анонса поста (цитаты) на главной
 **/
function new_excerpt_length( $length ) {
    return 100;//количество выводимых символов анонса (по умолчанию 55)
}
add_filter( 'excerpt_length', 'new_excerpt_length' );

/**
 * Функции заменяет «[…]» на «...» в конце цитаты
 **/
function new_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

add_shortcode('set_order','get_oreder_form');

function get_oreder_form(){
    if ( is_user_logged_in()&&!isset($_COOKIE['Demo'])||is_logged_in() ) {
        $res="
<script>
      function checkForm(form)
{    
var txt = document.getElementById('projectName').value; //создаем переменную по данным Имя пользователя
//var file=document.getElementById('scheme').value; //создаем переменную по номеру телефона пользователя
    if(txt == ''||txt==null) //проверяем не пустое ли поле Имя
    {        alert(txt);
alert('Вы забыли ввести имя проекта.');
//и выводим сообщение если пустое поле Имя
        return false;
    }     
//if(file== ''||file==null)    { //проверяем пустое ли поле телефон
  //      alert('Необходимо прекрепить файл проекта.'); // и если таки да, оно пустое, то выводим сообщение об этом
  //      return false;
 //   }
 {var request = new XMLHttpRequest();

request.open(\"POST\", \"".get_theme_file_uri("set-order.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function() {
  if (this.status >= 200 && this.status < 400) {
   
    var resp = this.response;
    alert(resp);
//	if(resp==1)
	//document.getElementById(\"email_ch\").innerHTML =\"Данный E-mail адрес не найден\";
//	else if(resp==2)
//		document.getElementById(\"pass_ch\").innerHTML =\"Введен неверный пароль\";
//	else if(resp==0)location.replace(\"".get_site_url()."\");
  } else {
    // We reached our target server, but it returned an error
alert(\"Все сломалось! Попробуйте перезагрузить страницу\");
  }
};
let data={
	 last_date:lastDate.value,
    max_price:cost.value,
    name:projectName.value,
    descr:description.value,
    sch:scheme.value,
    def:defect.value,
    acc:accuracy.value,
    tpe:PCB_type.value,
    mthd:prod_type.value,
    stck:stock.value,   
    qtty:quantity.value
};

let json = \"login=\"+JSON.stringify(data);

request.send(json);

  
   return false;
		}
      return true;}      </script>

<form id=\"order\" onsubmit=\"return checkForm(this)\" action=\"set-order.php\"  method=\"POST\">
<p>Название проекта: <input name=\"projectName\" id=\"projectName\" type=\"text\" requied></p>
<p>Крайний срок готовности: <input name=\"lastDate\" id='lastDate' type=\"date\"></p>
Максимальная стоимость:<p style=\"display: flex;\"> <input name=\"cost\" id='cost' type=\"number\" width=80%>
<select name=\"valueType\" form=\"order\" width=20%>
	
	<option value=\"usd\">$,usd</option>
	</select>
	</p>

<p>Описание проекта:<input name=\"description\" id=\"description\" type=\"text\" requied></p>
<p>Количество экзепляров:<input name=\"quantity\" id =\"quantity\" type='number' required> </p>
<p>Допустимый процент брака:<input name=\"defect\" id='defect' type='number' required></p>
<p>Требуемый класс точности
<select name='accuracy' id='accuracy'>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
</select>
</p>
<p></p>
<p>
Тип печатной платы
<select name='PCB_type' id='PCB_type'>
<option>Односторонняя </option>
<option>Двусторонняя </option>
<option>Многослойная </option>
</select>
</p>
<p>
<details>
<summary>Приложения</summary>
<p>Схема<input type='file' id='scheme' name='scheme' required></p>
<p>Документация<input type='file' id='documentation' name='documentation'></p>
<p>Требования<input type='file' id='requirements' name='requirements'></p>
<p>BOM-лист<input type='file' id='BOM' name='BOM'></p>

</details></p>
<p> Метод изготовления печатной платы
<select name='prod_type' id='prod_type'>
<option>Любой</option>
<option>субтрактивный</option>
<option>полуаддитивный </option>
<option>аддитивный</option>
<option>комбинированный</option>
</select></p>
<p>Наличие давальческого сырья: <input type='checkbox' id='stock' name='stock'> </p>
<p><input type=\"submit\" form=\"order\" value=\"Отправить\" name=\"submit_order\"></p>

</form>
";
        return $res;}
    else
        if (isset($_COOKIE['Demo']))
        {
            $res="
<script>
      function checkForm(form)
{    
var txt = document.getElementById('projectName').value; //создаем переменную по данным Имя пользователя
var file=document.getElementById('scheme').value; //создаем переменную по номеру телефона пользователя
    if(txt == ''||txt) //проверяем не пустое ли поле Имя
    {        
alert('Вы забыли ввести имя проекта.'); //и выводим сообщение если пустое поле Имя
        return false;
    }     
if(file== ''||file==null)    { //проверяем пустое ли поле телефон
        alert('Необходимо прекрепить файл проекта.'); // и если таки да, оно пустое, то выводим сообщение об этом
        return false;
    }
      return true;}      </script>

<form id=\"order\" onsubmit=\"return checkForm(this)\" action=\"functions.php\" target=\"_self\" method=\"POST\">
<p>Название проекта: <input name=\"projectName\" id=\"projectName\" type=\"text\" requied></p>
<p>Крайний срок готовности: <input name=\"lastDate\" type=\"date\"></p>
Максимальная стоимость:<p style=\"display: flex;\"> <input name=\"cost\" type=\"number\" width=80%>
<select name=\"valueType\" form=\"order\" width=20%>
	
	<option value=\"usd\">$,usd</option>
	</select>
	</p>
<p>Ссылка на Файл проекта:<input name=\"file\" id=\"file\" type=\"text\" requied></p>
<p>Описание проекта:<input name=\"description\" id=\"description\" type=\"text\" requied></p>

<p><input type=\"submit\" form=\"order\" value=\"Отправить\" name=\"submit_order\" disabled></p>
</form>
";
            return $res;
        }
    {
        $res="<h2>Необходимо авторизоваться</h2>";
        return $res;
    }
}


/*
if(isset($_POST['submit_order']))
{	echo ($wpdb->get_var("SHOW TABLES LIKE 'vdb_orders'") == $table_name);
    global $wpdb;
    if($wpdb->get_var("SHOW TABLES LIKE 'vdb_orders'") != $table_name){
        $sql = "CREATE TABLE vdb_orders (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  user_id mediumint(9) NOT NULL,
	  prod_id mediumint(9) ,
	  max_price bigint(11) DEFAULT '0' NOT NULL,
	  name tinytext NOT NULL,
	  last_date DATE NOT NULL,
	  description text NOT NULL,
	  original_url VARCHAR(55) NOT NULL,
	  demo_url VARCHAR(55) ,
	  UNIQUE KEY id (id)
	);";

        require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
        dbDelta($sql,true);
    }


    // подготавливаем данные
    $user_id = esc_sql(get_current_user_id());
    $last_date=esc_sql($_POST["lastDate"]);
    $max_price = esc_sql($_POST["cost"]);
    $name = esc_sql($_POST["projectName"]);
    $description=esc_sql($_POST["description"]);
    $original_url=esc_sql($_POST["file"]);


    header("Location: http://vdbridge.ru");
    //die();}
    $sql = "INSERT INTO vdb_orders (`user_id`,`max_price`,`name`,`last_date`,`description`,`original_url`) VALUES
	('".$user_id."','".$max_price."','".$name."','".$last_date."','".$description."','".$original_url."')";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);

}*/

add_shortcode('order_list','get_order_list');

function get_order_list()
{
    if (isset($_COOKIE['Demo'])) {global $wpdb;
        $sql = "SELECT * FROM `vdb_orders_demo`";
        $posts = $wpdb->get_results($sql,ARRAY_N);

        $res="
	<ul>";

        foreach ($posts as $posts_i)  {

            $res=$res."
                    <li>
                        <a href=\"/order/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <a href=\"/order/?order-id= ".$posts_i[0] ."\">Подробнее</a>
                        </span>
                    </li>

				  ";}
        $res=$res."</ul>";
        return "$res";}
    global $wpdb;
    $sql = "SELECT * FROM `vdb_orders`";
    $posts = $wpdb->get_results($sql,ARRAY_N);

    $res="
	<ul>";

    foreach ($posts as $posts_i)  {

        $res=$res."
                    <li>
                        <a href=\"/order/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <a href=\"/order/?order-id= ".$posts_i[0] ."\">Подробнее</a>
                        </span>
                    </li>

				  ";}
    $res=$res."</ul>";
    return "$res";
}

function get_demo_order_listorder_list()
{

    global $wpdb;
    $sql = "SELECT * FROM `vdb_orders_demo`";
    $posts = $wpdb->get_results($sql,ARRAY_N);

    $res="
	<ul>";

    foreach ($posts as $posts_i)  {

        $res=$res."
                    <li>
                        <a href=\"/order/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <a href=\"/order/?order-id= ".$posts_i[0] ."\">Подробнее</a>
                        </span>
                    </li>

				  ";}
    $res=$res."</ul>";
    return "$res";
}

add_shortcode('get_order','view_order');
function view_order(){
//if( isset($_GET['order-id']))
    {
        $id=$_GET['order-id'];
        global $wpdb;
        $table_name='vdb_orders';
        if (isset($_COOKIE['Demo'])) $table_name=$table_name.'_demo';
        $sql = "SELECT * FROM ".$table_name." WHERE `id`=".$id;;
        $posts = $wpdb->get_results($sql,ARRAY_N);

        foreach ($posts as $posts_i)  {

            $res=$res."
                    
                        <a href=\"/?order-id=". $posts_i[0] ."\">".$posts_i[4] ."</a>
                        <span>Стоимость до ".$posts_i[3]."</span>
                       <span>Описание проекта:<span>
					   <span>".$posts_i[6]."</span>
					   <span>Необходимо выполнить до ".$posts_i[5]."
                        </span>";
            $order=$wpdb->get_row("SELECT * FROM 'vdb_orders' WHERE id LIKE '%".$id."%'",ARRAY_N);
            if($order["1"]==$_COOKIE["user_id"]&&is_logged_in())
                $res=$res." <span><a href='".home_url()."/order-edit/?id='".$id."'>Редактировать</a></span>";
            elseif (is_logged_in())
                $res=$res." <span><a href='".home_url()."/order-offer/?id='".$id."'>Оставить завяку на выполнение</a></span>";


            ;}
        return"$res";
    }
}

if( array_key_exists('demo',$_GET))
{
    if(empty($_GET['demo']))
        setcookie("Demo", "1",  0,COOKIEPATH, COOKIE_DOMAIN );
    else setcookie("Demo", "1", time() + $_GET['demo']*60,COOKIEPATH, COOKIE_DOMAIN );
}

add_shortcode('reg_form', 'get_reg_form');

function get_reg_form()
{
    if(!is_logged_in())
        $res="
<form action=\"functions.php\" method=\"post\" name=\"reg_form\" id=\"reg_form\" onsubmit=\"return check_reg(company,email);\">
   
   <p>Название компании<input type=\"text\" name=\"company\" > <span id=\"company_ch\"/></p>
   <p>E-mail<input type=\"e-mail\" name=\"email\" > <span id=\"email_ch\"</p>
   <p>Пароль<input type=\"password\" oninput=\"check_password()\"id=\"password\" name=\"password\" > <span id=\"difficulty\"/></p>
   
   <p><input type=\"submit\" onsubmit=\"return check_reg(company,email);\" value=\"Зарегистрироваться\"></p>
  </form>
  <script>
function check_reg(company,email)
{
	var res=true;
	if(/^[a-zA-Z1-9а-яА-Я]+$/.test(company.value) == false)
	{document.getElementById('company_ch').innerHTML ='Название компании содержит недопустимые символы'; res= false;}
else document.getElementById('company_ch').innerHTML = ' ';
if(company.value.length < 2 || company.value.length > 30)
	{ document.getElementById('company_ch').innerHTML = 'В названии компании должно быть от 2 до 30 символов'; res= false;}
else document.getElementById('company_ch').innerHTML = ' ';
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
</script>";
    else $res="<p>Вы уже зарегистрированны</p>";
    return $res;
}


if(isset($_POST['submit_order']))
{
    $sql = "CREATE TABLE vdb_clients( id mediumint(9) NOT NULL AUTO_INCREMENT,\n"

        . "	  email tinytext NOT NULL,\n"

        . "	  pass text NOT NULL,\n"

        . "	  role text NOT NULL,\n"

        . "	  UNIQUE KEY id (id))";
    $email=esc_sql($_POST['email']);
    $company=esc_sql($_POST['company']);
    $password=esc_sql(md5($_POST['password']));

    $sql = "INSERT INTO vdb_clients (`email`,`pass`,`company`,'code') VALUES
	('".$email."','".$password."','".$company.",NULL)";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);
}

function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

add_shortcode('login_form','authorize');

function authorize()
{
    if(!is_logged_in())
        $res="<form action=\"functions.php\" method=\"post\" name=\"authorizing\" onsubmit=\"return authorize(email,password);\">
	<p><input type=\"e-mail\" requied id=\"email\" name=\"email\"><span id=\"email_ch\"></span></p>
	<p><input type=\"password\" requied id=\"password\" name=\"password\"><span id=\"pass_ch\"></span></p>
	<p><input type=\"submit\" value=\"Войти\" onsubmit=\"return authorize(email,password);\"></p>
	<p><a href='".home_url()."/registration'></a>Еще не зарегистрированны?</p>
	<script>
		function authorize(email,password)
		{var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = email.value;
   var res=true;
   if(reg.test(email.value) == false) {
      document.getElementById(\"email_ch\").innerHTML =\"Введите корректный e-mail\";
      res= false;
   }
   else document.getElementById(\"email_ch\").innerHTML =' ';
   if(res)
   {var request = new XMLHttpRequest();

request.open(\"POST\", \"".get_theme_file_uri("authorize.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function() {
  if (this.status >= 200 && this.status < 400) {
   
    var resp = this.response;
	if(resp==1)
	document.getElementById(\"email_ch\").innerHTML =\"Данный E-mail адрес не найден\";
	else if(resp==2)
		document.getElementById(\"pass_ch\").innerHTML =\"Введен неверный пароль\";
	else if(resp==0)location.replace(\"".get_site_url()."\");
  } else {
    // We reached our target server, but it returned an error
alert(\"Все сломалось! Попробуйте перезагрузить страницу\");
  }
};
let data={
	mail:email.value,
	pass:password.value
};

let json = \"login=\"+JSON.stringify(data);

request.send(json);
}
  
   return false;
		}
</script>
";
    else $res="<span> Вы уже вошли в систему</span>";
    return $res;

}

function is_logged_in()
{
    global $wpdb;
    $sql = "SELECT * FROM `vdb_clients` WHERE id='".$_COOKIE["user_id"]."'";

    $posts = $wpdb->get_row($sql,ARRAY_A);
    return isset($_COOKIE["user_id"])&&strcmp($posts['code'],$_COOKIE["debug_code"]);
}
add_shortcode('main_page_content','get_main_page_content');

function get_main_page_content()
{
    $res=" <div class=\"intro_panel\">
                <div id=\"description\">
                    <span> Платформа, выполняющая роль информатора,контролера и мессенджера</span>
                </div>
                <div id=\"quote_block\">
                    <span id=\"quote\">
    \"Посвятить жизнь бизнесу, который строит мосты между людьми.\"
                    </span>
                    <span id=\"quote_author\">
                        ДЭНИЕЛ ЛЮБЕЦКИ,<br>ОСНОВАТЕЛЬ КОМПАНИИ KIND
                    </span>
                    <input type=\"button\" id=\"begin_work\" value=\"Начать работу\" onclick=\"start()\">
                    <script>
                        function start() {//TODO: сделать алгоритм перенаправления взависимости от роли
                          
                            if (".is_logged_in()." )
                            {
                                var results = document.cookie.match ( '(^|;) ?' + \"role\" + '=([^;]*)(;|$)' );
                                alert(results);
                            }
                            else
                            {
                                location.replace(\"". home_url()."/login\")
                            }
                        }
                    </script>       
                </div>
            </div>";
    return $res;
}

add_shortcode("own_orders","get_client_orders");
function get_client_orders()
{
    global $wpdb;
    $sql = "SELECT * FROM `vdb_orders_demo` where 'id'='" . $_COOKIE["user_id"] . "'";
    $posts = $wpdb->get_results($sql, ARRAY_N);

    $res = "
	<ul>";

    foreach ($posts as $posts_i) {

        $res = $res . "
                    <li>
                        <a href=\"/order/?order-id=" . $posts_i[0] . "\">" . $posts_i[4] . "</a>
                        <span>Стоимость до " . $posts_i[3] . "</span>
                       <a href=\"/order/?order-id= " . $posts_i[0] . "\">Подробнее</a>
                        </span>
                    </li>

				  ";
    }
}

add_shortcode("company_info","get_company_info");
function get_company_info()
{
    if(isset($_GET["id"]))
        return get_other_company_info($_GET["id "]);
    else return get_own_comany_info();
}
function get_other_company_info($id)
{
    global $wpdb;
    $sql = "SELECT `role` FROM `vdb_clients` WHERE `id`=".$_COOKIE["user_id"];
    $role=$wpdb->get_var($sql);
    $res="<div id='info'>";
    if($role=="individual")
    {
        $sql = "SELECT * FROM `vdb_individual` where 'id'=".$_COOKIE["user_id"];
        $info=$wpdb->get_row($sql,ARRAY_A);
        $res=$info;
    }elseif($role==NULL)
    {
        $res="<div id='info'>
<select onchange='get_info_form(this.value)' id='comp_type'>
<option value='1'>ИП</option>
<option value='2'>ООО</option>
<option value='3'>ОДО</option>
<option value='4'>ОАО</option>
<option value='5'>АО</option>
<option value='6'>ЗАО</option>
<option value='7'>Государственное или муниципальное унитарное предприятие</option>
</select>
<div id='data'>
</div>
<script>
function get_info_form(type){
    
    var request = new XMLHttpRequest();

request.open(\"POST\", \"".get_theme_file_uri("first-info.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function() {
  if (this.status >= 200 && this.status < 400) {
   alert(this.response);
	document.getElementById('data').innerHTML =this.response;
}else alert('fuck');}
alert(type);
request.send(type);

  
   
		}
}
</script>";
    }elseif
    ($role!=employee)
    {
        $sql = "SELECT * FROM `vdb_companies` WHERE`id`=".$_COOKIE["user_id"];
        $info=$wpdb->get_row($sql,ARRAY_A);
        $res=$info;
    }
    return $res;
}

function get_own_comany_info()
{

}
add_shortcode("lk_script","get_lk_script");
function get_lk_script()
{
  return  "<script>
	
function change(block)
{
	
		var request = new XMLHttpRequest();

request.open(\"POST\", \"". get_theme_file_uri("cabinet.php")."\", true);
request.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded; charset=UTF-8\");

request.onload = function () {
    if (this . status >= 200 && this . status < 400) {

        var
        resp = this.response;
            document.getElementById(\"personal-info\").innerHTML = resp;
	
  }
};
let data ={
    blockId:block
};

let json = \"login=\" + JSON . stringify(data);

request . send(json);
return false;
}

</script>";
}
add_shortcode("lk_change","get_lk_change");
function get_lk_change()
{return "<script>
	function openListening(listName){
	 var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName(\"tabcontent\");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = \"none\";
    }

    tablinks = document.getElementsByClassName(\"tablinks\");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(\" active\", \"\");
    }

    document.getElementById(listName).style.display = \"flex\";
    

	}
	</script>
	<script>
			function  send1(form_manufac,name_manufac , slogan,wsite ,
							 loc , birth ,FIO,country, INN , passport , pass_given , bankName , checkingAcc ,
							 correspoyndentAcc , BIK , address , email , phne ) {
			   var request = new XMLHttpRequest();

request.open(\"POST\", \"" . get_theme_file_uri("regfisical.php")."\", true);
request.setRequestHeader(\"Content - Type\", \"application / x - www - form - urlencoded; charset = UTF - 8\");

request.onload = function () {
if (this.status >= 200 && this . status < 400) {

var
resp = this.response;
if (resp == 1)
allert(\"Ваш паспорт уже зарегистрирован. Обратитесь в техподдержку.\");
else if (resp == 2)
document.getElementById(\"pone_ch\").innerHTML = \"Данный телефон занят.\";
else if (resp == 3)
document.getElementById(\"email_ch\").innerHTML = \"Данный e-mail занят.\";
}
};
let data ={
pName:form_manufac.value,
prodName:name_manufac.value,
tagline:slogan.value,
site:wsite.value,
city: loc.value,
FIO: FIO.value,
country: country.value,
birth: birth.value,
INN: birth.value
passport: passport.value,
pass_given: pass_given.value,
bankName: bankName.value,
correspoyndentAcc: correspoyndentAcc.value,
BIK: BIK.value,
address: address.value,
email: email.value,
phone: phne.value
};
let json = \"base = \" + JSON.stringify(data);

request.send(json);
}

return false;
}
function  send2(role,part,acur)
let data ={
role: role.value,
min_part: part.value,
acuracity: acur.value
};
let json = \"prod = \" + JSON.stringify(data);

request.send(json);
}

return false;
}
</script>";}
?>";
}
?>