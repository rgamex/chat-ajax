// JavaScript Document

$(document).ready(function(e) {
	
	
	abrir_dialog();
	
//Guardo el nick de origen y de destino para guardarlos en el objeto chat


	$(".btn_enviar").click(function (e)
	{
		e.preventDefault();//Para evitar que recargue la página(evitar que envie el formulario)
		
		$(".contenedor_modal").toggle();//Para que desaparezca la ventana modal y aparezca el chat	
			
		//Voy a guardar el objeto chat con nick de origen y nick destino
		michat=new chat($("#form_origen").val(),$("#form_destino").val());
		
		
		
					
	});
	
	
//Capturo el botón de submit para mandar los mensajes y guardarlos en la base de datos
	$("#submit").click(function (e){
		e.preventDefault();
		
				
		var mensaje=$(".mensaje").val();
		
	
		//Hago una solicitud a la pagina login.php para guardar en la base de datos los mensaje que envio 
		$.ajax({
			type:"GET",
			dataType:"json",
			url:"paginas/login.php",
			data:	
			{
					"Norigen":michat.origen,
					"Ndestino":michat.destino,
					"msg":mensaje,
					"hora": hora(),
					"fecha": fecha(),
					"ultimo":michat.ultimoID
			},
			
			//Si la operación se ha realizado sin problemas que haga lo siguiente
			success: function(data){
				
				
			console.log(data);
				
			}
			
			
			
			
			
		});
			
			
		
		
	});
	
	setInterval(function(){recogeDatos()},1000); //Para que la siguiente función se ejecute cada segundo
				
});//cierra load

//función para abrir el formulario modal
    function abrir_dialog() {
		
		$(".contenedor_modal").toggle();
		
	
    };
	

//clase chat
function chat(Norigen, Ndestino)
{
	this.origen=Norigen;
	this.destino=Ndestino;
	this.ultimoID=0;
	this.mensajes=[];
	
	
};


	
	
function fecha() //función para averiguar la fecha actual.
{
	var d=new Date();
	
	var anio= d.getFullYear();
	var mes	= d.getMonth();
	var  dia= d.getDay();
	
	if(mes<10)
	{
		mes="0"+mes;	
	}
	
	if(dia<10)
	{
		dia="0"+dia;	
	}
	
	return anio+"-"+mes+"-"+dia;
}

function hora() //función para averiguar la hora actual.
{
	var d=new Date();
	
	var h= d.getHours();
	var m= d.getMinutes();
	
	if (m<10)
	{
		m="0"+m;
	}
	
	return h+":"+m;
	

	
}


//función para saber cual es el ultimo id
function ultimoId(data) 
{
	
	
	$.each(data.mensajes, function(i, item)
	{
		
					
			if(item.ID>michat.ultimoID)
			{
				
				michat.ultimoID=item.ID;
				
			}
					
					
					
						
					
	});	
}


//función para recoger los datos de la base de datos y comprobar que mensajes  tengo y los que no imprimirlos
function recogeDatos()
{

	if(typeof(michat)!="undefined")
	{
		
		ultimoID= michat.ultimoID;
		
		
		$.ajax({
			type:"GET",
			dataType:"json",
			url:"paginas/login.php",
			data:	
			{
					"Norigen":michat.origen,
					"Ndestino":michat.destino,
					"ultimo": ultimoID
			},
			
			success: function(data){
			
			
			
			$.each(data.mensajes, function(i, item) {
					
					divD=$("<div>").attr("class", "divM");// contenedor de los mensajes
					divClear=$("<div></div>").attr("class", "clear");//limpiar float
					
					
					
					if (item.nick_origen==michat.origen)
					{
						console.log(item);
						if(michat.ultimoID!=item.ID)
						{
							mensaje=$("<p>").text(item.mensaje).attr("class", "mensajeO");	
						}
						
						
					}
					else 
					{
						
						mensaje=$("<p>").text(item.mensaje).attr("class", "mensajeD");
						
					}
					
										
    				$(divD).append(mensaje); //añado el p de clase mensajeO a divO
					$(divD).append(divClear); 
					
    			$(".chatbox").append(divD);
				
					
					
					
					
					
				});
				
				ultimoId(data);
				

				
			},
			
			error: function()
			{
			console.log("error");	
			}
		});
	}
	
	
	
}
	
