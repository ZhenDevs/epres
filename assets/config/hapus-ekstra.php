<?php
include 'connect.php'; // Pastikan path benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ekstraId = $_POST['ekstraId'];

    // hapus semua jadwal yang ada ekstranya
    $queryDeleteJadwal = "DELETE FROM jadwal WHERE ekstra_id = ?";
    $stmtDeleteJadwal = $is_connect->prepare($queryDeleteJadwal);
    $stmtDeleteJadwal->bind_param("i", $ekstraId);
    $stmtDeleteJadwal->execute();
    $stmtDeleteJadwal->close();

    // hapus ekstra
    $queryDeleteEkstra = "DELETE FROM ekstra WHERE id = ?";
    $stmtDeleteEkstra = $is_connect->prepare($queryDeleteEkstra);
    $stmtDeleteEkstra->bind_param("i", $ekstraId);
    $stmtDeleteEkstra->execute();

    if ($stmtDeleteEkstra->affected_rows > 0) {
        echo "Ekstra berhasil dihapus.";
    } else {
        echo "Gagal menghapus ekstra.";
    }
    $stmtDeleteEkstra->close();
    $is_connect->close();
}
?>