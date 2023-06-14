<?php
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "stockbarang");

function queryStockBarang($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahStockBarang($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $namabarang = $_POST["namabarang"];
    $deskripsi = $_POST["deskripsi"];
    $stock = $_POST["stock"];

    $addToTable = mysqli_query($conn, "INSERT INTO stock (namabarang, deskripsi, stock)
                                        VALUES ('$namabarang', '$deskripsi', $stock)");

    if ($addToTable) {
        echo "
            <script>
                alert('Barang berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Barang gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }

    return mysqli_affected_rows($conn);
}

function tambahBarangMasuk($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $idbarang = $_POST["idbarang"];
    $penerima = $_POST["penerima"];
    $quantity = $_POST["quantity"];

    // Cek stock sekarang
    $cekStock = mysqli_query($conn, "SELECT * FROM stock WHERE idbarang = $idbarang");
    $ambilData = mysqli_fetch_array($cekStock);
    $stockSekarang = $ambilData["stock"];
    $jumlahStockAkhir = $stockSekarang + $quantity;

    $addToTableMasuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, keterangan, quantity)
                                        VALUES ('$idbarang', '$penerima', '$quantity')");
    $updateStockMasuk = mysqli_query($conn, "UPDATE stock SET stock = '$jumlahStockAkhir' WHERE idbarang = $idbarang");

    if ($addToTableMasuk && $updateStockMasuk) {
        echo "
            <script>
                alert('Barang berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Barang gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }

    return mysqli_affected_rows($conn);
}
