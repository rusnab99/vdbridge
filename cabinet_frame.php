<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
get_header();?><script>
    function openListening(listName){
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(listName).style.display = "flex";


    }
</script>
<script>

    function  send2(role,part,acur){
    let data ={
        role: role.value,
        min_part: part.value,
        acuracity: acur.value
    };
    let json = "prod = " + JSON.stringify(data);

    request.send(json);
    }

</script>
<script>

    function change(block)
    {

        var request = new XMLHttpRequest();

        request.open("POST", "<?php get_theme_file_uri("cabinet.php");?>", true);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

        request.onload = function () {
            if (this . status >= 200 && this . status < 400) {

                var
                    resp = this.response;
                document.getElementById("personal-info").innerHTML = resp;

            }
        };
        let data ={
            blockId:block
        };

        let json = "login=" + JSON . stringify(data);

        request . send(json);
        return false;
    }</script><script src="https://code.jquery.com/jquery-1.9.1.js">
    $(document).ready(function(){	var request = new XMLHttpRequest();

        request.open("POST", "<?php get_theme_file_uri("cabinet.php");?>", true);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

        request.onload = function () {
            if (this . status >= 200 && this . status < 400) {

                var
                    resp = this.response;
                document.getElementById("personal-info").innerHTML = resp;

            }
        };
        let data ={
            blockId:0
        };

        let json = "login=" + JSON . stringify(data);

        request . send(json);});
</script><main class="menuProf" onload="change(0);alert(1);">
    <div class="left-menu">

        <button onclick="change(0);">Профиль сотрудника</button>
        <button onclick="change(1);">Профиль предприятия</button>
        <button onclick="change(2);">Сообщения</button>
        <button onclick="change(3);">Документы</button>
        <button onclick="change(4);">Услуги</button>
        <button onclick="change(5)">Счет</button>
        <button onclick="change(6)">Заказы</button>
        <button onclick="change(7);">Предприятия</button>
        <button onclick="change(8);">Белый список</button>
        <button onclick="change(9);">Черный список</button>
        <button onclick="change(10);">Альянсы</button>
        <button onclick="change(11);">Статистика</button>
        <button onclick="change(12);">BOM-листы</button>
        <button onclick="change(13);">Оснастка</button>
        <button onclick="change(14);">Интеграции</button>
        <button onclick="change(15);">Обучение</button></div>
    <div class="right-menu" id="personal-info"></div>
</main>
<?php get_sidebar(); ?>

<?php get_footer();?>
