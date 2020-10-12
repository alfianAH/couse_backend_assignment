<?php
include "database.php";

echo "CRUD TESTING<br>";

$test = new Database();

// CREATE
//$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-001', 1, true)");
//$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-002', 1, true)");
//$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-003', 1, true)");
//$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-004', 1, true)");
//$test->execute("INSERT INTO game_tbl(nama, tipe_leaderboard, status) VALUES('Game-005', 1, true)");


// READ
//$get_data = $test->get("SELECT game_id, nama, tipe_leaderboard, status FROM game_tbl WHERE status = 1");
//
//while($row = mysqli_fetch_assoc($get_data)){
//    echo "game_id: " . $row["game_id"] .
//        " - Nama: " . $row["nama"] .
//        " - Tipe leaderboard: ". $row["tipe_leaderboard"].
//        " - Status: " . $row["status"] . "<br>";
//}

$get_data = $test->getProcedureExecute("GET_GAME_DATA_BY_STATUS(1)");

while($row = mysqli_fetch_assoc($get_data)){
    echo "game_id: " . $row["game_id"] .
        " - Nama: " . $row["nama"] .
        " - Tipe leaderboard: ". $row["tipe_leaderboard"].
        " - Status: " . $row["status"] . "<br>";
}

// UPDATE
//$test->execute("UPDATE game_tbl SET status=0, nama='DELETE THIS' WHERE game_id != 1");

// DELETE
//$test->execute("DELETE FROM game_tbl WHERE status = 0");

?>