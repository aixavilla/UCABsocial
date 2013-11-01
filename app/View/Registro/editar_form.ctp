<?php

    if(isset($perfilEditar[0]['users']['id']))
    {
        $idUsuarioPerfil = $perfilEditar[0]['users']['id'];        
    }
    else 
    {
        $idUsuarioPerfil = '';
    }

    if(isset($perfilEditar[0]['users']['nombre']))
    {
        $primerNombre = $perfilEditar[0]['users']['nombre'];        
    }
    else 
    {
        $primerNombre = '';
    }
    
    if(isset($perfilEditar[0]['users']['nombre2']))
    {
        $segundoNombre = $perfilEditar[0]['users']['nombre2'];        
    }
    else 
    {
        $segundoNombre = '';
    }
    
    if(isset($perfilEditar[0]['users']['apellido']))
    {
        $primerApellido = $perfilEditar[0]['users']['apellido'];        
    }
    else 
    {
        $primerApellido = '';
    }    

    if(isset($perfilEditar[0]['users']['apellido2']))
    {
        $segundoApellido = $perfilEditar[0]['users']['apellido2'];        
    }
    else 
    {
        $segundoApellido = '';
    }
    
    if(isset($perfilEditar[0]['users']['genero']))
    {
        if($perfilEditar[0]['users']['genero'] == 'Masculino')
        {    
            $genero = 2;
        }
        else 
        {
            $genero = 1;
        }
    }
    else 
    {
        $genero = 0;
    }
    
    if(isset($perfilEditar[0]['users']['birthday']))
    {
        $fechaNacimientoPrevia = $perfilEditar[0]['users']['birthday'];
        $fechaNacimiento = date("d-m-Y", strtotime($fechaNacimientoPrevia));        
    }
    else 
    {
        $fechaNacimiento = '';
    } 
    
    if(isset($perfilEditar[0]['users']['email']))
    {
        $email = $perfilEditar[0]['users']['email'];        
    }
    else 
    {
        $email = '';
    }    
    
    if(isset($perfilEditar[0]['users']['username']))
    {
        $username = $perfilEditar[0]['users']['username'];        
    }
    else 
    {
        $username = '';
    }    
    
    if(isset($perfilEditar[0]['users']['telefono']))
    {
        $telefono = $perfilEditar[0]['users']['telefono'];        
    }
    else 
    {
        $telefono = '';
    }    
    
    if(isset($perfilEditar[0]['users']['descripcion']))
    {
        $descripcion = $perfilEditar[0]['users']['descripcion'];        
    }
    else 
    {
        $descripcion = '';
    }      
    
    if(isset($perfilEditar[0]['users']['ubicacion']))
    {
        $ubicacion = $perfilEditar[0]['users']['ubicacion'];        
    }
    else 
    {
        $ubicacion = '';
    } 
    
    if(isset($perfilEditar[0]['users']['privacidad']))
    {
        $privacidad = $perfilEditar[0]['users']['privacidad'];        
    }
    else 
    {
        $privacidad = '';
    }    
    
    if(isset($perfilEditar[0]['users']['urlFacebook']))
    {
        $urlFacebook = $perfilEditar[0]['users']['urlFacebook'];        
    }
    else 
    {
        $urlFacebook = '';
    }    
    
    if(isset($perfilEditar[0]['users']['urlTwitter']))
    {
        $urlTwitter = $perfilEditar[0]['users']['urlTwitter'];        
    }
    else 
    {
        $urlTwitter = '';
    } 
    
    if(isset($perfilEditar[0]['users']['urlLinkedin']))
    {
        $urlLinkedin = $perfilEditar[0]['users']['urlLinkedin'];        
    }
    else 
    {
        $urlLinkedin = '';
    }     
    
    if(isset($perfilEditar[0]['users']['facebookid']))
    {
        $idFacebook = $perfilEditar[0]['users']['facebookid'];        
    }
    else 
    {
        $idFacebook = '';
    }     
    
    echo $this->Html->script('validCampoFranz');  
        
?>
<style>
        select#ddlGenero, #ddlPrivacidad {
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
        
        .ui-autocomplete-loading {
          background: white url('../img/ui-anim_basic_16x16.gif') right center no-repeat;
          padding-right: 3px;
        }        
        
