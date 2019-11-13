<?php
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

$destination_dir1=$_SERVER["DOCUMENT_ROOT"]."/files/". generateCode(20).pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION);;
move_uploaded_file($_FILES['file1']['tmp_name'], $destination_dir1 );

$destination_dir2=$_SERVER["DOCUMENT_ROOT"]."/files/". generateCode(20).pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION);;
move_uploaded_file($_FILES['file2']['tmp_name'], $destination_dir2 );

$destination_dir3=$_SERVER["DOCUMENT_ROOT"]."/files/". generateCode(20).pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION);;
move_uploaded_file($_FILES['file3']['tmp_name'], $destination_dir3 );

$destination_dir4=$_SERVER["DOCUMENT_ROOT"]."/files/". generateCode(20).pathinfo($_FILES['file4']['name'], PATHINFO_EXTENSION);;
move_uploaded_file($_FILES['file4']['tmp_name'], $destination_dir4 );
echo array($destination_dir1,$destination_dir2,$destination_dir3,$destination_dir4);