function comprobarDisponibilidad(){
	var user = $("#usuario").val();
	if(user == ""){
		alert("Ingrese un usuario para comprobar disponibilidad");
		document.getElementById("usuario").focus();
	}else{
		$.post("php/comprobar_disponibilidad.php", {usuario : user}, 
		function(msj){
			if(msj == 1){
				$("#mensajed").html("<b style='color: #166721;'>( * ) Usuario disponible</b>");
				document.getElementById("disponible").value = msj;
			}else if(msj==0){
				$("#mensajed").html("<b style='color: #FF0000;'>( * ) Usuario no disponible</b>");
				document.getElementById("disponible").value = msj;
			}
		})
	}
}