</style>
<script type="text/javascript">

    function Validar() 
    {
        if ($('#txtNombre').val() == "") 
        {
            $("#txtNombre").focus();
            $("#txtMensajeError").val('Por favor introduzca un nombre');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;
        }
        
        if ($('#txtApellido').val() == "") 
        {
            $("#txtApellido").focus();
            $("#txtMensajeError").val('Por favor introduzca un apellido');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;
        }        

        if ($("#ddlGenero option:selected").text() == "Seleccione") {
            $("#ddlGenero").focus();
            $("#txtMensajeError").val('Por favor seleccione un género');             
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');  
            return false;
        }
        
        if ($('#txtFechaNacimiento').val() == "") 
        {
            $("#txtMensajeError").val('Por favor seleccione una fecha');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;
        } 
            
        if ($('#txtEmail').val() == "") 
        {
            $("#txtEmail").focus();  
            $("#txtMensajeError").val('Por favor introduzca una dirección de correo');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;
        }
        
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;        
        if (!filter.test($("#txtEmail").val()))
        {
            $("#txtEmail").focus();  
            $("#txtMensajeError").val('Por favor introduzca una dirección de correo valida');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;            
        }
                
        if ($('#city').val() == "") 
        {
            $("#city").focus();  
            $("#txtMensajeError").val('Por favor introduzca una ubicación');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;
        } 
        
        var filterURL =  /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;     
        
        if($("#txtUrlFacebook").val() != "")
        {
            if (!filterURL.test($("#txtUrlFacebook").val()))
            {
                $("#txtUrlFacebook").focus();  
                $("#txtMensajeError").val('Por favor introduzca una URL de Facebook valida');            
                $("#divMensajeError").css("display","inherit");
                $('#divMensajeError').delay(2000).fadeOut('slow');       
                return false;            
            }            
        }

        if($("#txtUrlTwitter").val() != "")
        {
            if (!filterURL.test($("#txtUrlTwitter").val()))
            {
                $("#txtUrlTwitter").focus();  
                $("#txtMensajeError").val('Por favor introduzca una URL de Twitter valida');            
                $("#divMensajeError").css("display","inherit");
                $('#divMensajeError').delay(2000).fadeOut('slow');       
                return false;            
            }            
        }
        
        if($("#txtUrlLinkedin").val() != "")
        {
            if (!filterURL.test($("#txtUrlLinkedin").val()))
            {
                $("#txtUrlLinkedin").focus();  
                $("#txtMensajeError").val('Por favor introduzca una URL de Linkedin valida');            
                $("#divMensajeError").css("display","inherit");
                $('#divMensajeError').delay(2000).fadeOut('slow');       
                return false;            
            }            
        }        

        return true;
    }
    
    function Actualizar() 
    {
        if(Validar())
        {
            $.ajax({
                    url:   '/UCABsocial/Registro/editarUsuario?id='+$("#txtIdUsuario").val()+'&nombre='+$("#txtNombre").val()+'&nombreDos='+$("#txtNombreDos").val()+'&apellido='+$("#txtApellido").val()+'&apellidoDos='+$("#txtApellidoDos").val()+'&genero='+$("#ddlGenero option:selected").text()+'&fecha='+$("#txtFechaNacimiento").val()+'&username='+$("#txtUsername").val()+'&correo='+$("#txtEmail").val()+'&ubicacion='+$("#city").val()+'&descripcion='+$("#txtDescripcion").val()+'&telefono='+$("#txtTelefono").val()+'&privacidad='+$("#ddlPrivacidad option:selected").text()+'&urlFacebook='+$("#txtUrlFacebook").val()+'&urlTwitter='+$("#txtUrlTwitter").val()+'&urlLinkedin='+$("#txtUrlLinkedin").val(),
                    type:  'post',
                    success:  function (response) {
                        var resultado = response;
                        if(resultado.indexOf("Fallo") != -1)
                        {                        
                            $("#redirectUrl").val('/UCABsocial/Pages/display');
                            $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente.');
                            $("#dialog-message").dialog("open");                                                                     
                        }
                        else
                        {                                                                
                            $("#redirectUrl").val("/UCABsocial/Registro/Perfil");
                            $("#spanMensajeDialogo").html('Se ha actualizado el perfil correctamente.');
                            $("#dialog-message").dialog("open");                             
                        }                            
                    }
            });            
        }
    }    

    function log( message ) {
          $( "#log" ).scrollTop( 0 );
        }

    $(document).ready(function() {

        var valor = "<?php echo $genero; ?>";
        $("#ddlGenero").val(valor);

        $("#txtFechaNacimiento").datepicker({
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+0",
              dateFormat: 'dd-mm-yy'              
         });  
         
        $("#city").addClass("form-control");     
        
        $('#txtNombre').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
        $('#txtNombreDos').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
        $('#txtApellido').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');
        $('#txtApellidoDos').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou');   
        $('#city').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou'); 
        $('#txtUsername').validCampoFranz(' abcdefghijklmnñopqrstuvwxyzáéiou0123456789-_.'); 
        $('#txtEmail').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou0123456789-_.@');  
        $('#txtDescripcion').validCampoFranz('abcdefghijklmnñopqrstuvwxyzáéiou0123456789.,:;-_()');  
        $('#txtTelefono').validCampoFranz('0123456789'); 

        $( "#city" ).autocomplete({
              source: function( request, response ) {
                $.ajax({
                  url: "http://ws.geonames.org/searchJSON",
                  dataType: "jsonp",
                  data: {
                    featureClass: "P",
                    style: "full",
                    maxRows: 12,
                    name_startsWith: request.term
                  },
                  success: function( data ) {
                    response( $.map( data.geonames, function( item ) {
                      return {
                        label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + " - " + item.countryName,
                        value: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + " - " + item.countryName
                      }
                    }));
                  }
                });
              },
              minLength: 3,
              change: function (event, ui) {
                if (ui.item == null || ui.item == undefined) {
                    $("#city").val("");
                 }
              },    
              select: function(event, ui ) {
                log( ui.item.label);
              },
              open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
              },
              close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
              }
            }); 
            
            $( "#dialog-message" ).dialog({
              modal: true,
              autoOpen: false,                      
              buttons: {
                Empezar: function() {
                  $(this).dialog( "close" );
                  location.href = $("#redirectUrl").val();
                }
              }
            });            
    });    
       
