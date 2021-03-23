function promenaID() {
    var select = document.getElementById("kategorijaDropDown");
    var selectedKategorija = select.options[select.selectedIndex].value;;
    if (selectedKategorija == "pice") {
        document.getElementById("productID").value = "PI" + Math.floor(Math.random() * 999999);
    } else if (selectedKategorija == "meso") {
        document.getElementById("productID").value = "ME" + Math.floor(Math.random() * 999999);
    } else if (selectedKategorija == "voce") {
        document.getElementById("productID").value = "VO" + Math.floor(Math.random() * 999999);
    } else if (selectedKategorija == "pekara") {
        document.getElementById("productID").value = "PE" + Math.floor(Math.random() * 999999);
    } else if (selectedKategorija == "mleko") {
        document.getElementById("productID").value = "ML" + Math.floor(Math.random() * 999999);
    } else if (selectedKategorija == "cokolada") {
        document.getElementById("productID").value = "CO" + Math.floor(Math.random() * 999999);
    } else {
        document.getElementById("productID").value = "SM" + Math.floor(Math.random() * 999999);
    }
    var ID = document.getElementById("productID").value;

}