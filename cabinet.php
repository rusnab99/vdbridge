<?php
$data=json_decode(str_replace("\\\"","\"",$_POST["login"]),true);
$res="";
if($data["blockId"]==0)$res="";else
if($data["blockId"]==1) {
    $sql = "SELECT * FROM `vdb_fisicals` WHERE id='".$_COOKIE["user_id"] ."'";

    $posts = $wpdb->get_row($sql,ARRAY_A);
    $res = "<div class=\"tab\">
			<span><a class=\"tablinks\" onclick=\"openListening(event, 'profile')\">Профиль</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening(event, 'structure')\">Структура</a></span>
			<span><a class=\"tablinks\" onclick=\"openListening(event, 'other')\">Как видят другие</a></span>
		</div>

		<div class=\"white-list\">
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
";
}else
if($data["blockId"]==2)$res="";else
if($data["blockId"]==3)$res="";else
if($data["blockId"]==4)$res="";else
if($data["blockId"]==5)$res="";else
if($data["blockId"]==6)$res="";else
if($data["blockId"]==7)$res="";else
if($data["blockId"]==8)$res="";else
if($data["blockId"]==9)$res="";else
if($data["blockId"]==10)$res="";else
if($data["blockId"]==11)$res="";else
if($data["blockId"]==12)$res="";else
if($data["blockId"]==13)$res="";else
if($data["blockId"]==14)$res="";else
if($data["blockId"]==15)$res="";else
echo $res;