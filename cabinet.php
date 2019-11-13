<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
global $wpdb;
$data=json_decode(str_replace("\\\"","\"",$_POST["login"]),true);
 $res="Coming soon...";
if($data["blockId"]==1)$res="<div class=\"tab\">
			<span><a class=\"tablinks\" onclick=\"openListening('profile')\">Профиль</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening( 'structure')\">Структура</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening( 'other')\">Как видят другие</a></span>
		</div>

		<div class=\"white-list\">
			<div id=\"other\" class=\"tabcontent\">
			</div>

			<div id=\"structure\" class=\"tabcontent\">
			</div>

			
			<div id=\"profile\" class=\"tabcontent\">
					<form>
						<fieldset id=\"manufac-details\">
							<select style=\"
    width: 35vw;
    height: 3.5vh;
    background: #FFFFFF;
    border: 0.2vw solid rgba(52, 169, 161, 0.73);
    box-sizing: border-box;
    border-radius: 2vh;
    margin-bottom: 2vh;
    font-style: normal;
    font-weight: 500;
    font-size: 1.8vh;
    line-height: 2.6vh;
    color: #34A9A1;
    /* padding: 1vh 1vw; */
    margin-right: 2vw;
\"  id=\"form-manufac\" value=\"Форма предприятия*\" required>
							
							
							<option >Физическое лицо</option>
							<option >Индивидуальный предпринематель</option>
							<option>Юридическое лицо (организация)</option>
							<option disabled selected>Форма предприятия*</option>
							</select>
							<input type=\"text\" id=\"name-manufac\" value=\"Название предприятия*\" required>
							<input type=\"text\" id=\"slogan\" value=\"Слоган*\" required>
							<input type=\"text\" id=\"wsite\" value=\"Сайт*\" required>
							<input type=\"text\" id=\"location\" value=\"Страна, город, область*\" required>
							
							<button onclick='sendManuf1();sendManuf2();return false;'>Сохранить</button>
							
						</fieldset>
					</form>
					<div id='profile_dynamic'/>
