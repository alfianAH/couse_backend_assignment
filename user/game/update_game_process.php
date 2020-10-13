<?php
SESSION_START();
include "../../database.php";

$db = new Database();

// Get all register fields
$game_id = $_POST['game_id'];
// If update,...
if(isset($_POST['name'])){
    $update_data = $db->execute("UPDATE game_tbl
    SET nama = '".$_POST['name']."'
    WHERE game_id = $game_id");

    if($update_data){
        $_SESSION['notification'] = "Update berhasil<br>";
        header("Location: list_game.php");
    } else{
        $_SESSION['notification'] = "Update gagal<br>";
    }
}