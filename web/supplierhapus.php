<?php 
    require_once('../db_koneksi/koneksidb.php');

    $KodeSupplier = $_GET['id'];
    // Pastikan $KodePetugas di-escape dengan benar untuk mencegah serangan injeksi SQL
    $escapedKodeSupplier = mysqli_real_escape_string($koneksidb, $KodeSupplier);
    $query_sql = "DELETE FROM tb_supplier WHERE KodeSupplier = '$escapedKodeSupplier'";
    $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
    if($sql) {
        echo "<script>alert('Berhasil Hapus')</script>";
        echo "<script>window.location.href='supplier.php'</script>";
    }
?>
