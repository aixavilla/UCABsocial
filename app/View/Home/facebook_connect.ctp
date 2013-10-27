<?php
        $ses_user = $this->Session->read('User');
        $logout = $this->Session->read('logout');
?>
<script type="text/javascript">
    
    function Validar()
    {
        <?php $idUsuario = $ses_user['id']; ?>
        var url = "<?php echo $idUsuario; ?>";

        if ($('#checkbox1').is(':checked')) {
            opener.location.href = '/UCABsocial/Registro/Index?idUsuario='+url;
            window.close();
        } 
        else 
        {
            $("#mensajeError").css("display","inherit");
        }
    }
    
    $(document).ready(function() {
        //set initial state.
        $('#textbox1').val($(this).is(':checked'));

        $('#checkbox1').change(function() {
            if($(this).is(":checked")) {
                $("#mensajeError").css("display","none");                
            }       
        });
    });    
       
</script>

<div class="navbar navbar-inverse" style="width: 500px;">          
    <ul class="nav navbar-nav navbar-left">
      <li>
        <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120">           
      </li>
    </ul>
</div>

<center>
    <?php
        if(!$this->Session->check('User') && empty($ses_user))   
        {
            echo $this->Html->image('facebook.png',array('id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:550px;'));
        }  
        else
        {
            echo '<div><div style="float: left; width:25%;"><img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="40" height="40"/></div>';
            echo '<div style="float: left; width:75%; text-align: left;"><h4>Hola! '.$ses_user['name'].'</h4><br/><span>Bienvenido a la Red Social Ucabista, ya puedes <br/>compartir tu contenido Multimedia favorito</span></div></div>';
          
            echo '<div style="clear:both"></div><div style="padding-top:15px;"><h4>Un último paso</h4><br/><span>Para completar tu registro por favor acepta nuestros <a href="/UCABsocial/Pages/terminos" target="_blank">terminos y condiciones.</a> </span></div>';
             //echo '<div class="row"><div class="col-md-3"><label class="checkbox" for="checkbox1"><input type="checkbox" value="" id="checkbox1" data-toggle="checkbox">Acepto los <a href="terminos.pdf">terminos y condiciones.</a></label></div></div>';
//         echo '<a href="'.$logout.'">Logout</a>';
        }
    ?>
</center>

    <div class="col-md-3">
        <label class="checkbox" for="checkbox1">
            <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox"/>Acepto los Terminos y Condiciones
        </label>
    </div>
    <div style="clear: both;"></div>
    <div id="mensajeError" class="form-group has-error" style="display: none; width: 455px; padding-left: 3px; padding-right: 3px;">
        <input type="text" value="Debe aceptar los terminos y condiciones para continuar" class="form-control" readonly="readonly"/>
        <span class="input-icon fui-cross" style="margin-right: 3%;"></span>
    </div>  
    <div style="clear: both;"></div>    
    <div style="padding-bottom: 20px;">
        <div style="float: left; width: 65%; text-align: right;">
            <a id="Cancelar" class="btn btn-info btn-lg btn-danger" href= "<?php echo $logout; ?>">Cancelar</a>
        </div>
        <div style="float: left; width: 35%; text-align: left;"> 
            <a id="Entrar" class="btn btn-block btn-lg btn-primary" href="javascript:Validar();" style="width: 150px;">Entrar</a> 
        </div>
    </div>
    <div style="clear: both;"></div>         