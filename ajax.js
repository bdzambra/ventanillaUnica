
function validarloggin(pass)
{
		var xmlhttp;
		var cedula=document.getElementById('cedula').value;
		var pass=document.getElementById('pword').value;
		
		
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("registrar").innerHTML=xmlhttp.responseText;
			}
			}
			
			xmlhttp.open("POST","validar.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('cedula='+cedula+'&pass='+pass);
}

function cero(cedula)
{
		var xmlhttp;
		var cedula=document.getElementById('cedula').value;
		
		
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("registrar").innerHTML=xmlhttp.responseText;
			}
			}
			
			xmlhttp.open("POST","cero.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('cedula='+cedula);
}

function completar(str)
{
		var xmlhttp;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;


				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					document.getElementById("consultacheckli").innerHTML=xmlhttp.responseText;
					}
				}				
				xmlhttp.open("POST","consultachecklis.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('q='+str+"&nombrefuncionario="+nombrefuncionario);
}

function imprimirrequisitosagregados(str)
{
		var xmlhttp;
		var contador=document.getElementById('contador').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
		var tipo=document.getElementById('q').value;
		var cant=0;   
		var requisitospresentados=[];
		var requisitosfaltantes=[];

		for (i = 1; i <= contador; i++) 
		{ 
			if (document.getElementById("Check".concat(i)).checked){cant++;requisitospresentados.push(i);}
			else{requisitosfaltantes.push(i);}
		}

		
			
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("checkli").innerHTML=xmlhttp.responseText;
				}
				}				
				xmlhttp.open("POST","datosusuarios.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('tipo='+tipo+'&conteo='+cant+'&requisitospresentados='+requisitospresentados+"&requisitosfaltantes="+requisitosfaltantes);
				if(str=="IMPRIMIR")
				{
					window.open("imprimir.php?tipo="+tipo+"&requisitosfaltantes="+requisitosfaltantes+"&requisitospresentados="+requisitospresentados+"&nombrefuncionario="+nombrefuncionario+"", "Diseño Web", "width=1000, height=1000")
				}

}

function continuar(str)
{
		var xmlhttp;
		var contador=document.getElementById('contador').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
		var tipo=document.getElementById('q').value;
		var cant=0;   
		var requisitospresentados=[];
		var requisitosfaltantes=[];

		for (i = 1; i <= contador; i++) 
		{ 
			if (document.getElementById("Check".concat(i)).checked){cant++;requisitospresentados.push(i);}
			else{requisitosfaltantes.push(i);}
		}

		
			
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function()
				{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById("checkli").innerHTML=xmlhttp.responseText;
				}
				}				
				xmlhttp.open("POST","datosusuarios.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send('tipo='+tipo+'&conteo='+cant+'&requisitospresentados='+requisitospresentados+"&requisitosfaltantes="+requisitosfaltantes);
				if(str=="IMPRIMIR")
				{
					window.open("imprimir.php?tipo="+tipo+"&requisitosfaltantes="+requisitosfaltantes+"&requisitospresentados="+requisitospresentados+"&nombrefuncionario="+nombrefuncionario+"", "Diseño Web", "width=1000, height=1000")
				}

}

function registrarse()
{
	
		var xmlhttp;
		var cedula=document.getElementById('cedula').value;
		var pass=document.getElementById('pword').value;

			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("registrar").innerHTML=xmlhttp.responseText;
			}
			}		
			xmlhttp.open("POST","regristrarse.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('cedula='+cedula+'&pass='+pass);			
}

function ingresofuncionario()
{
	
		var xmlhttp;
		var cedula=document.getElementById('cedula').value;
		var nick=document.getElementById('nick').value;
		var clave=document.getElementById('clave').value;

			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("registrar").innerHTML=xmlhttp.responseText;
			}
			}		
			xmlhttp.open("POST","ingresofuncionario.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('cedula='+cedula+'&nick='+nick+'&clave='+clave);			
}

function iniciarpermiso()
{
		var xmlhttp;
		var cedula=document.getElementById('cedula').value;
		
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
			}
			}
	
			xmlhttp.open("POST","menu.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('cedula='+cedula);
}


