function fn_ValForm() {
    var sMsg = "";
    var sNama = document.getElementById("nama").value;
    var sEmail = document.getElementById("email").value;
    var sUmur = document.getElementById("umur").value;
    var sKategori = document.getElementById("kategori").value;
    var sInfo = "";
    var sLomba = "";

    if (sNama == "") {
        sMsg += "\nNama belum diisi";
    }

    if (sEmail == "") {
        sMsg += "\nEmail belum diisi";
    } else {
        var polaEmail = /^[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]@[a-z0-9][a-z0-9_\.-]{0,}[a-z0-9]\.[a-z0-9]{2,4}$/;

        if (!polaEmail.test(sEmail)) {
            sMsg += "\nEmail tidak valid";
        }
    }

    if (sUmur == "") {
        sMsg += "\nUmur belum diisi";
    } else if (isNaN(sUmur) || sUmur < 10 || sUmur > 18) {
        sMsg += "\nUmur harus berupa angka antara 10 sampai 18";
    }

    if (sKategori == "") {
        sMsg += "\nPilihan lomba belum dipilih";
    }

    if (sMsg != "") {
        alert("Peringatan:\n" + sMsg);
        return false;
    }

    if (sUmur <= 14) {
        sInfo = "Kategori Junior";
    } else {
        sInfo = "Kategori Senior";
    }

    switch (sKategori) {
        case "C":
            sLomba = "Cerdas Cermat";
            break;

        case "P":
            sLomba = "Puisi";
            break;

        case "D":
            sLomba = "Design Poster";
            break;
    }

    alert("Terima kasih " + sNama + "! Anda terdaftar di lomba " + sLomba + " [" + sInfo + "].");

    return false;
}