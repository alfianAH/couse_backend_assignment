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

    $userdata = $db->get("SELECT user_tbl.nik as nik,
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
    header("Location: ../index.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}
?>

PAGE HOME
<table border="1">
    <tr>
        <td><a href="index.php">HOME</a></td>
        <td><a href="statistik.php">STATISTIK</a></td>
        <td><a href="leaderboard.php">LEADERBOARD</a></td>
        <td><a href="submit_score.php">SUBMIT SCORE</a></td>
        <td><a href="logout.php">LOGOUT</a> </td>
    </tr>

    <tr>
        <td align="center" colspan=5">PROFILE</td>
    </tr>

    <tr>
        <td>NIK</td>
        <td colspan="4"><?php echo $userdata['nik'];?></td>
    </tr>

    <tr>
        <td>NIK</td>
        <td colspan="4"><?php echo $userdata['nik'];?></td>
    </tr>

    <tr>
        <td>Nama</td>
        <td colspan="4"><?php echo $userdata['nama_depan']." ".$userdata['nama_belakang'];?></td>
    </tr>

    <tr>
        <td>alamat</td>
        <td colspan="4"><?php echo $userdata['alamat'].". Kode Pos: ".$userdata['kode_pos'];?></td>
    </tr>

    <tr>
        <td>Kota</td>
        <td colspan="4"><?php echo $userdata['nama_kota'];?></td>
    </tr>

    <tr>
        <td>Provinsi</td>
        <td colspan="4"><?php echo $userdata['nama_provinsi'];?></td>
    </tr>
</table>