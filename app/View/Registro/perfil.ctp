<?php

    if(isset($error))
    {
        header("Location: /UCABsocial/Home/error");
        exit;        
    }

    if(isset($Usuariovista[0]['users']['id']))
    {
        $idUserP = $Usuariovista[0]['users']['id'];  
    }
    else 
    {
        $idUserP = '';
    }
   
    if(isset($Usuariovista[0]['users']['nombre']))
    {
        $primernombre = $Usuariovista[0]['users']['nombre'];        
    }
    else 
    {
        $primernombre = '';
    }

    if(isset($Usuariovista[0]['users']['nombre2']))
    {
        $segundonombre = $Usuariovista[0]['users']['nombre2'];        
    }
    else 
    {
        $segundonombre = '';
    }

    if(isset($Usuariovista[0]['users']['apellido']))
    {
        $primerapellido = $Usuariovista[0]['users']['apellido'];        
    }
    else 
    {
        $primerapellido = '';
    }

    if(isset($Usuariovista[0]['users']['apellido2']))
    {
        $segundoapellido = $Usuariovista[0]['users']['apellido2'];        
    }
    else 
    {
        $segundoapellido = '';
    }

    if(isset($Usuariovista[0]['users']['username']))
    {
        $usernameUsuario = $Usuariovista[0]['users']['username'];        
    }
    else 
    {
        $usernameUsuario = '';
    }

    if(isset($Usuariovista[0]['users']['email']))
    {
        $emailUsuario = $Usuariovista[0]['users']['email'];        
    }
    else 
    {
        $emailUsuario = '';
    }

    if(isset($Usuariovista[0]['users']['birthday']))
    {
        $fechaNacimiento = date("d/m/Y", strtotime($Usuariovista[0]['users']['birthday']));        
    }
    else 
    {
        $fechaNacimiento = '';
    }

    if(isset($Usuariovista[0]['users']['descripcion']))
    {
        $descripcion = $Usuariovista[0]['users']['descripcion'];
    }
    else 
    {
        $descripcion = '';
    }    
    
    if(isset($Usuariovista[0]['users']['genero']))
    {
        $sexo = $Usuariovista[0]['users']['genero'];
    }
    else 
    {
        $sexo = '';
    }

    if(isset($Usuariovista[0]['users']['ubicacion']))
    {
        $ubicacionUsuario = $Usuariovista[0]['users']['ubicacion'];
    }
    else 
    {
        $ubicacionUsuario = '';
    }
    
    if(isset($Usuariovista[0]['users']['telefono']))
    {
        $telefonoUsuario = $Usuariovista[0]['users']['telefono'];
    }
    else 
    {
        $telefonoUsuario = '';
    }    

    if(isset($Usuariovista[0]['users']['foto']))
    {
        $imagen = $Usuariovista[0]['users']['foto'];        
    }
    else 
    {
        $imagen = '';
    }    
    
    if(isset($Usuariovista[0]['users']['urlFacebook']))
    {
        $urlFacebook = $Usuariovista[0]['users']['urlFacebook'];
    }
    else 
    {
        $urlFacebook = '';
    }    

    if(isset($Usuariovista[0]['users']['urlTwitter']))
    {
        $urlTwitter = $Usuariovista[0]['users']['urlTwitter'];
    }
    else 
    {
        $urlTwitter = '';
    }    
    
    if(isset($Usuariovista[0]['users']['urlLinkedin']))
    {
        $urlLinkedin = $Usuariovista[0]['users']['urlLinkedin'];
    }
    else 
    {
        $urlLinkedin = '';
    }   
    
    if(isset($Usuariovista[0]['users']['privacidad']))
    {
        $privacidadUsuario = $Usuariovista[0]['users']['privacidad'];
    }
    else 
    {
        $privacidadUsuario = '';
    }       
    
    $logout = $this->Session->read('logout'); 
    
    echo $this->Html->script('validCampoFranz');  
    
?>