function imprimirtramiteingresado()
{
		var xmlhttp;
		var tipo=document.getElementById('tipo').value;
		var sitio=document.getElementById('sitio').value;
		var parroquia=document.getElementById('parroquia').value;
		var canton=document.getElementById('canton').value;
		var provincia=document.getElementById('provincia').value;
		var observacion=document.getElementById('observacion').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
		var tramitador=document.getElementById('tramitador').value;
		var cedula2=document.getElementById('cedula2').value;
		var notramite=document.getElementById('notramite').value;
		var requisitosfaltantes=document.getElementById('requisitosfaltantes').value;


		if(tipo==13)
		{
			var cedula3=document.getElementById('cedula3').value;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("POST","ingreso.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("tipo="+tipo+'&sitio='+sitio+'&parroquia='+parroquia+'&canton='+canton+'&provincia='+provincia+'&observacion='+observacion+'&nombrefuncionario='+nombrefuncionario+'&cedula2='+cedula2+'&tramitador='+tramitador+'&cedula3='+cedula3);
			window.open("imprimirtramitepdf.php?tipo="+tipo+"&requisitosfaltantes="+requisitosfaltantes+"&sitio="+sitio+"&parroquia="+parroquia+"&canton="+canton+"&provincia="+provincia+"&observacion="+observacion+"&nombrefuncionario="+nombrefuncionario+"&cedula2="+cedula2+"&tramitador="+tramitador+"&cedula3="+cedula3+"&notramite="+notramite+"", "_self ", "width=1000, height=1000")
		}
		else
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
		  else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		   
		  xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			  {
				  document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
			  }
			}
		  
		  xmlhttp.open("POST","ingreso.php",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("tipo="+tipo+'&sitio='+sitio+'&parroquia='+parroquia+'&canton='+canton+'&provincia='+provincia+'&observacion='+observacion+'&nombrefuncionario='+nombrefuncionario+'&cedula2='+cedula2+'&tramitador='+tramitador);
		 window.open("imprimirtramitepdf.php?tipo="+tipo+"&requisitosfaltantes="+requisitosfaltantes+"&sitio="+sitio+"&parroquia="+parroquia+"&canton="+canton+"&provincia="+provincia+"&observacion="+observacion+"&nombrefuncionario="+nombrefuncionario+"&cedula2="+cedula2+"&tramitador="+tramitador+"&notramite="+notramite+"", "_self ", "width=1000, height=1000")
		}
	}
function generarnumeroingresotramite()
{
		var xmlhttp;
		var tipo=document.getElementById('tipotra').value;
		var sitio=document.getElementById('sitio').value;
		var parroquia=document.getElementById('parroquia1').value;
		var canton=document.getElementById('canton').value;
		var provincia=document.getElementById('provincia').value;
		var observacion=document.getElementById('observacion').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
		var tramitador=document.getElementById('tramitador').value;
		var cedula2=document.getElementById('cedula2').value;
		var requisitospresentados=document.getElementById('requisitospresentados').value;
		var requisitosfaltantes=document.getElementById('requisitosfaltantes').value;
		if(tipo==13)
		{
			var cedula3=document.getElementById('cedula3').value;
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("POST","imprimirtramite.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("tipo="+tipo+'&sitio='+sitio+"&requisitosfaltantes="+requisitosfaltantes+'&parroquia='+parroquia+'&canton='+canton+'&provincia='+provincia+'&observacion='+observacion+'&nombrefuncionario='+nombrefuncionario+'&cedula2='+cedula2+'&tramitador='+tramitador+'&cedula3='+cedula3+'&requisitospresentados='+requisitospresentados);
		//	window.open("imprimirtramite.php?tipo="+tipo+"&sitio="+sitio+"&parroquia="+parroquia+"&canton="+canton+"&provincia="+provincia+"&observacion="+observacion+"&nombrefuncionario="+nombrefuncionario+"&cedula2="+cedula2+"&tramitador="+tramitador+"&cedula3="+cedula3+"", "_self ", "width=1000, height=1000")
		}
		else
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
		  else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		   
		  xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			  {
				  document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
			  }
			}
		  
		  xmlhttp.open("POST","imprimirtramite.php",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("tipo="+tipo+'&sitio='+sitio+"&requisitosfaltantes="+requisitosfaltantes+'&parroquia='+parroquia+'&canton='+canton+'&provincia='+provincia+'&observacion='+observacion+'&nombrefuncionario='+nombrefuncionario+'&cedula2='+cedula2+'&tramitador='+tramitador+'&requisitospresentados='+requisitospresentados);
		 //window.open("imprimirtramite.php?tipo="+tipo+"&sitio="+sitio+"&parroquia="+parroquia+"&canton="+canton+"&provincia="+provincia+"&observacion="+observacion+"&nombrefuncionario="+nombrefuncionario+"&cedula2="+cedula2+"&tramitador="+tramitador+"", "_self ", "width=1000, height=1000")
		}
	}
