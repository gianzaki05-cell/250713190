
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $npm = $_POST['npm'] ?? '';
    $paket = $_POST['paket'] ?? '';

    $error = [];

    if (empty($nama) || empty($npm) || empty($paket)) {
        $error[] = "Harap lengkapi semua data.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $nama)) {
        $error[] = "Nama hanya boleh mengandung huruf dan spasi.";
    }

    if (!preg_match("/^[0-9]+$/", $npm)) {
        $error[] = "NPM hanya boleh mengandung angka.";
    }

    if (!in_array($paket, ['1', '3'])) {
        $error[] = "Paket membership tidak valid.";
    }

    if (!empty($error)) {
        foreach ($error as $msg) {
            echo "<p style='color:red;'>" . htmlspecialchars($msg) . "</p>";
        }
    } else {
        if ($paket == '1') {
            $benefit = "Potongan 50% untuk pembelian produk tertentu.";
            $namaPaket = "1 Bulan";
        } else {
            $benefit = "Gratis cemilan hewan peliharaan untuk 3 bulan pertama.";
            $namaPaket = "3 Bulan";
        }

        echo "<h2>Informasi Pendaftaran</h2>";
        echo "<p>Nama: " . htmlspecialchars($nama) . "</p>";
        echo "<p>NPM: " . htmlspecialchars($npm) . "</p>";
        echo "<p>Paket Membership: " . $namaPaket . "</p>";
        echo "<p>Selamat! Anda telah berhasil mendaftar sebagai member dengan benefit: " . htmlspecialchars($benefit) . "</p>";
    }
} else {
    echo "<h2>Pendaftaran Membership</h2>";
    echo "<form method='POST' action=''>";
    echo "<p>Nama: <input type='text' name='nama' /></p>";
    echo "<p>NPM: <input type='text' name='npm' /></p>";

    echo "<p>Paket Membership:
        <select name='paket'>
            <option value=''>Pilih Paket</option>
            <option value='1'>1 Bulan</option>
            <option value='3'>3 Bulan</option>
        </select>
    </p>";

    echo "<button type='submit'>Daftar</button>";
    echo "</form>";
}
?>