<style>
        .dropdown {
                position:relative;
        }
        .dropdown-toggle {
                display:inline-block;
                text-decoration:none;
                -webkit-border-radius:3px;
                -moz-border-radius:3px;
                border-radius:3px;
        }
        .dropdown.open .dropdown-toggle {
                background-color:#ECF0F1;
        }
        .dropdown-menu {
                position:absolute;
                top:100%;
                left:-300%;
                display:none;
                float:right;
                min-width:150px;
                padding:10px 0;
                margin:10px 0 0;
                list-style:none;
                background-color:#ffffff;
                -webkit-background-clip:padding-box;
                -moz-background-clip:padding;
                background-clip:padding-box;
                -webkit-border-radius:3px;
                -moz-border-radius:3px;
                border-radius:3px;
        }
        .dropdown-menu li a {
                display:block;
                padding:10px 20px;
                white-space:nowrap;
                text-decoration:none;
                color:#333333;
        }
        .dropdown-menu li a:hover,.dropdown-menu li a:focus {
                text-decoration:none;
                background-color:#fde8e3;
        }
        .open {
                z-index:1000;
        }
        .open>.dropdown-menu {
                display:block;
        }  
        
        .gradientBoxesWithOuterShadows { 
            padding: 20px;
            background-color: white; 

            /* outer shadows  (note the rgba is red, green, blue, alpha) */
            -webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
            -moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

            /* rounded corners */
            -webkit-border-radius: 12px;
            -moz-border-radius: 7px; 
            border-radius: 7px;

            /* gradients */
            background: -webkit-gradient(linear, left top, left bottom, 
            color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
            background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); 
        }      
        
        .autoCompleteDiv    { 
             position: absolute; 
             border: 1px solid #888; 
             margin: 0px; 
             padding: 2px; 
             display: none; 
             background: white; 
        } 
        .autoCompleteDiv a:hover { 
            background: none; 
            background-color: darkblue; 
            color: white; 
            font-weight: normal; 
        } 
        .autoCompleteDiv a { 
            background: none; 
            background-color: white; 
            color: black; 
            text-decoration: none; 
            padding: 2px; 
            margin: 0px; 
            display: block; 
        } 
        
        select#ddlPrivacidadAlbum {
        -webkit-appearance: button;
        -webkit-border-radius: 2px;
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        -webkit-padding-end: 20px;
        -webkit-padding-start: 2px;
        -webkit-user-select: none;
        background-image: url(../img/icon-selectbox.png), -webkit-linear-gradient(#1ABC9C, #1ABC9C 40%, #1ABC9C);
        background-position: 97% center;
        background-repeat: no-repeat;
        border: 1px solid #AAA;
        color: #ffff;
        font-size: inherit;
        overflow: hidden;
        padding: 8px;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 290px;
        }          
        
        .notification-bubble {
            height: 18px;
            width: 18px;
            background: #f56c7e url(../images/notification-bg-clear.png) no-repeat center center scroll;
            background-image: none\9;
            position: absolute;
            right: 5px;
            top: -10px;
            color: #fff;
            text-shadow: 1px 1px 0 rgba(0, 0, 0, .2);
            text-align: center;
            font-size: 9px;
            line-height: 18px;
            box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17), 0 1px 1px rgba(0, 0, 0, .2);
            -moz-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17), 0 1px 1px rgba(0, 0, 0, .2);
            -webkit-box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .17), 0 1px 1px rgba(0, 0, 0, .2);
            border-radius: 9px;
            font-weight: bold;
            cursor: pointer;
            display: none;
        }
        
