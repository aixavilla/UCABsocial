<?php


?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
<div class="navbar navbar-inverse" style="width: 100%;">          
    <ul class="nav navbar-nav navbar-left" style='padding-right:100px'>
      <li>
        <img src="<?php echo $this->webroot; ?>img/logoo.png" width="250" height="120"> 
      </li> 
    </ul>   
     <div class="todo-search" style="width:300px; float:left ; margin-top:35px; height:50px; padding-top: 10px">
              <input class="todo-search-field" type="search" value="" placeholder="Buscar personas"  />
             
            </div>
     <a href="#"><span class="fui-gear" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 50px"></span></a>
     <a href="#"><span style="color: #ECF0F1; font-size:15pt; float:right; margin-top:45px;margin-right: 15px">usuario </span></a>
     <a href="#"><span class="fui-mail" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px"></span></a>
   <a href="#"><span class="fui-user" style="color: #1ABC9C; font-size:25pt; float:right; margin-top:35px;margin-right: 20px"></span></a> 
     
</div>
<table>
    <tr>
           <h3 align="center">Nombre de Usuario</h3>
    <td>
    <div>
     
        <div style="margin-left: 150px; padding-top:30px">
        <table style="width:30%">
        <tr>
            <H5>Informacion</H5>
            <span style="font-size: 15pt">Fecha de Cumpleanos:</span><br>
            <span style="font-size: 15pt">Vive en:</span>
        
        </tr>
        </table>
        </div>
    
    </div>
 
    </td>  
    <td>
<div id="accordion" style="width: 200%; margin-left:190px;padding-top:50px">
  <h3>FOTOS</h3>
  <div>
    <p>

    </p>
  </div>
  <h3>VIDEOS</h3>
  <div>
    <p>
    
    </p>
  </div>
  <h3>MUSICA</h3>
  <div>
    <p>

    </p>
    <ul>
     
    </ul>
  </div>
</div>
 </td>
 </tr>
</table>