<?php

    if(isset($contenidoAlbum))
    {
        if(count($contenidoAlbum)>0)
        {
            $respuesta = "<center><ul id='carousel'>";
            foreach($contenidoAlbum as $objContenido)
            {
                $respuesta = $respuesta."<li><a href='".$objContenido['R']['url']."'><img width='600' height='400' alt=''  src='".$objContenido['R']['url']."' /></a></li>";      
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
