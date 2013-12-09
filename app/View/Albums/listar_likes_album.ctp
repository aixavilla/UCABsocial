<?php

    if(isset($likesAlbum))
    {
        if(count($likesAlbum)>0)
        {            
            echo "A ".  count($likesAlbum)." persona(s) les gusta esta publicación";
        } 
        else 
        {
            echo "<div>No tienes ningún like</div>";  
        }        
    }
    else 
    {
        echo "<div>No tienes ningún like</div>";              
    }
