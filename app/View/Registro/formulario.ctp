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
   
    echo $this->Html->script('views/helpers/auto_complete');    
    
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style>
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
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

        var valor = "<?php echo $genero; ?>";
        $('#ddlGenero option:selected').text(valor);

        $("#txtFechaNacimiento").datepicker({
              changeMonth: true,
              changeYear: true,
              yearRange: "-100:+0",
              dateFormat: 'dd-mm-yy'              
         });  
         
        $("#locations").addClass("form-control");       
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
                            <div class="col-md-3" id="divGenero" style="float: left; width: 315px;">
                              <select id="ddlGenero" name="herolist" value="Seleccione" class="select-block">
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
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div style="float: left;">
                                <label><b>Ubicación:</b></label>
                            </div>
                            <div class="col-md-3" style="float: left; width: 315px;">
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
                        </div>                 
                    </td> 
                    <td>
                        <div style="padding: 1em 3em; margin: 1em 25%; ">
                            <div class="col-md-3" style="float: left; width: 315px;">
                                <a class="btn btn-primary btn-lg btn-block" href="#">Registrar</a>
                            </div>              
                        </div>                        
                    </td>
                </tr>
            </table>
        </form>            
    </center>        
</div>

<div style="clear: both;"></div>
<div style="clear: both;"></div>
<div style="clear: both;"></div>
<div style="clear: both;"></div>