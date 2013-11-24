<?php
    $ses_user=$this->Session->read('User');
    $logout = $this->Session->read('logout');
    
    $imagenPerfil = 'https://graph.facebook.com/'.$ses_user['id'].'/picture?width=200&height=200';
    
    if(isset($ses_user['first_name']))
    {
        $primerNombre = $ses_user['first_name'];        
    }
    else 
    {
        $primerNombre = '';
    }
    
    if(isset($ses_user['middle_name']))
    {
        $segundoNombre = $ses_user['middle_name'];        
    }
    else 
    {
        $segundoNombre = '';
    }
    
    if(isset($ses_user['last_name']))
    {
        $apellido = $ses_user['last_name'];    
        $apellidos = explode(" ", $apellido);
        $primerApellido = $apellidos[0];
        
        if(isset($apellidos[1]))
        {
            $segundoApellido = $apellidos[1];
        }
        else
        {
            $segundoApellido = '';
        }
    }
    else 
    {
        $primerApellido = '';
        $segundoApellido = '';        
    }
    
    if(isset($ses_user['gender']))
    {
        if($ses_user['gender'] == 'male')
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
    
    if(isset($ses_user['birthday']))
    {
        $fechaNacimientoPrevia = $ses_user['birthday'];
        $fechaNacimiento = date("d-m-Y", strtotime($fechaNacimientoPrevia));        
    }
    else 
    {
        $fechaNacimiento = '';
    } 
    
    if(isset($ses_user['email']))
    {
        $email = $ses_user['email'];        
    }
    else 
    {
        $email = '';
    }    
    
    if(isset($ses_user['link']))
    {
        $linkFacebook = $ses_user['link'];        
    }
    else 
    {
        $linkFacebook = '';
    }    
    
    echo $this->Html->script('validCampoFranz');  
        
?>
<style>
        select#ddlGenero {
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
        
        if ($('#txtUsername').val() == "") 
        {
            $("#txtUsername").focus();  
            $("#txtMensajeError").val('Por favor introduzca un nombre de usuario');            
            $("#divMensajeError").css("display","inherit");
            $('#divMensajeError').delay(2000).fadeOut('slow');       
            return false;
        }
        
        if ($('#txtUsernameValidator').val() == "1") 
        {
            $("#txtUsername").focus();  
            $("#txtMensajeError").val('El nombre de usuario seleccionado ya existe. Por favor introduzca otro ');            
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

        return true;
    }
    
    function Registrar() 
    {
        if(Validar())
        {
            var imagen = "<?php echo $imagenPerfil; ?>"; 
            var enlace = "<?php echo $linkFacebook; ?>";             
            
            $.ajax({
                    url:   '/UCABsocial/Registro/registrarUsuario?nombre='+$("#txtNombre").val()+'&nombreDos='+$("#txtNombreDos").val()+'&apellido='+$("#txtApellido").val()+'&apellidoDos='+$("#txtApellidoDos").val()+'&genero='+$("#ddlGenero option:selected").text()+'&fecha='+$("#txtFechaNacimiento").val()+'&username='+$("#txtUsername").val()+'&correo='+$("#txtEmail").val()+'&ubicacion='+$("#city").val()+'&foto='+imagen+'&link='+enlace,
                    type:  'post',
                    success:  function (response) {
                        var resultado = response;
                        if(resultado.indexOf("Fallo") != -1)
                        {                        
                            $("#redirectUrl").val('/UCABsocial/Pages/display');
                            $("#spanMensajeDialogo").html('Se ha producido un problema al procesar el registro, por favor intentelo nuevamente')
                            $("#dialog-message").dialog("open");                                                                     
                        }
                        else
                        {                             
                            var idUsuario = "<?php echo $ses_user['id']; ?>";                                    
                            $("#redirectUrl").val("/UCABsocial/Registro/index?idUsuario="+idUsuario);
                            $("#spanMensajeDialogo").html('Se ha registrado exitosamente en UCABsocial, ya puedes comenzar a utilizar los beneficios de esta Red Social')
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
        //$('#ddlGenero option:selected').text(valor);

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
        //$('#miCampo2').validCampoFranz('0123456789'); 
        
        $("#txtUsername").focusout(function() {
                var username = $("#txtUsername").val();
                if(username != "")
                {
                    $.ajax({
                            url:   '/UCABsocial/Registro/validateUsername?username='+username,
                            type:  'post',
                            success:  function (response) {
                                var resultado = response;
                                if(resultado.indexOf("0") != -1)
                                {
                                    $("#txtUsernameValidator").val('0');                                                          
                                    $("#txtMensaje").val('Username disponible');            
                                    $("#divMensaje").css("display","inherit");                                
                                    $('#divMensaje').delay(2000).fadeOut('slow');                                   
                                }
                                else
                                {                             
                                    $("#txtMensajeError").val('El username ya existe'); 
                                    $("#txtUsernameValidator").val('1');                                 
                                    $("#divMensajeError").css("display","inherit");
                                    $('#divMensajeError').delay(2000).fadeOut('slow');                                 
                                }                            
                            }
                    });
                }
        });

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
              width: 400,
              height: 400,              
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
<div class="register">
    <div class="register-screen">
        <div class="register-icon" >
          <img src="../img/login/smile.png" alt="UCABsocial" />
          <h4>Registro <small>UCABsocial</small></h4>
        </div>
        <div class="login-form" style="width: 100%;">
            <div id="divMensaje" class="form-group has-success" style="display: none; padding-top: 2%;">
                <input id="txtMensaje" type="text" value="" class="form-control" readonly="readonly"/>
            </div>  
            <div id="divMensajeError" class="form-group has-error" style="display: none; padding-top: 2%;">
                <input id="txtMensajeError" type="text" value="" class="form-control" readonly="readonly"/>
            </div>
            <form>
                <div style="width: 100%; padding-bottom: 2%;">
                    <div style="float: left; width: 50%">                    
                        <div style="float: left; width: 25%">
                            <label><b>Nombre:</b></label>
                        </div> 
                        <div style="float: left; width: 50%">
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
                            <input id="txtUsername" type="text" value="" class="form-control" />
                            <input id="txtUsernameValidator" type="text" value="0" style="display: none;" />                            
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
                            <input id="city" class="form-control"/>
                        </div>
                    </div>
                    <div style="float: left; width: 50%; text-align: center;"> 
                        <div style="float: left; width: 40%">
                            <a id="Cancelar" class="btn btn-info btn-lg btn-danger" style="height: 41px; width: 50%;" href= "<?php echo $logout; ?>">Cancelar</a> 
                        </div> 
                        <div style="float: left; width: 50%">
                            <a class="btn btn-large btn-block btn-inverse" style="height: 41px; width: 50%; margin-left: 15%;" href="javascript:Registrar();">Registrar</a> 
                        </div>                                                              
                    </div>                    
                </div>                
            </form>             
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