";else
if($data["blockId"]==0){
    $sql = "SELECT * FROM `vdb_fisical` WHERE userId='".$_COOKIE["user_id"] ."'";

    $posts = $wpdb->get_row($sql,ARRAY_A,0);
    $res = "<div class=\"tab\">
	
			<span><a class=\"tablinks\" onclick=\"openListening( 'profile');\">Профиль</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening( 'edit');\">Редактирование</a></span>
		</div>

		<div class=\"white-list\">
			

			<div id=\"edit\" class=\"tabcontent\">
			<script>
			$(\"input\").focus(function(){
   alert(\"done\");
        this.select();
    
});</script>
					<form>
						<fieldset id=\"manufac-details\">
							<input type=\"text\" onclick=\"this.select()\"  id=\"form_manufac\" value=\"Физическое лицо\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"name_manufac\" value=\"Название предприятия*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"slogan\" value=\"Слоган*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"wsite\" value=\"Сайт*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"loc\" value=\"Страна, город, область*\" required>
						</fieldset>
					</form>
					<form>
						<fieldset id=\"manufac-details2\">
							<div>
							<input type=\"text\" onclick=\"this.select()\"  id=\"FIO\" value=\"ФИО*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"country\" value=\"Гражданство*\" required>
							<input type=\"date\" id=\"birth\" value=\"Дата рождения*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"INN\" value=\"ИНН*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"passport\" value=\"Серия и номер паспорта*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"pass_given\" value=\"Кем и когда выдан*\" required>
						</div>
						<div>
							<input type=\"text\" onclick=\"this.select()\"  id=\"bankName\" value=\"Наименование банка*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"checkingAcc\" value=\"Расчетный счет*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"correspoyndentAcc\" value=\"Корреспондентский счет*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"BIK\" value=\"БИК*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"address\" value=\"Адрес пребывания (жительства)*\" required>
							<input type=\"email\" id=\"email\" value=\"E-mail*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"phne\" value=\"Телефон*\" required>
							<button  class=\"add-butt\" onclick='send1(form_manufac,name_manufac , slogan,wsite , loc , birth ,FIO,country, INN , passport , pass_given , bankName , checkingAcc , correspoyndentAcc , BIK , address , email , phne );return false;'>Добавить</button>
							 
						</div>
						</fieldset>
					</form>
					<form id=\"form3\">
						<fieldset id=\"manufac-details4\">
							<input type=\"text\" onclick=\"this.select()\"  id=\"role\" value=\"Роль*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"part\" value=\"Минимальный объем партии\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"acur\" value=\"Классы точности устройств\" required>
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
		<button type=\"submit\" class=\"add-butt\" onclick='send2(role,part,acur)'>Загрузить</button>			
					
					
			</div>



			<div id=\"profile\" style=\"display: flex;\" class=\"tabcontent\">
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
							<label>Наименование банка: ".$posts["bankName"]."</label>
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
			<span><a href=\"#\" class=\"tablinks\" onclick=\"openListening( 'tape')\">Лента заказов</a></span>
    <span><a href = \"#\" class=\"tablinks\" onclick = \"openListening( 'ordered')\" > Заказал</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening( 'do')\" > Выполняю</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening( 'archive')\" > Архив</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening( 'make-ord')\" > Создание</a ></span >
			<span ><a href = \"#\" class=\"tablinks\" onclick = \"openListening( 'order-tab')\" > Заказ</a ></span >
		</div >

		<div class=\"white-list\" >";
    $posts = $wpdb->get_row($sql,ARRAY_A);
						if($posts!=null)foreach ($posts as $post){

    $res=$res."		
			<div id=\"tape\" class=\"tabcontent\">
				
				
				<hr class=\"hr1\">

				<div class=\"order1\"><div class=\"name-order\">
					<div class=\"order-left\">
						<h2>".$post["name"]."</h2>
						<div class=\"text-order\"> ".$post["description"]."</div>
						<div class=\"attach\">
							<span>Вложение:</span>
							<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
							<span>Вложение_1</span>
							<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
							<span>Вложение_2</span>
							<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
							<span>Вложение_3</span>
							<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
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
     $posts = $wpdb->get_results($sql,ARRAY_A);
						
						if($posts!=null)foreach ($posts as $post){
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
			
	$res=$res."	<div id=\"make-ord\" class=\"tabcontent\">
				<div class=\"edit-po\">
					<form>
						<fieldset id=\"manufac-details2\">
							<input type=\"text\" onclick=\"this.select()\"  id=\"name\" value=\"Название заказа*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"date1\" value=\"Крайний срок подачи заявок*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"date2\" value=\"Крайний срок выбора исполнителя*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"date3\" value=\"Крайний срок выполнения заказа*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"date4\" value=\"Крайний срок передачи заказа*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"quan\" value=\"Количество экземпляров*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"def\" value=\"Допустимый процент брака*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"accur\" value=\"Классы точности*\" required>
							<input type=\"text\" onclick=\"this.select()\"  id=\"tpe\" value=\"Тип печатной платы*\" required>
						</fieldset>
					</form>
					<form>
						
						<div class=\"texta-ord1\">
							<textarea id='desc' placeholder=\"Подробное описание заказа*\"></textarea>
						</div>
						<fieldset id=\"manufac-details2\">
							<input type=\"text\" onclick=\"this.select()\"  id=\"mthd\" value=\"Метод изготовления печатной платы*\" required>
							<input type=\"checkbox\" id=\"material\" value=\"Наличие давальческого сырья*\" required>
						
						
						</fieldset>
					</form>
				</div>

				<div class=\"attach1\">
					<span>Вложение:</span>
					<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">					
					<span>Схема</span>
					<input type='file' id='file1'/>
					<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
					<span>Документация</span><input type='file' id='file2'/>
					<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
					<span>Требования</span><input type='file' id='file3'/>
					<img src=\"http://vdbridge.ru/wp-content/uploads/2019/10/Attachment_on_green.png\">
					<span>BOM-лист</span><input type='file' id='file4'/>
					<button onclick=\"sendOrder()\" class=\"add-butt\">Сохранить</button>
				</div>
			</div>

	

			
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