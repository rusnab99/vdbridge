<?php
include "functions.php";
$data=json_decode(str_replace("\\\"","\"",$_POST["order"])),true);
$sql = "INSERT INTO `vdb_orders`( `prodID`, `name`, `description`, `file1`, `file2`, `file3`, `file4`, 
`quantity`, `type`, `method`, `defect`, `accuracity`, `material`, `date1`, `date2`, `date3`, `date4`) 
VALUES (' ".$_COOKIE["user_id"])."','".esc_sql($data["name"])."','".esc_sql($data["description"])."',
'".esc_sql($data["file1"])."','".esc_sql($data["file2"])."','".esc_sql($data["file3"])."','".esc_sql($data["file4"])."','".esc_sql($data["quantity"])."',
'".esc_sql($data["type"])."','".esc_sql($data["method"])."','".esc_sql($data["defect"])."','".esc_sql($data["accuracity"])."','".esc_sql($data["material"])."',
'".esc_sql($data["date1"])."','".esc_sql($data["date2"])."','".esc_sql($data["date3"])."','".esc_sql($data["date4"])."')";
require_once( ABSPATH.'wp-admin/includes/upgrade.php');
dbDelta($sql,true);
echo 0;