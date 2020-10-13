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

    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
} else{
    header("Location: ../../index.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}
?>

UPDATE GAME
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

<?php
// If delete, ...
if(isset($_POST['delete']) && isset($game_id)){
    $delete_data = $db->execute("DELETE FROM game_tbl WHERE game_id = $game_id");
    IF($delete_data) {
        $_SESSION['notification'] = "Delete berhasil<br>";
        header("Location: list_game.php");
    } else{
        $_SESSION['notification'] = "Delete gagal<br>";
    }
}

if(isset($_POST['edit'])){
    ?>
    <form action="update_game_process.php" method="post">
        <table>
            <tr>
                <td>Nama game</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $game_name?>" name="name"></td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="game_id" value="<?=$game_id?>">
                    <input type="submit" value="Update">
                </td>
            </tr>
        </table>
    </form>
    <?php
}
?>