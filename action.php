<?php
session_start();
include "./database.php";

if ($_GET['m'] == 'create') {
    $createQuery = "INSERT INTO produk SET nama_produk=:nama, keterangan=:ket, harga=:harga, jumlah=:jml;";
    $stmt = $conpdo->prepare($createQuery);
    $stmt->bindParam(':nama', $_POST['namabarang']);
    $stmt->bindParam(':ket', $_POST['keterangan']);
    $stmt->bindParam(':harga', $_POST['harga']);
    $stmt->bindParam(':jml', $_POST['jumlah']);

    if ($stmt->execute()) {
        $_SESSION["successMessage"] = "Berhasil membuat barang baru";
        header('Location: ./index.php');
    } else {
        $_SESSION["errorMessage"] = "Gagal membuat barang baru";
        header('Location: ./create.php');
    }
} else if ($_GET['m'] == 'edit') {
    $createQuery = "UPDATE produk SET nama_produk=:nama, keterangan=:ket, harga=:harga, jumlah=:jml WHERE id = :id;";
    $stmt = $conpdo->prepare($createQuery);
    $stmt->bindParam(':nama', $_POST['namabarang']);
    $stmt->bindParam(':ket', $_POST['keterangan']);
    $stmt->bindParam(':harga', $_POST['harga']);
    $stmt->bindParam(':jml', $_POST['jumlah']);
    $stmt->bindParam(':id', $_POST['id']);

    if ($stmt->execute()) {
        $_SESSION["successMessage"] = "Berhasil mengubah barang";
        header('Location: ./index.php');
    } else {
        $_SESSION["errorMessage"] = "Gagal mengubah barang";
        header('Location: ./edit.php');
    }
} else if ($_GET['m'] == 'delete') {
    $createQuery = "DELETE FROM `produk` WHERE `id` = " . $_GET['id'] . ";";
    $filterQuery = "SELECT * FROM `produk` WHERE `id` = " . $_GET['id'] . ";";
    $filterq = mysqli_num_rows(mysqli_query($db, $filterQuery));
    if ($filterq != 0) {
        $stmt = $db->query($createQuery);
        if ($stmt == true) {
            $_SESSION["successMessage"] = "Berhasil menghapus jabatan";
        } else {
            $_SESSION["successMessage"] = $db->error;
        }
    } else {
        $_SESSION["errorMessage"] = "jabatan tidak ditemukan";
    }
    header('Location: ./index.php');
}
