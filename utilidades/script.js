// JavaScript Document
function irAlInicio() {
	window.location = "sistema.php";
}
function irAlInicioUsuario() {
	window.location = "sistema.php?panel=usuarios";
}
function irAlInicioCompany() {
	window.location = "sistema.php?panel=company";
}
function irAlInicioProyecto() {
	window.location = "sistema.php?panel=proyecto";
}
function irAlInicioHistoria() {
	window.location = "sistema.php?panel=historia";
}
function irAlInicioTicket() {
	window.location = "sistema.php?panel=ticket";
}
function irAlInicioLogin() {
	window.location = "index.php?state=ok";
}
		
function calculaventana() {
    var myWidth, myHeight, myHeight2, endonde, xdata;
    
	myWidth = window.innerWidth;
    myHeight = window.innerHeight;
	myHeight2 = myHeight - 100;
	
	endonde = document.getElementById('cargacss');
	xdata = "<style>.panel{height:" + myHeight2 + "px !important;}</style>";
	endonde.innerHTML = xdata;
}