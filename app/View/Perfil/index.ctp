<?php

    $usernameConectado = $this->Session->read('usernameConectado');
    $usuario_session = $this->Session->read('User');
    $usuario_Valores = $this->Session->read('chequeo');

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
    
    $logout = $this->Session->read('logout');
    
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
        
</style>
<script>
    
    function Perfil()
    {
        <?php $idUsuario = $usuario_session['id']; ?>
        var url = "<?php echo $idUsuario; ?>";        
        location.href = '/UCABsocial/Registro/Index?idUsuario='+url;
    }
    
    function AbrirEliminar()
    {
        $("#spanMensajeDialogoConfirmacion").html('Realmente desea eliminar al usuario de sus amigos?');         
        $("#dialog-eliminar").dialog("open");         
    }
    
    function AbrirAgregar()
    {
        $("#spanMensajeDialogoConfirmacionA").html('Realmente desea agregar al usuario a sus amigos?');         
        $("#dialog-agregar").dialog("open");         
    }
    
    function Agregar()
    {
        var friendCode = "<?php echo $Usuariovista[0]['users']['id']; ?>"; 
        var perfilCode = "<?php echo $usuario_Valores['User']['id'] ?>";
          
        $.ajax({
                url:   '/UCABsocial/Friends/registrarAmigo?fkUsers='+friendCode+'&fkUsers2='+perfilCode,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {                        
                        $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-message").dialog("open");                          
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogo").html('Solicitud de amistad enviada. El usuario debe aprobarla para comenzar a ser amigos.');
                        $("#dialog-message").dialog("open");                          
                    }                            
                }
        });
    }    
    
    function Eliminar()
    {
        var friendCode = "<?php echo $Usuariovista[0]['users']['id']; ?>"; 
        var perfilCode = "<?php echo $usuario_Valores['User']['id'] ?>";
          
        $.ajax({
                url:   '/UCABsocial/Friends/eliminarAmigoGrafo?fkUsers='+friendCode+'&fkUsers2='+perfilCode,
                type:  'post',
                success:  function (response) {
                    var resultado = response;
                    if(resultado.indexOf("0") != -1)
                    {                        
                        $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente'); 
                        $("#dialog-message").dialog("open");                          
                    }
                    else
                    {                                                              
                        $("#spanMensajeDialogo").html('El usuario ha sido removido de su lista de amigos');
                        $("#dialog-message").dialog("open");                          
                    }                            
                }
        });
    }    
    
  $(function() {
      
        $( "#accordion" ).accordion({
           heightStyle: "content"
         });
        
        $("#locations").addClass("todo-search-field"); 
        $('#locations').attr('placeholder', 'Buscar personas');        

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
          width: 400,
          height: 400,              
          buttons: {
            Si: function() {
              Agregar();
              $(this).dialog( "close" );
            },
            No: function() {
              $(this).dialog( "close" );
            }                  
          }
        });           
        
        $( "#dialog-eliminar" ).dialog({
          modal: true,
          autoOpen: false, 
          width: 400,
          height: 400,              
          buttons: {
            Si: function() {
              Eliminar();
              $(this).dialog( "close" );
            },
            No: function() {
              $(this).dialog( "close" );
            }                  
          }
        }); 
        
            $( "#dialog-message" ).dialog({
              modal: true,
              autoOpen: false, 
              width: 400,
              height: 400,              
              buttons: {
                Aceptar: function() {
                  $(this).dialog( "close" );
                  location.reload();
                }
              }
            });         
        
//        $('#autoCompleteDiv').focusout(function() {
//                $('#autoCompleteDiv').hide();
//        });         
    
  });
  </script>

  <center>
    <div class="navbar navbar-inverse" style="width: 99.5%;">          
        <ul class="nav navbar-nav navbar-left" style='padding-right:100px'>
          <li>
            <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120"> 
          </li> 
        </ul>
        <div class="todo-search" style="width:300px; float:left ; margin-top:35px; height:50px; padding-top: 10px">
<!--            <input class="todo-search-field" type="search" value="" placeholder="Buscar personas"  />-->
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
        <div id="dropdownPerfil" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 50px">
                <a id="togglePerfil" class="dropdown-toggle" href="#"><span class="fui-gear" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black;">
		    <li><a href="/UCABsocial/Registro/editarForm">Editar Perfil</a></li>
		    <li><a href="<?php echo $logout; ?>">Salir</a></li>
		</ul>
	</div>
        <a href="javascript:Perfil();"><span id="spanUsername" style="color: #ECF0F1; font-size:15pt; float:right; margin-top:45px;margin-right: 15px"> <?php echo $usernameConectado; ?> </span></a>        
        <div id="dropdownNotificaciones" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px">
                <a id="toggleNotificaciones" class="dropdown-toggle" href="#"><span class="fui-mail" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black;">
		    <li><a href="#">Editar Perfil</a></li>
		    <li><a href="#">Privacidad</a></li>
		    <li><a href="#">Salir</a></li>
		</ul>
	</div>   
        <div id="dropdownSolicitudes" class="dropdown" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px">
                <a id="toggleSolicitudes" class="dropdown-toggle" href="#"><span class="fui-user" ></span></a>
                <ul class="dropdown-menu" style="border: 1px solid black;">
		    <li><a href="#">Editar Perfil</a></li>
		    <li><a href="#">Salir</a></li>
		</ul>
	</div>         
    </div>
