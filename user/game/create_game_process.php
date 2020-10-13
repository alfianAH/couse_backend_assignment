<?php
SESSION_START();
include "../../database.php";

$db = new Database();

// Get all register fields
$game_name = $_POST['game_name'];
$level = $_POST['level'];

echo $game_name . $level;

$create_game = $db->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) 
VALUES('".$game_name."', 1, 1)");

if($create_game){
    $level_name = 0;
    // Get game_id
    $game_id = $db->get("SELECT game_id FROM game_tbl WHERE nama = '$game_name'");
    $game_id = mysqli_fetch_assoc($game_id);
    echo $game_id['game_id'];

    if($game_id){
        // Create level in table
        while ($level_name < $level){
            $level_name++;
            echo $level_name;
            $create_level = $db->execute("INSERT INTO game_level_tbl(game_id, level)
VALUES(".$game_id['game_id'].", $level_name)");
        }

        // Redirect to list_game.php
        if($create_level){
            $_SESSION['notification'] = "Add $game_name with $level_name level(s)<br>";
            header("Location: list_game.php");
        }
    }
}