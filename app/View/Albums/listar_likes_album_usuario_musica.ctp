<?php

    if(isset($likesAlbum))
    {
        if(count($likesAlbum)>0)
        {            
            echo "<div> <b>Te gusta esto </b><a href='javascript:UnlikeMusica();'><img src='../img/unlike.png' width='25' heigth='25' title='Ya no me gusta'/></a></div>";
        } 
        else 
        {
            echo "<div><a href='javascript:LikeMusica();'><img src='../img/like.png' width='25' heigth='25' title='Me gusta'/></a></div>";  
        }        
    }
