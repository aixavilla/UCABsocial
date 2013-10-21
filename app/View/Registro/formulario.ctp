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
        $primerApellido = $ses_user['last_name'];        
    }
    else 
    {
        $primerApellido = '';
    }
    
    if(isset($ses_user['gender']))
    {
        if($ses_user['gender'] == 'Male')
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
        $fechaNacimiento = $ses_user['birthday'];
    }
    else 
    {
        $fechaNacimiento = '';
    }    

?>
<script type="text/javascript">
    
    $(document).ready(function() {
        
        var valor = "<?php echo $genero; ?>";
        $('#ddlGenero').val(valor);
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
                            <input id="txtApellidoDos" type="text" value="" class="form-control" />
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
                        <div class="col-md-3" style="float: left; width: 300px; padding-left: 8px;">
                            <select id="ddlGenero" class="select-block">
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
                            <input id="txtFechaNacimiento" type="text" <?php echo $fechaNacimiento ?> class="form-control" />
                        </div>              
                    </div>                 
                </td>
            </tr>            
        </table>
    </center>        
</div>

<div style="clear: both;"></div>