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
    header("Location: ../index.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}
?>

SUBMIT SCORE
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

<form action="submit_score.php" method="get">
    Pilih Game
    <select name="game_id">
        <?php
        $gamedata = $db->get("SELECT game_id, nama FROM game_tbl WHERE status = 1");

        while($row = mysqli_fetch_assoc($gamedata)){
            ?>
            <option value="<?php echo $row['game_id']?>" ><?php echo $row['nama']?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Pilih game">
</form>

<form action="submit_score.php" method="get">
    <select name="level_id">
        <?php
        // Show levels in options
        $leveldata = $db->get("SELECT level_id, level FROM game_level_tbl
WHERE game_level_tbl.game_id = ".$_GET['game_id']);

        while($row = mysqli_fetch_assoc($leveldata)){
            ?>
            <option value="<?php echo $row['level_id']?>" ><?php echo $row['level']?></option>
            <?php
        }
        ?>
    </select>

    <label>Submit score:
        <input type="text" name="score" required>
    </label>

    <input type="submit" value="Submit Score">
</form>

<?php
if(isset($_GET['level_id']) && isset($_GET['score'])){
    $submit_score = $db->execute(
        "INSERT INTO user_game_data_tbl(nik, level_id, score, status) 
VALUES('".$nik."', 
'".$_GET['level_id']."', 
'".$_GET['score']."', 1)");
    if($submit_score) {
        echo "Submit berhasil. Lihat di <a href='statistik.php'>statistik</a>";
    }
}
?>