function agregartramite()
{
		var xmlhttp;
		var cedula=0;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","ingreso.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cedula="+cedula);
}
function loadtramite()
{
		var xmlhttp;
		var n=document.getElementById('numerotramite').value;
		n=n.toUpperCase();

		if(n=='')
		{
			document.getElementById("numerostramites").innerHTML="";
			return;
		}

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("numerostramites").innerHTML=xmlhttp.responseText;
			}
		}		
		
		
		xmlhttp.open("POST","consultastramites.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+n);
}





function completartramite()
{
		var xmlhttp;
		var cedula=0;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","ingresotramitecompleto.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cedula="+cedula);
}
function imprimirotravez()
{
		var xmlhttp;
		var cedula=0;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("ventanainicio").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","datosimprimir.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cedula="+cedula);
}

function imprimirtramite(notramite)
{
		var xmlhttp;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
			window.open("imprimirtramiteotravez.php?notramite="+notramite+"&nombrefuncionario="+nombrefuncionario, "_self ", "width=1000, height=1000")

}

function loadcedula()
{
		var xmlhttp;
		var xmlhttp1;
		var n=document.getElementById('bus').value;
		n=n.toUpperCase();

		if(n==''){
		document.getElementById("myDiv2").innerHTML="";
		document.getElementById("myDiv3").innerHTML="";

		return;
		}

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("myDiv2").innerHTML=xmlhttp.responseText;
		}
		}		
		xmlhttp1.onreadystatechange=function()
		{
		if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
		document.getElementById("myDiv3").innerHTML=xmlhttp1.responseText;
		}
		}
		
		xmlhttp.open("POST","proc2.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+n);
		
		xmlhttp1.open("POST","cero.php",true);
		xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp1.send("q="+n);
}

function agregarusuariotramite1(str)
{
		var xmlhttp;
		var xmlhttp1;
		var xmlhttp2;

	

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
		}
		
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");

		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("borrar").innerHTML=xmlhttp.responseText;
		}
		}		

		xmlhttp1.onreadystatechange=function()
		{
		if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
		document.getElementById("myDiv5").innerHTML=xmlhttp1.responseText;
		}
		}
		
		
		xmlhttp.open("POST","agregarusuariotramite1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);
		
		xmlhttp1.open("POST","cero.php",true);
		xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp1.send("q="+str);
}

function agregarusuariotramite(str)
{
		var xmlhttp;
		var xmlhttp1;
		var xmlhttp2;

	

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
		}
		
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");

		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("borrar1").innerHTML=xmlhttp.responseText;
		}
		}		

		xmlhttp1.onreadystatechange=function()
		{
		if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
		document.getElementById("myDiv3").innerHTML=xmlhttp1.responseText;
		}
		}
		
		
		xmlhttp.open("POST","agregarusuariotramite.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);
		
		xmlhttp1.open("POST","cero.php",true);
		xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp1.send("q="+str);
}