</center>      
  <center>
      <table cellspacing="1" cellpadding="20">
        <tr>
            <td>
                <div id="divFoto" style="border: 1px solid black; width: 150px; height: 150px; float: left;">
                    <img src="../img/facebook350.jpg" width="148" height="148"/>
                </div>
            </td>
            <td>
                <h3 align="center"><?php echo $primernombre.' '.$segundonombre.' '.$primerapellido.' '.$segundoapellido;?></h3> 
                <br/>
                <h6><blockquote><?php echo $descripcion; ?></blockquote></h6>                
            </td>
        </tr>
    </table>
    <table style="float: right; margin-right: 15%; padding-bottom: 25px;">
        <tr>
            <?php 
                if($esAmigo=='si')
                {
                    echo "<td style='padding-bottom: .5em;'><a class='btn btn-large btn-block btn-inverse' style='height: 30px; width:200px;' href='javascript:AbrirEliminar();'><span class='input-icon fui-cross' style='margin-right: 3%;'></span>Eliminar de mis Amigos</a></td>";
                }
                else 
                {
                    echo "<td style='padding-bottom: .5em;'><a class='btn btn-large btn-block btn-inverse' style='height: 30px; width:200px;' href='javascript:AbrirAgregar();'><span class='input-icon fui-plus' style='margin-right: 3%;'></span>Agregar a mis Amigos</a></td>";
                }
            ?>          
        </tr>
    </table>
    <br/>
  </center>
    
<br/>  
<center>
    <table style="width:75%; border-spacing:0; border-collapse:collapse;">
        <tr>
            <td style="width:25%">
                <div>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <table>
                            <tr>
                                <td>
                                    <span style="font-size: 17pt"><b>Información</b></span><br/>
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
                                    <span style="font-size: 17pt"><b>Información de Contacto</b></span><br/>
                                    <br>                                   
                                    <span style="font-size: 12pt">Email:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $emailUsuario; ?> </a></span><br>                                    
                                    <div style="clear: both; padding-top: 2px; padding-bottom: 2px;"></div>
                                    <span style="font-size: 12pt">Teléfono:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $telefonoUsuario; ?> </a></span><br>
                                    <div style="clear: both; padding-top: 3px; padding-bottom: 2px;"></div>
                                    <a href="<?php echo $urlFacebook; ?>"><img src="<?php echo $this->webroot; ?>img/facebook.png" /></a>  <a href="<?php echo $urlTwitter; ?>"><img src="<?php echo $this->webroot; ?>img/twitter.png" /></a>   <a href="<?php echo $urlLinkedin; ?>"><img src="<?php echo $this->webroot; ?>img/linkedin.png" /></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                    <div style="clear: both;"></div> 
                    <br/>
                    <div style="padding-top:30px" class="gradientBoxesWithOuterShadows">
                        <span style="font-size: 17pt"><b>Amigos</b></span><br/>
                        <table>
                            <?php 
                                if(count($amigosGrafo2)>0)
                                {
                                    foreach($amigosGrafo2 as $amigosCompletos2)
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black;'><img src='../img/facebook350.jpg' width='80' heigth='80' /></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/index?user=".$amigosCompletos2[0]['users']['username']."'>".$amigosCompletos2[0]['users']['nombre']." ".$amigosCompletos2[0]['users']['apellido']."<a></td></tr>";
                                    }
                                }
                                else 
                                {
                                    echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No tienes amigos</td></tr>";
                                }
                            ?>
                        </table>                            
                    </div>                     
                </div>
            </td>
            <td style="width:55%; vertical-align: top; padding-left: 20px; ">
                <div style="padding-left: 2%;" class="gradientBoxesWithOuterShadows">
                    <span style="font-size: 17pt"><b>Contenido Multimedia</b></span>
                    <div id="accordion" style="margin-left:10%;padding-top:10px;">
                        <h3 style="color: #1ABC9C">FOTOS</h3>
                        <div>
                            <span class="input-icon fui-photo" style="margin-right: 3%;"><a href="Javascript:AbrirDialogo();">   AGREGAR ALBUM </a></span>
                            <br/>
                            <table>
                                <?php 
                                    if(count($albums)>0)
                                    {
                                        foreach($albums as $album)
                                        {
                                            echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'><div style='border: 1px solid black;'><img src='../img/album.jpg' width='80' heigth='80' /></div></td><td style='padding-left: 5px; padding-top: .5em; padding-bottom: .5em;'><a href='/UCABsocial/Perfil/album?code=".$album['albums']['id']."'>".$album['albums']['nombre']." <a></td></tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr><td style='padding-top: .5em; padding-bottom: .5em;'>No existen Albums</td></tr>";
                                    }
                                ?>
                            </table>
                        </div>
                        <h3 style="color: #1ABC9C">VÍDEOS</h3>
                        <div>
                            <p>No existen publicaciones por el momento</p>
                        </div>
                        <h3 style="color:#1ABC9C">MÚSICA</h3>
                        <div>
                            <p>No existen publicaciones por el momento</p>
                        </div>
                    </div>
                </div>                    
            </td>
        </tr>
    </table>
  </center>
<div id="dialog-eliminar" title="Eliminar">
  <p>
    <span id="spanMensajeDialogoConfirmacion"></span>
  </p>
</div>
<div id="dialog-agregar" title="Agregar">
  <p>
    <span id="spanMensajeDialogoConfirmacionA"></span>
  </p>
</div>
<div id="dialog-message" title="Eliminar">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
    <input id="redirectUrl" type="hidden" value=""/>
    <span id="spanMensajeDialogo"></span>
  </p>
</div>