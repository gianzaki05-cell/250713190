
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $makanan = $_POST['makanan'] ?? '';
    $aksesoris = $_POST['aksesoris'] ?? '';

    $error = [];

    if (empty($makanan) || empty($aksesoris)) {
        $error[] = "Makanan dan minuman serta aksesoris tidak boleh kosong.";
    }

    if (!in_array($makanan, ['daging kaleng', 'susu'])) {
        $error[] = "Pilihan makanan dan minuman tidak valid.";
    }

    if (!in_array($aksesoris, ['kalung', 'pakaian'])) {
        $error[] = "Pilihan aksesoris tidak valid.";
    }

    if (!empty($error)) {
        foreach ($error as $msg) {
            echo "<p style='color:red;'>" . htmlspecialchars($msg) . "</p>";
        }
    } else {
        if ($makanan == 'daging kaleng') {
            $hargaMakanan = 10000;
        } else {
            $hargaMakanan = 15000;
        }

        if ($aksesoris == 'kalung') {
            $hargaAksesoris = 50000;
        } else {
            $hargaAksesoris = 100000;
        }

        $totalBayar = $hargaMakanan + $hargaAksesoris;

        function dapatDiskon($totalBayar) {
            if ($totalBayar >= 100000) {
                return 0.10;
            } else {
                return 0;
            }
        }

        function totalHarga($diskon, $totalBayar) {
            return $totalBayar - ($totalBayar * $diskon);
        }

        $diskon = dapatDiskon($totalBayar);
        $total = totalHarga($diskon, $totalBayar);

        echo "<h2>Informasi Belanja</h2>";
        echo "<p>Makanan dan Minuman: " . htmlspecialchars($makanan) . "</p>";
        echo "<p>Aksesoris: " . htmlspecialchars($aksesoris) . "</p>";
        echo "<p>Total Harga: Rp" . $totalBayar . "</p>";
        echo "<p>Diskon: " . ($diskon * 100) . "%</p>";
        echo "<p>Total Pembayaran: Rp" . $total . "</p>";

        if ($diskon == 0) {
            echo "<p>Maaf tidak ada diskon yang diberikan.</p>";
        } else {
            echo "<p>Selamat! Anda mendapatkan diskon " .
                htmlspecialchars($diskon * 100) . "%.</p>";
        }
    }
} else {
    echo "<h2>Belanja</h2>";
    echo "<form method='POST' action=''>";

    echo "<p>Daftar Kategori:</p>";

    echo "<p>Makanan dan Minuman:
        <select name='makanan'>
            <option value=''>Pilih Produk</option>
            <option value='daging kaleng'>Daging Kaleng</option>
            <option value='susu'>Susu</option>
        </select>
    </p>";

    echo "<p>Aksesoris:
        <select name='aksesoris'>
            <option value=''>Pilih Aksesoris</option>
            <option value='kalung'>Kalung</option>
            <option value='pakaian'>Pakaian</option>
        </select>
    </p>";

    echo "<button type='submit'>Beli</button>";
    echo "</form>";
}
?>
