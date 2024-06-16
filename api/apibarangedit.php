<?php
// Menghubungkan ke database
include "../db_koneksi/koneksidb.php";

// Mengambil data dari request
$request_body = file_get_contents('php://input');
$data = json_decode($request_body, true);

// Menyiapkan respons
$response = array();

// Memeriksa apakah semua kunci ada dalam data yang diterima
if (isset($data['KodeBarang'], $data['Nama'], $data['KodeSupplier'], $data['Jenis'], $data['Harga'], $data['Stok'], $data['Satuan'])) {
    // Mengambil data dari JSON
    $KodeBarang = $data['KodeBarang'];
    $Nama = $data['Nama'];
    $KodeSupplier = $data['KodeSupplier'];
    $Jenis = $data['Jenis'];
    $Harga = $data['Harga'];
    $Stok = $data['Stok'];
    $Satuan = $data['Satuan'];
    $Petugas = 'ADMIN';

    // Query untuk memeriksa apakah KodeBarang ada dalam tabel tb_barang
    $check_sql = "SELECT COUNT(*) as count FROM tb_barang WHERE KodeBarang = ?";
    $stmt = $koneksidb->prepare($check_sql);
    $stmt->bind_param("s", $KodeBarang);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Memeriksa apakah KodeBarang ditemukan
    if ($row['count'] > 0) {
        // Jika ditemukan, lakukan UPDATE dengan prepared statement
        $update_sql = "UPDATE tb_barang SET Nama=?, KodeSupplier=?, Jenis=?, Harga=?, Stok=?, Satuan=?, Petugas=? WHERE KodeBarang=?";
        $stmt = $koneksidb->prepare($update_sql);
        $stmt->bind_param("ssssdsss", $Nama, $KodeSupplier, $Jenis, $Harga, $Stok, $Satuan, $Petugas, $KodeBarang);

        if ($stmt->execute()) {
            $response = array('status' => 'Berhasil', 'message' => 'Data berhasil diedit');
        } else {
            $response = array('status' => 'Gagal', 'message' => 'Error: ' . $stmt->error);
        }
    } else {
        // Jika KodeBarang tidak ditemukan dalam database
        $response = array('status' => 'Gagal', 'message' => 'KodeBarang tidak ditemukan dalam database');
    }

    $stmt->close();
} else {
    // Jika ada kunci yang tidak tersedia dalam data yang diterima
    $response = array('status' => 'Gagal', 'message' => 'Harap lengkapi semua kolom');
}

// Mengubah respons menjadi JSON dan mengirimkannya
header('Content-Type: application/json');
echo json_encode($response);

// Menutup koneksi database
$koneksidb->close();
?>
