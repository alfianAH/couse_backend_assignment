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
    $statisticdata = $db->get("SELECT game_tbl.nama as game, 
    game_level_tbl.level as level,
    MIN(user_game_data_tbl.score) as min, 
    MAX(user_game_data_tbl.score) as max,
    AVG(user_game_data_tbl.score) as avg
    FROM user_game_data_tbl, game_tbl, game_level_tbl 
    WHERE user_game_data_tbl.level_id = game_level_tbl.level_id AND
    game_level_tbl.game_id = game_tbl.game_id AND 
    user_game_data_tbl.nik = '".$nik."' 
    GROUP BY game_level_tbl.level_id");
} else{
    header("Location: ../index.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}
?>

PAGE STATISTIK

<table border="1">
    <tr>
        <td><a href="index.php">HOME</a></td>
        <td><a href="statistik.php">STATISTIK</a></td>
        <td><a href="leaderboard.php">LEADERBOARD</a></td>
        <td><a href="submit_score.php">SUBMIT SCORE</a></td>
        <td><a href="logout.php">LOGOUT</a> </td>
    </tr>
</table>

<table border="1">
    <tr>
        <td align="center" colspan="5">USER STATISTIK SKOR GAME</td>
    </tr>

    <tr>
        <td>GAME</td>
        <td>LEVEL</td>
        <td>MIN</td>
        <td>MAX</td>
        <td>AVG</td>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($statisticdata)){
        ?>
        <tr>
            <td><?php echo $row['game']?></td>
            <td><?php echo $row['level']?></td>
            <td><?php echo $row['min']?></td>
            <td><?php echo $row['max']?></td>
            <td><?php echo $row['avg']?></td>
        </tr>
    <?php
    }
    ?>
</table>