function loadcedula1()
{
		var xmlhttp;
		var xmlhttp1;
		var n=document.getElementById('bus1').value;
		n=n.toUpperCase();

		if(n==''){
		document.getElementById("myDiv4").innerHTML="";
		document.getElementById("myDiv5").innerHTML="";

		return;
		}

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("myDiv4").innerHTML=xmlhttp.responseText;
		}
		}		
		xmlhttp1.onreadystatechange=function()
		{
		if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
		document.getElementById("myDiv5").innerHTML=xmlhttp1.responseText;
		}
		}
		
		xmlhttp.open("POST","proc3.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+n);
		
		xmlhttp1.open("POST","cero.php",true);
		xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp1.send("q="+n);
}

function autocompletar(str)
{
		var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","mostrarusuario.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);
}
function modificarusuario(str)
{
		var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","modificarusuario.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);
}

function modificarusuario1(str)
{
		var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv5").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","modificarusuario1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);
}

function agregarusuariomodificado(str)
{
		var xmlhttp;
		var razon=document.getElementById('razon').value;
		var nombre=document.getElementById('nombre').value;
		var correo=document.getElementById('correo').value;
		var celular=document.getElementById('celular').value;
		var telefono=document.getElementById('telefono').value;
		var nombrepatrocinador=document.getElementById('nombrepatrocinador').value;
		var correonotificacion=document.getElementById('correonotificacion').value;
		var celularnotificacion=document.getElementById('celularnotificacion').value;
		var telefononotificacion=document.getElementById('telefononotificacion').value;
		var rucrepre=document.getElementById('rucrepre').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;


		if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
			}
			}		
			xmlhttp.open("POST","mostrarusuariomodificado.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('ruc='+str+'&razon='+razon+'&nombre='+nombre+'&correo='+correo+'&celular='+celular+'&telefono='+telefono+'&nombrepatrocinador='+nombrepatrocinador+'&correonotificacion='+correonotificacion+'&celularnotificacion='+celularnotificacion+'&telefononotificacion='+telefononotificacion+'&rucrepre='+rucrepre+'&nombrefuncionario='+nombrefuncionario);			
}

function agregarusuariomodificado1(str)
{
		var xmlhttp;
		var razon1=document.getElementById('razon1').value;
		var nombre1=document.getElementById('nombre1').value;
		var correo1=document.getElementById('correo1').value;
		var celular1=document.getElementById('celular1').value;
		var telefono1=document.getElementById('telefono1').value;
		var nombrepatrocinador1=document.getElementById('nombrepatrocinador1').value;
		var correonotificacion1=document.getElementById('correonotificacion1').value;
		var celularnotificacion1=document.getElementById('celularnotificacion1').value;
		var telefononotificacion1=document.getElementById('telefononotificacion1').value;
		var rucrepre=document.getElementById('rucrepre').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;


		if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("myDiv5").innerHTML=xmlhttp.responseText;
			}
			}		
			xmlhttp.open("POST","mostrarusuariomodificado1.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('ruc1='+str+'&razon1='+razon1+'&nombre1='+nombre1+'&correo1='+correo1+'&celular1='+celular1+'&telefono1='+telefono1+'&nombrepatrocinador1='+nombrepatrocinador1+'&correonotificacion1='+correonotificacion1+'&celularnotificacion1='+celularnotificacion1+'&telefononotificacion1='+telefononotificacion1+'&rucrepre='+rucrepre+'&nombrefuncionario='+nombrefuncionario);			
}

function insertarusuario()
{
		var xmlhttp;
		var ruc=document.getElementById('ruc').value;
  		var razon=document.getElementById('razon').value;
		var nombre=document.getElementById('nombre').value;
		var correo=document.getElementById('correo').value;
		var celular=document.getElementById('celular').value;
		var telefono=document.getElementById('telefono').value;
		var nombrepatrocinador=document.getElementById('nombrepatrocinador').value;
		var correonotificacion=document.getElementById('correonotificacion').value;
		var celularnotificacion=document.getElementById('celularnotificacion').value;
		var telefononotificacion=document.getElementById('telefononotificacion').value;
		var rucrepre=document.getElementById('rucrepre').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;

		if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
			}
			}		
			xmlhttp.open("POST","insertarusuario.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('ruc='+ruc+'&razon='+razon+'&nombre='+nombre+'&correo='+correo+'&celular='+celular+'&telefono='+telefono+'&nombrepatrocinador='+nombrepatrocinador+'&correonotificacion='+correonotificacion+'&celularnotificacion='+celularnotificacion+'&telefononotificacion='+telefononotificacion+'&rucrepre='+rucrepre+'&nombrefuncionario='+nombrefuncionario);			
}


