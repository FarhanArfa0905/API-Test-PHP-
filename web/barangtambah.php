<?php 
    require_once'../db_koneksi/koneksidb.php';
    
    if(isset($_POST['btnsimpan'])=='btnsimpan'){
        $KodeBarang = trim($_POST['KodeBarang']);
        $Nama = trim($_POST['Nama']);
        $KodeSupplier = trim($_POST['KodeSupplier']);
        $Jenis = trim($_POST['Jenis']);
        $Harga = trim($_POST['Harga']);
        // $HargaBeli = trim($_POST['HargaBeli']);
        // $HargaJual = trim($_POST['HargaJual']);
        $Stok = trim($_POST['Stok']);
        $Satuan = trim($_POST['Satuan']);
        $Petugas = 'ADMIN';

        $query_sql = "SELECT * FROM tb_barang WHERE KodeBarang='$KodeBarang'";
        $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
        $totaldata = mysqli_num_rows($sql);
        if ($totaldata <> 0) {
            echo "<script> alert('Data Barang Sudah Pernah Ada')</script>";
            echo "<script> window.location.href='barangtambah.php'</script>";
        }else{
            $query_sql = "INSERT INTO tb_barang (KodeBarang, Nama, KodeSupplier, Jenis, Harga, Stok, Satuan, Petugas) VALUES ('$KodeBarang', '$Nama', '$KodeSupplier', '$Jenis', '$Harga', '$Stok', '$Satuan', '$Petugas');";
            $sql = mysqli_query($koneksidb, $query_sql) or die(mysqli_error($koneksidb));
            if($sql) {
                echo "<script>alert('Berhasil Simpan')</script>";
                echo "<script>window.location.href='barang.php'</script>";
            }
        }
    }

    // POSTMAN
    $response = array ();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require_once("menu.php"); ?>
    <br>

    <div class="container">
        <h2>Tambah Data Barang</h2>

        <div class="col-lg-12">
            <form method="post" name="form1">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body card-block">
                        <div class=" row form-group">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="KodeBarang">Kode Barang:</label>
                                    <input type="text" required name="KodeBarang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Nama">Nama :</label>
                                    <input type="text" required name="Nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Harga">Harga :</label>
                                    <input type="text" required name="Harga" class="form-control">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="HargaJual">HargaJual :</label>
                                    <input type="text" required name="HargaJual" class="form-control">
                                </div> -->
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="KodeSupplier">Kode Supplier:</label>
                                    <select name="KodeSupplier" class="form-control">
                                        <?php 
                                            $query_Rs_Qr_Sp = "select * from tb_supplier order by KodeSupplier ASC";
                                            $Rs_Qr_Sp = mysqli_query($koneksidb, $query_Rs_Qr_Sp) or die (mysqli_error($koneksidb));
                                            $n=0;
                                            while($data=mysqli_fetch_array($Rs_Qr_Sp)){
                                        ?>
                                            <option value="<?php echo $data['KodeSupplier']; ?>"><?php echo $data['KodeSupplier']; ?></option>
                                        <?php
                                            $n++;
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis">Jenis :</label>
                                    <input type="text" required name="Jenis" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Stok">Stok :</label>
                                    <input type="text" required name="Stok" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Satuan">Satuan :</label>
                                    <select name="Satuan" class="form-control">
                                        <option value="PCS">PCS</option>
                                        <option value="KG">KG</option>
                                        <option value="BAL">BAL</option>
                                        <option value="DUS">DUS</option>
                                    </select>
                                </div>            
                            </div>
                        </div>
                        <div class="form-check mt-3">
                            <button class="btn btn-success" name="btnsimpan" value="btnsimpan" type="submit"> Simpan
                                <i class="ace-icon fa fa-signal"></i>
                            </button>
                            <button class="btn btn-danger" type="reset"> Reset
                                <i class="ace-icon fa fa-signal"></i>
                            </button>
                            <a href="barang.php"><button class="btn btn-primary" type="button">Data Petugas <i class="ace-icon fa fa-signal"></i></button></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

