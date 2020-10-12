<?php
SESSION_START();
include "../database.php";

$db = new Database();

// Get all register fields
$nik = $_POST['nik'];
$password = md5($_POST['password']);

$result = $db->get("SELECT nik FROM user_tbl WHERE nik = '".$nik."' AND password = '".$password."'");

if($result){
    $_SESSION['notification'] = "Berhasil login, selamat datang";
    $token = md5($nik."coursebackend".date("Y-m-d H:i:s"));

    // Update token
    $db->execute("UPDATE user_tbl SET token = '".$token."' WHERE nik = '".$nik."'");

    $_SESSION['token'] = $token;
    $_SESSION['nik'] = $nik;
    header("Location: user/");
}

$_SESSION['notification'] = "Gagal login, coba lagi";
header('Location: ../index.php');