<?php
// Membersihkan input dari tag HTML dan karakter aneh
function sanitize($conn, $data) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($data))));
}

// Validasi: Hanya Huruf dan Angka (Tanpa spasi/simbol)
function is_valid_name($name) {
    return preg_match("/^[a-zA-Z0-9]+$/", $name);
}

// Cek apakah ucpname sudah ada
function ucp_exists($conn, $name) {
    $query = "SELECT id FROM playerucp WHERE ucpname = '$name' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}
?>