function insertarusuario1()
{
		var xmlhttp;
		var ruc1=document.getElementById('ruc1').value;
  		var razon1=document.getElementById('razon1').value;
		var nombre1=document.getElementById('nombre1').value;
		var correo1=document.getElementById('correo1').value;
		var celular1=document.getElementById('celular1').value;
		var telefono1=document.getElementById('telefono1').value;
		var nombrepatrocinador1=document.getElementById('nombrepatrocinador1').value;
		var correonotificacion1=document.getElementById('correonotificacion1').value;
		var celularnotificacion1=document.getElementById('celularnotificacion1').value;
		var telefononotificacion1=document.getElementById('telefononotificacion1').value;
		var rucrepre=document.getElementById('rucrepre').value;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
		if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("myDiv5").innerHTML=xmlhttp.responseText;
			}
			}		
			xmlhttp.open("POST","insertarusuario1.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send('ruc1='+ruc1+'&razon1='+razon1+'&nombre1='+nombre1+'&correo1='+correo1+'&celular1='+celular1+'&telefono1='+telefono1+'&nombrepatrocinador1='+nombrepatrocinador1+'&correonotificacion1='+correonotificacion1+'&celularnotificacion1='+celularnotificacion1+'&telefononotificacion1='+telefononotificacion1+'&rucrepre='+rucrepre+'&nombrefuncionario='+nombrefuncionario);			
}


function autocompletar1(str)
{
		var xmlhttp;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv5").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","mostrarusuario1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);
}

function agregarusuario()
{
		var xmlhttp;
		var cedula=0;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv3").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","agregarusuario.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cedula="+cedula);
}

function agregarusuario1()
{
		var xmlhttp;
		var cedula=0;
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("myDiv5").innerHTML=xmlhttp.responseText;
			}
		  }
		
		xmlhttp.open("POST","agregarusuario1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cedula="+cedula);
}

function canton()
{
		var xmlhttp;
		var n=document.getElementById('provincia').value;
		if(n==''){
		document.getElementById("canton1").innerHTML="";
		return;
		}

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("canton1").innerHTML=xmlhttp.responseText;
		}
		}
		xmlhttp.open("POST","cantones.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+n);
}

function parroquia()
{
		var xmlhttp;
		var n=document.getElementById('canton').value;

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("parroquia1").innerHTML=xmlhttp.responseText;
		}
		}
		xmlhttp.open("POST","parroquias.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+n);
}

function tipotramite()
{
		var xmlhttp;
		var xmlhttp1;
	
		var n=document.getElementById('tipotra').value;

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		xmlhttp1=new XMLHttpRequest();
		
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("numerodeusuarios").innerHTML=xmlhttp.responseText;
			}
		}
		
		
		xmlhttp1.onreadystatechange=function()
		{
			if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
			{
			document.getElementById("checkli").innerHTML=xmlhttp1.responseText;
			}
		}

		xmlhttp.open("POST","numerodeusuariostramite.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+n);

		xmlhttp1.open("POST","checklis.php",true);
		xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp1.send("q="+n);
}


function autocompletartramite(str)
{
		var xmlhttp;
		var xmlhttp1;
		var nombrefuncionario=document.getElementById('nombrefuncionario').value;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  xmlhttp1=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("detalletramite").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp1.onreadystatechange=function()
			{
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
				{
					document.getElementById("consultacheckli").innerHTML=xmlhttp1.responseText;
				}
			}
		
		xmlhttp.open("POST","detalletramite.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("q="+str);

		xmlhttp1.open("POST","consultachecklis.php",true);
		xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp1.send("q="+str+"&nombrefuncionario="+nombrefuncionario);


}
