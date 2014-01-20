<?php
 
    if(isset($comentariosAlbum))
    {
        if(count($comentariosAlbum)>0)
        {
            foreach($comentariosAlbum as $objComentario)
            {
                $date = new DateTime($objComentario['C']['created']);
                echo "<table><tr><td><div style='padding:5px;'><img src='".$objComentario['U']['foto']."' width='45' height='45' /></div></td><td><b>".$objComentario['U']['nombre']."  ".$objComentario['U']['apellido']."</b>&nbsp;&nbsp;".$objComentario['C']['descripcion']."<br/><span style='font-size:7pt;'>".$date->format('F j, Y')."</span></td><td><a href='javascript:AbrirDialogoEliminarComentarioMusica(".$objComentario['C']['id'].");'>&nbsp;&nbsp;<span class='fui-cross'></span></a></td></tr></table>";
                //echo "<div style='width:100%; border-style: dotted; border-width: 1px; border-radius:5px;'><div style='padding:5px;'><img src='".$objComentario['U']['foto']."' width='45' height='45' /><b>".$objComentario['U']['nombre']."  ".$objComentario['U']['apellido']."</b></div><br/><div></div>".$objComentario['C']['descripcion']."</div>";     
            }
        }
        else 
        {
            echo "<div>No existen comentarios</div>";  
        }
    }
    else 
    {
        echo "<div>En este momento no es posible mostrar los comentarios</div>";              
    }