<?php
SESSION_START();
include "../../database.php";

$db = new Database();

$nik = (isset($_SESSION['nik'])) ? $_SESSION['nik'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

if($token & $nik) {
    $result = $db->execute("SELECT * FROM user_tbl WHERE nik = '" . $nik . "'AND token = '" . $token . "' AND status = 1");

    if (!$result) {
        // Redirect to login
        header("Location: ../../index.php");
    }
} else{
    header("Location: ../../index.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}
?>

ADD GAME

<table border="1">
    <tr>
        <td><a href="../index.php">HOME</a></td>
        <td><a href="../statistik.php">STATISTIK</a></td>
        <td><a href="../leaderboard.php">LEADERBOARD</a></td>
        <td><a href="../submit_score.php">SUBMIT SCORE</a></td>
        <td><a href="list_game.php">LIST GAME</a></td>
        <td><a href="../logout.php">LOGOUT</a> </td>
    </tr>
</table>

<form action="create_game_process.php" method="post">
    <table>
        <tr>
            <td>Nama game</td>
            <td>:</td>
            <td><input type="text" name="game_name"></td>
        </tr>

        <tr>
            <td>Banyak level</td>
            <td>:</td>
            <td><input type="number" name="level"></td>
        </tr>

        <tr>
            <td colspan="3"><input type="submit" value="Add Game"></td>
        </tr>
    </table>
</form>
