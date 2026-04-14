<?php
include('includes/config.php');
include('includes/functions.php');

$msg = "";
$type = "";

if (isset($_POST['submit'])) {
    $ucpname = sanitize($conn, $_POST['ucpname']);

    if (empty($ucpname)) {
        $msg = "Nama UCP tidak boleh kosong!";
        $type = "error";
    } elseif (!is_valid_name($ucpname)) {
        $msg = "Hanya boleh huruf & angka (Tanpa spasi/simbol)!";
        $type = "error";
    } elseif (strlen($ucpname) < 3 || strlen($ucpname) > 15) {
        $msg = "Panjang nama harus 3-15 karakter!";
        $type = "error";
    } elseif (ucp_exists($conn, $ucpname)) {
        $msg = "Nama UCP sudah terdaftar!";
        $type = "error";
    } else {
        $sql = "INSERT INTO playerucp (ucpname) VALUES ('$ucpname')";
        if (mysqli_query($conn, $sql)) {
            $msg = "UCP '$ucpname' Berhasil Dibuat!";
            $type = "success";
        } else {
            $msg = "Gagal mendaftar, coba lagi.";
            $type = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registration UCP | SAMP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="register-box">
    <h2>GTA:SAMP</h2>
    <p>Daftarkan akun UCP Anda untuk bermain.</p>

    <?php if ($msg): ?>
        <div class="msg <?php echo $type; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="input-group">
            <label>Username UCP</label>
            <input type="text" name="ucpname" placeholder="Contoh: Budi69" required autocomplete="off">
        </div>
        <button type="submit" name="submit">DAFTAR SEKARANG</button>
    </form>
</div>

</body>
</html>
