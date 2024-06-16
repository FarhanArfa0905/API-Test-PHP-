<?php
// Menghubungkan ke database
include "../db_koneksi/koneksidb.php";

// Memeriksa apakah request adalah DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Mengambil data dari request DELETE
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);

    // Memeriksa apakah kunci KodeBarang tersedia dalam data yang diterima
    if (isset($data['KodeBarang'])) {
        // Mengambil nilai KodeBarang dari data yang diterima
        $KodeBarang = $data['KodeBarang'];

        // Query untuk memeriksa apakah KodeBarang ada dalam tabel tb_barang
        $check_sql = "SELECT COUNT(*) as count FROM tb_barang WHERE KodeBarang = ?";
        $stmt = $koneksidb->prepare($check_sql);
        $stmt->bind_param("s", $KodeBarang);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Memeriksa apakah KodeBarang ditemukan
        if ($row['count'] > 0) {
            // Jika ditemukan, lakukan DELETE
            $delete_sql = "DELETE FROM tb_barang WHERE KodeBarang = ?";
            $stmt = $koneksidb->prepare($delete_sql);
            $stmt->bind_param("s", $KodeBarang);

            if ($stmt->execute()) {
                $response = array('status' => 'Berhasil', 'message' => 'Data berhasil dihapus');
            } else {
                $response = array('status' => 'Gagal', 'message' => 'Error: ' . $stmt->error);
            }
        } else {
            // Jika KodeBarang tidak ditemukan dalam database
            $response = array('status' => 'Gagal', 'message' => 'KodeBarang tidak ditemukan dalam database');
        }

        $stmt->close();
    } else {
        // Jika kunci KodeBarang tidak tersedia dalam data yang diterima
        $response = array('status' => 'Gagal', 'message' => 'KodeBarang tidak ditemukan dalam request');
    }
} else {
    // Jika metode request bukan DELETE
    $response = array('status' => 'Gagal', 'message' => 'Metode request tidak diizinkan');
}

// Mengubah respons menjadi JSON dan mengirimkannya
header('Content-Type: application/json');
echo json_encode($response);

// Menutup koneksi database
$koneksidb->close();
?>
