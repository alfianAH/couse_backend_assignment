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
    $userdata = $db-> get("SELECT user_tbl.nik as nik,
    user_tbl.nama_depan as nama_depan,
    user_tbl.nama_belakang as nama_belakang,
    user_tbl.alamat as alamat,
    user_tbl.kode_pos as kode_pos,
    kota_tbl.nama_kota as nama_kota,
    provinsi_tbl.nama_provinsi as nama_provinsi
    FROM user_tbl, kota_tbl, provinsi_tbl
    WHERE user_tbl.nik = '".$nik."' AND
    user_tbl.kota_id = kota_tbl.kota_id AND
    kota_tbl.provinsi_id = provinsi_tbl.provinsi_id");

    $userdata = mysqli_fetch_assoc($userdata);
} else{
    header("Location: index.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}
?>

PAGE LEADERBOARD

<table border="1">
    <tr>
        <td><a href="index.php">HOME</a></td>
        <td><a href="statistik.php">STATISTIK</a></td>
        <td><a href="leaderboard.php">LEADERBOARD</a></td>
        <td><a href="logout.php">LOGOUT</a> </td>
    </tr>
</table>

<form action="leaderboard.php" method="get">
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

<form action="leaderboard.php" method="get">
    <select name="level_id">
        <?php
        $leveldata = $db->get("SELECT level_id, level FROM game_level_tbl
WHERE game_level_tbl.game_id = ".$_GET['game_id']);

        while($row = mysqli_fetch_assoc($leveldata)){
            ?>
            <option value="<?php echo $row['level_id']?>" ><?php echo $row['level']?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Tampilkan leaderboard">
</form>

<?php
if(isset($_GET['level_id'])){
    $game_level = $db->get("SELECT game_id, level 
FROM game_level_tbl 
WHERE game_level_tbl.level_id = ".$_GET['level_id']);
    $game_level = mysqli_fetch_assoc($game_level);
    echo "LEADERBOARD GAME ID: ". $game_level['game_id'] . " Level: ".$game_level['level'];
    ?>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Score</td>
        </tr>

        <?php
        $leaderboard = $db->get("SELECT user_tbl.nama_depan as nama_depan,
        user_tbl.nama_belakang as nama_belakang,
        MAX(user_game_data_tbl.score) as score
        FROM user_tbl, user_game_data_tbl
        WHERE user_tbl.nik = user_game_data_tbl.nik AND 
        user_game_data_tbl.level_id = ".$_GET['level_id'].
        " GROUP BY user_tbl.nik ORDER BY score DESC");

        $number = 0;
        if($leaderboard == null){
            echo "<br> null";
        } else{
            while($row = mysqli_fetch_assoc($leaderboard)){
                $number++;
                ?>
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $row['nama_depan']. " ". $row['nama_belakang'] ?></td>
                    <td><?php echo $row['score'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <?php
}
?>