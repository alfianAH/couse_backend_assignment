<?php
SESSION_START();

include "../../database.php";

$db = new Database();

$nik = (isset($_SESSION['nik'])) ? $_SESSION['nik'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

$game_id = $_POST['game_id'];
$game_name = $_POST['game_name'];

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
    $_SESSION['notification'] = "Delete berhasil<br>";
    header("Location: list_game.php");
}

if(isset($_POST['edit'])){
    ?>
    <form action="update_game.php" method="post">
        <table>
            <tr>
                <td>Nama game</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $game_name?>" name="name"></td>
            </tr>

            <tr>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
    <?php
}

// If update,...
if(isset($_POST['name'])){

}
?>