</style>
<script>
    
    function AceptarSolicitud(amigo) 
    {
        var valor = "<?php echo $idUserP; ?>";         
          
        $.ajax({
                url:   '/UCABsocial/Friends/aceptarAmigo?fkUsers='+valor+"&fkUsers2="+amigo,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {   
                        $("#spanMensajeDialogo").html('Solicitud de amistad aceptada'); 
                        $("#dialog-mensajes").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                      
                        $("#dialog-mensajes").dialog("open");
                    }                            
                }
        });            
    }    
    
    function RechazarSolicitud(amigo) 
    {
        var valor = "<?php echo $idUserP; ?>";         
          
        $.ajax({
                url:   '/UCABsocial/Friends/rechazarAmigo?fkUsers='+valor+"&fkUsers2="+amigo,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {  
                        $("#spanMensajeDialogo").html('Solicitud de amistad ignorada');                        
                        $("#dialog-mensajes").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente');                             
                        $("#dialog-mensajes").dialog("open");
                    }                            
                }
        });            
    }    
    
    function AbrirDialogo()
    {
        $("#txtNombreAlbum").val("");
        $("#dialog-agregar").dialog("open");                                                                             
    }
    
    function AbrirDialogoEditarAlbum(idAlbum)
    {
        $("#txtIdAlbum").val(idAlbum);      
        $.ajax({
                url:   '/UCABsocial/Albums/listarContenidoAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divContenidoAlbum").html(response);
                    $("#carousel").infiniteCarousel({});                    
                }
        });
        
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentarios").html(response);                    
                }
        });    
        $("#dialog-editar").dialog("open");                                                                             
    }

    function RecargarComentarios()
    {
        $("#txtComentario").val("");
        var idAlbum = $("#txtIdAlbum").val();
        $.ajax({
                url:   '/UCABsocial/Albums/listarComentariosAlbum?codigo='+idAlbum,
                type:  'post',
                success:  function (response) {
                    $("#divComentarios").html(response);                    
                }
        });                                                                              
    }

    function AbrirDialogoEliminar(idAlbum)
    {
        $("#txtAlbumEliminar").val(idAlbum); 
        $("#dialog-eliminar").dialog("open");                                                                             
    }
    
    function AbrirDialogoEliminarComentario(idComentario)
    {
        $("#txtComentarioEliminar").val(idComentario); 
        $("#dialog-eliminar-comentario").dialog("open");                                                                             
    }
    
    function AbrirDialogoAgregarComentarios()
    {
        $("#dialog-agregar-comentarios").dialog("open");                                                                             
    }
    
    function AgregarComentarios()
    {
        var comentario = $("#txtComentario").val();
        var idAlbum = $("#txtIdAlbum").val();
        var fkUsuario = "<?php echo $idUserP; ?>"; 
        
        $.ajax({
                url:   '/UCABsocial/Coments/agregarComentario?comentario='+comentario+'&fkAlbums='+idAlbum+'&fkUsers='+fkUsuario,
                type:  'post',
                success:  function (response) {
                    $("#spanMensajeDialogoInfoComentarios").html('Se ha agregado exitosamente el comentario');                          
                    $("#dialog-info-comentarios").dialog("open");                                        
                }
        });                                                                                    
    }    
    
    function AgregarAlbum() 
    {
        
        if($("#txtNombreAlbum").val() == "")
        {
            var today = new Date();
            var nombreAlbum = "Album (" + today + ")";
        }
         
        var valor = "<?php echo $idUserP; ?>";         
          
        $.ajax({
                url:   '/UCABsocial/Albums/registrar?nombre='+$("#txtNombreAlbum").val()+'&privacidad='+$("#ddlPrivacidadAlbum option:selected").text()+"&fkUsers="+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfo").html('Se ha registrado exitosamente el nuevo Album')                            
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }
    
    function EliminarAlbum() 
    {
        var valor = $("#txtAlbumEliminar").val();    
          
        $.ajax({
                url:   '/UCABsocial/Albums/eliminarAlbum?album='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfo").html('Se ha eliminado exitosamente el nuevo Album');                        
                        $("#dialog-info").dialog("open"); 
                    }                            
                }
        });            
    }
    
    function EliminarComentario() 
    {
        var valor = $("#txtComentarioEliminar").val();    
          
        $.ajax({
                url:   '/UCABsocial/Coments/eliminarComentario?codigo='+valor,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("Fallo") != -1)
                    {                        
                        $("#spanMensajeDialogoInfo").html('Se ha producido un problema intentando eliminar el comentario, por favor intentelo nuevamente'); 
                        $("#dialog-info").dialog("open"); 
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogoInfoComentarios").html('Se ha eliminado exitosamente el comentario');                          
                        $("#dialog-info-comentarios").dialog("open"); 
                    }                            
                }
        });            
    }    
    
  $(function() {
      
        $('#txtComentario').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou0123456789-_.@,;:¿?¡! $'); 
      
        var username = "<?php echo $usernameUsuario; ?>";
        $("#usernameConectado").val(username);        
      
        $("#locations").addClass("todo-search-field"); 
        $('#locations').attr('placeholder', 'Buscar personas');
        $('#locations').css('width', '650px');
      
        $( "#accordion" ).accordion({
           heightStyle: "content"
         });

        $("#togglePerfil").click(function() {
                $(".dropdown").removeClass("open");            
                $("#dropdownPerfil").toggleClass("open");
        });
        $('html').click(function() {
                $(".dropdown").removeClass("open");
        });
        $('#dropdownPerfil').click(function(event){
                event.stopPropagation();
        }); 
        
        $("#toggleNotificaciones").click(function() {
                $(".dropdown").removeClass("open");            
                $("#dropdownNotificaciones").toggleClass("open");
        });

        $('#dropdownNotificaciones').click(function(event){
                event.stopPropagation();
        }); 
        
        $("#toggleSolicitudes").click(function() {
                $(".dropdown").removeClass("open");            
                $("#dropdownSolicitudes").toggleClass("open");
        });

        $('#dropdownSolicitudes').click(function(event){
                event.stopPropagation();
        }); 
        
        $( "#dialog-agregar" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarAlbum();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });    
        
        $( "#dialog-eliminar" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarAlbum();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });    
        
        $( "#dialog-agregar-comentarios" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              AgregarComentarios();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });         
        
        $( "#dialog-mensajes" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Agregar: function() {
              $(this).dialog( "close" );
              location.reload();
            }
          }
        }); 
        
        $( "#dialog-info" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              location.reload();
            }
          }
        }); 
        
        $( "#dialog-info-comentarios" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Aceptar: function() {
              $(this).dialog( "close" );
              RecargarComentarios();
            }
          }
        });         
        
        $( "#dialog-editar" ).dialog({
          modal: true,
          autoOpen: false, 
          closeOnEscape: false,     
          width: 1000,
          height: 700,              
          buttons: {
            Cerrar: function() {
              $(this).dialog( "close" );
            }            
          }
        });  
        
        $( "#dialog-eliminar-comentario" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 600,
          height: 300,              
          buttons: {
            Eliminar: function() {
              $(this).dialog( "close" );
              EliminarComentario();
            },
            Cancelar: function() {
              $(this).dialog( "close" );
            }            
          }
        });        
        
