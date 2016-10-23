
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<!-- Jquery -->

<script src="js/jquery-1.12.0.js"></script>
<!--CDN de bootstrap-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css">

<!-- jQuery library -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>


<!-- estilos propios -->

<link rel="stylesheet" href="estilos.css" type="text/css" media="screen" />

<!-- link para javascipt -->
<script src="js/js.js" ></script>

</head>

<body>

<!-- Ventana modal para pedir formulario para chat-->
	<div class="container-fluid contenedor_modal" style="display:none">
    	<div class=" container contenido_modal">
        	<div class="header_modal"><h2>Rellene todos los campos para iniciar el chat</h2></div>
            <div class="form_modal">
            
            	<form action="" method="get">
                	<label>Tu Nick<input type="text" name="nick_origen"  class="form-control form_nombre" id="form_origen"/></label>
                    <label>Nick del otro participante <input type="text" name="nick_destino"  id="form_destino"class="form-control form_nombre"/></label>
                     </select>
                    </label>
                    
                   	<input type="submit" name="Enviar" value="Enviar" class="btn-info btn_enviar center-block"/>
                </form>
             
            </div>
        
        </div>
    </div>


<!-- Creo la cabecera de la página -->
	<header class="container-fluid">
    	<div class="row">
        	<div class=" col-xs-12">
            	<h1 class="text-center text-capitalize text-info">Chat de Raúl Gámez</h1>
            </div>
         </div>
    
    </header>

    <div class="container contenedor-chat">
    	<!-- Creo la cabecera de la página -->	
        <div class="row cabecera-chat">
        	<div class=" col-xs-12">
            	<h1 class="text-center text-capitalize text-info">Chat</h1>
            </div>
        </div>
    	<div class="row chatbox">
        	<div class="col-xs-12 ">
            	
            </div>
        </div>
        
        
        <!-- voy a crear el formulario para poder mandar el mensaje -->
        
        <div class="row chatform">
        	<div class="col-xs-12 ">
            	<form action="paginas/login.php" method="get" >
                	<input type="text" name="mensaje" placeholder="Escriba su mensaje aquí"  class="form-control  mensaje"/>
                    <input type="submit" name="enviar" value="Enviar" class="btn btn-primary" id="submit"/>
                </form>
            </div>
        </div>
    </div>
    

    
</body>
</html>