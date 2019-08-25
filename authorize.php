<?php 
//require_once './././wp-load.php';
	include 'C:\xampp\htdocs\wp-load.php';
	global $wpdb; 
	//echo var_dump($wpdb);
	$table_name='vdb_clients';
	$data=json_decode(str_replace("\\\"","\"",$_POST["login"]),true);
$sql = "SELECT * FROM `vdb_clients` WHERE email='".$data["mail"]."'";

	$posts = $wpdb->get_results($sql,ARRAY_A);
	if(count($posts)==0)
	{
	echo 1;
	}else if(strcmp($posts["password"],$data["pass"])==0) echo 2;
	else
    {
        echo 0;
        foreach ($posts as $post) {
            setcookie("user_id", $post["id"],0,COOKIEPATH, COOKIE_DOMAIN);
            setcookie("role", $post["role"],0,COOKIEPATH, COOKIE_DOMAIN);
            $sql = "UPDATE 'vdb_clients' SET 'code'='" . $_COOKIE["debug_code"] . "' WHERE 'id'=''" .$post["id"]."'";
            require_once( ABSPATH.'wp-admin/includes/upgrade.php');
            dbDelta($sql,true);
            }
    }
	
	
	
?>