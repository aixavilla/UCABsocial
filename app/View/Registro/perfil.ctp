<?php

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

?>


<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#accordion" ).accordion();
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
            <input class="todo-search-field" type="search" value="" placeholder="Buscar personas"  />
        </div>
        <a href="#"><span class="fui-gear" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 50px"></span></a>
        <a href="#"><span style="color: #ECF0F1; font-size:15pt; float:right; margin-top:45px;margin-right: 15px"> <?php echo $usernameUsuario; ?></span></a>
        <a href="#"><span class="fui-mail" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px"></span></a>
        <a href="#"><span class="fui-user" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px"></span></a> 
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
            </td>
        </tr>
    </table>
  </center>
  
  
<center>
    <table style="width:75%">
        <tr>
            <td style="width:25%">
                <div>
                    <div style="padding-top:30px">
                        <table>
                            <tr>
                                <td>
                                    <span style="font-size: 17pt"><b>Información</b></span><br/>
                                    <br>
                                    <span style="font-size: 14pt">Fecha de Cumpleanos:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $fechaNacimiento; ?> </a></span><br>
                                    <span style="font-size: 14pt">Vive en:<a style="color:#1ABC9C; font-size: 12pt; font-family: sans-serif"> <?php echo $ubicacionUsuario; ?> </a>  </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
            <td style="width:55%">
                <div id="accordion" style="margin-left:10%;padding-top:50px">
                    <h3 style="color: #1ABC9C">FOTOS</h3>
                    <div>
                        <p>
                        </p>
                    </div>
                    <h3 style="color: #1ABC9C">VÍDEOS</h3>
                    <div>
                        <p>
                        </p>
                    </div>
                    <h3 style="color:#1ABC9C">MÚSICA</h3>
                    <div>
                        <p>
                        </p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
  </center>