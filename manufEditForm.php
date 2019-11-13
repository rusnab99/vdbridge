<?php
switch ($_POST['type'])
{
    case 0:?><form>
    <fieldset id="manufac-details2">
        <div>
            <input type="text" onclick="this.select()"  id="FIO" value="ФИО*" required>
            <input type="text" onclick="this.select()"  id="country" value="Гражданство*" required>
            <input type="date" id="birth" value="Дата рождения*" required>
            <input type="text" onclick="this.select()"  id="INN" value="ИНН*" required>
            <input type="text" onclick="this.select()"  id="passport" value="Серия и номер паспорта*" required>
            <input type="text" onclick="this.select()"  id="pass_given" value="Кем и когда выдан*" required>
        </div>
        <div>
            <input type="text" onclick="this.select()"  id="bankName" value="Наименование банка*" required>
            <input type="text" onclick="this.select()"  id="checkingAcc" value="Расчетный счет*" required>
            <input type="text" onclick="this.select()"  id="correspoyndentAcc" value="Корреспондентский счет*" required>
            <input type="text" onclick="this.select()"  id="BIK" value="БИК*" required>
            <input type="text" onclick="this.select()"  id="address" value="Адрес пребывания (жительства)*" required>
            <input type="email" id="email" value="E-mail*" required>
            <input type="text" onclick="this.select()"  id="phne" value="Телефон*" required>
            <button  class="add-butt" onclick='sendFisical1( birth ,FIO,country, INN , passport , pass_given , bankName , checkingAcc , correspoyndentAcc , BIK , address , email , phne );return false;'>Добавить</button>

        </div>
    </fieldset>
</form>
<form id="form3">
    <fieldset id="manufac-details4">
        <input type="text" onclick="this.select()"  id="role" value="Роль*" required>
        <input type="text" onclick="this.select()"  id="part" value="Минимальный объем партии" required>
        <input type="text" onclick="this.select()"  id="acur" value="Классы точности устройств" required>
    </fieldset>
</form>
<div class="input-group">
    <input type="checkbox"><label for="checkbox">Первый</label>
    <input type="checkbox"><label for="checkbox">Второй</label>
    <input type="checkbox"><label for="checkbox">Третий</label>
    <input type="checkbox"><label for="checkbox">Четвертый</label>
    <input type="checkbox"><label for="checkbox">Пятый</label>
    <input type="checkbox"><label for="checkbox">Шестой</label>
    <input type="checkbox"><label for="checkbox">Седьмой</label>
</div>
<button type="submit" class="add-butt" onclick='sendFisical2(role,part,acur)'>Загрузить</button>


</div><?php break;
    case 1:?><form>
    <fieldset id="manufac-details2">
        <div>
            <input type="text" id="fullName" value="Полное наименование организации*" required>
            <input type="text" id="shortName" value="Сокращенное наименование организации*" required>
            <input type="text" id="address" value="Юридический адрес*" required>
            <input type="text" id="INN" value="ИНН*" required>
            <input type="text" id="OGRN" value="ОГРНИП*" required>
            <input type="text" id="BIK" value="БИК*" required>
        </div>
        <div>
            <input type="text" id="bankName" value="Наименование банка*" required>
            <input type="text" id="checkingAcc" value="Расчетный счет*" required>
            <input type="text" id="correspoydent" value="Корреспондентский счет*" required>
            <input type="text" id="director" value="Генеральный деректор*" required>
            <input type="email" id="mail" value="E-mail*" required>
            <input type="text" id="phone" value="Телефон*" required>
        </div>
    </fieldset>
</form>
<form id="form3">
        <button onclick="sendIndividual1();return false;" class="add-butt">Добавить</button>
    </fieldset>
</form>
<form id="form3">
    <fieldset id="manufac-details4">
        <input type="text" id="role" value="Роль*" required>
        <input type="text" id="minPart" value="Минимальный объем партии" required>
        <input type="text" id="accuracity" value="Классы точности устройств" required>
    </fieldset>
</form>
<div class="input-group">
    <input type="checkbox"><label for="checkbox">Первый</label>
    <input type="checkbox"><label for="checkbox">Второй</label>
    <input type="checkbox"><label for="checkbox">Третий</label>
    <input type="checkbox"><label for="checkbox">Четвертый</label>
    <input type="checkbox"><label for="checkbox">Пятый</label>
    <input type="checkbox"><label for="checkbox">Шестой</label>
    <input type="checkbox"><label for="checkbox">Седьмой</label>
</div>
<form id="form3">
    <fieldset id="manufac-details4">
        <input type="text" id="spec" value="Специализация*" required>
        <input type="text" id="maxPart" value="Максимальный объем партии" >
        <button  class="add-butt">Загрузить</button>
    </fieldset>
</form><?php break;
    case 2:?><form>
						<fieldset id="manufac-details2">
							<div>
							<input type="text" id="fullName" value="Полное наименование организации*" required>
							<input type="text" id="urAddress" value="Юридический адрес*" required>
							<input type="text" id="postAddress" value="Почтовый адрес*" required>
							<input type="text" id="INN" value="ИНН*" required>
							<input type="text" id="KPP" value="КПП*" required>
							<input type="text" id="BIK" value="БИК*" required>
							<input type="text" id="bankName" value="Наименование банка*" required>
							<input type="text" id="checkingAcc" value="Расчетный счет*" required>
						</div>
						<div>
							<input type="text" id="correspoydent" value="Корреспондентский счет*" required>
							<input type="text" id="OKPO" value="ОКПО*" required>
							<input type="text" id="OKATO" value="ОКАТО*" required>
							<input type="text" id="OKVED" value="ОКВЭД (основной)*" required>
							<input type="text" id="OGRN" value="ОГРН*" required>
							<input type="text" id="director" value="Генеральный деректор*" required>
							<input type="email" id="mail" value="E-mail*" required>
							<input type="text" id="phone" value="Телефон*" required>
						</div>
						</fieldset>
					</form>
					<form id="form3">
						<fieldset id="manufac-details3">

							<button onclick="sendUr1();return false" class="add-butt">Добавить</button>
						</fieldset>
					</form>
					<form id="form3">
						<fieldset id="manufac-details4">
							<input type="text" id="role" value="Роль*" required>
							<input type="text" id="minPart" value="Минимальный объем партии" required>
							<input type="text" id="accuracity" value="Классы точности устройств" required>
						</fieldset>
					</form>
					<div class="input-group">
						<input type="checkbox"><label for="checkbox">Первый</label>
						<input type="checkbox"><label for="checkbox">Второй</label>
						<input type="checkbox"><label for="checkbox">Третий</label>
						<input type="checkbox"><label for="checkbox">Четвертый</label>
						<input type="checkbox"><label for="checkbox">Пятый</label>
						<input type="checkbox"><label for="checkbox">Шестой</label>
						<input type="checkbox"><label for="checkbox">Седьмой</label>
					</div>
					<form id="form3">
						<fieldset id="manufac-details4">
							<input type="text" id="" value="Специализация*" required>
							<input type="text" id="" value="Максимальный объем партии" >
							<button type="submit" class="add-butt">Загрузить</button>
						</fieldset>
					</form><?php break;
}