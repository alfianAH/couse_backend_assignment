<?php
SESSION_START();
include "../database.php";

$db = new Database();

$nik = (isset($_SESSION['nik'])) ? $_SESSION['nik'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

if($token & $nik) {
    $result = $db->execute("SELECT * FROM user_tbl WHERE nik = '" . $nik . "'AND token = '" . $token . "' AND status = 1");

    if (!$result) {
        // Redirect to login
        header("Location: ../index.php");
    }
} else{
    header("Location: index.php");
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
        <td><a href="index.php">HOME</a></td>
        <td><a href="statistik.php">STATISTIK</a></td>
        <td><a href="leaderboard.php">LEADERBOARD</a></td>
        <td><a href="submit_score.php">SUBMIT SCORE</a></td>
        <td><a href="create_game.php">ADD GAME</a></td>
        <td><a href="logout.php">LOGOUT</a> </td>
    </tr>
</table>
