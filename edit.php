<?php
session_start();
include "./database.php";
if (!empty($_GET['i'])) {
    $queryKegiatan = mysqli_query($db, "select * from produk where id = " . $_GET['i']);
    $result = mysqli_fetch_object($queryKegiatan);
    if (empty($result)) {
        $_SESSION["errorMessage"] = "dd produk tidak ditemukan";
        header('Location: ./index.php');
    }
} else {
    $_SESSION["errorMessage"] = "Wrong query";
    header('Location: ./index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Tambah Barang</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3>Edit barang</h3>
        <?php include './alert.php' ?>
        <br>
        <form method="POST" action="action.php?m=edit&id=<?= $result->id ?>">
            <div class="form-group">
                <label for="namabarang">Nama Barang</label>
                <input type="text" value="<?= $result->nama_produk ?>" class="form-control" name="namabarang" id="namabarang" aria-describedby="helpId" placeholder="Nama barang" required>
                <small id="helpId" class="form-text text-muted">Nama barang</small>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan Barang</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" required><?= $result->keterangan ?></textarea>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" value="<?= $result->harga ?>" id="harga" class="form-control" placeholder="harga barang" aria-describedby="helpId" required>
                <small id="helpId" class="text-muted">harga barang</small>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" value="<?= $result->jumlah ?>" class="form-control" placeholder="jumlah barang" aria-describedby="helpId" required>
                <small id="helpId" class="text-muted">jumlah barang</small>
            </div>
            <input name="id" value="<?= $result->id ?>" hidden>
            <button type="submit" name="" id="" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>