<?php

    if(isset($contenidoAlbum))
    {
        if(count($contenidoAlbum)>0)
        {
            $respuesta = "<div class='yt_holder'><div id='ytvideo'></div><ul class='demo2'>";
            foreach($contenidoAlbum as $objContenido)
            {
                $respuesta = $respuesta."<li><a href='".$objContenido['R']['url']."'>".$objContenido['R']['descripcion']."</a></li>";      
            } 
            $respuesta = $respuesta."</ul></div>";
            
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
