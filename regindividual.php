<?php include $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';
global $wpdb;$data=json_decode(str_replace("\\\"","\"",file_get_contents('php://input')),true);





    $sql="SELECT COUNT(*) FROM vdb_fisical WHERE userId=".$_COOKIE["user_id"];
    if($wpdb->get_results($sql,ARRAY_N)[0]!=0) $sql="UPDATE vdb_individual SET fullName='".esc_sql($data[""])."', shortName='".esc_sql($data[""])."', address='".esc_sql($data[""])."',
     INN='".esc_sql($data[""])."', OGRN='".esc_sql($data[""])."', BIK='".esc_sql($data[""])."', checkingAcc='".esc_sql($data[""])."', correspoydent='".esc_sql($data[""])."',
      director='".esc_sql($data[""])."', mail='".esc_sql($data[""])."', phone='".esc_sql($data[""])."'  where userId=".$_COOKIE["user_id"];
    else $sql="INSERT INTO vdb_fisical (`fullName`, `shortName`, `address`, `INN`, `OGRN`, `BIK`, `bankName`, `checkingAcc`, `correspoydent`, `director`, `mail`, `phone`) VALUES 
('".esc_sql($data[""])."', '".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."',
     '".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""])."','".esc_sql($data[""]).
        "','".$_COOKIE["user_id"]."')";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);
}
