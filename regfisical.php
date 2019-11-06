<?php
global $wpdb;
if(isset($_POST["base"])){
    $data=json_decode(str_replace("\\\"","\"",$_POST["base"]),true);
    $pName=esc_sql($data["pName"]);
    $prodName=esc_sql($data["prodName"]);
    $tagline=esc_sql($data["tagline"]);
    $site=esc_sql($data["site"]);
    $city=esc_sql($data["city"]);
    $sql="IF EXISTS (SELECT `id` WHERE userId=".$_COOKIE["user_id"]."){UPDATE 'vdb_fisical' SET 'pName'='".$pName."','prodName'='".$prodName."',
    'tagline'='".$tagline."','site'='".$site."','city'='".$city."' where userId=".$_COOKIE["user_id"]."}ELSE 
    {INSERT INTO 'vdb_fisical' ('pName','prodName', 'tagline','site','city','userId') VALUES ('".$pName."','".$prodName."', '".$tagline."','".
        $site."','".$city."','".$_COOKIE["user_id"]."') }";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);
    echo 0;
}
if(isset($_POST["advanced"])){
    $data=json_decode(str_replace("\\\"","\"",$_POST["advanced"]),true);
    $FIO=esc_sql($data["FIO"]);
    $country=esc_sql($data["country"]);
    $birth=esc_sql($data["birth"]);
    $INN=esc_sql($data["INN"]);
    $passport=esc_sql($data["passport"]);
    $pass_given=esc_sql($data["pass_given"]);
    $bankName=esc_sql($data["bankName"]);
    $checkingAcc=esc_sql($data["checkingAcc"]);
    $correspoydentAcc=esc_sql($data["correspoydentAcc"]);
    $BIK=esc_sql($data["BIK"]);
    $address=esc_sql($data["address"]);
    $email=esc_sql($data["email"]);
    $phone=esc_sql($data["phone"]);

    $sql="IF EXISTS (SELECT `id` WHERE userId=".$_COOKIE["user_id"]."){UPDATE 'vdb_fisical' SET `FIO`='".$FIO."', `country`='".$country."', `birth`='".$birth."',
     `INN`='".$INN."', `passport`='".$passport."', `pass_given`='".$pass_given."', `bankName`='".$bankName."', `checkingAcc`='".$checkingAcc."',
      `correspoyndentAcc`='".$correspoydentAcc."', `BIK`='".$BIK."', `address`='".$address."', `email`='".$email."', `phone`='".$phone."'  where userId=".$_COOKIE["user_id"]."}ELSE 
    {INSERT INTO 'vdb_fisical' (`FIO`, `country`, `birth`, `INN`, `passport`, `pass_given`, `bankName`, `checkingAcc`, `correspoyndentAcc`,
     `BIK`, `address`, `email`, `phone`) VALUES ('".$FIO."', '".$country."','".$birth."','".$INN."','".$passport."','".$pass_given."','".$bankName."',
     '".$checkingAcc."','".$correspoydentAcc."','".$BIK."','".$address."','".$email."','".$phone."','".$_COOKIE["user_id"]."')}";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);

    $role=esc_sql($data["role"]);
    $min_part=esc_sql($data["min_part"]);
    $acuracity=esc_sql($data["acuracity"]);
    $sql="IF EXISTS (SELECT `id` WHERE userId=".$_COOKIE["user_id"]."){UPDATE 'vdb_fisical' SET 'role'='".$role."','min_part'='".$min_part."',
    'acuracity'='".$acuracity."' where userId=".$_COOKIE["user_id"]."}ELSE 
    {INSERT INTO 'vdb_fisical' (role,min_part,acuracity,userId) VALUES ('".$role."','".$min_part."', '".$acuracity."','".$_COOKIE["user_id"]."') }";
    require_once( ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql,true);
    echo 0;
}
