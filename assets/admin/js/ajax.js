	var seconds = 2; 
	var divid = "quickmenu"; 
	var url = "includes/quick-menu.php"; 
	
	function refreshdiv(){

		var xmlHttp;
		try{
			xmlHttp=new XMLHttpRequest(); 
		}
		catch (e){
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); 
			}
			catch (e){
				try{
					xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch (e){
					alert("Tu explorador no soporta AJAX.");
					return false;
				}
			}
		}

		var timestamp = parseInt(new Date().getTime().toString().substring(0, 10));
		var nocacheurl = url+"?t="+timestamp;

		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState== 4 && xmlHttp.readyState != null){
				document.getElementById(divid).innerHTML=xmlHttp.responseText;
				setTimeout('refreshdiv()',seconds*1000);
			}
		}
		xmlHttp.open("GET",nocacheurl,true);
		xmlHttp.send(null);
	}