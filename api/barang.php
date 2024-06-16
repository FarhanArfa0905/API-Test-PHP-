<?php
// Memasukkan file koneksi database
require_once'../db_koneksi/koneksidb.php';

// Fungsi untuk mengambil data barang dari database
function getBarangData($koneksidb) {
    $response = array();
    $query_sql = "SELECT * FROM tb_barang";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));

    if (mysqli_num_rows($sql) > 0) {
        $barang = array();
        while ($row = mysqli_fetch_assoc($sql)) {
            $barang[] = $row;
        }
        $response = array('status' => 'Berhasil', 'data' => $barang);
    } else {
        $response = array('status' => 'Gagal', 'message' => 'Tidak ada data barang');
    }
    return $response;
}

// Mengirim respons dalam format JSON
$response = getBarangData($koneksidb);
header('Content-Type: application/json');
echo json_encode($response);

// Menutup koneksi database
mysqli_close($koneksidb);
?>
