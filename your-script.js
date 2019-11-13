function  sendManuf1() {
    var request = new XMLHttpRequest();

    request.open("POST", "https://vdbridge.ru/wp-content/themes/vdbridge/manufEditForm.php", true);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

    request.onload = function () {
        if (this.status >= 200 && this.status < 400) {
document.getElementById("profile_dynamic").innerHTML=this.response;
        } else {
            // We reached our target server, but it returned an error
            alert("Все сломалось! Попробуйте перезагрузить страницу");
        }
    };

if(document.getElementById('form-manufac').selectedIndex==3){
    alert("Выберите форму предприятия");return false;
}
    let json = "type=" + document.getElementById('form-manufac').selectedIndex;

    request .send(json);
    return false;
}


function sendManuf2() {
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "https://vdbridge.ru/wp-content/themes/vdbridge/manufEdit.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

    xhr.onload = function () {
        if (this.status >= 200 && this.status < 400) {

        } else {
            // We reached our target server, but it returned an error
            alert("Все сломалось! Попробуйте перезагрузить страницу");
        }
    };
    let data ={
        manufType:
        document.getElementById( 'form-manufac').selectedIndex,
        name: document.getElementById( 'name-manufac').value,
        tagline: document.getElementById( 'slogan').value,
        site: document.getElementById( 'wsite').value,
        city: document.getElementById( 'location').value,
    };

    let json = "manuf1=" + JSON.stringify(data);

    xhr.send(json);

}

function sendFisical1( birth ,FIO,country, INN , passport , pass_given , bankName , checkingAcc , correspoyndentAcc , BIK , address , email , phne ) {
    var request = new XMLHttpRequest();

    request.open("POST", "https://vdbridge.ru/wp-content/themes/vdbridge/regfisical.php", true);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.onload = function () {
        if (this.status >= 200 && this . status < 400) {

            var
                resp = this.response;
            if (resp == 1)
                allert("Ваш паспорт уже зарегистрирован. Обратитесь в техподдержку.");
        else if (resp == 2)
                document.getElementById("pone_ch").innerHTML = "Данный телефон занят.";
        else if (resp == 3)
                document.getElementById("email_ch").innerHTML = "Данный e-mail занят.";
        }
    };
    let data ={
        FIO: FIO.value,
        country: country.value,
        birth: birth.value,
        INN: INN.value,
        passport: passport.value,
        pass_given: pass_given.value,
        bankName: bankName.value,
        correspoyndentAcc: correspoyndentAcc.value,
        BIK: BIK.value,
        address: address.value,
        email: email.value,
        phone: phne.value
};
    let json =  JSON.stringify(data);

    request.send(json);
    return false;
}

function sendIndividual1() {
    var request = new XMLHttpRequest();

    request.open("POST", "https://vdbridge.ru/wp-content/themes/vdbridge/regindividual.php", true);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.onload = function () {
        if (this.status >= 200 && this . status < 400) {

            var
                resp = this.response;
            if (resp == 1)
                allert("Ваш паспорт уже зарегистрирован. Обратитесь в техподдержку.");
            else if (resp == 2)
                document.getElementById("pone_ch").innerHTML = "Данный телефон занят.";
            else if (resp == 3)
                document.getElementById("email_ch").innerHTML = "Данный e-mail занят.";
        }
    };
    let data ={
      fullName:document.getElementById('fullName').value,
      shortName:document.getElementById('shortName').value,
        address:document.getElementById('address').value,
      INN:document.getElementById('INN').value,
      OGRN:document.getElementById('OGRN').value,
      BIK:document.getElementById('BIK').value,
      bankName:document.getElementById('bankName').value,
      checkingAcc:document.getElementById('checkingAcc').value,
      correspoyndent:document.getElementById('correspoyndent').value,
      director:document.getElementById('director').value,
      mail:document.getElementById('mail').value,
      phone:document.getElementById('phone').value
    };
    let json =  JSON.stringify(data);

    request.send(json);
    return false;
}

function sendUr1() {
    var request = new XMLHttpRequest();

    request.open("POST", "https://vdbridge.ru/wp-content/themes/vdbridge/reguridical.php", true);
    request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
    request.onload = function () {
        if (this.status >= 200 && this . status < 400) {

            var
                resp = this.response;
            if (resp == 1)
                alert("Ваш паспорт уже зарегистрирован. Обратитесь в техподдержку.");
            else if (resp == 2)
                document.getElementById("pone_ch").innerHTML = "Данный телефон занят.";
            else if (resp == 3)
                document.getElementById("email_ch").innerHTML = "Данный e-mail занят.";
        }
    };
    let data ={
        fullName:document.getElementById('fullName').value,
        urAddress:document.getElementById('urAddress').value,
       postAddress:document.getElementById('postAddress').value,
        INN:document.getElementById('INN').value,
        KPP:document.getElementById('KPP').value,
        BIK:document.getElementById('BIK').value,
        bankName:document.getElementById('bankName').value,
        checkingAcc:document.getElementById('checkingAcc').value,
        correspoyndent:document.getElementById('correspoyndent').value,
        OKPO:document.getElementById('OKPO').value,
        OKATO:document.getElementById('OKATO').value,
        OKVED:document.getElementById('OKVED').value,
        OGRN:document.getElementById('OGRN').value,
        director:document.getElementById('director').value,
        mail:document.getElementById('mail').value,
        phone:document.getElementById('phone').value
    };
    let json =  JSON.stringify(data);

    request.send(json);
    return false;
}