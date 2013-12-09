<?php

    if(isset($contenidoAlbum))
    {
        if(count($contenidoAlbum)>0)
        {
            $respuesta = "<center><ul id='carousel'>";
            foreach($contenidoAlbum as $objContenido)
            {
                $respuesta = $respuesta."<li><a href='".$objContenido['R']['url']."'><img width='617' height='617' alt='' src='".$objContenido['R']['url']."'/><p style='font-size:18pt;'><b>Prueba Contenido</b></p></a></li>";      
            } 
            $respuesta = $respuesta."</ul></center>";
            
            echo $respuesta;
        } 
        else 
        {
            echo "<div>No existe contenido para mostrar</div>";  
        }        
    }
    else 
    {
        echo "<div>En este momento no es posible mostrar el contenido del album</div>";              
    }
