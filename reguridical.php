<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
global $wpdb;$data=json_decode(str_replace("\\\"","\"",file_get_contents('php://input')),true);

$sql="SELECT COUNT(*) FROM vdb_fisical WHERE userId=".$_COOKIE["user_id"];
if($wpdb->get_results($sql,ARRAY_N)[0]!=0) $sql="UPDATE vdb_comapnies SET fullName='".esc_sql($data["fullName"])."', urAddress='".esc_sql($data["urAddress"]).
    "', postAddress='".esc_sql($data["postAddress"])."',    INN='".esc_sql($data["INN"])."', KPP='".esc_sql($data["KPP"])."', BIK='".esc_sql($data["BIK"]).
    "', bankName='".esc_sql($data["bankName"])."', checkingAcc='".esc_sql($data["checkingAcc"])."', correspoydent='".esc_sql($data["correspoydent"]).
    "', OKPO='".esc_sql($data["OKPO"])."', OKATO='".esc_sql($data["OKATO"])."', OKVED='".esc_sql($data["OKVED"])."', OGRN='".esc_sql($data["OGRN"])."',director='".esc_sql($data["director"])."', mail='".esc_sql($data["mail"]).
    "', phone='".esc_sql($data["phone"])."'  where userId=".$_COOKIE["user_id"];
else $sql="INSERT INTO vdb_fisical (`fullName`, `urAddress`, `postAddress`, `INN`, `KPP`, `BIK`, `bankName`, `checkingAcc`, `correspoydent`, `OKPO`, `OKATO`, `OKVED`, `OGRN`,
 `director`, `mail`, `phone`) VALUES 
('".esc_sql($data["fullName"])."', '".esc_sql($data["urAddress"])."','".esc_sql($data["postAddress"])."','".esc_sql($data["INN"])."','".esc_sql($data["KPP"]).
    "','".esc_sql($data["BIK"])."','".esc_sql($data["bankName"])."','".esc_sql($data["checkingAcc"])."','".esc_sql($data["correspoydent"])."','".esc_sql($data["OKPO"]).
    "','".esc_sql($data["OKATO"])."','".esc_sql($data["OKVED"])."','".esc_sql($data["OGRN"])."','".esc_sql($data["director"])."','".esc_sql($data["mail"])."','"
    .esc_sql($data["phone"])."','".$_COOKIE["user_id"]."')";
require_once( ABSPATH.'wp-admin/includes/upgrade.php');
dbDelta($sql,true);