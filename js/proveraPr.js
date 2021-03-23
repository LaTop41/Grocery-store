function proveraPr(){
	var selektovanaVr = document.getElementById("kriterijumDropDown").value; 
	var kriterijumInput = document.getElementById("podatak1");
	if(selektovanaVr == "idProizvoda"){
		kriterijumInput.value = "";
		kriterijumInput.setAttribute("type", "number");
		kriterijumInput.setAttribute("placeholder", "ID proizvoda");
		kriterijumInput.setAttribute("min", "0");
	}
	if(selektovanaVr == "naziv"){
		kriterijumInput.value = "";
		kriterijumInput.removeAttribute("min");
		kriterijumInput.setAttribute("type", "naziv");
		kriterijumInput.setAttribute("placeholder", "Naziv");
	}
}