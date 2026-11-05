<?php
    echo "<h1>Hobi</h1>";
    echo "<form method='POST' action=''>";
        echo "<p>Nama : <br /><input type='text' name='nama' /></p>";
        echo "<p>NPM : <br /><input type='text' name='npm' /></p>";
        echo "<p>Hobi : <br /><input type='text' name='hobi' /></p>";
        echo "<button type='submit'>Kirim</button>";
    echo "</form>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $hobi = $_POST['hobi'];
        echo "Hobi " . htmlspecialchars($nama) . " / " . htmlspecialchars($npm) . " adalah " . htmlspecialchars($hobi);
    } else {
        echo "Silakan isi formulir di atas untuk mengirimkan data hobi Anda.";
    }
?>