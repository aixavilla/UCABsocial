<?php

    $ses_user=$this->Session->read('User');
    
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
            $genero = 'Masculino';
        }
        else 
        {
            $genero = 'Femenino';
        }
    }
    else 
    {
        $genero = 'Seleccione';
    }
    
    if(isset($ses_user['birthday']))
    {
        $fechaNacimiento = $ses_user['birthday'];
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
       
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style type="text/css">
    .custom-select {
      position : relative;
      width: 100%;
      max-width:  25em;
      margin: 4em auto;
      cursor: pointer;
    }
    .select,
    .label{
      display: block;
    }
    .select {
      width: 100%;
      position: absolute;
      top: 0;
      padding: 1em;
      height: 4em;
      opacity: 0;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      background: none transparent;
      border: 0 none;
    }
    .label {
      position:  relative;
      padding: 1em;
      border-radius: .5em;
      cursor: pointer;
    }
    .label::after {
      content: "▼";
      position: absolute;
      right: 0;
      top: 0;
      padding: 1em;
      border-left: 1px solid;
    }
    .open .label::after {
       content: "▲";
    }
    .select-1 {
       background: #21cf8f;
      border-bottom: .25em solid darken(#21cf8f, 10);
      &:after {
         border-color: darken(#21cf8f, 10);
      }
    }
    .select-2 {
       background: #307ddb;
      border-bottom: .25em solid darken(#307ddb, 10);
      &:after {
         border-color: darken(#307ddb, 10);
      }
    }
    .select-3 {
       background: #f2bb18;
      border-bottom: .25em solid darken(#f2bb18, 10);
      &:after {
         border-color: darken(#f2bb18, 10);
      }
    }
    .select-4 {
      background: #db3d3d;
      border-bottom: .25em solid darken(#db3d3d, 10);
      &:after {
         border-color: darken(#db3d3d, 10);
      }
}
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
        
        var valor = "<?php echo $genero; ?>";
        $('#spanGenero').html(valor);
          
        $("#txtFechaNacimiento").datepicker({
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+0"
         });    
         
        $("select").on("click" , function() {

          $(this).parent(".custom-select").toggleClass("open");

        });

        $(document).mouseup(function (e)
        {
            var container = $(".custom-select");

            if (container.has(e.target).length === 0)
            {
                container.removeClass("open");
            }
        });


        $("select").on("change" , function() 
        {
            var selection = $(this).find("option:selected").text(),
            labelFor = $(this).attr("id"),
            label = $("[for='" + labelFor + "']");
            label.find(".selection-choice").html(selection);
        }); 
        
        $( "#combobox" ).combobox();
        $( "#toggle" ).click(function() {
          $( "#combobox" ).toggle();
        });        
        
    });    
       
</script>

<div class="navbar navbar-inverse" style="width: 100%;">          
    <ul class="nav navbar-nav navbar-left">
      <li>
        <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120">           
      </li>
    </ul>
</div>

<div id="formRegistro" style="text-align: center;" >
    <center>
        <form>
            <table>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Nombre:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtNombre" type="text" value="<?php echo $primerNombre ?>" class="form-control" />
                            </div>              
                        </div>                
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Segundo Nombre:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtNombreDos" type="text" value="<?php echo $segundoNombre ?>" class="form-control" />
                            </div>              
                        </div>                
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Apellido:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtApellido" type="text" value="<?php echo $primerApellido ?>" class="form-control" />
                            </div>              
                        </div>                
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Segundo Apellido:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtApellidoDos" type="text" value="<?php echo $segundoApellido ?>" class="form-control" />
                            </div>              
                        </div>                 
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Género:</b></label>
                            </div>
                            <div class="col-md-3" style="float: left; width: 300px;">
                                <label id for="select-choice1" class="label select-1" style="font-size: 95%;"><span id="spanGenero" class="selection-choice" style="font-size: 10pt;">Seleccione</span> </label>
                                <select id="select-choice1" class="select" style="font-size: 12pt;">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>  
                                </select>
                            </div>              
                        </div>                    
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Fecha de Nacimiento:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtFechaNacimiento" type="text" value="<?php echo $fechaNacimiento ?>" readonly="readonly" class="form-control" />
                            </div>              
                        </div>                 
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Username:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtUsername" type="text" value="" class="form-control" />
                            </div>              
                        </div>                    
                    </td>
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Email:</b></label>
                            </div>
                            <div class="form-group" style="float: left; width: 300px; padding-left: 8px;">
                                <input id="txtEmail" type="text" value="<?php echo $email ?>" class="form-control" />
                            </div>              
                        </div>                 
                    </td>
                </tr>
                <tr>
                    <select id="combobox">
                      <option value="">Select one...</option>
                      <option value="ActionScript">ActionScript</option>
                      <option value="AppleScript">AppleScript</option>
                      <option value="Asp">Asp</option>
                      <option value="BASIC">BASIC</option>
                      <option value="C">C</option>
                      <option value="C++">C++</option>
                      <option value="Clojure">Clojure</option>
                      <option value="COBOL">COBOL</option>
                      <option value="ColdFusion">ColdFusion</option>
                      <option value="Erlang">Erlang</option>
                      <option value="Fortran">Fortran</option>
                      <option value="Groovy">Groovy</option>
                      <option value="Haskell">Haskell</option>
                      <option value="Java">Java</option>
                      <option value="JavaScript">JavaScript</option>
                      <option value="Lisp">Lisp</option>
                      <option value="Perl">Perl</option>
                      <option value="PHP">PHP</option>
                      <option value="Python">Python</option>
                      <option value="Ruby">Ruby</option>
                      <option value="Scala">Scala</option>
                      <option value="Scheme">Scheme</option>
                    </select>
                </tr>
            </table>
        </form>            
    </center>        
</div>

<div style="clear: both;"></div>