</script>

<center>
    <div class="navbar navbar-inverse" style="width: 99.5%;">          
        <ul class="nav navbar-nav navbar-left"> 
          <li>
            <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120">           
          </li>
        </ul>       
    </div>
</center>

<div class="register" style="min-height: 450px;">
    <div class="register-screen">
        <div class="register-icon" >
          <img src="../img/login/smile.png" alt="UCABsocial" />
          <h4>Editar Perfil <small>UCABsocial</small></h4>
        </div>
        <div class="login-form" style="width: 100%; min-height: 450px;">
            <form>
                <div style="width: 100%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Nombre:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtIdUsuario" type="hidden" value="<?php echo $idUsuarioPerfil ?>" class="form-control" />                            
                            <input id="txtNombre" type="text" value="<?php echo $primerNombre ?>" class="form-control" />
                        </div>
                    </div>
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Segundo Nombre:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtNombreDos" type="text" value="<?php echo $segundoNombre ?>" class="form-control" /> 
                        </div>
                    </div>                    
                </div>
                <div style="width: 100%; padding-top: 2%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Apellido:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtApellido" type="text" value="<?php echo $primerApellido ?>" class="form-control" />
                        </div>
                    </div>
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Segundo Apellido:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtApellidoDos" type="text" value="<?php echo $segundoApellido ?>" class="form-control" />  
                        </div>
                    </div>                    
                </div> 
                <div style="width: 100%; padding-top: 2%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Género:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <select id="ddlGenero" style="width: 100%;">
                                <option value="0">Seleccione</option>
                                <option value="1">Femenino</option>
                                <option value="2">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Fecha de Nacimiento:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtFechaNacimiento" type="text" value="<?php echo $fechaNacimiento ?>" readonly="readonly" class="form-control" />
                        </div>
                    </div>                    
                </div>
                <div style="width: 100%; padding-top: 2%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Username:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtUsername" type="text" value="<?php echo $username ?>" class="form-control" readonly="readonly" />                          
                        </div>
                    </div>
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Correo Electrónico:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtEmail" type="text" value="<?php echo $email ?>" class="form-control" />                                   
                        </div>
                    </div>                    
                </div>  
                <div style="width: 100%; padding-top: 2%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Ubicación:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="city" class="form-control" value="<?php echo $ubicacion ?>"/>
                        </div>
                    </div>
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Teléfono:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <input id="txtTelefono" class="form-control" value="<?php echo $telefono ?>"/>
                        </div>
                    </div>                  
                </div> 
                <div style="width: 100%; padding-top: 2%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%; height: 110px;">                    
                        <div style="float: left; width: 25%">
                            <label><b>Descripción:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <textarea id="txtDescripcion"  style="resize: none; width: 100%; height: 100px;"><?php echo $descripcion ?></textarea>
                        </div>
                    </div>
                    <div style="float: left; width: 50%; height: 110px;"> 
                        <div style="float: left; width: 25%">
                            <label><b>Redes Sociales:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <div style="height: 8%;">
                                <div style="width: 100%;">
                                    <div style="float: left; width: 15%">
                                        <img src="<?php echo $this->webroot; ?>img/facebook.png"/>
                                    </div> 
                                    <div style="float: left; width: 85%">
                                        <input id="txtUrlFacebook" class="form-control" value="<?php echo $urlFacebook ?>" style="height: 32px;"/>
                                    </div>                                    
                                </div>
                            </div>
                            <div style="height: 8%;">
                                <div style="width: 100%;">
                                    <div style="float: left; width: 15%">
                                        <img src="<?php echo $this->webroot; ?>img/twitter.png"/>
                                    </div> 
                                    <div style="float: left; width: 85%">
                                        <input id="txtUrlTwitter" class="form-control" value="<?php echo $urlTwitter ?>" style="height: 32px;"/>
                                    </div>                                    
                                </div>
                            </div>                            
                            <div style="height: 8%;">
                                <div style="width: 100%;">
                                    <div style="float: left; width: 15%">
                                        <img src="<?php echo $this->webroot; ?>img/linkedin.png"/>
                                    </div> 
                                    <div style="float: left; width: 85%;">
                                        <input id="txtUrlLinkedin" class="form-control" value="<?php echo $urlLinkedin ?>" style="height: 32px;"/>
                                    </div>                                    
                                </div>
                            </div>                                                      
                        </div>                        
                    </div>                    
                </div>                
                <div style="width: 100%; padding-top: 2%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Privacidad:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
                            <select id="ddlPrivacidad" style="width: 100%;">
                                <option value="1">Público</option>
                                <option value="2">Privado</option>
                            </select>
                        </div>
                    </div>
                    <div style="float: left; width: 50%; text-align: center;"> 
                        <div style="float: left; width: 25%">
                            <a id="Cancelar" class="btn btn-info btn-lg btn-danger" style="height: 41px;" href= "/UCABsocial/Registro/Perfil">Cancelar</a> 
                        </div> 
                        <div style="float: left; width: 50%">
                            <a class="btn btn-large btn-block btn-inverse" style="height: 41px; width: 70%; margin-left: 15%;" href="javascript:Actualizar();">Actualizar</a> 
                        </div>                                                              
                    </div>                    
                </div>                                 
            </form> 
            <div id="divMensaje" class="form-group has-success" style="display: none; padding-top: 3%;">
                <input id="txtMensaje" type="text" value="" class="form-control" readonly="readonly"/>
            </div>  
            <div id="divMensajeError" class="form-group has-error" style="display: none; padding-top: 3%;">
                <input id="txtMensajeError" type="text" value="" class="form-control" readonly="readonly"/>
            </div>              
        </div>
    </div>
</div>

<div style="clear: both;"></div>
<div style="clear: both;"></div>
<div style="clear: both;"></div>
<div style="clear: both;"></div>

<div class="ui-widget" style="margin-top: 2em; font-family: Arial; display: none;">
  Result:
  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>

<div id="dialog-message" title="Bienvenido a la Red Social Ucabista">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
    <input id="redirectUrl" type="hidden" value=""/>
    <span id="spanMensajeDialogo"></span>
  </p>
</div>