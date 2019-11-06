<?php
global $wpdb
$data=json_decode(str_replace("\\\"","\"",$_POST["login"]),true);
 $res="Coming soon...";
if($data["blockId"]==0)$res="Coming soon...";else
if($data["blockId"]==1) {
    $sql = "SELECT * FROM `vdb_fisicals` WHERE id='".$_COOKIE["user_id"] ."'";

    $posts = $wpdb->get_row($sql,ARRAY_A);
    $res = "<div class=\"tab\">
			<span><a class=\"tablinks\" onclick=\"openListening(event, 'profile')\">Профиль</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening(event, 'structure')\">Структура</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening(event, 'other')\">Как видят другие</a></span>
		</div>

		<div id='infoPanel' class=\"white-list\">
			<div id=\"profile\" class=\"tabcontent\">
			</div>

			<div id=\"structure\" class=\"tabcontent\">
			</div>

			<div id=\"other\" class=\"tabcontent\">
					<form>
						<fieldset id=\"manufac-details\">
							<input type=\"text\" id=\"form-manufac\" value=\"Физическое лицо\" required>
							<input type=\"text\" id=\"name-manufac\" value=\"Название предприятия*\" required>
							<input type=\"text\" id=\"slogan\" value=\"Слоган*\" required>
							<input type=\"text\" id=\"wsite\" value=\"Сайт*\" required>
							<input type=\"text\" id=\"location\" value=\"Страна, город, область*\" required>
							<div id=\"load-photo\">
								<span id=\"photo\"></span>
								<button type=\"submit\">Загрузить</button>
							</div>
						</fieldset>
					</form>
					<form>
						<fieldset id=\"manufac-details2\">
							<div>
							<input type=\"text\" id=\"form-manufac\" value=\"ФИО*\" required>
							<input type=\"text\" id=\"name-manufac\" value=\"Гражданство*\" required>
							<input type=\"date\" id=\"\" value=\"Дата рождения*\" required>
							<input type=\"text\" id=\"\" value=\"ИНН*\" required>
							<input type=\"text\" id=\"\" value=\"Серия и номер паспорта*\" required>
							<input type=\"text\" id=\"\" value=\"Кем и когда выдан*\" required>
						</div>
						<div>
							<input type=\"text\" id=\"\" value=\"Наименование банка*\" required>
							<input type=\"text\" id=\"\" value=\"Расчетный счет*\" required>
							<input type=\"text\" id=\"\" value=\"Корреспондентский счет*\" required>
							<input type=\"text\" id=\"\" value=\"БИК*\" required>
							<input type=\"text\" id=\"\" value=\"Адрес пребывания (жительства)*\" required>
							<input type=\"email\" id=\"\" value=\"E-mail*\" required>
							<input type=\"text\" id=\"\" value=\"Телефон*\" required>
						</div>
						</fieldset>
					
						<fieldset id=\"manufac-details3\">
							<input type=\"text\" id=\"\" value=\"ФИО сотрудника\">
							<input type=\"text\" id=\"\" value=\"Должность\">
							<input type=\"text\" id=\"\" value=\"Телефон\">
							<input type=\"email\" id=\"\" value=\"E-mail\">
							<button type=\"submit\" class=\"add-butt\">Добавить</button>
						</fieldset>
					</form>
					<form id=\"form3\">
						<fieldset id=\"manufac-details4\">
							<input type=\"text\" id=\"role\" value=\"Роль*\" required>
							<input type=\"text\" id=\"part\" value=\"Минимальный объем партии\" required>
							<input type=\"text\" id=\"acur\" value=\"Классы точности устройств\" required>
						</fieldset>
					</form>
					<div class=\"input-group\">
						<input type=\"checkbox\"><label for=\"checkbox\">Первый</label>
						<input type=\"checkbox\"><label for=\"checkbox\">Второй</label>
						<input type=\"checkbox\"><label for=\"checkbox\">Третий</label>
						<input type=\"checkbox\"><label for=\"checkbox\">Четвертый</label>
						<input type=\"checkbox\"><label for=\"checkbox\">Пятый</label>
						<input type=\"checkbox\"><label for=\"checkbox\">Шестой</label>
						<input type=\"checkbox\"><label for=\"checkbox\">Седьмой</label>
					</div>
			</div>
				
		</div>
<div class=\"white-list\">
			<div id=\"profile\" class=\"tabcontent\">
			</div>

			<div id=\"structure\" class=\"tabcontent\">
			</div>

			<div id=\"other\" class=\"tabcontent\">
				<div class=\"profile-manufac\">
					<span class=\"label-group\">
						<label name=\"manufac\">".$posts["pName"]."</label>
						<label>".$posts["city"]."</label>
						
						<label><a href='".$posts["site"]."'>".$posts["site"]."</a> </label>
					</span>

					
				</div>
				<div class=\"menu-prof\">
					<h3>Реквизиты</h3>
					<hr>
					<span class=\"label-group2\">
						<span class=\"label-group2-mini\">
							<label>ФИО: ".$posts["FIO"]."</label>
							<label>Гражданство:".$posts["country"]."</label>
							<label>Дата рождения:".$posts["birth"]."</label>
							<label>ИНН: ".$posts["INN"]."</label>
							<label>Серия и номер паспорта: ".$posts["passport"]."</label>
							<label>Выдан: ".$posts["pass_given"]."</label>
						</span>
					
						<span class=\"label-group2-mini\">
							<label>Наименование банка: ".$posts["bankName"]."label>
							<label>Расчетный счёт: ".$posts["checkingAcc "]."</label>
							<label>Корреспондентский счёт: ".$posts["correspoyndentAcc "]."</label>
							<label>БИК: ".$posts["BIK"]."</label>
							<label>Адрес пребывания: ".$posts["address"]."</label>
							<label>Электронная почта: ".$posts["email"]."</label>
							<label>Телефон: ".$posts["phone"]."</label>
						</span>
					</span>
				</div>
				<div class=\"menu-prof\">
					
				</div>
				<div class=\"menu-prof\">
					<h3>Деятельность</h3>
					<hr>
					<span class=\"label-group2\">
						<span class=\"label-group2-mini\">
							<label>Роль: ".$posts["role"]."</label>
							
						</span>

						<span class=\"label-group2-mini\">
							<label>Минимальный объем партии:".$posts["min_part"]."</label>
							
						</span>

						<span class=\"label-group2-mini\">
							<label>Классы точности устройства:".$posts["acuracity"]."</label>
							
						</span>
					</span>
						
				</div>
				<div class=\"menu-prof\">
					
				</div>
			</div>
";
}else
if($data["blockId"]==2) $res="Coming soon...";else
if($data["blockId"]==3) $res="Coming soon...";else
if($data["blockId"]==4) $res="Coming soon...";else
if($data["blockId"]==5) $res="Coming soon...";else
if($data["blockId"]==6){  $sql = "SELECT * FROM `vdb_orders` WHERE prodID!='".$_COOKIE["user_id"] ."'& executorID =null";
$res="<div class=\"tab\">
			<span><a href=\"#\" class=\"tablinks\" onclick=\"openListening(event, 'tape')\">Лента заказов</a></span>
    < span><a href = \"#\" class=\"tablinks\" onclick = \"openListening(event, 'ordered')\" > Заказал</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening(event, 'do')\" > Выполняю</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening(event, 'archive')\" > Архив</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening(event, 'make-ord')\" > Создание</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening(event, 'order-tab')\" > Заказ</a ></span >
		</div >

		<div class=\"white-list\" >";
    $posts = $wpdb->get_row($sql,ARRAY_A);foreach ($posts as $post){

    $res=$res."		
			<div id=\"tape\" class=\"tabcontent\">
				
				
				<hr class=\"hr1\">

				<div class=\"order1\"><div class=\"name-order\">
					<div class=\"order-left\">
						<h2>".$post["name"]."</h2>
						<div class=\"text-order\"> ".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_4</span>
						</div>

						<div class=\"quantity\">
							<span>Количество экземпляров:<label>".$post["quantity"]."</label></span>
							<div class=\"more1\"><div class=\"more-ord\">
								<span>Подробнее</span>
								<img src=\"img/Strelochka.png\">
							</div></div>
						</div>
						<div class=\"comment-block\"><textarea></textarea></div>
					</div>

					<div class=\"order-right\">
						<div>
							<span>Срок подачи заявок</span>
							<label>".$post["date1"]."</label>
						</div>
						<div>
							<span>Срок выбора заявки</span>
							<label>".$post["date2"]."</label>
						</div>
						<div>
							<span>Срок выполнения</span>
							<label>".$post["date3"]."</label>
						</div>
						<div>
							<span>Срок передачи</span>
							<label>".$post["date4"]."</label>
						</div>
						<button class=\"butt-on-order\">Оставить заявку</button>
					</div>
				</div></div>
<!--СКРЫТЙЫ БЛОК \"ПОДРОБНЕЕ\"-->
				<div class=\"open-more1\">
					<div class=\"name-order\">
					<div class=\"order-left\">
						<h2>Название заказа</h2>
						<div class=\"text-order\">".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_4</span>
						</div>

						<div class=\"quantity-more\">
							<div class=\"quantity-more-l\">
								<span>Количество экземпляров:<label>".$post["quantity"]." штук</label></span>
								<span>Тип печатной оплаты:<label>".$post["type"]."</label></span>
								<span>Метод изготовления:<label>".$post["method"]."</label></span>
							</div>

							<div class=\"quantity-more-r\">
								<span>Допустимый процент брака:<label>".$post["defect"]."%</label></span>
								<span>Класс точности:<label>".$post["accuracity"]."</label></span>
								<span>Давальческое сырье:<label>".$post["material"]."</label></span>
							</div>
						</div>
						<div class=\"comment-block\"><span class=\"dop-instr\">Дополнительные сведения:</span>
						<textarea></textarea>
						
						<span class=\"dop-instr\">Заявка:</span>
						<textarea></textarea></div>
					</div>

					<div class=\"order-right\">
						<div>
							<span>Срок подачи заявок</span>
							<label>".$post["date1"]."</label>
						</div>
						<div>
							<span>Срок выбора заявки</span>
							<label>".$post["date2"]."</label>
						</div>
						<div>
							<span>Срок выполнения</span>
							<label>".$post["date3"]."</label>
						</div>
						<div>
							<span>Срок передачи</span>
							<label>".$post["date4"]."</label>
						</div>
						<div class=\"order-buttons\">
							<button class=\"butt-on-order\">Отправить</button>
							<button class=\"butt-on-order\">Оставить заявку</button>
						</div>
					</div>
				</div>
				</div>
<!--КОНЕЦ БЛОКА-->
				
			</div>
";}
$sql = "SELECT * FROM `vdb_orders` WHERE prodID='".$_COOKIE["user_id"] ."'";
     $posts = $wpdb->get_row($sql,ARRAY_A);foreach ($posts as $post){
        $res=$res."		
			<div id=\"ordered\" class=\"tabcontent\">
				
				
				<hr class=\"hr1\">

				<div class=\"order1\"><div class=\"name-order\">
					<div class=\"order-left\">
						<h2>".$post["name"]."</h2>
						<div class=\"text-order\"> ".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_4</span>
						</div>

						<div class=\"quantity\">
							<span>Количество экземпляров:<label>".$post["quantity"]."</label></span>
							<div class=\"more1\"><div class=\"more-ord\">
								<span>Подробнее</span>
								<img src=\"img/Strelochka.png\">
							</div></div>
						</div>
						<div class=\"comment-block\"><textarea></textarea></div>
					</div>

					<div class=\"order-right\">
						<div>
							<span>Срок подачи заявок</span>
							<label>".$post["date1"]."</label>
						</div>
						<div>
							<span>Срок выбора заявки</span>
							<label>".$post["date2"]."</label>
						</div>
						<div>
							<span>Срок выполнения</span>
							<label>".$post["date3"]."</label>
						</div>
						<div>
							<span>Срок передачи</span>
							<label>".$post["date4"]."</label>
						</div>
						<button class=\"butt-on-order\">Оставить заявку</button>
					</div>
				</div></div>
<!--СКРЫТЙЫ БЛОК \"ПОДРОБНЕЕ\"-->
				<div class=\"open-more1\">
					<div class=\"name-order\">
					<div class=\"order-left\">
						<h2>Название заказа</h2>
						<div class=\"text-order\">".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_4</span>
						</div>

						<div class=\"quantity-more\">
							<div class=\"quantity-more-l\">
								<span>Количество экземпляров:<label>".$post["quantity"]." штук</label></span>
								<span>Тип печатной оплаты:<label>".$post["type"]."</label></span>
								<span>Метод изготовления:<label>".$post["method"]."</label></span>
							</div>

							<div class=\"quantity-more-r\">
								<span>Допустимый процент брака:<label>".$post["defect"]."%</label></span>
								<span>Класс точности:<label>".$post["accuracity"]."</label></span>
								<span>Давальческое сырье:<label>".$post["material"]."</label></span>
							</div>
						</div>
						<div class=\"comment-block\"><span class=\"dop-instr\">Дополнительные сведения:</span>
						<textarea></textarea>
						
						<span class=\"dop-instr\">Заявка:</span>
						<textarea></textarea></div>
					</div>

					<div class=\"order-right\">
						<div>
							<span>Срок подачи заявок</span>
							<label>".$post["date1"]."</label>
						</div>
						<div>
							<span>Срок выбора заявки</span>
							<label>".$post["date2"]."</label>
						</div>
						<div>
							<span>Срок выполнения</span>
							<label>".$post["date3"]."</label>
						</div>
						<div>
							<span>Срок передачи</span>
							<label>".$post["date4"]."</label>
						</div>
						<div class=\"order-buttons\">
							<button class=\"butt-on-order\">Отправить</button>
							<button class=\"butt-on-order\">Оставить заявку</button>
						</div>
					</div>
				</div>
				</div>
<!--КОНЕЦ БЛОКА-->
				
			</div>
";}

			$res=$res."		
			<div id=\"do\" class=\"tabcontent\">
				
				
				<hr class=\"hr1\">

				<div class=\"order1\"><div class=\"name-order\">
					<div class=\"order-left\">
						<h2>".$post["name"]."</h2>
						<div class=\"text-order\"> ".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_4</span>
						</div>

						<div class=\"quantity\">
							<span>Количество экземпляров:<label>".$post["quantity"]."</label></span>
							<div class=\"more1\"><div class=\"more-ord\">
								<span>Подробнее</span>
								<img src=\"img/Strelochka.png\">
							</div></div>
						</div>
						<div class=\"comment-block\"><textarea></textarea></div>
					</div>

					<div class=\"order-right\">
						<div>
							<span>Срок подачи заявок</span>
							<label>".$post["date1"]."</label>
						</div>
						<div>
							<span>Срок выбора заявки</span>
							<label>".$post["date2"]."</label>
						</div>
						<div>
							<span>Срок выполнения</span>
							<label>".$post["date3"]."</label>
						</div>
						<div>
							<span>Срок передачи</span>
							<label>".$post["date4"]."</label>
						</div>
						<button class=\"butt-on-order\">Оставить заявку</button>
					</div>
				</div></div>
<!--СКРЫТЙЫ БЛОК \"ПОДРОБНЕЕ\"-->
				<div class=\"open-more1\">
					<div class=\"name-order\">
					<div class=\"order-left\">
						<h2>Название заказа</h2>
						<div class=\"text-order\">".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"img/Attachment_on_green.png\">
							<span>Вложение_4</span>
						</div>

						<div class=\"quantity-more\">
							<div class=\"quantity-more-l\">
								<span>Количество экземпляров:<label>".$post["quantity"]." штук</label></span>
								<span>Тип печатной оплаты:<label>".$post["type"]."</label></span>
								<span>Метод изготовления:<label>".$post["method"]."</label></span>
							</div>

							<div class=\"quantity-more-r\">
								<span>Допустимый процент брака:<label>".$post["defect"]."%</label></span>
								<span>Класс точности:<label>".$post["accuracity"]."</label></span>
								<span>Давальческое сырье:<label>".$post["material"]."</label></span>
							</div>
						</div>
						<div class=\"comment-block\"><span class=\"dop-instr\">Дополнительные сведения:</span>
						<textarea></textarea>
						
						<span class=\"dop-instr\">Заявка:</span>
						<textarea></textarea></div>
					</div>

					<div class=\"order-right\">
						<div>
							<span>Срок подачи заявок</span>
							<label>".$post["date1"]."</label>
						</div>
						<div>
							<span>Срок выбора заявки</span>
							<label>".$post["date2"]."</label>
						</div>
						<div>
							<span>Срок выполнения</span>
							<label>".$post["date3"]."</label>
						</div>
						<div>
							<span>Срок передачи</span>
							<label>".$post["date4"]."</label>
						</div>
						<div class=\"order-buttons\">
							<button class=\"butt-on-order\">Отправить</button>
							<button class=\"butt-on-order\">Оставить заявку</button>
						</div>
					</div>
				</div>
				</div>
<!--КОНЕЦ БЛОКА-->
				
			</div>
";
			
			"	<div id=\"make-ord\" class=\"tabcontent\">
				<div class=\"edit-po\">
					<form>
						<fieldset id=\"manufac-details2\">
							<input type=\"text\" id=\"name\" value=\"Название заказа*\" required>
							<input type=\"text\" id=\"date1\" value=\"Крайний срок подачи заявок*\" required>
							<input type=\"text\" id=\"date2\" value=\"Крайний срок выбора исполнителя*\" required>
							<input type=\"text\" id=\"date3\" value=\"Крайний срок выполнения заказа*\" required>
							<input type=\"text\" id=\"date4\" value=\"Крайний срок передачи заказа*\" required>
							<input type=\"text\" id=\"quan\" value=\"Количество экземпляров*\" required>
							<input type=\"text\" id=\"def\" value=\"Допустимый процент брака*\" required>
							<input type=\"text\" id=\"accur\" value=\"Классы точности*\" required>
							<input type=\"text\" id=\"tpe\" value=\"Тип печатной платы*\" required>
						</fieldset>
					</form>
					<form>
						
						<div class=\"texta-ord1\">
							<textarea id='desc' placeholder=\"Подробное описание заказа*\"></textarea>
						</div>
						<fieldset id=\"manufac-details2\">
							<input type=\"text\" id=\"mthd\" value=\"Метод изготовления печатной платы*\" required>
							<input type=\"checkbox\" id=\"material\" value=\"Наличие давальческого сырья*\" required>
						
						
						</fieldset>
					</form>
				</div>

				<div class=\"attach1\">
					<span>Вложение:</span>
					<img src=\"img/Attachment_on_green.png\">					
					<span>Схема</span>
					<input type='file' id='file1'/>
					<img src=\"img/Attachment_on_green.png\">
					<span>Документация</span><input type='file' id='file2'/>
					<img src=\"img/Attachment_on_green.png\">
					<span>Требования</span><input type='file' id='file3'/>
					<img src=\"img/Attachment_on_green.png\">
					<span>BOM-лист</span><input type='file' id='file4'/>
					<button class=\"add-butt\">Сохранить</button>
				</div>
			</div>
</<script >function sendOrder()
{
   
    var formData = new FormData();
    formData.append(\"myFile\", document.getElementById(\"date1\").files[0], document.getElementById(\"date1\").files[0].name);
    formData.append(\"myFile\", document.getElementById(\"date2\").files[0], document.getElementById(\"date2\").files[0].name);
    formData.append(\"myFile\", document.getElementById(\"date3\").files[0], document.getElementById(\"date3\").files[0].name);
    formData.append(\"myFile\", document.getElementById(\"date4\").files[0], document.getElementById(\"date4\").files[0].name);
    
    var xhr = new XMLHttpRequest();
    xhr.open(\"POST\",  ".get_theme_file_uri("orderFile.php").");
    xhr.send(formData);
    xhr.onload=function() {
        var request = new XMLHttpRequest();

request.open(\"POST\", " . get_theme_file_uri("set_order.php").", true);
request . setRequestHeader(\"Content - Type\", \"application / x - www - form - urlencoded; charset = UTF - 8\");
var files=this.response;
request . onload = function () {
    if (this . status >= 200 && this . status < 400) {

        var
        resp = this . response;
        if (resp == 1)
            document . getElementById(\"email_ch\").innerHTML = \"Данный E - mail адрес не найден\";
	else if (resp == 2)
            document . getElementById(\"pass_ch\").innerHTML = \"Введен неверный пароль\";
	else if (resp == 0) location . replace(\" . get_site_url() . \");
  } else {
        // We reached our target server, but it returned an error
        alert(\"Все сломалось!Попробуйте перезагрузить страницу\");
  }
};
let data ={
    name:document.getElementById(\"name\").value,
    description:document.getElementById(\"desc\").value,
    quantity:document.getElementById(\"quan\").value,
    type:document.getElementById(\"tpe\").value,
    method:document.getElementById(\"mthd\").value,
    defect:document.getElementById(\"def\").value,
    accuracity:document.getElementById(\"accur\").value,
    material:document.getElementById(\"material\").value,
    date1:document.getElementById(\"date1\").value,
    date2:document.getElementById(\"date2\").value,
    date3:document.getElementById(\"date3\").value,
    date4:document.getElementById(\"date4\").value,
    file1:files[0],
    file2:files[1],
    file3:files[2],
    file4:files[3]
};

let json = \"order = \" + JSON . stringify(data);

request . send(json);
}

return false;
}
      
    }
}</script>
	

			
			</div>
		</div>

	";}else
if($data["blockId"]==7) $res="Coming soon...";else
if($data["blockId"]==8) $res="Coming soon...";else
if($data["blockId"]==9) $res="Coming soon...";else
if($data["blockId"]==10) $res="Coming soon...";else
if($data["blockId"]==11) $res="Coming soon...";else
if($data["blockId"]==12) $res="Coming soon...";else
if($data["blockId"]==13) $res="Coming soon...";else
if($data["blockId"]==14) $res="Coming soon...";else
if($data["blockId"]==15) $res="Coming soon...";
echo $res;