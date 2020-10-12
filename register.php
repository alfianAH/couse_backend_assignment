<?php
SESSION_START();
include "database.php";
$db = new Database();
$nik = (isset($_SESSION['nik'])) ? $_SESSION['nik'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

if($token & $nik){
    $result = $db->execute("SELECT * FROM user_tbl WHERE nik = '".$nik."'AND token = '".$token."' AND status = 1");

    if($result){
        // Redirect to dashboard
        header("Location: user/");
    }
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";

if($notification){
    echo $notification;
    unset($_SESSION['notification']);
}

?>

PAGE REGISTER

<form action="login/register_process.php" method="post">
    <table>
        <tr>
            <td>nik</td>
            <td>:</td>
            <td><input type="text" name="nik" required></td>
        </tr>

        <tr>
            <td>password</td>
            <td>:</td>
            <td><input type="password" name="password" required></td>
        </tr>

        <tr>
            <td>password (again)</td>
            <td>:</td>
            <td><input type="password" name="password2" required></td>
        </tr>

        <tr>
            <td>nama depan</td>
            <td>:</td>
            <td><input type="text" name="nama_depan" required></td>
        </tr>

        <tr>
            <td>nama belakang</td>
            <td>:</td>
            <td><input type="text" name="nama_belakang" required></td>
        </tr>

        <tr>
            <td>nomor handphone</td>
            <td>:</td>
            <td><input type="text" name="nomor_handphone" required></td>
        </tr>

        <tr>
            <td>tanggal lahir</td>
            <td>:</td>
            <td><input type="date" name="tanggal_lahir" required></td>
        </tr>

        <tr>
            <td>tempat lahir</td>
            <td>:</td>
            <td><input type="text" name="tempat lahir" required></td>
        </tr>

        <tr>
            <td>email</td>
            <td>:</td>
            <td><input type="email" name="email" required></td>
        </tr>

        <tr>
            <td>alamat</td>
            <td>:</td>
            <td><textarea name="alamat"></textarea> </td>
        </tr>

        <tr>
            <td>kode pos</td>
            <td>:</td>
            <td><input type="text" name="kode_pos" required></td>
        </tr>

        <tr>
            <td>kota</td>
            <td>:</td>
            <td>
                <select name="kota_id" required>
                    <option value="">- SELECT -</option>

                    <?php
                    $kota = $db->get("SELECT kota_id,nama_kota FROM kota_tbl WHERE status = 1");

                    if($kota){
                        while ($row = mysqli_fetch_assoc($kota)){
                            ?>
                            <option value="<?php echo $row['kota_id']?>"><?php echo $row['nama_kota']?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="3"><input type="submit" value="REGISTER"></td>
        </tr>
    </table>
</form>

<button><a href="index.php">Back to login</a></button>