//        $('#locations').focusout(function() {
//                $('#locations').val('');
//                $('#autoCompleteDiv').hide();
//        });         
    
  });
  </script>

  <center>
    <div class="navbar navbar-inverse" style="width: 99.5%;">          
        <ul class="nav navbar-nav navbar-left" style='padding-right:100px'>
          <li>
            <img src="<?php echo $this->webroot; ?>img/logoo.png" width="230" height="90"> 
          </li> 
        </ul>
        <div class="todo-search" style="width:700px; float:left ; margin-top:35px; height:50px; padding-top: 10px">
<!--            <input class="todo-search-field" type="search" value="" placeholder="Buscar personas"  />-->
<!--            <input name="data[locations]" update="autoCompleteDiv" autocompletetext="1" autocompleteurl="/UCABsocial/Registro/auto_complete" autocompleterequestitem="autoCompleteText" type="text" id="locations">-->
                <?php  
                    echo $this->AutoComplete->input( 
                        'locations', 
                        array( 
                            'autoCompleteUrl'=>$this->Html->url(  
                                array( 
                                    'controller'=>'Registro', 
                                    'action'=>'auto_complete', 
                                ) 
                            ), 
                            'autoCompleteRequestItem'=>'autoCompleteText', 
                        ) 
                    ); 
                ?>            
        </div>
        <div id="dropdownPerfil" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 18px">
                <a id="togglePerfil" class="dropdown-toggle" href="#"><span class="fui-gear" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black;">
		    <li><a href="/UCABsocial/Registro/editarForm">Editar Perfil</a></li>
		    <li><a href="<?php echo $logout; ?>">Salir</a></li>
		</ul>
	</div>
        <a href="#"><span style="color: #ECF0F1; font-size:15pt; float:right; margin-top:45px;margin-right: 15px"> <img src="<?php echo $imagen; ?>" width="25" height="25"/>  <?php echo $usernameUsuario; ?></span></a>        
        <div id="dropdownNotificaciones" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px">
                <a id="toggleNotificaciones" class="dropdown-toggle" href="#"><span class="fui-mail" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black; width: 300px;">
		    <li><a href="#">No existen notificaciones</a></li>
		</ul>                
	</div>   
        <div id="dropdownSolicitudes" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 30px">
                <?php  
                    if(count($solicitudesGrafo)>0)
                    {
                        echo '<span class="notification-bubble" title="Notifications" style="background-color: rgb(245, 108, 126); display: inline;">'.count($solicitudesGrafo).'</span>';
                    }
                ?>                         
                <a id="toggleSolicitudes" class="dropdown-toggle" href="#"><span class="fui-user" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black; width: 300px;">
                    <?php 
                        if(count($solicitudesGrafo)>0)
                        {
                            foreach($solicitudesGrafo as $solicitud)
                            {
                                echo "<li><table border='1' style='border: 1px solid black;'><tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black; width:41px; heigth:41px;'><img src='".$solicitud[0]['users']['foto']."' width='40' heigth='40' /></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/index?user=".$solicitud[0]['users']['username']."'>".$solicitud[0]['users']['nombre']." ".$solicitud[0]['users']['apellido']."<a></td></tr><tr><td><a id='btnAceptar' class='btn btn-info btn-lg btn-primary' href='javascript:AceptarSolicitud(".$solicitud[0]['users']['id'].");'>Aceptar</a></td><td><a id='btnAceptar' class='btn btn-info btn-lg btn-danger' href='javascript:RechazarSolicitud(".$solicitud[0]['users']['id'].");'>Rechazar</a></td></tr></table></li>";
                            }
                        }
                        else 
                        {
                            echo "<li><table><tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen solicitudes pendientes</td></tr></table></li>";
                        }
                    ?> 
		</ul>                
	</div>         
    </div>
