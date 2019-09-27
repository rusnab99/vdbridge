<?php

{	/*echo ($wpdb->get_var("SHOW TABLES LIKE 'vdb_orders'") == $table_name);
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
	  scheme VARCHAR(55) NOT NULL,
	  documentation VARCHAR(55) NOT NULL,
	  requirements VARCHAR(55) NOT NULL,
	  BOM VARCHAR(55) NOT NULL,
	  defect double,
	  accuracy mediumint,
	  type tinytext,
	  method tinytext,
	  stock boolean,
	  demo_url VARCHAR(55) ,
	  quantity mediumint(9) ,
	  UNIQUE KEY id (id)
	);";

        require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
        dbDelta($sql,true);
    }*/
    include $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
   /* $scheme=null;
    $documentation =null;
    $requirements =null;
    $BOM=null;
    if ($_FILES['scheme']['error'] == UPLOAD_ERR_OK && $_FILES['scheme']['type'] == 'image/jpeg') { // Проверяем на наличие ошибок
        $destination_dir = $_SERVER['DOCUMENT_ROOT']. '/user_uploads/' . $_FILES['scheme']['name']; // Директория для размещения файла
        if (move_uploaded_file($_FILES['scheme']['tmp_name'], $destination_dir)) { // Перемещаем файл в желаемую директорию
            $scheme =esc_sql($destination_dir);// Оповещаем пользователя об успешной загрузке файла
        } else {
            echo 'Profile Pic not uploaded';
        }
    } else {
        switch ($_FILES['sheme']['error']) {
            case UPLOAD_ERR_FORM_SIZE:
            case UPLOAD_ERR_INI_SIZE:
                echo 'Scheme size exceed';
                brake;
            case UPLOAD_ERR_NO_FILE:
                echo 'Scheme not selected';
                break;
            default:
                echo 'Something is wrong with Scheme file, try again';
        }
    }
    if ($_FILES['documentation']['error'] == UPLOAD_ERR_OK && $_FILES['documentation']['type'] == 'image/jpeg') { // Проверяем на наличие ошибок
        $destination_dir = $_SERVER['DOCUMENT_ROOT']. '/user_uploads/' . $_FILES['documentation']['name']; // Директория для размещения файла
        if (move_uploaded_file($_FILES['documentation']['tmp_name'], $destination_dir)) { // Перемещаем файл в желаемую директорию
            $documentation =esc_sql($destination_dir);// Оповещаем пользователя об успешной загрузке файла
        } else {
            echo 'Profile Pic not uploaded';
        }
    } else {
        switch ($_FILES['documentation']['error']) {
            case UPLOAD_ERR_FORM_SIZE:
            case UPLOAD_ERR_INI_SIZE:
                echo 'Scheme size exceed';
                brake;
            case UPLOAD_ERR_NO_FILE:
                echo 'Scheme not selected';
                break;
            default:
                echo 'Something is wrong with Scheme file, try again';
        }
    }if ($_FILES['requirements']['error'] == UPLOAD_ERR_OK && $_FILES['requirements']['type'] == 'image/jpeg') { // Проверяем на наличие ошибок
    $destination_dir = $_SERVER['DOCUMENT_ROOT']. '/user_uploads/' . $_FILES['requirements']['name']; // Директория для размещения файла
    if (move_uploaded_file($_FILES['requirements']['tmp_name'], $destination_dir)) { // Перемещаем файл в желаемую директорию
        $requirements=esc_sql($destination_dir);// Оповещаем пользователя об успешной загрузке файла
    } else {
        echo 'Profile Pic not uploaded';
    }
} else {
    switch ($_FILES['requirements']['error']) {
        case UPLOAD_ERR_FORM_SIZE:
        case UPLOAD_ERR_INI_SIZE:
            echo 'Scheme size exceed';
            brake;
        case UPLOAD_ERR_NO_FILE:
            echo 'Scheme not selected';
            break;
        default:
            echo 'Something is wrong with Scheme file, try again';
    }
}if ($_FILES['BOM']['error'] == UPLOAD_ERR_OK && $_FILES['BOM']['type'] == 'image/jpeg') { // Проверяем на наличие ошибок
    $destination_dir = $_SERVER['DOCUMENT_ROOT']. '/user_uploads/' . $_FILES['BOM']['name']; // Директория для размещения файла
    if (move_uploaded_file($_FILES['BOM']['tmp_name'], $destination_dir)) { // Перемещаем файл в желаемую директорию
        $BOM =esc_sql($destination_dir);// Оповещаем пользователя об успешной загрузке файла
    } else {
        echo 'Profile Pic not uploaded';
    }
} else {
    switch ($_FILES['BOM']['error']) {
        case UPLOAD_ERR_FORM_SIZE:
        case UPLOAD_ERR_INI_SIZE:
            echo 'Scheme size exceed';
            brake;
        case UPLOAD_ERR_NO_FILE:
            echo 'Scheme not selected';
            break;
        default:
            echo 'Something is wrong with Scheme file, try again';
    }
}





    // подготавливаем данные
    $user_id = esc_sql($_COOKIE['user_id']);
    $last_date=esc_sql($_POST["lastDate"]);
    $max_price = esc_sql($_POST["cost"]);
    $name = esc_sql($_POST["projectName"]);
    $description=esc_sql($_POST["description"]);


    $defect=esc_sql($_POST["defect"]);
    $accuracy =esc_sql($_POST["accuracy"]);
    $type =esc_sql($_POST["type"]);
    $method=esc_sql($_POST["method"]);
    $stock =esc_sql($_POST["stock"]);

    $quantity =esc_sql($_POST["quantity"]);



    //die();}
    $sql = "INSERT INTO vdb_orders (`user_id`,`max_price`,`name`,`last_date`,`description`,`original_url`) VALUES
	('$user_id' ,
    '$last_date' ,
    '$max_price' ,
    '$name' ,
    '$description' ,
    '$scheme ' ,
    '$documentation ' ,
    '$requirements ' ,
    '$BOM' ,
    '$defect' ,
    '$accuracy' ,
    '$type' ,
    '$method' ,
    '$stock' ,   
    '$quantity' )";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);
  //  header("Location: http://vdbridge.ru");*/
   echo var_dump($_FILES);
}
?>