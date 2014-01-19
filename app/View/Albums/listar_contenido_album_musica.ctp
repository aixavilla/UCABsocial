<?php

    if(isset($contenidoAlbum))
    {
        if(count($contenidoAlbum)>0)
        {
            $respuesta = "<center><table>";
            foreach($contenidoAlbum as $objContenido)
            {
                $respuesta = $respuesta."<tr style='border:1px solid black;'><td><table><tr><td><b>Título:</b>".$objContenido['R']['descripcion']."</td></tr><tr><td><b>Link:</b><a href='".$objContenido['R']['url']."' target='_blank'>".$objContenido['R']['url']."</a></td></tr></table></td><td><a href='".$objContenido['R']['url']."' target='_blank'><img src='../img/play-button.png'/></a></td></tr>";      
            } 
            $respuesta = $respuesta."</table></center>";
            
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