</center>   
  
  <table cellspacing="1" cellpadding="20" style="margin-left: 7%;">
  <tr>
      <td>
          <div id="divFoto" style="border: 1px solid black; width: 150px; height: 150px; float: left;">
              <img src="<?php echo $imagen; ?>" width="148" height="148"/>
          </div>
      </td>
      <td>
          <h3 align="center"><?php echo $primernombre.' '.$segundonombre.' '.$primerapellido.' '.$segundoapellido;?></h3> 
          <br/>
          <h6><blockquote><?php echo $descripcion; ?></blockquote></h6>                
      </td>
  </tr>
</table>
    
<br/>  
<center>
    <table style="width:90%; border-spacing:0; border-collapse:collapse;">
        <tr>
            <td style="width:25%">
                <div>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <span style="font-size: 17pt"> <img src='../img/friends.png'/> &nbsp;&nbsp; <b>Amigos</b></span><br/>
                        <table>
                            <?php 
                                if(count($amigosGrafo2)>0)
                                {
                                    foreach($amigosGrafo2 as $amigosCompletos2)
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black;'><img src='".$amigosCompletos2[0]['users']['foto']."' width='60' heigth='60' /></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/index?user=".$amigosCompletos2[0]['users']['username']."'>".$amigosCompletos2[0]['users']['nombre']." ".$amigosCompletos2[0]['users']['apellido']."<a></td></tr>";
                                    }
                                }
                                else 
                                {
                                    echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No tienes amigos</td></tr>";
                                }
                            ?>
                        </table>                            
                    </div>
                    <br/>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <table>
                            <tr>
                                <td>
                                    <span style="font-size: 17pt"><img src='../img/profile.png'/> &nbsp;&nbsp; <b>Información</b></span><br/>
                                    <br>                                   
                                    <span style="font-size: 12pt; padding-top: 10px;">Sexo:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $sexo; ?> </a></span><br>                                                                                                          
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>                                    
                                    <span style="font-size: 12pt;">Fecha de Cumpleaños:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $fechaNacimiento; ?> </a></span><br>                                  
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>                                    
                                    <span style="font-size: 12pt;">Vive en:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $ubicacionUsuario; ?> </a>  </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                    <div style="clear: both;"></div> 
                    <br/>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <table>
                            <tr>
                                <td>
                                    <span style="font-size: 17pt"> <img src='../img/contact.png'/> &nbsp;&nbsp; <b>Información de Contacto</b></span><br/>
                                    <br>
                                    <?php if($emailUsuario != '') { ?>
                                    <span style="font-size: 12pt">Email:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $emailUsuario; ?> </a></span><br>                                    
                                    <?php } ?>
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>
                                    <?php if($telefonoUsuario != '') { ?>
                                    <span style="font-size: 12pt">Teléfono:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $telefonoUsuario; ?> </a></span><br>
                                    <?php } ?>                                    
                                    <div style="clear: both; padding-top: 3px; padding-bottom: 2px;"></div>
                                    <?php if($urlFacebook != '') { ?>                                    
                                    <a href="<?php echo $urlFacebook; ?>"><img src="<?php echo $this->webroot; ?>img/facebook.png" /></a>  
                                    <?php } ?>                                       
                                    <?php if($urlTwitter != '') { ?> 
                                    <a href="<?php echo $urlTwitter; ?>"><img src="<?php echo $this->webroot; ?>img/twitter.png" /></a>
                                    <?php } ?> 
                                    <?php if($urlLinkedin != '') { ?>                                     
                                    <a href="<?php echo $urlLinkedin; ?>"><img src="<?php echo $this->webroot; ?>img/linkedin.png" /></a>
                                    <?php } ?>                                     
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                    <div style="clear: both;"></div> 
                    <br/>                    
                </div>
            </td>
            <td style="width:55%; vertical-align: top; padding-left: 20px; ">
                <div style="padding-left: 2%;" class="gradientBoxesWithOuterShadows">
                    <span style="font-size: 17pt"> <img src='../img/media.jpg'/> &nbsp;&nbsp; <b>Contenido Multimedia</b></span>
                    <div id="accordion" style="margin-left:1%;padding-top:10px;">
                        <h3 style="color: #1ABC9C"> <span class="fui-photo"></span>&nbsp;&nbsp; FOTOS</h3>
                        <div>
                            <a style="float: right; width: 170px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogo();"> <span class="fui-photo"></span> Agregar Album </a>
                            <br/><br/>
                            <table>
                                <?php 
                                    if(count($albums)>0)
                                    {
                                        foreach($albums as $album)
                                        {
                                            echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div><img src='../img/album.jpg' width='60' heigth='40' /></div></td></tr><tr><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='javascript:AbrirDialogoEditarAlbum(".$album['albums']['id'].")'>".$album['albums']['nombre']." <a><a href='javascript:AbrirDialogoEliminar(".$album['albums']['id'].");'><span class='fui-cross'></span></a></td></tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen Albums</td></tr>";
                                    }
                                ?>
                            </table>
                        </div>
                        <h3 style="color: #1ABC9C"> <span class="fui-video"></span>&nbsp;&nbsp; VÍDEOS</h3>
                        <div>
                            <p>No existen publicaciones por el momento</p>
                        </div>
                        <h3 style="color:#1ABC9C"> <span class="fui-volume"></span>&nbsp;&nbsp; MÚSICA</h3>
                        <div>
                            <p>No existen publicaciones por el momento</p>
                        </div>
                        <h3 style="color:#1ABC9C"> <span class="fui-cmd"></span>&nbsp;&nbsp; PUBLICACIONES DE MIS AMIGOS</h3>
                        <div>
                            <p>No existen publicaciones por el momento</p>
                        </div>                        
                    </div>
                </div>                    
            </td>
        </tr>
    </table>
  </center>
 
<div id="dialog-agregar" title="Agregar Album">
    <div>                
        <div style="float: left; width: 50%">
            <label><b>Nombre del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <input id="txtNombreAlbum" type="text" value="" class="form-control" />
        </div>
    </div>
    <div style="padding-top: 5px;">                    
        <div style="float: left; width: 50%">
            <label><b>Privacidad del Album:</b></label>
        </div> 
        <div style="float: left; width: 50%">
            <select id="ddlPrivacidadAlbum" style="width: 100%;">
                <option value="1">Público</option>
                <option value="2">Privado</option>
            </select>
        </div>
    </div>
</div>
<div id="dialog-mensajes" title="Solicitudes de Amistad">
  <p>
    <input id="redirectUrl" type="hidden" value=""/>
    <span id="spanMensajeDialogo"></span>
  </p>
</div>
<div id="dialog-info" title="UCABsocial - Albums">
  <p>
    <input id="redirectUrlInfo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfo"></span>
  </p>
</div>
<div id="dialog-info-comentarios" title="UCABsocial - Comentarios">
  <p>
    <input id="redirectUrlInfo" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoComentarios"></span>
  </p>
</div>
<div id="dialog-eliminar" title="Eliminar Album">
  <p>
    <input id="txtAlbumEliminar" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoEliminar">¿Realmente desea eliminar este album?</span>
  </p>
</div>

<div id="dialog-agregar-comentarios" title="Agregar Comentarios">
  <p>
    <span id="spanMensajeDialogoAgregarComentarios">¿Realmente desea agregar este comentario?</span>
  </p>
</div>

<div id="dialog-editar" title="Configuración del Album">
    <input id="txtIdAlbum" type="hidden" value=""/>
    <div class="gradientBoxesWithOuterShadows">
        <h6 style="float: left;">Contenido</h6>  
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:alert('EPA');"> <span class="fui-photo"></span> Agregar Contenido </a>        
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>        
        <div id="divContenidoAlbum" class="jcarousel" style="padding-top: 18px;">
            
        </div>
    </div> 
    <br/>
    <div class="gradientBoxesWithOuterShadows" style="height: auto;">
        <h6 style="float: left;">Comentarios</h6>
        <div style="clear: both;"></div><div style="clear: both;"></div><div style="clear: both;"></div>
        <br/>
        <div id="divComentarios" class="gradientBoxesWithOuterShadows" style="padding-top: 18px;">
            
        </div>
        <div style="clear: both;"></div>
        <br/>
        <div>
            <div style='padding:5px; border-style: solid; border-width: 1px;'>
                <img src="<?php echo $imagen; ?>" width='45' height='45' />
                <textarea id="txtComentario" placeholder="Introduzca un comentario" style="width: 94%; resize: none;"></textarea>
            </div>
        </div>
        <br/>
        <a style="float: right; width: 210px; height: 33px;" class="btn btn-large btn-block btn-primary" href="Javascript:AbrirDialogoAgregarComentarios();"> <span class="fui-new"></span> Agregar Comentario </a>
    </div>
</div>

<div id="dialog-eliminar-comentario" title="Eliminar Comentario">
  <p>
    <input id="txtComentarioEliminar" type="hidden" value=""/>
    <span id="spanMensajeDialogoInfoEliminar">¿Realmente desea eliminar este comentario?</span>
  </p>
</div>