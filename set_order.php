<?php
$data=json_decode(str_replace("\\\"","\"",$_POST["order"]),true);
$sql = "INSERT INTO `vdb_orders`( `prodID`, `name`, `description`, `file1`, `file2`, `file3`, `file4`, 
`quantity`, `type`, `method`, `defect`, `accuracity`, `material`, `date1`, `date2`, `date3`, `date4`) 
VALUES (' ".$_COOKIE["user_id"]."','".$data["name"]."','".$data["description"]."',
'".$data["file1"]."','".$data["file2"]."','".$data["file3"]."','".$data["file4"]."','".$data["quantity"]."',
'".$data["type"]."','".$data["method"]."','".$data["defect"]."','".$data["accuracity"]."','".$data["material"]."',
'".$data["date1"]."','".$data["date2"]."','".$data["date3"]."','".$data["date4"]."')";
require_once( ABSPATH.'wp-admin/includes/upgrade.php');
dbDelta($sql,true);
echo 0;